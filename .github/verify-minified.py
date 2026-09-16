#!/usr/bin/env python3
"""Check each of the theme's minified stylesheets against its source.

WordPress enqueues the .min files. A source edited without rebuilding, or a
minified file edited by hand, is invisible in a text diff of the other -- and a
minifier that merged or reordered rules would change which declaration wins
without changing any declaration. This compares the two as ordered rule lists:
same at-rule context, same selectors, same properties, same order.

Property *values* are not compared: clean-css rewrites them (0px -> 0,
#ffffff -> #fff, "description" -> description), all of which a browser reads
identically. Order and structure are what the cascade depends on, and those are
what this asserts.

Usage: python3 .github/verify-minified.py
"""
import re, sys, pathlib

SHEETS = ('style', 'editor-style', 'customizer', 'pixova-woocommerce')
CSS_DIR = pathlib.Path('layout/css')


def normalise_selector(sel):
    sel = re.sub(r'\s+', ' ', sel.strip())
    sel = re.sub(r'\s*([>+~,])\s*', r'\1', sel)          # li > ol  ==  li>ol
    sel = re.sub(r'\[([^\]=]+)=["\']([^"\']*)["\']\]', r'[\1=\2]', sel)  # [a="b"] == [a=b]
    sel = re.sub(r'(?<!:):(before|after|first-line|first-letter)\b', r'::\1', sel)
    sel = re.sub(r':\s+', ':', sel)                      # (min-width: 40em) == (min-width:40em)
    # A selector repeated within one list does nothing, and the minifier drops it.
    return ','.join(sorted(set(sel.split(','))))


def rules(text):
    """[(at-rule context, selector, (property names,))] in source order."""
    text = re.sub(r'/\*.*?\*/', '', text, flags=re.S)
    out, stack, i = [], [], 0
    while True:
        brace = text.find('{', i)
        if brace == -1:
            break
        close = text.find('}', i)
        if close != -1 and close < brace:                 # leaving an at-rule block
            if stack:
                stack.pop()
            i = close + 1
            continue
        head = normalise_selector(text[i:brace])
        if head.startswith('@') and not head.startswith('@font-face'):
            stack.append(head)
            i = brace + 1
            continue
        end = text.find('}', brace)
        if end == -1:
            break
        props = tuple(d.split(':', 1)[0].strip().lower()
                      for d in text[brace + 1:end].split(';') if ':' in d)
        if props:                                          # empty rules are dropped by both
            out.append((tuple(stack), head, props))
        i = end + 1
    return out


fail = 0
for name in SHEETS:
    src, mini = CSS_DIR / f'{name}.css', CSS_DIR / f'{name}.min.css'
    a, b = rules(src.read_text()), rules(mini.read_text())
    if a == b:
        print(f"  ok   {name:<20} {len(a)} rules")
        continue
    fail += 1
    print(f"  FAIL {name:<20} {len(a)} rules in the source, {len(b)} in the minified build")
    for x, y in zip(a, b):
        if x != y:
            print(f"         first divergence:")
            print(f"           source: {x[0]} {x[1][:120]} {x[2]}")
            print(f"           min   : {y[0]} {y[1][:120]} {y[2]}")
            break
    else:
        longer = a if len(a) > len(b) else b
        print(f"         extra rule: {longer[min(len(a), len(b))][1][:70]}")

sys.exit(1 if fail else 0)

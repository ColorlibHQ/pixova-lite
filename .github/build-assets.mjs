/**
 * Rebuild the minified CSS and JS the theme enqueues.
 *
 * WordPress loads the .min files, so hand-editing a source and forgetting its
 * minified sibling changes nothing on the front end -- and hand-editing the
 * minified file changes nothing for anyone reading the theme. Neither file is
 * edited by hand any more: the sources are the sources, and this regenerates
 * the rest.
 *
 * Only the theme's own assets are listed. The vendored libraries
 * (Bootstrap, Animate.css, Owl Carousel, WOW, Pace and the rest) ship with
 * their upstream minified builds and are left exactly as their authors
 * published them.
 *
 * CSS is minified at clean-css level 1: whitespace, comments and value
 * shortening, but no merging or reordering of rules across the file. Level 2
 * would save about another kilobyte by restructuring the cascade, which in a
 * stylesheet this old is not worth the risk of a rule quietly changing rank.
 *
 *   npm run build
 */
import { readFile, writeFile } from 'node:fs/promises';
import { basename } from 'node:path';
import CleanCSS from 'clean-css';
import { minify } from 'terser';

const CSS = [
  'layout/css/style.css',
  'layout/css/editor-style.css',
  'layout/css/customizer.css',
  'layout/css/pixova-woocommerce.css',
];

const JS = [
  'layout/js/scripts.js',
  'layout/js/plugins.js',
  'layout/js/preloader.js',
  'layout/js/pathLoader.js',
  'layout/js/customizer.js',
  'layout/js/customizer/customizer.js',
];

const target = (src) => src.replace(/\.(css|js)$/, '.min.$1');
const kb = (n) => `${(n / 1024).toFixed(1)}KB`;

async function buildCss() {
  const cleaner = new CleanCSS({ level: 1, returnPromise: true });

  for (const src of CSS) {
    const input = await readFile(src, 'utf8');
    const { styles, errors } = await cleaner.minify(input);

    if (errors.length) {
      throw new Error(`${src}: ${errors.join(', ')}`);
    }

    await writeFile(target(src), styles);
    console.log(`  css  ${basename(src).padEnd(26)} ${kb(input.length)} -> ${kb(styles.length)}`);
  }
}

async function buildJs() {
  for (const src of JS) {
    const input = await readFile(src, 'utf8');
    // No name mangling of top-level identifiers: several of these files are
    // read by the Customizer preview and by inline handlers, which reach in
    // by name.
    const { code } = await minify(input, { compress: true, mangle: { toplevel: false } });

    await writeFile(target(src), code);
    console.log(`  js   ${basename(src).padEnd(26)} ${kb(input.length)} -> ${kb(code.length)}`);
  }
}

const what = process.argv[2];

if (!what || what === 'css') await buildCss();
if (!what || what === 'js') await buildJs();

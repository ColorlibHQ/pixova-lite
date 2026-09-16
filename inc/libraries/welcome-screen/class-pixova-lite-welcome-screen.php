<?php
/**
 * The theme's About page, replacing Epsilon_Welcome_Screen.
 *
 * The tab templates in sections/ are unchanged: they only ever needed a
 * handful of methods from the class behind them, and those are provided here.
 *
 * Differences from the framework's version:
 *  - the dismiss endpoint requires a nonce and edit_theme_options, and is not
 *    registered for logged-out visitors
 *  - plugin paths come from WP_PLUGIN_DIR
 *  - everything is set up on init, so no translation is loaded before it
 *  - the EDD licence tab is gone; this theme has always passed 'edd' => false
 *
 * @package Pixova Lite
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Pixova_Lite_Welcome_Screen' ) ) {

	class Pixova_Lite_Welcome_Screen {

		/**
		 * @var Pixova_Lite_Welcome_Screen|null
		 */
		private static $instance = null;

		/**
		 * @var string
		 */
		private $theme_name = '';

		/**
		 * @var string
		 */
		private $theme_slug = '';

		/**
		 * @var array
		 */
		private $actions = array();

		/**
		 * @var array
		 */
		private $plugins = array();

		/**
		 * The tabs, in order.
		 *
		 * @var array
		 */
		private $tabs = array();

		/**
		 * @param array $config
		 */
		private function __construct( $config ) {
			$this->theme_name = isset( $config['theme-name'] ) ? $config['theme-name'] : '';
			$this->theme_slug = isset( $config['theme-slug'] ) ? $config['theme-slug'] : '';
			$this->actions    = isset( $config['actions'] ) ? (array) $config['actions'] : array();
			$this->plugins    = isset( $config['plugins'] ) ? (array) $config['plugins'] : array();

			add_action( 'admin_menu', array( $this, 'register_menu' ) );
			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' ) );
			add_action( 'wp_ajax_pixova_lite_dismiss_required_action', array( $this, 'dismiss_required_action' ) );
			add_action( 'wp_ajax_pixova_lite_import_demo', array( $this, 'process_sample_content' ) );
		}

		/**
		 * @param array $config
		 *
		 * @return Pixova_Lite_Welcome_Screen
		 */
		public static function get_instance( $config = array() ) {
			if ( null === self::$instance ) {
				self::$instance = new self( $config );
			}

			return self::$instance;
		}

		/**
		 * The tabs, built here so their labels are translated after init.
		 *
		 * @return array
		 */
		private function get_tabs() {
			if ( empty( $this->tabs ) ) {
				$this->tabs = array(
					'getting_started'      => __( 'Getting Started', 'pixova-lite' ),
					'recommended_actions'  => __( 'Recommended Actions', 'pixova-lite' ),
					'recommended_plugins'  => __( 'Recommended Plugins', 'pixova-lite' ),
					'support'              => __( 'Support', 'pixova-lite' ),
				);
			}

			return $this->tabs;
		}

		/**
		 * The requested tab, restricted to the ones that exist.
		 *
		 * @return string
		 */
		private function get_active_tab() {
			$tabs = array_keys( $this->get_tabs() );
			$tab  = isset( $_GET['tab'] ) ? sanitize_key( wp_unslash( $_GET['tab'] ) ) : ''; // phpcs:ignore WordPress.Security.NonceVerification.Recommended
			// Links to these tabs have been written both ways for years.
			$tab  = str_replace( '-', '_', $tab );

			return in_array( $tab, $tabs, true ) ? $tab : 'getting_started';
		}

		/**
		 * @return void
		 */
		public function register_menu() {
			$count = $this->count_actions();
			$title = $count ? sprintf( '%1$s <span class="badge-action-count">%2$s</span>', esc_html( $this->theme_name ), absint( $count ) ) : esc_html( $this->theme_name );

			add_theme_page(
				$this->theme_name,
				$title,
				'edit_theme_options',
				$this->theme_slug . '-welcome',
				array( $this, 'render' )
			);
		}

		/**
		 * @param string $hook_suffix
		 *
		 * @return void
		 */
		public function enqueue( $hook_suffix = '' ) {
			if ( 'appearance_page_' . $this->theme_slug . '-welcome' !== $hook_suffix ) {
				return;
			}

			$theme = wp_get_theme();

			wp_enqueue_style(
				'pixova-lite-welcome-screen',
				get_template_directory_uri() . '/inc/libraries/welcome-screen/css/welcome.css',
				array(),
				$theme->get( 'Version' )
			);

			wp_enqueue_script(
				'pixova-lite-welcome-screen',
				get_template_directory_uri() . '/inc/libraries/welcome-screen/js/welcome.js',
				array( 'jquery' ),
				$theme->get( 'Version' ),
				true
			);

			wp_localize_script( 'pixova-lite-welcome-screen', 'pixovaLiteWelcome', array(
				'ajaxurl' => esc_url( admin_url( 'admin-ajax.php' ) ),
				'nonce'   => wp_create_nonce( 'pixova_lite_dismiss_required_action' ),
			) );
		}

		/**
		 * How many recommended actions are still outstanding.
		 *
		 * @return int
		 */
		private function count_actions() {
			$dismissed = get_option( 'pixova_show_required_actions', array() );
			$count     = 0;

			foreach ( $this->actions as $action ) {
				if ( ! empty( $action['check'] ) ) {
					continue;
				}

				/*
				 * true means dismissed, which is what the tab template and the
				 * handler below both assume. The previous count skipped on
				 * false instead, so the badge counted the actions that had been
				 * dismissed and ignored the ones still outstanding.
				 */
				if ( is_array( $dismissed ) && ! empty( $dismissed[ $action['id'] ] ) ) {
					continue;
				}

				$count ++;
			}

			return $count;
		}

		/**
		 * @param string $id Tab id.
		 *
		 * @return string
		 */
		private function generate_admin_url( $id = '' ) {
			return admin_url( sprintf( 'themes.php?page=%1$s-welcome&tab=%2$s', $this->theme_slug, $id ) );
		}

		/**
		 * Whether a plugin is installed and active, and what to offer next.
		 *
		 * @param string $slug
		 *
		 * @return array
		 */
		private function check_plugin( $slug = '' ) {
			$installed = Pixova_Notify_System::check_plugin_is_installed( $slug );
			$active    = Pixova_Notify_System::check_plugin_is_active( $slug );

			/*
			 * The href matters even though WordPress' own updates.js drives
			 * these buttons from data-slug: without it the link is empty, which
			 * warns on every render, and middle-clicking or opening in a new
			 * tab -- or having JavaScript fail -- goes nowhere.
			 */
			$state = array(
				'installed' => $installed,
				'active'    => $active,
				'needs'     => 'install',
				'class'     => 'install-now button',
				'label'     => __( 'Install', 'pixova-lite' ),
				'url'       => wp_nonce_url(
					self_admin_url( 'update.php?action=install-plugin&plugin=' . rawurlencode( $slug ) ),
					'install-plugin_' . $slug
				),
			);

			$path = Pixova_Notify_System::_get_plugin_basename_from_slug( $slug );

			if ( $installed && ! $active ) {
				$state['needs'] = 'activate';
				$state['class'] = 'activate-now button button-primary';
				$state['label'] = __( 'Activate', 'pixova-lite' );
				$state['url']   = wp_nonce_url(
					self_admin_url( 'plugins.php?action=activate&plugin=' . rawurlencode( $path ) ),
					'activate-plugin_' . $path
				);
			}

			if ( $installed && $active ) {
				$state['needs'] = 'deactivate';
				$state['class'] = 'deactivate-now button';
				$state['label'] = __( 'Deactivate', 'pixova-lite' );
				$state['url']   = wp_nonce_url(
					self_admin_url( 'plugins.php?action=deactivate&plugin=' . rawurlencode( $path ) ),
					'deactivate-plugin_' . $path
				);
			}

			return $state;
		}

		/**
		 * Plugin details from the WordPress.org API, cached for a day.
		 *
		 * @param string $slug
		 *
		 * @return object|false
		 */
		/**
		 * Warm the cache for every recommended plugin in one request.
		 *
		 * plugins_api() asks WordPress.org about one plugin at a time, and this
		 * page asks about eight -- eight serial round trips, which measured
		 * over three seconds from a German datacentre and left the tab blank
		 * for four. The API also accepts request[slugs][] and answers for all
		 * of them at once, which is one round trip. Everything it returns is
		 * cached per slug, so a partly warm cache only asks for what it is
		 * missing.
		 *
		 * Nothing here is required: whatever this does not manage to cache, the
		 * per-slug call below still fetches.
		 *
		 * @param array $slugs
		 *
		 * @return void
		 */
		public function prime_plugin_information( $slugs ) {
			$missing = array();

			foreach ( (array) $slugs as $slug ) {
				if ( false === get_transient( 'pixova_lite_plugin_' . md5( $slug ) ) ) {
					$missing[] = $slug;
				}
			}

			if ( ! $missing ) {
				return;
			}

			$args = array( 'action' => 'plugin_information' );

			foreach ( $missing as $slug ) {
				$args['request']['slugs'][] = $slug;
			}

			/* The card shows a name, a version, an author and an icon. */
			$args['request']['fields'] = array(
				'icons'             => true,
				'short_description' => true,
				'sections'          => false,
				'banners'           => false,
				'tags'              => false,
				'reviews'           => false,
				'versions'          => false,
				'screenshots'       => false,
			);

			$response = wp_remote_get(
				add_query_arg( $args, 'https://api.wordpress.org/plugins/info/1.2/' ),
				array(
					'timeout'    => 15,
					'user-agent' => 'WordPress/' . get_bloginfo( 'version' ) . '; ' . home_url( '/' ),
				)
			);

			if ( is_wp_error( $response ) || 200 !== wp_remote_retrieve_response_code( $response ) ) {
				return;
			}

			$body = json_decode( wp_remote_retrieve_body( $response ) );

			if ( ! is_object( $body ) ) {
				return;
			}

			foreach ( $missing as $slug ) {
				if ( ! isset( $body->$slug ) || ! is_object( $body->$slug ) || empty( $body->$slug->name ) ) {
					continue;
				}

				set_transient( 'pixova_lite_plugin_' . md5( $slug ), $body->$slug, DAY_IN_SECONDS );
			}
		}

		private function call_plugin_api( $slug ) {
			$transient = 'pixova_lite_plugin_' . md5( $slug );
			$cached    = get_transient( $transient );

			if ( false !== $cached ) {
				return $cached;
			}

			if ( ! function_exists( 'plugins_api' ) ) {
				require_once ABSPATH . 'wp-admin/includes/plugin-install.php';
			}

			$info = plugins_api( 'plugin_information', array(
				'slug'   => $slug,
				'fields' => array(
					'short_description' => true,
					'icons'             => true,
					'sections'          => false,
					'reviews'           => false,
					'banners'           => false,
					'tags'              => false,
				),
			) );

			if ( is_wp_error( $info ) ) {
				return false;
			}

			set_transient( $transient, $info, DAY_IN_SECONDS );

			return $info;
		}

		/**
		 * @param array|object $icons
		 *
		 * @return string
		 */
		private function check_for_icon( $icons ) {
			$icons = (array) $icons;

			foreach ( array( 'svg', '2x', '1x', 'default' ) as $key ) {
				if ( ! empty( $icons[ $key ] ) ) {
					return $icons[ $key ];
				}
			}

			return '';
		}

		/**
		 * Everything a plugin card needs.
		 *
		 * @param string $slug
		 *
		 * @return array
		 */
		private function get_plugin_information( $slug = '' ) {
			$info = $this->call_plugin_api( $slug );

			return array_merge(
				array(
					'info' => $info,
					'icon' => $info && isset( $info->icons ) ? $this->check_for_icon( $info->icons ) : '',
				),
				$this->check_plugin( $slug )
			);
		}

		/**
		 * Mark one recommended action as done, or bring it back.
		 *
		 * @return void
		 */
		public function dismiss_required_action() {
			check_ajax_referer( 'pixova_lite_dismiss_required_action', 'nonce' );

			if ( ! current_user_can( 'edit_theme_options' ) ) {
				wp_send_json_error( '', 403 );
			}

			$id   = isset( $_POST['id'] ) ? sanitize_key( wp_unslash( $_POST['id'] ) ) : '';
			$todo = isset( $_POST['todo'] ) ? sanitize_key( wp_unslash( $_POST['todo'] ) ) : '';

			$known = wp_list_pluck( $this->actions, 'id' );

			if ( '' === $id || ! in_array( $id, $known, true ) ) {
				wp_send_json_error( '', 400 );
			}

			$dismissed = get_option( 'pixova_show_required_actions', array() );

			if ( ! is_array( $dismissed ) ) {
				$dismissed = array();
			}

			/* The eye icon sends 'hidden' to dismiss and 'visible' to bring back. */
			$dismissed[ $id ] = ( 'hidden' === $todo );

			update_option( 'pixova_show_required_actions', $dismissed );

			wp_send_json_success( array( 'id' => $id ) );
		}


		/**
		 * The markup for the demo import action, used by the actions tab.
		 *
		 * @return string
		 */
		public static function demo_content_html() {
			$html  = '<p><a class="button button-primary" id="pixova-lite-import-demo" href="#">' . esc_html__( 'Import Demo Content', 'pixova-lite' ) . '</a></p>';
			$html .= '<p class="pixova-lite-import-options">';
			$html .= '<label><input checked type="checkbox" class="pixova-lite-import-step" value="set_frontpage_to_static" /> ' . esc_html__( 'Set a static front page', 'pixova-lite' ) . '</label> ';
			$html .= '<label><input checked type="checkbox" class="pixova-lite-import-step" value="import_demo_content" /> ' . esc_html__( 'Import the demo data', 'pixova-lite' ) . '</label>';
			$html .= '</p>';

			return $html;
		}

		/**
		 * Read one of the bundled demo files.
		 *
		 * @param string $name
		 *
		 * @return array
		 */
		private static function demo_data( $name ) {
			$path = get_template_directory() . '/inc/libraries/welcome-screen/demo/' . $name . '.json';

			if ( ! is_readable( $path ) ) {
				return array();
			}

			$raw = file_get_contents( $path ); // phpcs:ignore WordPress.WP.AlternativeFunctions

			/*
			 * The demo points at images that ship with the theme. They used to
			 * be written as absolute URLs on cdn.colorlib.com, which stopped
			 * resolving -- every site that imported the demo after that got
			 * thirteen broken images. The files are right here, so the demo
			 * now names them relative to wherever the theme is installed.
			 */
			$raw = str_replace( '{{theme_uri}}', get_template_directory_uri(), $raw );

			$decoded = json_decode( $raw, true );

			return is_array( $decoded ) ? $decoded : array();
		}

		/**
		 * Look up a published page by title.
		 *
		 * get_page_by_title() is deprecated as of WordPress 6.2.
		 *
		 * @param string $title
		 *
		 * @return WP_Post|null
		 */
		private static function get_page_by_title( $title ) {
			$pages = get_posts( array(
				'post_type'              => 'page',
				'title'                  => $title,
				'post_status'            => 'publish',
				'posts_per_page'         => 1,
				'no_found_rows'          => true,
				'update_post_term_cache' => false,
				'update_post_meta_cache' => false,
			) );

			return $pages ? $pages[0] : null;
		}

		/**
		 * Give the site a static front page and a posts page.
		 *
		 * @return bool
		 */
		private static function set_frontpage_to_static() {
			foreach ( array( 'Homepage' => 'page_on_front', 'Blog' => 'page_for_posts' ) as $title => $option ) {
				$page = self::get_page_by_title( $title );

				if ( null === $page ) {
					$id = wp_insert_post( array(
						'post_title'  => $title,
						'post_type'   => 'page',
						'post_status' => 'publish',
					) );

					if ( is_wp_error( $id ) || ! $id ) {
						return false;
					}
				} else {
					$id = $page->ID;
				}

				update_option( $option, $id );
			}

			update_option( 'show_on_front', 'page' );

			return true;
		}

		/**
		 * Apply the demo settings and widgets.
		 *
		 * @return bool
		 */
		private static function import_demo_content() {
			$content = self::demo_data( 'content' );

			if ( empty( $content ) ) {
				return false;
			}

			/*
			 * The contact section renders whichever form plugin it is pointed
			 * at, and the setting defaults to Kali Forms. A site that has
			 * Contact Form 7 instead would import the demo and get an empty
			 * contact section, so point it at what is actually installed.
			 */
			require_once ABSPATH . 'wp-admin/includes/plugin.php';

			$forms = get_posts( array(
				'post_type'      => 'wpcf7_contact_form',
				'post_status'    => 'publish',
				'posts_per_page' => 1,
				'fields'         => 'ids',
			) );

			if ( ! empty( $forms ) ) {
				$content['pixova_lite_contact_section_cf7'] = $forms[0];
			}

			if ( is_plugin_active( 'kali-forms/kali-forms.php' ) ) {
				set_theme_mod( 'pixova_lite_contact_section_type', 'kali-forms' );
			} elseif ( ! empty( $forms ) && is_plugin_active( 'contact-form-7/wp-contact-form-7.php' ) ) {
				set_theme_mod( 'pixova_lite_contact_section_type', 'contact-form-7' );
			} elseif ( is_plugin_active( 'pirate-forms/pirate-forms.php' ) ) {
				set_theme_mod( 'pixova_lite_contact_section_type', 'pirate-forms' );
			}

			update_post_meta( Pixova_Lite_Helper::get_setting_page_id(), 'pixova-settings', $content );
			Pixova_Lite_Helper::create_content_from_options();

			self::import_widgets( self::demo_data( 'widgets' ) );

			return true;
		}

		/**
		 * Put the demo widgets in their sidebars.
		 *
		 * @param array $config
		 *
		 * @return void
		 */
		private static function import_widgets( $config ) {
			if ( empty( $config ) ) {
				return;
			}

			$sidebars_widgets = get_option( 'sidebars_widgets', array() );
			$inactive         = isset( $sidebars_widgets['wp_inactive_widgets'] )
				? (array) $sidebars_widgets['wp_inactive_widgets']
				: array();

			foreach ( $config as $sidebar => $widgets ) {
				if ( ! is_array( $widgets ) ) {
					continue;
				}

				$order = array();

				foreach ( $widgets as $instance_id => $settings ) {
					if ( ! preg_match( '/^(.+)-(\d+)$/', $instance_id, $matches ) ) {
						continue;
					}

					list( , $base, $number ) = $matches;

					$option = get_option( 'widget_' . $base, array() );

					if ( ! is_array( $option ) ) {
						$option = array();
					}

					if ( ! isset( $option[ (int) $number ] ) ) {
						$option[ (int) $number ] = (array) $settings;
					}

					$option['_multiwidget'] = 1;
					update_option( 'widget_' . $base, $option );

					$order[] = $instance_id;
				}

				/*
				 * The demo decides what is in the sidebars it names. Appending
				 * instead used to stack the demo's widgets underneath whatever
				 * was there, and on a new site that is WordPress' own starter
				 * block widgets -- which meant a freshly imported demo showed
				 * Search, Recent Posts and Recent Comments twice in the blog
				 * sidebar and two headingless lists above the footer's About.
				 *
				 * Nothing is thrown away: what the demo displaces goes to
				 * Inactive Widgets, where Appearance > Widgets offers it back.
				 */
				$displaced = isset( $sidebars_widgets[ $sidebar ] ) ? (array) $sidebars_widgets[ $sidebar ] : array();
				$inactive  = array_merge( $inactive, array_diff( $displaced, $order ) );

				$sidebars_widgets[ $sidebar ] = $order;
			}

			$sidebars_widgets['wp_inactive_widgets'] = array_values( array_unique( $inactive ) );

			update_option( 'sidebars_widgets', $sidebars_widgets );
		}

		/**
		 * Run the demo import.
		 *
		 * @return void
		 */
		public function process_sample_content() {
			check_ajax_referer( 'pixova_lite_dismiss_required_action', 'nonce' );

			if ( ! current_user_can( 'edit_theme_options' ) ) {
				wp_send_json_error( '', 403 );
			}

			$requested = isset( $_POST['steps'] ) ? (array) wp_unslash( $_POST['steps'] ) : array();
			$requested = array_map( 'sanitize_key', $requested );
			$allowed   = array( 'set_frontpage_to_static', 'import_demo_content' );
			$steps     = array_intersect( $allowed, $requested );

			if ( empty( $steps ) ) {
				$steps = $allowed;
			}

			foreach ( $steps as $step ) {
				if ( ! call_user_func( array( __CLASS__, $step ) ) ) {
					wp_send_json_error( array( 'step' => $step ) );
				}
			}

			wp_send_json_success();
		}

		/**
		 * @return void
		 */
		public function render() {
			$tabs       = $this->get_tabs();
			$active_tab = $this->get_active_tab();
			$theme      = wp_get_theme();

			/* Used by the tab templates. */
			$actions = $this->actions;
			$plugins = $this->plugins;
			?>
			<div class="wrap about-wrap pixova-lite-welcome-wrap">

				<h1>
					<?php
					/* translators: %1$s theme name, %2$s version */
					printf( esc_html__( 'Welcome to %1$s - Version %2$s', 'pixova-lite' ), esc_html( $this->theme_name ), esc_html( $theme->get( 'Version' ) ) );
					?>
				</h1>

				<p class="about-text">
					<?php esc_html_e( 'Everything you need to set the theme up: the steps worth taking first, the plugins it works with, and where to get help.', 'pixova-lite' ); ?>
				</p>

				<div class="wp-badge pixova-lite-welcome-logo"></div>

				<h2 class="nav-tab-wrapper wp-clearfix">
					<?php foreach ( $tabs as $id => $label ) : ?>
						<a href="<?php echo esc_url( $this->generate_admin_url( $id ) ); ?>"
							class="nav-tab <?php echo $active_tab === $id ? 'nav-tab-active' : ''; ?>">
							<?php echo esc_html( $label ); ?>
							<?php
							if ( 'recommended_actions' === $id ) {
								$count = $this->count_actions();
								if ( $count ) {
									echo ' <span class="badge-action-count">' . absint( $count ) . '</span>';
								}
							}
							?>
						</a>
					<?php endforeach; ?>
				</h2>

				<?php
				$template = get_template_directory() . '/inc/libraries/welcome-screen/sections/' . str_replace( '_', '-', $active_tab ) . '.php';

				if ( is_readable( $template ) ) {
					require $template;
				}
				?>
			</div>
			<?php
		}
	}
}

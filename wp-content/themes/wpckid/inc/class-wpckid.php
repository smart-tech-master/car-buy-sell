<?php
/**
 * WPCkid Class
 *
 * @since    2.0.0
 * @package  wpckid
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPCkid' ) ) :

	/**
	 * The main WPCkid class
	 */
	class WPCkid {

		/**
		 * Setup class.
		 *
		 * @since 1.0
		 */
		public function __construct() {
			add_action( 'after_setup_theme', array( $this, 'setup' ) );
			add_action( 'widgets_init', array( $this, 'widgets_init' ) );
			add_action( 'wp_enqueue_scripts', array( $this, 'scripts' ), 10 );
			add_action( 'wp_enqueue_scripts', array( $this, 'child_scripts' ), 30 ); // After WooCommerce.
			add_action( 'enqueue_block_assets', array( $this, 'block_assets' ) );
			add_filter( 'body_class', array( $this, 'body_classes' ) );
			add_filter( 'wp_page_menu_args', array( $this, 'page_menu_args' ) );
			add_filter( 'navigation_markup_template', array( $this, 'navigation_markup_template' ) );
			add_action( 'enqueue_embed_scripts', array( $this, 'print_embed_styles' ) );
			add_action( 'wp_head', [ $this, 'pingback' ] );
		}

		/**
		 * Sets up theme defaults and registers support for various WordPress features.
		 *
		 * Note that this function is hooked into the after_setup_theme hook, which
		 * runs before the init hook. The init hook is too late for some features, such
		 * as indicating support for post thumbnails.
		 */
		public function setup() {
			/*
			 * Load Localisation files.
			 *
			 * Note: the first-loaded translation file overrides any following ones if the same translation is present.
			 */

			// Loads wp-content/languages/themes/wpckid-it_IT.mo.
			load_theme_textdomain( 'wpckid', trailingslashit( WP_LANG_DIR ) . 'themes' );

			// Loads wp-content/themes/child-theme-name/languages/it_IT.mo.
			load_theme_textdomain( 'wpckid', get_stylesheet_directory() . '/languages' );

			// Loads wp-content/themes/wpckid/languages/it_IT.mo.
			load_theme_textdomain( 'wpckid', get_template_directory() . '/languages' );

			/**
			 * Add default posts and comments RSS feed links to head.
			 */
			add_theme_support( 'automatic-feed-links' );

			/*
			 * Enable support for Post Thumbnails on posts and pages.
			 *
			 * @link https://developer.wordpress.org/reference/functions/add_theme_support/#Post_Thumbnails
			 */
			add_theme_support( 'post-thumbnails' );

			/**
			 * Enable support for site logo.
			 */
			add_theme_support(
				'custom-logo',
				apply_filters(
					'wpckid_custom_logo_args',
					array(
						'height'      => 110,
						'width'       => 470,
						'flex-width'  => true,
						'flex-height' => true,
					)
				)
			);

			/**
			 * Register menu locations.
			 */
			register_nav_menus(
				apply_filters(
					'wpckid_register_nav_menus',
					array(
						'primary'  => __( 'Primary Menu', 'wpckid' ),
						'handheld' => __( 'Handheld Menu', 'wpckid' ),
					)
				)
			);

			/*
			 * Switch default core markup for search form, comment form, comments, galleries, captions and widgets
			 * to output valid HTML5.
			 */
			add_theme_support(
				'html5',
				apply_filters(
					'wpckid_html5_args',
					array(
						'search-form',
						'comment-form',
						'comment-list',
						'gallery',
						'caption',
						'widgets',
						'style',
						'script',
					)
				)
			);

			/**
			 * Setup the WordPress core custom background feature.
			 */
			add_theme_support(
				'custom-background',
				apply_filters(
					'wpckid_custom_background_args',
					array(
						'default-color' => apply_filters( 'wpckid_default_background_color', '#ffffff' ),
						'default-image' => '',
					)
				)
			);

			/**
			 * Setup the WordPress core custom header feature.
			 */
			add_theme_support(
				'custom-header',
				apply_filters(
					'wpckid_custom_header_args',
					array(
						'default-image' => '',
						'header-text'   => false,
						'width'         => 1950,
						'height'        => 500,
						'flex-width'    => true,
						'flex-height'   => true,
					)
				)
			);

			/**
			 *  Add support for the Site Logo plugin and the site logo functionality in JetPack
			 *  https://github.com/automattic/site-logo
			 *  http://jetpack.me/
			 */
			add_theme_support(
				'site-logo',
				apply_filters(
					'wpckid_site_logo_args',
					array(
						'size' => 'full',
					)
				)
			);

			/**
			 * Declare support for title theme feature.
			 */
			add_theme_support( 'title-tag' );

			/**
			 * Declare support for selective refreshing of widgets.
			 */
			add_theme_support( 'customize-selective-refresh-widgets' );

			/**
			 * Add support for Block Styles.
			 */
			add_theme_support( 'wp-block-styles' );

			/**
			 * Add support for full and wide align images.
			 */
			add_theme_support( 'align-wide' );

			/**
			 * Add support for editor styles.
			 */
			add_theme_support( 'editor-styles' );

			/**
			 * Add support for editor font sizes.
			 */
			add_theme_support(
				'editor-font-sizes',
				array(
					array(
						'name' => __( 'Small', 'wpckid' ),
						'size' => 14,
						'slug' => 'small',
					),
					array(
						'name' => __( 'Normal', 'wpckid' ),
						'size' => 16,
						'slug' => 'normal',
					),
					array(
						'name' => __( 'Medium', 'wpckid' ),
						'size' => 23,
						'slug' => 'medium',
					),
					array(
						'name' => __( 'Large', 'wpckid' ),
						'size' => 26,
						'slug' => 'large',
					),
					array(
						'name' => __( 'Huge', 'wpckid' ),
						'size' => 37,
						'slug' => 'huge',
					),
				)
			);

			/**
			 * Enqueue editor styles.
			 */
			add_editor_style( array( 'assets/css/base/gutenberg-editor.css', $this->google_fonts() ) );

			/**
			 * Add support for responsive embedded content.
			 */
			add_theme_support( 'responsive-embeds' );
		}

		/**
		 * Register widget area.
		 *
		 * @link https://codex.wordpress.org/Function_Reference/register_sidebar
		 */
		public function widgets_init() {
			$sidebar_args['sidebar'] = array(
				'name'        => __( 'Sidebar', 'wpckid' ),
				'id'          => 'sidebar',
				'description' => '',
			);

			$sidebar_args['sidebar-shop'] = array(
				'name'        => __( 'Sidebar Shop', 'wpckid' ),
				'id'          => 'sidebar-shop',
				'description' => '',
			);

			$rows    = intval( apply_filters( 'wpckid_footer_widget_rows', 1 ) );
			$regions = intval( apply_filters( 'wpckid_footer_widget_columns', 4 ) );

			for ( $row = 1; $row <= $rows; $row ++ ) {
				for ( $region = 1; $region <= $regions; $region ++ ) {
					$footer_n = $region + $regions * ( $row - 1 ); // Defines footer sidebar ID.
					$footer   = sprintf( 'footer_%d', $footer_n );

					if ( 1 === $rows ) {
						/* translators: 1: column number */
						$footer_region_name = sprintf( __( 'Footer Column %1$d', 'wpckid' ), $region );

						/* translators: 1: column number */
						$footer_region_description = sprintf( __( 'Widgets added here will appear in column %1$d of the footer.', 'wpckid' ), $region );
					} else {
						/* translators: 1: row number, 2: column number */
						$footer_region_name = sprintf( __( 'Footer Row %1$d - Column %2$d', 'wpckid' ), $row, $region );

						/* translators: 1: column number, 2: row number */
						$footer_region_description = sprintf( __( 'Widgets added here will appear in column %1$d of footer row %2$d.', 'wpckid' ), $region, $row );
					}

					$sidebar_args[ $footer ] = array(
						'name'        => $footer_region_name,
						'id'          => sprintf( 'footer-%d', $footer_n ),
						'description' => $footer_region_description,
					);
				}
			}

			$sidebar_args = apply_filters( 'wpckid_sidebar_args', $sidebar_args );

			foreach ( $sidebar_args as $sidebar => $args ) {
				$widget_tags = array(
					'before_widget' => '<div id="%1$s" class="widget %2$s">',
					'after_widget'  => '</div>',
					'before_title'  => '<span class="gamma widget-title">',
					'after_title'   => '</span>',
				);

				/**
				 * Dynamically generated filter hooks. Allow changing widget wrapper and title tags. See the list below.
				 *
				 * 'wpckid_header_widget_tags'
				 * 'wpckid_sidebar_widget_tags'
				 *
				 * 'wpckid_footer_1_widget_tags'
				 * 'wpckid_footer_2_widget_tags'
				 * 'wpckid_footer_3_widget_tags'
				 * 'wpckid_footer_4_widget_tags'
				 */
				$widget_tags = apply_filters( sprintf( 'wpckid_%s_widget_tags', $sidebar ), $widget_tags );

				if ( is_array( $widget_tags ) ) {
					register_sidebar( $args + $widget_tags );
				}
			}
		}

		/**
		 * Enqueue scripts and styles.
		 *
		 * @since  1.0.0
		 */
		public function scripts() {
			global $wpckid_version;

			/**
			 * Styles
			 */
			wp_enqueue_style( 'wpckid-style', get_template_directory_uri() . '/style.css', '', $wpckid_version );
			wp_style_add_data( 'wpckid-style', 'rtl', 'replace' );

			wp_enqueue_style( 'wpckid-icons', get_template_directory_uri() . '/assets/css/base/icons.css', '', $wpckid_version );
			wp_style_add_data( 'wpckid-icons', 'rtl', 'replace' );

			/**
			 * Fonts
			 */
			wp_enqueue_style( 'wpckid-fonts', $this->google_fonts(), array(), $wpckid_version );

			/**
			 * Scripts
			 */
			$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

			wp_enqueue_script( 'wpckid-navigation', get_template_directory_uri() . '/assets/js/navigation' . $suffix . '.js', array(), $wpckid_version, true );
			wp_enqueue_script( 'wpckid-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix' . $suffix . '.js', array(), '20130115', true );

			if ( has_nav_menu( 'handheld' ) ) {
				$wpckid_l10n = array(
					'expand'   => __( 'Expand child menu', 'wpckid' ),
					'collapse' => __( 'Collapse child menu', 'wpckid' ),
				);

				wp_localize_script( 'wpckid-navigation', 'wpckidScreenReaderText', $wpckid_l10n );
			}

			if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
				wp_enqueue_script( 'comment-reply' );
			}
		}

		/**
		 * Register Google fonts.
		 *
		 * @return string Google fonts URL for the theme.
		 * @since 2.4.0
		 */
		public function google_fonts() {
			$google_fonts = apply_filters(
				'wpckid_google_font_families',
				array(
					'poppins' => 'Poppins:500,700',
					'fredoka' => 'Fredoka:600',
				)
			);

			$query_args = array(
				'family' => implode( '|', $google_fonts ),
				'subset' => rawurlencode( 'latin,latin-ext' ),
			);

			$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );

			return $fonts_url;
		}

		/**
		 * Enqueue block assets.
		 *
		 * @since 2.5.0
		 */
		public function block_assets() {
			global $wpckid_version;

			// Styles.
			wp_enqueue_style( 'wpckid-gutenberg-blocks', get_template_directory_uri() . '/assets/css/base/gutenberg-blocks.css', '', $wpckid_version );
			wp_style_add_data( 'wpckid-gutenberg-blocks', 'rtl', 'replace' );
		}

		/**
		 * Enqueue child theme stylesheet.
		 * A separate function is required as the child theme css needs to be enqueued _after_ the parent theme
		 * primary css and the separate WooCommerce css.
		 *
		 * @since  1.5.3
		 */
		public function child_scripts() {
			if ( is_child_theme() ) {
				$child_theme = wp_get_theme( get_stylesheet() );
				wp_enqueue_style( 'wpckid-child-style', get_stylesheet_uri(), array(), $child_theme->get( 'Version' ) );
			}
		}

		/**
		 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
		 *
		 * @param array $args Configuration arguments.
		 *
		 * @return array
		 */
		public function page_menu_args( $args ) {
			$args['show_home'] = true;

			return $args;
		}

		/**
		 * Adds custom classes to the array of body classes.
		 *
		 * @param array $classes Classes for the body element.
		 *
		 * @return array
		 */
		public function body_classes( $classes ) {
			// Adds a class to blogs with more than 1 published author.
			if ( is_multi_author() ) {
				$classes[] = 'group-blog';
			}

			/**
			 * Adds a class when WooCommerce is not active.
			 *
			 * @todo Refactor child themes to remove dependency on this class.
			 */
			$classes[] = 'no-wc-breadcrumb';

			/**
			 * What is this?!
			 * Take the blue pill, close this file and forget you saw the following code.
			 * Or take the red pill, filter wpckid_make_me_cute and see how deep the rabbit hole goes...
			 */
			$cute = apply_filters( 'wpckid_make_me_cute', false );

			if ( true === $cute ) {
				$classes[] = 'wpckid-cute';
			}

			// If our main sidebar doesn't contain widgets, adjust the layout to be full-width.
			if ( ! wpckid_is_active_sidebar() ) {
				$classes[] = 'wpckid-full-width-content';
			}

			// Add class if align-wide is supported.
			if ( current_theme_supports( 'align-wide' ) ) {
				$classes[] = 'wpckid-align-wide';
			}

			return $classes;
		}

		/**
		 * Custom navigation markup template hooked into `navigation_markup_template` filter hook.
		 */
		public function navigation_markup_template() {
			$template = '<nav id="post-navigation" class="navigation %1$s" role="navigation" aria-label="' . esc_html__( 'Post Navigation', 'wpckid' ) . '">';
			$template .= '<h2 class="screen-reader-text">%2$s</h2>';
			$template .= '<div class="nav-links">%3$s</div>';
			$template .= '</nav>';

			return apply_filters( 'wpckid_navigation_markup_template', $template );
		}

		/**
		 * Add Pingback
		 */
		public function pingback() {
			if ( is_singular() && pings_open() ) {
				echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
			}
		}

		/**
		 * Add styles for embeds
		 */
		public function print_embed_styles() {
			global $wpckid_version;

			wp_enqueue_style( 'source-sans-pro', '//fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,300italic,400italic,700,900', array(), $wpckid_version );
			$accent_color     = get_theme_mod( 'wpckid_accent_color' );
			$background_color = wpckid_get_content_background_color();
			?>
          <style type="text/css">
              .wp-embed {
                  padding: 2.618em !important;
                  border: 0 !important;
                  border-radius: 3px !important;
                  font-family: "Source Sans Pro", "Open Sans", sans-serif !important;
                  background-color: <?php echo esc_html( wpckid_adjust_color_brightness( $background_color, -7 ) ); ?> !important;
              }

              .wp-embed .wp-embed-featured-image {
                  margin-bottom: 2.618em;
              }

              .wp-embed .wp-embed-featured-image img,
              .wp-embed .wp-embed-featured-image.square {
                  min-width: 100%;
                  margin-bottom: .618em;
              }

              a.wc-embed-button {
                  padding: .857em 1.387em !important;
                  font-weight: 600;
                  background-color: <?php echo esc_attr( $accent_color ); ?>;
                  color: #fff !important;
                  border: 0 !important;
                  line-height: 1;
                  border-radius: 0 !important;
                  box-shadow: inset 0 -1px 0 rgba(#000, .3);
              }

              a.wc-embed-button + a.wc-embed-button {
                  background-color: #60646c;
              }
          </style>
			<?php
		}
	}
endif;

return new WPCkid();

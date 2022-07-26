<?php 
/**
 * Feminine Business functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Feminine_Business
 */

/**
 * Show/Hide Admin Bar in frontend.
*/

$feminine_business_theme_data = wp_get_theme();
if( ! defined( 'FEMININE_BUSINESS_VERSION' ) ) define( 'FEMININE_BUSINESS_VERSION', $feminine_business_theme_data->get( 'Version' ) );
if( ! defined( 'FEMININE_BUSINESS_NAME' ) ) define( 'FEMININE_BUSINESS_NAME', $feminine_business_theme_data->get( 'Name' ) );

if ( ! function_exists( 'feminine_business_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function feminine_business_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on feminine business, use a find and replace
		 * to change 'feminine-business' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'feminine-business', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'primary-menu' => esc_html__( 'Primary', 'feminine-business' ),
				'footer-menu' => esc_html__( 'Footer Menu', 'feminine-business' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'feminine_business_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 55,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		add_image_size( 'feminine-business-homepage-slider', 720, 480, true );
		add_image_size( 'feminine-business-popular-posts', 456, 305, true );
		add_image_size( 'feminine-business-contact-page', 714, 481, true );		
		add_image_size( 'feminine-business-products-home', 312, 290, true );
		add_image_size( 'feminine-business-related', 150, 100, true );

	}
endif;
add_action( 'after_setup_theme', 'feminine_business_setup' );

if( ! function_exists( 'feminine_business_content_width' ) ) :
	/**
	 * Set the content width in pixels, based on the theme's design and stylesheet.
	 *
	 * Priority 0 to make it available to lower priority callbacks.
	 *
	 * @global int $content_width
	 */
	function feminine_business_content_width() {
		$GLOBALS['content_width'] = apply_filters( 'feminine_business_content_width', 960 );
	}
endif;
add_action( 'after_setup_theme', 'feminine_business_content_width', 0 );
	
if( ! function_exists( 'feminine_business_template_redirect_content_width' ) ) :
/**
* Adjust content_width value according to template.
*
* @return void
*/
function feminine_business_template_redirect_content_width(){
	$sidebar = feminine_business_sidebar_layout();
	if( $sidebar !== 'full-width' ){	   	
		$GLOBALS['content_width'] = 960;       
	}else{
		$GLOBALS['content_width'] = 1440;
	}	
}
endif;
add_action( 'template_redirect', 'feminine_business_template_redirect_content_width' );

if( ! function_exists( 'feminine_business_scripts' ) ) :
	/**
	 * Enqueue scripts and styles.
	 */
	function feminine_business_scripts() {

		// Use minified libraries if SCRIPT_DEBUG is false
		$build          = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '/build' : '';
		$suffix         = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';
		
		wp_enqueue_style( 'feminine-business-google-fonts', feminine_business_google_fonts_url(), array(), null );

		if ( is_front_page() ){
			wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/js' . $build . '/owl.carousel' . $suffix . '.js', array( 'jquery' ), '2.3.4', true );
			wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/css' . $build . '/owl.carousel' . $suffix . '.css', array(), '2.3.4' );			
		}

		wp_style_add_data( 'feminine-business-style', 'rtl', 'replace' );
		wp_enqueue_style( 'feminine-business-style', get_stylesheet_uri(), array(), FEMININE_BUSINESS_VERSION );

		wp_enqueue_script( 'feminine-business-navigation', get_template_directory_uri() . '/inc/assets/js/navigation.js', array(), FEMININE_BUSINESS_VERSION, true );

		wp_enqueue_script( 'feminine-business-accessibility', get_template_directory_uri() . '/js' . $build . '/modal-accessibility' . $suffix . '.js', array(), FEMININE_BUSINESS_VERSION, true );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
		
		wp_enqueue_script( 'feminine-business-custom', get_template_directory_uri() . '/js' . $build . '/custom' . $suffix . '.js', array( 'jquery' ), FEMININE_BUSINESS_VERSION, true );
			
		wp_localize_script( 
			'feminine-business-custom', 
			'fbp_data',
			array(
				'url'            => admin_url( 'admin-ajax.php' ),
				'plugin_url'     => plugins_url(),
				'rtl'            => is_rtl(),
				'auto'           => (bool) get_theme_mod( 'slider_auto', true ),
				'loop'           => (bool) get_theme_mod( 'slider_loop', false )
			)
		);
	}
endif;
add_action( 'wp_enqueue_scripts', 'feminine_business_scripts' );

if( ! function_exists( 'feminine_business_body_classes' ) ) :
	/**
	 * Adds custom classes to the array of body classes.
	 *
	 * @param array $classes Classes for the body element.
	 * @return array
	 */
	function feminine_business_body_classes( $classes ) {
		$banner         = get_theme_mod( 'ed_banner_section', 'slider_banner' );
		// Adds a class of hfeed to non-singular pages.
		if ( ! is_singular() ) {
			$classes[] = 'hfeed';
		}

		if ( is_front_page() && $banner == 'static_banner' ){
			$classes[] = 'has-overlay';
		}

		if( get_background_image() ) {
			$classes[] = 'custom-background-image';
		}
		
		// Adds a class of custom-background-color to sites with a custom background color.
		if( get_background_color() != 'ffffff' ) {
			$classes[] = 'custom-background-color';
		}

		$classes[] = feminine_business_sidebar_layout();

		return $classes;
	}
endif;
add_filter( 'body_class', 'feminine_business_body_classes' );

if( ! function_exists( 'feminine_business_pingback_header' ) ) :
	/**
	 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
	 */
	function feminine_business_pingback_header() {
		if ( is_singular() && pings_open() ) {
			printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
		}
	}
endif;
add_action( 'wp_head', 'feminine_business_pingback_header' );

if ( ! function_exists( 'feminine_business_load_media' ) ) :
	/**
	 * Enqueue admin css
	*/
	function feminine_business_load_media() {

		wp_enqueue_style( 'feminine-business-admin-style', get_template_directory_uri() . '/inc/assets/css/admin.css', array(),
		FEMININE_BUSINESS_VERSION );
	}
endif;
add_action( 'admin_enqueue_scripts', 'feminine_business_load_media' );
<?php
/**
 * Seva Lite Custom functions and definitions
 *
 * @package Seva_Lite
 */

if ( ! function_exists( 'seva_lite_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function seva_lite_setup() {

    // Use minified libraries if SCRIPT_DEBUG is false
    $build  = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '/build' : '';
    $suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Seva, use a find and replace
	 * to change 'seva-lite' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'seva-lite', get_template_directory() . '/languages' );

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
	register_nav_menus( array(
		'primary'   => esc_html__( 'Primary', 'seva-lite' ),
        'secondary' => esc_html__( 'Secondary', 'seva-lite' ),
        'footer'    => esc_html__( 'Footer', 'seva-lite' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-list',
		'gallery',
		'caption',
	) );
    
    // Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'seva_lite_custom_background_args', array(
		'default-color' => 'fbf3f0',
		'default-image' => '',
	) ) );
    
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
            'header-text' => array( 'site-title', 'site-description' ) 
        )
    );
    
    /**
     * Add support for custom header.
    */
    add_theme_support( 
        'custom-header', 
        apply_filters( 
            'seva_lite_custom_header_args', 
            array(
        		'default-image' => esc_url( get_template_directory_uri() . '/images/banner-image.jpg' ),
                'video'         => true,
        		'width'         => 695, /** change width as per theme requirement */
        		'height'        => 463, /** change height as per theme requirement */
        		'header-text'   => false,
                'flex-height'   => true,
                'flex-width'    => true,
            ) 
        ) 
    );
 
    /**
     * Add Custom Images sizes.
    */    
    add_image_size( 'seva-lite-portfolio-related', 390, 293, true );
    add_image_size( 'seva-lite-blog-section', 360, 378, true );
    add_image_size( 'seva-lite-related', 367, 275, true );
    add_image_size( 'seva-lite-blog', 756, 567, true );
    add_image_size( 'seva-lite-blog-full', 1220, 650, true );
    add_image_size( 'seva-lite-single', 756, 568, true );
    add_image_size( 'seva-lite-slider', 570, 570, true );
    
    /** Starter Content */
    $starter_content = array(
        // Specify the core-defined pages to create and add custom thumbnails to some of them.
		'posts' => array( 
            'home', 
            'blog',
        ),
		
        // Default to a static front page and assign the front and posts pages.
		'options' => array(
			'show_on_front' => 'page',
			'page_on_front' => '{{home}}',
			'page_for_posts' => '{{blog}}',
		),
        
        // Set up nav menus for each of the two areas registered in the theme.
		'nav_menus' => array(
			// Assign a menu to the "top" location.
			'primary' => array(
				'name' => __( 'Primary', 'seva-lite' ),
				'items' => array(
					'page_home',
					'page_blog',
				)
			)
		),
    );
    
    $starter_content = apply_filters( 'seva_lite_starter_content', $starter_content );

	add_theme_support( 'starter-content', $starter_content );
    
    // Add theme support for Responsive Videos.
    add_theme_support( 'jetpack-responsive-videos' );

    // Add excerpt support for pages
    add_post_type_support( 'page', 'excerpt' );

    // Add support for full and wide align images.
    add_theme_support( 'align-wide' );

    // Add support for editor styles.
    add_theme_support( 'editor-styles' );

    /*
     * This theme styles the visual editor to resemble the theme style,
     * specifically font, colors, and column width.
     *
     */
    add_editor_style( array(
            'css' . $build . '/editor-style' . $suffix . '.css',
            seva_lite_fonts_url()
        )
    );

    // Add support for block editor styles.
    add_theme_support( 'wp-block-styles' );

    // Remove widget block.
    remove_theme_support( 'widgets-block-editor' );
}
endif;
add_action( 'after_setup_theme', 'seva_lite_setup' );

if( ! function_exists( 'seva_lite_content_width' ) ) :
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function seva_lite_content_width() {
	
    $GLOBALS['content_width'] = apply_filters( 'seva_lite_content_width', 756 );
}
endif;
add_action( 'after_setup_theme', 'seva_lite_content_width', 0 );

if( ! function_exists( 'seva_lite_template_redirect_content_width' ) ) :
/**
* Adjust content_width value according to template.
*
* @return void
*/
function seva_lite_template_redirect_content_width(){
	$sidebar = seva_lite_sidebar();
    if( $sidebar ){	   
        
        $GLOBALS['content_width'] = 756;       
	}else{
        
        if( is_singular() ){
            if( seva_lite_sidebar( true ) === 'full-width centered' ){
                $GLOBALS['content_width'] = 756;
            }else{
                $GLOBALS['content_width'] = 1250;                
            }                
        }else{
            $GLOBALS['content_width'] = 1250;
        }
	}
}
endif;
add_action( 'template_redirect', 'seva_lite_template_redirect_content_width' );

if( ! function_exists( 'seva_lite_scripts' ) ) :
/**
 * Enqueue scripts and styles.
 */
function seva_lite_scripts() {
	// Use minified libraries if SCRIPT_DEBUG is false
    $build  = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '/build' : '';
    $suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

    if ( get_theme_mod( 'ed_localgoogle_fonts', false ) && ! is_customize_preview() && ! is_admin() && get_theme_mod( 'ed_preload_local_fonts', false ) ) {
        seva_lite_preload_local_fonts( seva_lite_fonts_url() );
    }

    wp_enqueue_style( 'seva-lite-google-fonts', seva_lite_fonts_url(), array(), null );

    wp_enqueue_style( 'owl-carousel', get_template_directory_uri(). '/css' . $build . '/owl.carousel' . $suffix . '.css', array(), '2.3.4' );
    wp_enqueue_style( 'animate', get_template_directory_uri(). '/css' . $build . '/animate' . $suffix . '.css', array(), '3.5.2' );
    wp_enqueue_style( 'seva-lite', get_stylesheet_uri(), array(), SEVA_LITE_THEME_VERSION );

    wp_enqueue_style( 'seva-lite-elementor', get_template_directory_uri(). '/css' . $build . '/elementor' . $suffix . '.css', array(), SEVA_LITE_THEME_VERSION );
    wp_enqueue_style( 'seva-lite-gutenberg', get_template_directory_uri(). '/css' . $build . '/gutenberg' . $suffix . '.css', array(), SEVA_LITE_THEME_VERSION );

    //Aos Toggle
    if( get_theme_mod( 'ed_wow_toggle', true ) ){
        wp_enqueue_script( 'seva-lite-wow', get_template_directory_uri() . '/js' . $build . '/wow' . $suffix . '.js', array( 'jquery' ), SEVA_LITE_THEME_VERSION, true );
    }
    
    wp_enqueue_script( 'all', get_template_directory_uri() . '/js' . $build . '/all' . $suffix . '.js', array( 'jquery' ), '6.1.1', true );
    wp_enqueue_script( 'v4-shims', get_template_directory_uri() . '/js' . $build . '/v4-shims' . $suffix . '.js', array( 'jquery', 'all' ), '6.1.1', true );
    wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/js' . $build . '/owl.carousel' . $suffix . '.js', array( 'jquery' ), '2.3.4', true );
    wp_enqueue_script( 'owl-carousel2-thumbs', get_template_directory_uri() . '/js' . $build . '/owl.carousel2.thumbs' . $suffix . '.js', array( 'jquery', 'owl-carousel' ), '2.0.0', true );
	wp_enqueue_script( 'seva-lite', get_template_directory_uri() . '/js' . $build . '/custom' . $suffix . '.js', array( 'jquery' ), SEVA_LITE_THEME_VERSION, true );
    wp_enqueue_script( 'seva-lite-modal-accessibility', get_template_directory_uri() . '/js' . $build . '/modal-accessibility' . $suffix . '.js', array( 'jquery' ), SEVA_LITE_THEME_VERSION, true );
    
    $array = array( 
        'rtl'                  => is_rtl(),
        'auto'                 => (bool) get_theme_mod( 'slider_auto', true ),
        'loop'                 => (bool) get_theme_mod( 'slider_loop', true ),
        'animation'            => esc_attr( get_theme_mod( 'slider_animation' ) ),
        'speed'                => absint( get_theme_mod( 'slider_speed', 5000 ) ),
        'ed_service_count'     => (bool) get_theme_mod( 'ed_service_count', true ),
        'ed_testimonial_count' => (bool) get_theme_mod( 'ed_testimonial_count', true ),
        't_auto'               => (bool) get_theme_mod( 'testimonial_auto', true ),
        't_loop'               => (bool) get_theme_mod( 'testimonial_loop', true ),
        't_speed'              => absint( get_theme_mod( 'testimonial_speed', 10000 ) ),
        'ed_wow'               => (bool) get_theme_mod( 'ed_wow_toggle', true ),
        'ajax_url'             => admin_url( 'admin-ajax.php' ),
    );
    
    wp_localize_script( 'seva-lite', 'seva_lite_data', $array );
    
    if ( seva_lite_is_jetpack_activated( true ) ) {
        wp_enqueue_style( 'tiled-gallery', plugins_url() . '/jetpack/modules/tiled-gallery/tiled-gallery/tiled-gallery.css' );            
    }
    
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
endif;
add_action( 'wp_enqueue_scripts', 'seva_lite_scripts' );

if( ! function_exists( 'seva_lite_admin_scripts' ) ) :
/**
 * Enqueue admin scripts and styles.
*/
function seva_lite_admin_scripts( $hook ){    
    wp_enqueue_style( 'seva-lite-admin', get_template_directory_uri() . '/inc/css/admin.css', '', SEVA_LITE_THEME_VERSION );
}
endif; 
add_action( 'admin_enqueue_scripts', 'seva_lite_admin_scripts' );

if( ! function_exists( 'seva_lite_block_editor_styles' ) ) :
/**
 * Enqueue editor styles for Gutenberg
 */
function seva_lite_block_editor_styles() {
    // Use minified libraries if SCRIPT_DEBUG is false
    $build  = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '/build' : '';
    $suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';
    
    // Block styles.
    wp_enqueue_style( 'seva-lite-block-editor-style', get_template_directory_uri() . '/css' . $build . '/editor-block' . $suffix . '.css' );

    wp_add_inline_style( 'seva-lite-block-editor-style', seva_lite_gutenberg_inline_style() );

    // Add custom fonts.
    wp_enqueue_style( 'seva-lite-google-fonts', seva_lite_fonts_url(), array(), null );
}
endif;
add_action( 'enqueue_block_editor_assets', 'seva_lite_block_editor_styles' );

if( ! function_exists( 'seva_lite_body_classes' ) ) :
/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function seva_lite_body_classes( $classes ) {
    $ed_banner   = get_theme_mod( 'ed_banner_section', 'static_banner' );
    $editor_options       = get_option( 'classic-editor-replace' );
    $allow_users_options  = get_option( 'classic-editor-allow-users' );
    
    // Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}
    
    // Adds a class of custom-background-image to sites with a custom background image.
    if ( get_background_image() ) {
        $classes[] = 'custom-background-image';
    }
    
    // Adds a class of custom-background-color to sites with a custom background color.
    if ( get_background_color() != 'fbf3f0' ) {
        $classes[] = 'custom-background-color';
    } 
    
    if( !seva_lite_is_classic_editor_activated() || ( seva_lite_is_classic_editor_activated() && $editor_options == 'block' ) || ( seva_lite_is_classic_editor_activated() && $allow_users_options == 'allow' && has_blocks() ) ) {
        $classes[] = 'seva-lite-has-blocks';
    }

    $classes[] = seva_lite_sidebar( true );

    if( is_home()  || is_archive() || is_search() ){
        $classes[] = 'classic-layout';
    }

    if( is_front_page() && $ed_banner == 'static_banner' ){
        $classes[] = 'banner-six';
    }

    if( is_singular( 'post' ) ){
        $classes[] = 'style-one';
    }
    
	return $classes;
}
endif;
add_filter( 'body_class', 'seva_lite_body_classes' );

if( ! function_exists( 'seva_lite_post_classes' ) ) :
/**
 * Add custom classes to the array of post classes.
*/
function seva_lite_post_classes( $classes ){

    if ( is_home() ){
        $classes[] = 'wow fadeIn';
    }
    
    return $classes;
}
endif;
add_filter( 'post_class', 'seva_lite_post_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function seva_lite_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'seva_lite_pingback_header' );

if( ! function_exists( 'seva_lite_change_comment_form_default_fields' ) ) :
/**
 * Change Comment form default fields i.e. author, email & url.
 * https://blog.josemcastaneda.com/2016/08/08/copy-paste-hurting-theme/
*/
function seva_lite_change_comment_form_default_fields( $fields ){    
    // get the current commenter if available
    $commenter = wp_get_current_commenter();
 
    // core functionality
    $req = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : '' );    
 
    // Change just the author field
    $fields['author'] = '<p class="comment-form-author"><label for="author">' . esc_html__( 'Name', 'seva-lite' ) . '<span class="required">*</span></label><input id="author" name="author" placeholder="' . esc_attr__( 'Name*', 'seva-lite' ) . '" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>';
    
    $fields['email'] = '<p class="comment-form-email"><label for="email">' . esc_html__( 'Email', 'seva-lite' ) . '<span class="required">*</span></label><input id="email" name="email" placeholder="' . esc_attr__( 'Email*', 'seva-lite' ) . '" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>';
    
    $fields['url'] = '<p class="comment-form-url"><label for="url">' . esc_html__( 'Website', 'seva-lite' ) . '</label><input id="url" name="url" placeholder="' . esc_attr__( 'Website', 'seva-lite' ) . '" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>'; 
    
    return $fields;    
}
endif;
add_filter( 'comment_form_default_fields', 'seva_lite_change_comment_form_default_fields' );

if( ! function_exists( 'seva_lite_change_comment_form_defaults' ) ) :
/**
 * Change Comment Form defaults
 * https://blog.josemcastaneda.com/2016/08/08/copy-paste-hurting-theme/
*/
function seva_lite_change_comment_form_defaults( $defaults ){    
    $defaults['comment_field'] = '<p class="comment-form-comment"><label for="comment">' . esc_html__( 'Comment', 'seva-lite' ) . '</label><textarea id="comment" name="comment" placeholder="' . esc_attr__( 'Comment', 'seva-lite' ) . '" cols="45" rows="8" aria-required="true"></textarea></p>';
    
    return $defaults;    
}
endif;
add_filter( 'comment_form_defaults', 'seva_lite_change_comment_form_defaults' );

if ( ! function_exists( 'seva_lite_excerpt_more' ) ) :
/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... * 
 */
function seva_lite_excerpt_more( $more ) {
	return is_admin() ? $more : ' &hellip; ';
}

endif;
add_filter( 'excerpt_more', 'seva_lite_excerpt_more' );

if ( ! function_exists( 'seva_lite_excerpt_length' ) ) :
/**
 * Changes the default 55 character in excerpt 
*/
function seva_lite_excerpt_length( $length ) {
	$excerpt_length = get_theme_mod( 'excerpt_length', 30 );
    return is_admin() ? $length : absint( $excerpt_length );    
}
endif;
add_filter( 'excerpt_length', 'seva_lite_excerpt_length', 999 );

if( ! function_exists( 'seva_lite_get_the_archive_title' ) ) :
/**
 * Filter Archive Title
*/
function seva_lite_get_the_archive_title( $title ){
    
    $ed_prefix = get_theme_mod( 'ed_prefix_archive', true );
    
    if( is_post_type_archive( 'product' ) ){
        $title = '<h1 class="page-title">' . get_the_title( get_option( 'woocommerce_shop_page_id' ) ) . '</h1>';
    }else{
        if( is_category() ){
            if( $ed_prefix ) {
                $title = '<h1 class="page-title">' . esc_html( single_cat_title( '', false ) ) . '</h1>';
            }else{
                $title = '<span class="section-subtitle">'. esc_html__( 'BROWSE CATEGORY FOR', 'seva-lite' ) . '</span><h1 class="page-title">' . esc_html( single_cat_title( '', false ) ) . '</h1>';
            }
        }
        elseif( is_tag() ){
            if( $ed_prefix ) {
                $title = '<h1 class="page-title">' . esc_html( single_tag_title( '', false ) ) . '</h1>';
            }else{
                $title = '<span class="section-subtitle">'. esc_html__( 'BROWSE TAG FOR', 'seva-lite' ) . '</span><h1 class="page-title">' . esc_html( single_tag_title( '', false ) ) . '</h1>';
            }
        }elseif( is_year() ){
            if( $ed_prefix ){
                $title = '<h1 class="page-title">' . get_the_date( _x( 'Y', 'yearly archives date format', 'seva-lite' ) ) . '</h1>';                   
            }else{
                $title = '<span class="section-subtitle">'. esc_html__( 'Year', 'seva-lite' ) . '</span><h1 class="page-title">' . get_the_date( _x( 'Y', 'yearly archives date format', 'seva-lite' ) ) . '</h1>';
            }
        }elseif( is_month() ){
            if( $ed_prefix ){
                $title = '<h1 class="page-title">' . get_the_date( _x( 'F Y', 'monthly archives date format', 'seva-lite' ) ) . '</h1>';                                   
            }else{
                $title = '<span class="section-subtitle">'. esc_html__( 'Month', 'seva-lite' ) . '</span><h1 class="page-title">' . get_the_date( _x( 'F Y', 'monthly archives date format', 'seva-lite' ) ) . '</h1>';
            }
        }elseif( is_day() ){
            if( $ed_prefix ){
                $title = '<h1 class="page-title">' . get_the_date( _x( 'F j, Y', 'daily archives date format', 'seva-lite' ) ) . '</h1>';                                   
            }else{
                $title = '<span class="section-subtitle">'. esc_html__( 'Day', 'seva-lite' ) . '</span><h1 class="page-title">' . get_the_date( _x( 'F j, Y', 'daily archives date format', 'seva-lite' ) ) .  '</h1>';
            }
        }elseif( is_post_type_archive() ) {
            if( $ed_prefix ){
                $title = '<h1 class="page-title">'  . post_type_archive_title( '', false ) . '</h1>';                            
            }else{
                $title = '<span class="section-subtitle">'. esc_html__( 'Archives', 'seva-lite' ) . '</span><h1 class="page-title">'  . post_type_archive_title( '', false ) . '</h1>';
            }
        }elseif( is_tax() ) {
            $tax = get_taxonomy( get_queried_object()->taxonomy );
            if( $ed_prefix ){
                $title = '<h1 class="page-title">' . single_term_title( '', false ) . '</h1>';                                   
            }else{
                $title = '<span class="section-subtitle">' . $tax->labels->singular_name . '</span><h1 class="page-title">' . single_term_title( '', false ) . '</h1>';
            }
        }
    }  
    
    return $title;
}
endif;
add_filter( 'get_the_archive_title', 'seva_lite_get_the_archive_title' );

if( ! function_exists( 'seva_lite_remove_archive_description' ) ) :
/**
 * filter the_archive_description & get_the_archive_description to show post type archive
 * @param  string $description original description
 * @return string post type description if on post type archive
 */
function seva_lite_remove_archive_description( $description ){
    $ed_shop_archive_description = get_theme_mod( 'ed_shop_archive_description', false );
    if( is_post_type_archive( 'product' ) ) {
        if( ! $ed_shop_archive_description ){
            $description = '';
        }
    }
    return wpautop( wp_kses_post( $description ) );
}
endif;
add_filter( 'get_the_archive_description', 'seva_lite_remove_archive_description' );

if( ! function_exists( 'seva_lite_get_comment_author_link' ) ) :
/**
 * Filter to modify comment author link
 * @link https://developer.wordpress.org/reference/functions/get_comment_author_link/
 */
function seva_lite_get_comment_author_link( $return, $author, $comment_ID ){
    $comment = get_comment( $comment_ID );
    $url     = get_comment_author_url( $comment );
    $author  = get_comment_author( $comment );
 
    if ( empty( $url ) || 'http://' == $url )
        $return = '<span itemprop="name">'. esc_html( $author ) .'</span>';
    else
        $return = '<span itemprop="name"><a href=' . esc_url( $url ) . ' rel="external nofollow noopener" class="url" itemprop="url">' . esc_html( $author ) . '</a></span>';

    return $return;
}
endif;
add_filter( 'get_comment_author_link', 'seva_lite_get_comment_author_link', 10, 3 );

if( ! function_exists( 'seva_lite_filter_post_gallery' ) ) :
/**
 * Filter the output of the gallery. 
*/ 
function seva_lite_filter_post_gallery( $output, $attr, $instance ){
    global $post, $wp_locale;

    $html5 = current_theme_supports( 'html5', 'gallery' );
    $atts = shortcode_atts( array(
    	'order'      => 'ASC',
    	'orderby'    => 'menu_order ID',
    	'id'         => $post ? $post->ID : 0,
    	'itemtag'    => $html5 ? 'figure'     : 'dl',
    	'icontag'    => $html5 ? 'div'        : 'dt',
    	'captiontag' => $html5 ? 'figcaption' : 'dd',
    	'columns'    => 3,
    	'size'       => 'thumbnail',
    	'include'    => '',
    	'exclude'    => '',
    	'link'       => ''
    ), $attr, 'gallery' );
    
    $id = intval( $atts['id'] );
    
    if ( ! empty( $atts['include'] ) ) {
    	$_attachments = get_posts( array( 'include' => $atts['include'], 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $atts['order'], 'orderby' => $atts['orderby'] ) );
    
    	$attachments = array();
    	foreach ( $_attachments as $key => $val ) {
    		$attachments[$val->ID] = $_attachments[$key];
    	}
    } elseif ( ! empty( $atts['exclude'] ) ) {
    	$attachments = get_children( array( 'post_parent' => $id, 'exclude' => $atts['exclude'], 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $atts['order'], 'orderby' => $atts['orderby'] ) );
    } else {
    	$attachments = get_children( array( 'post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $atts['order'], 'orderby' => $atts['orderby'] ) );
    }
    
    if ( empty( $attachments ) ) {
    	return '';
    }
    
    if ( is_feed() ) {
    	$output = "\n";
    	foreach ( $attachments as $att_id => $attachment ) {
    		$output .= wp_get_attachment_link( $att_id, $atts['size'], true ) . "\n";
    	}
    	return $output;
    }
    
    $itemtag = tag_escape( $atts['itemtag'] );
    $captiontag = tag_escape( $atts['captiontag'] );
    $icontag = tag_escape( $atts['icontag'] );
    $valid_tags = wp_kses_allowed_html( 'post' );
    if ( ! isset( $valid_tags[ $itemtag ] ) ) {
    	$itemtag = 'dl';
    }
    if ( ! isset( $valid_tags[ $captiontag ] ) ) {
    	$captiontag = 'dd';
    }
    if ( ! isset( $valid_tags[ $icontag ] ) ) {
    	$icontag = 'dt';
    }
    
    $columns = intval( $atts['columns'] );
    $itemwidth = $columns > 0 ? floor(100/$columns) : 100;
    $float = is_rtl() ? 'right' : 'left';
    
    $selector = "gallery-{$instance}";
    
    $gallery_style = '';
    
    /**
     * Filter whether to print default gallery styles.
     *
     * @since 3.1.0
     *
     * @param bool $print Whether to print default gallery styles.
     *                    Defaults to false if the theme supports HTML5 galleries.
     *                    Otherwise, defaults to true.
     */
    if ( apply_filters( 'use_default_gallery_style', ! $html5 ) ) {
    	$gallery_style = "
    	<style type='text/css'>
    		#{$selector} {
    			margin: auto;
    		}
    		#{$selector} .gallery-item {
    			float: {$float};
    			margin-top: 10px;
    			text-align: center;
    			width: {$itemwidth}%;
    		}
    		#{$selector} img {
    			border: 2px solid #cfcfcf;
    		}
    		#{$selector} .gallery-caption {
    			margin-left: 0;
    		}
    		/* see gallery_shortcode() in wp-includes/media.php */
    	</style>\n\t\t";
    }
    
    $size_class = sanitize_html_class( $atts['size'] );
    $gallery_div = "<div id='$selector' class='gallery galleryid-{$id} gallery-columns-{$columns} gallery-size-{$size_class}'>";
    
    /**
     * Filter the default gallery shortcode CSS styles.
     *
     * @since 2.5.0
     *
     * @param string $gallery_style Default CSS styles and opening HTML div container
     *                              for the gallery shortcode output.
     */
    $output = apply_filters( 'gallery_style', $gallery_style . $gallery_div );
    
    $i = 0; 
    foreach ( $attachments as $id => $attachment ) {
            
    	$attr = ( trim( $attachment->post_excerpt ) ) ? array( 'aria-describedby' => "$selector-$id" ) : '';
    	if ( ! empty( $atts['link'] ) && 'file' === $atts['link'] ) {
    		//$image_output = wp_get_attachment_link( $id, $atts['size'], false, false, false, $attr ); // for attachment url 
            $image_output = "<a href='" . wp_get_attachment_url( $id ) . "' data-fancybox='group{$columns}' data-caption='" . esc_attr( $attachment->post_excerpt ) . "'>";
            $image_output .= wp_get_attachment_image( $id, $atts['size'], false, $attr );
            $image_output .= "</a>";
    	} elseif ( ! empty( $atts['link'] ) && 'none' === $atts['link'] ) {
    		$image_output = wp_get_attachment_image( $id, $atts['size'], false, $attr );
    	} else {
    		$image_output = wp_get_attachment_link( $id, $atts['size'], true, false, false, $attr ); //for attachment page
    	}
    	$image_meta  = wp_get_attachment_metadata( $id );
    
    	$orientation = '';
    	if ( isset( $image_meta['height'], $image_meta['width'] ) ) {
    		$orientation = ( $image_meta['height'] > $image_meta['width'] ) ? 'portrait' : 'landscape';
    	}
    	$output .= "<{$itemtag} class='gallery-item'>";
    	$output .= "
    		<{$icontag} class='gallery-icon {$orientation}'>
    			$image_output
    		</{$icontag}>";
    	if ( $captiontag && trim($attachment->post_excerpt) ) {
    		$output .= "
    			<{$captiontag} class='wp-caption-text gallery-caption' id='$selector-$id'>
    			" . wptexturize($attachment->post_excerpt) . "
    			</{$captiontag}>";
    	}
    	$output .= "</{$itemtag}>";
    	if ( ! $html5 && $columns > 0 && ++$i % $columns == 0 ) {
    		$output .= '<br style="clear: both" />';
    	}
    }
    
    if ( ! $html5 && $columns > 0 && $i % $columns !== 0 ) {
    	$output .= "
    		<br style='clear: both' />";
    }
    
    $output .= "
    	</div>\n";
    
    return $output;
}
endif;
if( class_exists( 'Jetpack' ) ){
    if( !Jetpack::is_module_active( 'carousel' ) ){
        add_filter( 'post_gallery', 'seva_lite_filter_post_gallery', 10, 3 );
    }
}else{
    add_filter( 'post_gallery', 'seva_lite_filter_post_gallery', 10, 3 );
}

if( ! function_exists( 'seva_lite_admin_notice' ) ) :
/**
 * Addmin notice for getting started page
*/
function seva_lite_admin_notice(){
    global $pagenow;
    $theme_args      = wp_get_theme();
    $meta            = get_option( 'seva_lite_admin_notice' );
    $name            = $theme_args->__get( 'Name' );
    $current_screen  = get_current_screen();
    
    if( 'themes.php' == $pagenow && !$meta ){
        
        if( $current_screen->id !== 'dashboard' && $current_screen->id !== 'themes' ){
            return;
        }

        if( is_network_admin() ){
            return;
        }

        if( ! current_user_can( 'manage_options' ) ){
            return;
        } ?>

        <div class="welcome-message notice notice-info">
            <div class="notice-wrapper">
                <div class="notice-text">
                    <h3><?php esc_html_e( 'Congratulations!', 'seva-lite' ); ?></h3>
                    <p><?php printf( __( '%1$s is now installed and ready to use. Click below to see theme documentation, plugins to install and other details to get started.', 'seva-lite' ), esc_html( $name ) ); ?></p>
                    <p><a href="<?php echo esc_url( admin_url( 'themes.php?page=seva-lite-getting-started' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Go to the getting started.', 'seva-lite' ); ?></a></p>
                    <p class="dismiss-link"><strong><a href="?seva_lite_admin_notice=1"><?php esc_html_e( 'Dismiss', 'seva-lite' ); ?></a></strong></p>
                </div>
            </div>
        </div>
    <?php }
}
endif;
add_action( 'admin_notices', 'seva_lite_admin_notice' );

if( ! function_exists( 'seva_lite_update_admin_notice' ) ) :
/**
 * Updating admin notice on dismiss
*/
function seva_lite_update_admin_notice(){
    if ( isset( $_GET['seva_lite_admin_notice'] ) && $_GET['seva_lite_admin_notice'] = '1' ) {
        update_option( 'seva_lite_admin_notice', true );
    }
}
endif;
add_action( 'admin_init', 'seva_lite_update_admin_notice' );

if ( ! function_exists( 'seva_lite_get_fontawesome_ajax' ) ) :
/**
 * Return an array of all icons.
 */
function seva_lite_get_fontawesome_ajax() {
    // Bail if the nonce doesn't check out
    if ( ! isset( $_POST['seva_lite_customize_nonce'] ) || ! wp_verify_nonce( sanitize_key( $_POST['seva_lite_customize_nonce'] ), 'seva_lite_customize_nonce' ) ) {
        wp_die();
    }

    // Do another nonce check
    check_ajax_referer( 'seva_lite_customize_nonce', 'seva_lite_customize_nonce' );

    // Bail if user can't edit theme options
    if ( ! current_user_can( 'edit_theme_options' ) ) {
        wp_die();
    }

    // Get all of our fonts
    $fonts = seva_lite_get_fontawesome_list();
    
    ob_start();
    if( $fonts ){ ?>
        <ul class="font-group">
            <?php 
                foreach( $fonts as $font ){
                    echo '<li data-font="' . esc_attr( $font ) . '"><i class="' . esc_attr( $font ) . '"></i></li>';                        
                }
            ?>
        </ul>
        <?php
    }
    echo ob_get_clean();

    // Exit
    wp_die();
}
endif;
add_action( 'wp_ajax_seva_lite_get_fontawesome_ajax', 'seva_lite_get_fontawesome_ajax' );

if ( ! function_exists( 'seva_lite_dynamic_mce_css' ) ) :
/**
 * Add Editor Style 
 * Add Link Color Option in Editor Style (MCE CSS)
 */
function seva_lite_dynamic_mce_css( $mce_css ){
    $mce_css .= ', ' . add_query_arg( array( 'action' => 'seva_lite_dynamic_mce_css', '_nonce' => wp_create_nonce( 'seva_lite_dynamic_mce_nonce', __FILE__ ) ), admin_url( 'admin-ajax.php' ) );
    return $mce_css;
}
endif;
add_filter( 'mce_css', 'seva_lite_dynamic_mce_css' );
 
if ( ! function_exists( 'seva_lite_dynamic_mce_css_ajax_callback' ) ) : 
/**
 * Ajax Callback
 */
function seva_lite_dynamic_mce_css_ajax_callback(){
 
    /* Check nonce for security */
    $nonce = isset( $_REQUEST['_nonce'] ) ? $_REQUEST['_nonce'] : '';
    if( ! wp_verify_nonce( $nonce, 'seva_lite_dynamic_mce_nonce' ) ){
        die(); // don't print anything
    }
 
    /* Get Link Color */
    $primary_font    = get_theme_mod( 'primary_font', 'Nunito Sans' );
    $primary_fonts   = seva_lite_get_fonts( $primary_font, 'regular' );
    $secondary_font  = get_theme_mod( 'secondary_font', 'DM Serif Display' );
    $secondary_fonts = seva_lite_get_fonts( $secondary_font, 'regular' );

    $background_color = get_theme_mod( 'background_custom_color','#fbf3f0' );
    $rgb4 = seva_lite_hex2rgb( seva_lite_sanitize_hex_color( $background_color ) );
 
    /* Set File Type and Print the CSS Declaration */
    header( 'Content-type: text/css' );
    echo ':root .mce-content-body {
        --primary-font: ' . esc_html( $primary_fonts['font'] ) . ';
        --secondary-font: ' . esc_html( $secondary_fonts['font'] ) . ';
        --background-color: ' . seva_lite_sanitize_hex_color( $background_color ) . ';
        --background-color-rgb: ' . sprintf( '%1$s, %2$s, %3$s', $rgb4[0], $rgb4[1], $rgb4[2] ) . ';
    }';
    die(); // end ajax process.
}
endif;
add_action( 'wp_ajax_seva_lite_dynamic_mce_css', 'seva_lite_dynamic_mce_css_ajax_callback' );
add_action( 'wp_ajax_no_priv_seva_lite_dynamic_mce_css', 'seva_lite_dynamic_mce_css_ajax_callback' );
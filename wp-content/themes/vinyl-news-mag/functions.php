<?php
/**
 * Vinyl News Magazine functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package vinyl_news_mag
 */



if ( ! function_exists( 'vinyl_news_mag_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function vinyl_news_mag_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Vinyl News Magazine, use a find and replace
		 * to change 'vinyl-news-mag' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'vinyl-news-mag', get_template_directory() . '/languages' );

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
		remove_theme_support( 'widgets-block-editor' );

        add_image_size('vinyl-news-mag-blog-thumbnail-img', 600, 400, true);
        add_image_size('vinyl-news-mag-blog-single-img', 900, 500, true);


		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary', 'vinyl-news-mag' ),
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
				'vinyl_news_mag_custom_background_args',
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
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'vinyl_news_mag_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function vinyl_news_mag_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'vinyl_news_mag_content_width', 640 );
}
add_action( 'after_setup_theme', 'vinyl_news_mag_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function vinyl_news_mag_widgets_init()
{
    register_sidebar([
        'name' => esc_html__('Sidebar', 'vinyl-news-mag'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Add widgets here.', 'vinyl-news-mag'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title"><span>',
        'after_title' => '</span></h2>',
    ]);
    for ($i = 1; $i <= 4; $i++) {
        register_sidebar([
            'name' => esc_html__('Vinyl News Magazine Footer Widget', 'vinyl-news-mag') . $i,
            'id' => 'vinyl_news_mag_footer_' . $i,
            'description' =>
                esc_html__('Shows Widgets in Footer', 'vinyl-news-mag') . $i,
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        ]);
    }
    register_sidebar([
        'name' => esc_html__('HomePage Section Sidebar', 'vinyl-news-mag'),
        'id' => 'home-sidebar',
        'description' => esc_html__('Add widgets here.', 'vinyl-news-mag'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ]);
    
}
add_action('widgets_init', 'vinyl_news_mag_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function vinyl_news_mag_scripts() {
	wp_enqueue_style( 'vinyl-news-mag-style', get_stylesheet_uri(), array());
	wp_style_add_data( 'vinyl-news-mag-style', 'rtl', 'replace' );

	wp_enqueue_script( 'vinyl-news-mag-navigation', get_template_directory_uri() . '/js/navigation.js', array(), true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'vinyl_news_mag_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/inc/vinyl-news-mag-nav-walker.php';
/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/customizer-functions.php';
require get_template_directory() . '/inc/vinyl-news-mag-customizers-default.php';


/**
 * Extra Files
 */

require get_template_directory() . '/inc/plugin-activation.php';
require get_template_directory() . '/inc/vinyl-news-mag-tgmp-plugins.php';
require_once( trailingslashit( get_template_directory() ) . 'trt-customize-pro/vinyl-news-mag-upgrade/class-customize.php' );







if (!function_exists('vinyl_news_mag_archive_link')) {
    function vinyl_news_mag_archive_link($post)
    {
        $year = date('Y', strtotime($post->post_date));
        $month = date('m', strtotime($post->post_date));
        $day = date('d', strtotime($post->post_date));
        $link = home_url('') . '/' . $year . '/' . $month . '?day=' . $day;
        return $link;
    }
}
if (!function_exists('wp_body_open')) {
    function wp_body_open()
    {
        do_action('wp_body_open');
    }
}



if (!function_exists('vinyl_news_mag_blank_widget')) {
    function vinyl_news_mag_blank_widget()
    {
        echo '<div class="col-md-3">';
        if (is_user_logged_in() && current_user_can('edit_theme_options')) {
            echo '<a href="' .
                esc_url(admin_url('widgets.php')) .
                '" target="_blank"><i class="fa fa-plus-circle"></i> ' .
                esc_html__('Add Footer Widget', 'vinyl-news-mag') .
                '</a>';
        }
        echo '</div>';
    }
}

if (!function_exists('vinyl_news_mag_blank_sidebar_widget')) {
    function vinyl_news_mag_blank_sidebar_widget()
    {
   
        if (is_user_logged_in() && current_user_can('edit_theme_options')) {
            echo '<a href="' .
                esc_url(admin_url('widgets.php')) .
                '" target="_blank"><i class="fa fa-plus-circle"></i> ' .
                esc_html__('Add Sidebar Widget', 'vinyl-news-mag') .
                '</a>';
        }
  
    }
}

if (!function_exists('vinyl_news_mag_get_excerpt')):
    function vinyl_news_mag_get_excerpt($post_id, $count)
    {
        $content_post = get_post($post_id);
        $excerpt = $content_post->post_content;

        $excerpt = strip_shortcodes($excerpt);
        $excerpt = strip_tags($excerpt);

        $excerpt = preg_replace('/\s\s+/', ' ', $excerpt);
        $excerpt = preg_replace('#\[[^\]]+\]#', ' ', $excerpt);
        $strip = explode(' ', $excerpt);
        foreach ($strip as $key => $single) {
            if (!filter_var($single, FILTER_VALIDATE_URL) === false) {
                unset($strip[$key]);
            }
        }
        $excerpt = implode(' ', $strip);

        $excerpt = substr($excerpt, 0, $count);
        if (strlen($excerpt) >= $count) {
            $excerpt = substr($excerpt, 0, strripos($excerpt, ' '));
            $excerpt = $excerpt . '...';
        }
        return $excerpt;
    }
endif;


/**
 * Enqueue scripts and styles.
 */
function vinyl_news_mag_scripts_enqueue()
{
    wp_enqueue_style('vinyl-news-mag-style', get_stylesheet_uri());
    wp_enqueue_style('vinyl-news-mag-font', vinyl_news_mag_font_url(), [], null);
    wp_enqueue_style(
        'bootstrap-css',
        get_template_directory_uri() . '/assets/css/bootstrap.min.css',
        [],
        '1.0'
    );
    wp_enqueue_style(
        'fontawesome-css',
        get_template_directory_uri() . '/assets/css/font-awesome.css',
        [],
        '1.0'
    );
    wp_enqueue_style(
        'slick-css',
        get_template_directory_uri() . '/assets/css/slick.css',
        [],
        '1.0'
    );

    wp_enqueue_style(
        'vinyl-news-mag-css',
        get_template_directory_uri() . '/vinyl-news-mag.css',
        [],
        '1.0'
    );

    wp_enqueue_style(
        'vinyl-news-mag-media-css',
        get_template_directory_uri() . '/assets/css/media-queries-css.css',
        [],
        '1.0'
    );
    wp_enqueue_script(
        'vinyl-news-mag-navigation',
        get_template_directory_uri() . '/js/navigation.js',
        ['jquery'],
        '1.0',
        true
    );
    wp_enqueue_script(
        'bootstrap-js',
        get_template_directory_uri() . '/assets/js/bootstrap.min.js',
        ['jquery'],
        '1.0',
        true
    );

    wp_enqueue_script(
        'slick-js',
        get_template_directory_uri() . '/assets/js/slick.min.js',
        ['jquery'],
        '1.0',
        true
    );

    wp_enqueue_script(
        'vinyl-news-mag-main',
        get_template_directory_uri() . '/assets/js/main.js',
        ['jquery'],
        '1.0',
        true
    );


    wp_enqueue_script(
        'vinyl-news-mag-skip-link-focus-fix',
        get_template_directory_uri() . '/js/skip-link-focus-fix.js',
        ['jquery'],
        '',
        true
    );

    wp_register_script( 'vinyl-news-mag-custom-script', get_stylesheet_directory_uri(). '/assets/js/loadmore.js', array('jquery'), false, true );

    $script_data_array = array(
        'ajaxurl' => esc_url(admin_url( 'admin-ajax.php' )),
        'security' => wp_create_nonce( 'load_more_posts' ),
      );
      wp_localize_script( 'vinyl-news-mag-custom-script', 'vinyl_news_mag_blog', $script_data_array );
      // Enqueued script with localized data.
      wp_enqueue_script( 'vinyl-news-mag-custom-script' ); 


    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'vinyl_news_mag_scripts_enqueue');



function vinyl_news_mag_load_posts_by_ajax_callback() {
    check_ajax_referer('load_more_posts', 'security');
    $paged = $_POST['page'];
    $content_length = '150';
    $vinyl_news_mag_options = vinyl_news_mag_theme_options();
    $show_date = $vinyl_news_mag_options['show_date'];
$show_category = $vinyl_news_mag_options['show_category'];

    $sidebar_posts = get_theme_mod( 'sidebar_posts');

    if ($sidebar_posts && 'none' != $sidebar_posts) {
        $args = [
            'post_type'      => array( 'post' ),
            'posts_per_page' => 4,
            'post_status' => 'publish',
            'cat'            => $sidebar_posts,
            'order' => 'desc',
            'orderby' => 'menu_order date',
            'paged' => $paged,
        ];
    } else {
        $args = [
            'post_type'      => array( 'post' ),
            'posts_per_page' => 4,
            'post_status' => 'publish',
            'order' => 'desc',
            'orderby' => 'menu_order date',
            'paged' => $paged,
        ];
    }
    
    $blog_query = new WP_Query($args);
    $loop = 0;
    
    if ($blog_query->have_posts()): 
        while ($blog_query->have_posts()):

            $blog_query->the_post();

                $image_src = wp_get_attachment_image_src(
                    get_post_thumbnail_id(),
                    'vinyl-news-mag-blog-thumbnail-img'
                );

            if($image_src){
                $url = $image_src[0];
                }
            ?>

    
                <div class="sidebar-content-wrap">
                    <div class="sidebar-thumb">
                    
                    <a href="<?php echo esc_url(get_the_permalink()); ?>"><img src="<?php echo esc_url($url); ?>"></a>
                    </div>
                    <div class="post-content">
                    <ul class="post-meta">
                    <?php if($show_category){ ?>
                            <?php $cats = get_the_category();
                        $cat_name = $cats[0]->name;
                        echo '<a class="post-category inline" href="'.esc_url(get_category_link($cats[0]->cat_ID)).'">'.esc_html($cats[0]->cat_name).'</a>';

                         } ?>
                            <?php if($show_date){ ?>
                            <li class="meta-date"><a href="<?php echo esc_url(
                                vinyl_news_mag_archive_link($post)
                            ); ?>"><time class="entry-date published" datetime="<?php echo esc_url(
    vinyl_news_mag_archive_link($post)
); ?>"><?php echo esc_html(the_time(get_option('date_format'))); ?></time>
                                                </a></li>
                                                

                                        <?php } ?>
                                                
                                               
							</ul>
                        <h3>
                            <a href="<?php echo esc_url(get_the_permalink()); ?>"><?php the_title(); ?></a>
                        </h3>
                        <figcaption>
                                    
                                    <p><?php echo wp_kses_post(
                                        vinyl_news_mag_get_excerpt(
                                            $blog_query->post->ID,
                                            $content_length
                                        )
                                    ); ?></p>

                                  </figcaption>
                                  <a class="btn btn-default" href="<?php echo esc_url(
          get_the_permalink()
      ); ?>"><?php esc_html_e('Read More', 'vinyl-news-mag'); ?><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                        
                    </div>
                </div>
       

            <?php
        endwhile;
    endif;
    wp_die();
  }
  add_action('wp_ajax_load_posts_by_ajax', 'vinyl_news_mag_load_posts_by_ajax_callback');
  add_action('wp_ajax_nopriv_load_posts_by_ajax', 'vinyl_news_mag_load_posts_by_ajax_callback');





if (!function_exists('vinyl_news_mag_font_url')):
    function vinyl_news_mag_font_url()
    {
        $fonts_url = '';
        $fonts = [];

        if ('off' !== _x('on', 'Inter font: on or off', 'vinyl-news-mag')) {
            $fonts[] = 'Inter:600,400';
        }
        if ($fonts) {
            $fonts_url = add_query_arg(
                [
                    'family' => urlencode(implode('|', $fonts)),
                ],
                '//fonts.googleapis.com/css'
            );
        }

        return $fonts_url;
    }
endif;




function vinyl_news_mag_customizer_stylesheet() {

	wp_register_style( 'vinyl-news-mag-customizer-css', get_template_directory_uri() . '/inc/customizer.css', NULL, NULL, 'all' );
	wp_enqueue_style( 'vinyl-news-mag-customizer-css' );

}
add_action( 'customize_controls_print_styles', 'vinyl_news_mag_customizer_stylesheet' );


function the_breadcrumb() {
    global $post;
    echo '<ul id="breadcrumbs">';
    if (!is_home()) {
        echo '<li><a href="';
        esc_url(home_url());
        echo '">';
        esc_html_e('Home', 'vinyl-news-mag');
        echo '</a></li><li class="separator"> > </li>';
        if (is_category() || is_single()) {
            echo '<li>';
            the_category(' </li><li class="separator"> > </li><li> ');
            if (is_single()) {
                echo '</li><li class="separator"> > </li><li>';
                the_title();
                echo '</li>';
            }
        } elseif (is_page()) {
            if($post->post_parent){
                $anc = get_post_ancestors( $post->ID );
                $title = get_the_title();
                foreach ( $anc as $ancestor ) {
                    $output = '<li><a href="'.esc_url(get_permalink($ancestor)).'" title="'.esc_attr(get_the_title($ancestor)).'">'.esc_html(get_the_title($ancestor)).'</a></li> <li class="separator">/</li>';
                }
                echo $output;
                echo '<strong title="'.esc_attr($title).'"> '.esc_html($title).'</strong>';
            } else {
                echo '<li><strong> '.esc_html(get_the_title()).'</strong></li>';
            }
        }
    }
    echo '</ul>';
}
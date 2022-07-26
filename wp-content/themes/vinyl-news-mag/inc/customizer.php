<?php
/**
 * Vinyl News Magazine Theme Customizer
 *
 * @package vinyl_news_mag
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
*/
function vinyl_news_mag_customize_register($wp_customize)
{
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';
    $wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

    $vinyl_news_mag_options = vinyl_news_mag_theme_options();

    if (isset($wp_customize->selective_refresh)) {
        $wp_customize->selective_refresh->add_partial('blogname', [
            'selector' => '.site-title a',
            'render_callback' => 'vinyl_news_mag_customize_partial_blogname',
        ]);
        $wp_customize->selective_refresh->add_partial('blogdescription', [
            'selector' => '.site-description',
            'render_callback' => 'vinyl_news_mag_customize_partial_blogdescription',
        ]);
    }


    $wp_customize->add_panel('global_options', [
        'title' => esc_html__('Global Settings', 'vinyl-news-mag'),
        'priority' => 1,
    ]);

        /* Header Section */
        $wp_customize->add_section('header_section', [
            'title' => esc_html__('Header Section', 'vinyl-news-mag'),
            'panel' => 'global_options',
            'description' => esc_html__('Sticky Header Feature and Header with Ad Banner Layout is available in Premium Version', 'vinyl-news-mag'),
            'capability' => 'edit_theme_options',
        ]);
    
        $wp_customize->add_setting('vinyl_news_mag_theme_options[facebook]', [
            'type' => 'option',
            'default' => $vinyl_news_mag_options['facebook'],
            'sanitize_callback' => 'vinyl_news_mag_sanitize_url',
        ]);
        $wp_customize->add_control('vinyl_news_mag_theme_options[facebook]', [
            'label' => esc_html__('Facebook Link', 'vinyl-news-mag'),
            'description' => esc_html__('Only 2 Social Links are available in Free Version', 'vinyl-news-mag'),
            'type' => 'url',
            'section' => 'header_section',
            'settings' => 'vinyl_news_mag_theme_options[facebook]',
        ]);
    
        $wp_customize->add_setting('vinyl_news_mag_theme_options[pinterest]', [
            'type' => 'option',
            'default' => $vinyl_news_mag_options['pinterest'],
            'sanitize_callback' => 'vinyl_news_mag_sanitize_url',
        ]);
        $wp_customize->add_control('vinyl_news_mag_theme_options[pinterest]', [
            'label' => esc_html__('pinterest Link', 'vinyl-news-mag'),
            'type' => 'url',
            'section' => 'header_section',
            'settings' => 'vinyl_news_mag_theme_options[pinterest]',
        ]);



        $wp_customize->add_section('home_meta', [
            'title' => esc_html__('Home Page Post Meta', 'vinyl-news-mag'),
            'panel' => 'global_options',
            'capability' => 'edit_theme_options',
        ]);

        $wp_customize->add_setting('vinyl_news_mag_theme_options[show_category]', [
            'type' => 'option',
            'default' => true,
            'default' => $vinyl_news_mag_options['show_category'],
            'sanitize_callback' => 'vinyl_news_mag_sanitize_checkbox',
        ]);
    
        $wp_customize->add_control('vinyl_news_mag_theme_options[show_category]', [
            'label' => esc_html__('Show Category Meta', 'vinyl-news-mag'),
            'type' => 'Checkbox',
            'priority' => 1,
            'section' => 'home_meta',
        ]);
        $wp_customize->add_setting('vinyl_news_mag_theme_options[show_date]', [
            'type' => 'option',
            'default' => true,
            'default' => $vinyl_news_mag_options['show_date'],
            'sanitize_callback' => 'vinyl_news_mag_sanitize_checkbox',
        ]);
    
        $wp_customize->add_control('vinyl_news_mag_theme_options[show_date]', [
            'label' => esc_html__('Show Date Meta', 'vinyl-news-mag'),
            'type' => 'Checkbox',
            'priority' => 1,
            'section' => 'home_meta',
        ]);



    $wp_customize->add_section('single_page_section', [
        'title' => esc_html__('Single Article Page Option', 'vinyl-news-mag'),
        'panel' => 'global_options',
        'capability' => 'edit_theme_options',
    ]);

    $wp_customize->add_setting('vinyl_news_mag_theme_options[show_sidebar]', [
        'type' => 'option',
        'default' => true,
        'default' => $vinyl_news_mag_options['show_sidebar'],
        'sanitize_callback' => 'vinyl_news_mag_sanitize_checkbox',
    ]);

    $wp_customize->add_control('vinyl_news_mag_theme_options[show_sidebar]', [
        'label' => esc_html__('Show Sidebar in Single Article Page', 'vinyl-news-mag'),
        'description' => esc_html__('Sticky Sidebar feature is available in Premium Version', 'vinyl-news-mag'),
        'type' => 'Checkbox',
        'priority' => 1,
        'section' => 'single_page_section',
    ]);

    $wp_customize->add_setting('vinyl_news_mag_theme_options[show_breadcrumbs]', [
        'type' => 'option',
        'default' => true,
        'default' => $vinyl_news_mag_options['show_breadcrumbs'],
        'sanitize_callback' => 'vinyl_news_mag_sanitize_checkbox',
    ]);


    $wp_customize->add_control('vinyl_news_mag_theme_options[show_breadcrumbs]', [
        'label' => esc_html__('Show Breadcrumbs ', 'vinyl-news-mag'),
        'type' => 'Checkbox',
        'priority' => 1,
        'section' => 'single_page_section',
    ]);

    $wp_customize->add_setting('vinyl_news_mag_theme_options[show_featured_image]', [
        'type' => 'option',
        'default' => true,
        'default' => $vinyl_news_mag_options['show_featured_image'],
        'sanitize_callback' => 'vinyl_news_mag_sanitize_checkbox',
    ]);


    $wp_customize->add_control('vinyl_news_mag_theme_options[show_featured_image]', [
        'label' => esc_html__('Show Featured Image ', 'vinyl-news-mag'),
        'type' => 'Checkbox',
        'priority' => 1,
        'section' => 'single_page_section',
    ]);
    $wp_customize->add_setting('vinyl_news_mag_theme_options[show_metas]', [
        'type' => 'option',
        'default' => true,
        'default' => $vinyl_news_mag_options['show_metas'],
        'sanitize_callback' => 'vinyl_news_mag_sanitize_checkbox',
    ]);

    $wp_customize->add_control('vinyl_news_mag_theme_options[show_metas]', [
        'label' => esc_html__('Show Metas', 'vinyl-news-mag'),
        'type' => 'Checkbox',
        'priority' => 1,
        'section' => 'single_page_section',
    ]);


    $wp_customize->add_setting('vinyl_news_mag_theme_options[show_post_navigation]', [
        'type' => 'option',
        'default' => true,
        'default' => $vinyl_news_mag_options['show_post_navigation'],
        'sanitize_callback' => 'vinyl_news_mag_sanitize_checkbox',
    ]);

    $wp_customize->add_control('vinyl_news_mag_theme_options[show_post_navigation]', [
        'label' => esc_html__('Show Post Navigation', 'vinyl-news-mag'),
        'type' => 'Checkbox',
        'priority' => 1,
        'section' => 'single_page_section',
    ]);

    $wp_customize->add_section('prealoder', [
        'title' => esc_html__('Preloader Options', 'vinyl-news-mag'),
        'panel' => 'global_options',
        'capability' => 'edit_theme_options',
    ]);

    $wp_customize->add_setting('vinyl_news_mag_theme_options[show_preloader]', [
        'type' => 'option',
        'default' => true,
        'default' => $vinyl_news_mag_options['show_preloader'],
        'sanitize_callback' => 'vinyl_news_mag_sanitize_checkbox',
    ]);

    $wp_customize->add_control('vinyl_news_mag_theme_options[show_preloader]', [
        'label' => esc_html__('Show Preloader', 'vinyl-news-mag'),
        'type' => 'Checkbox',
        'priority' => 1,
        'section' => 'prealoder',
    ]);



    $wp_customize->add_section('content_links', [
        'title' => esc_html__('Content Links Styling', 'vinyl-news-mag'),
        'panel' => 'global_options',
        'capability' => 'edit_theme_options',
    ]);

    $wp_customize->add_setting('vinyl_news_mag_theme_options[show_links]', [
        'type' => 'option',
        'default' => true,
        'default' => $vinyl_news_mag_options['show_links'],
        'sanitize_callback' => 'vinyl_news_mag_sanitize_checkbox',
    ]);

    $wp_customize->add_control('vinyl_news_mag_theme_options[show_links]', [
        'label' => esc_html__('Show Link Underline Style', 'vinyl-news-mag'),
        'type' => 'Checkbox',
        'priority' => 1,
        'section' => 'content_links',
    ]);


    $wp_customize->add_section('prefooter_section', [
        'title' => esc_html__('Footer Section', 'vinyl-news-mag'),
        'panel' => 'global_options',
        'capability' => 'edit_theme_options',
    ]);

    $wp_customize->add_setting('vinyl_news_mag_theme_options[show_prefooter]', [
        'type' => 'option',
        'default' => true,
        'default' => $vinyl_news_mag_options['show_prefooter'],
        'sanitize_callback' => 'vinyl_news_mag_sanitize_checkbox',
    ]);

    $wp_customize->add_control('vinyl_news_mag_theme_options[show_prefooter]', [
        'label' => esc_html__('Show Prefooter Section', 'vinyl-news-mag'),
        'description' => esc_attr( __('Copyright Text can be changed in only Premium Version', 'vinyl-news-mag') ),
        'type' => 'Checkbox',
        'priority' => 1,
        'section' => 'prefooter_section',
    ]);


    $wp_customize->add_setting('vinyl_news_mag_theme_options[show_dark]', [
        'type' => 'option',
        'default' => true,
        'default' => $vinyl_news_mag_options['show_dark'],
        'sanitize_callback' => 'vinyl_news_mag_sanitize_checkbox',
    ]);

    $wp_customize->add_control('vinyl_news_mag_theme_options[show_dark]', [
        'label' => esc_html__('Show Dark Layout', 'vinyl-news-mag'),
        'type' => 'Checkbox',
        'priority' => 1,
        'section' => 'prefooter_section',
    ]);








    $wp_customize->add_panel('theme_options', [
        'title' => esc_html__('Front Page Options', 'vinyl-news-mag'),
        'priority' => 2,
    ]);









    $wp_customize->add_section('main_banner_section', [
        'title' => esc_html__('Main Banner', 'vinyl-news-mag'),
        'panel' => 'theme_options',
        'capability' => 'edit_theme_options',
    ]);

    $wp_customize->add_setting('vinyl_news_mag_theme_options[show_main_slider]', [
        'type' => 'option',
        'default' => true,
        'default' => $vinyl_news_mag_options['show_main_slider'],
        'sanitize_callback' => 'vinyl_news_mag_sanitize_checkbox',
    ]);
    
    
    $wp_customize->add_control('vinyl_news_mag_theme_options[show_main_slider]', [
        'label' => esc_html__('Show Vertical Thumbnail Posts ', 'vinyl-news-mag'),
        'description'    => esc_html__('Use CMD or CTRL key to select multiple Categories in dropdown', 'vinyl-news-mag'),
        'type' => 'Checkbox',
        'section' => 'main_banner_section',
    ]);
    


$wp_customize->add_setting( 'main_slider', array(
	'type'       => 'theme_mod',
	'capability' => 'edit_theme_options',
	'transport'  => '',
	'sanitize_callback' => 'vinyl_news_mag_multiple_dropdown_sanitize'
) );

$wp_customize->add_control(
	new vinyl_news_mag_Customize_Control_Multiple_Select(
		$wp_customize,
		'main_slider',
		array(
			'settings' => 'main_slider',
			'label'    => esc_html__('Main Slider - Select Categories', 'vinyl-news-mag'),
			'section'  => 'main_banner_section',
			'type'     => 'multiple-select', 
			'choices'  => vinyl_news_mag_get_categories(),
		)
	)
);

$wp_customize->add_setting('vinyl_news_mag_theme_options[show_vertical_posts]', [
    'type' => 'option',
    'default' => true,
    'default' => $vinyl_news_mag_options['show_vertical_posts'],
    'sanitize_callback' => 'vinyl_news_mag_sanitize_checkbox',
]);


$wp_customize->add_control('vinyl_news_mag_theme_options[show_vertical_posts]', [
    'label' => esc_html__('Show Vertical Thumbnail Posts ', 'vinyl-news-mag'),
    'description'    => esc_html__('Use CMD or CTRL key to select multiple Categories in dropdown', 'vinyl-news-mag'),
    'type' => 'Checkbox',
    'section' => 'main_banner_section',
]);

$wp_customize->add_setting( 'vertical_thumbnail_category', array(
	'type'       => 'theme_mod',
	'capability' => 'edit_theme_options',
	'transport'  => '',
	'sanitize_callback' => 'vinyl_news_mag_multiple_dropdown_sanitize'
) );

$wp_customize->add_control(
	new vinyl_news_mag_Customize_Control_Multiple_Select(
		$wp_customize,
		'vertical_thumbnail_category',
		array(
			'settings' => 'vertical_thumbnail_category',
			'label'    => esc_html__('Vertical Thumbnail Posts - Select Categories', 'vinyl-news-mag'),
			'section'  => 'main_banner_section',
			'type'     => 'multiple-select', 
			'choices'  => vinyl_news_mag_get_categories(),
		)
	)
);



$wp_customize->add_setting('vinyl_news_mag_theme_options[vertical_thumbnail_title]',
array(
    'type' => 'option',
    'sanitize_callback' => 'sanitize_text_field',
)
);
$wp_customize->add_control('vertical_thumbnail_title',
array(
    'label' => esc_html__('Vertical Thumbnail Slider Title', 'vinyl-news-mag'),
    'type' => 'text',
    'section' => 'main_banner_section',
    'settings' => 'vinyl_news_mag_theme_options[vertical_thumbnail_title]',
)
);

$wp_customize->add_setting('vinyl_news_mag_theme_options[no_of_posts_vertical]',
array(
    'type' => 'option',
    'sanitize_callback' => 'sanitize_text_field',
)
);
$wp_customize->add_control('no_of_posts_vertical',
array(
    'label' => esc_html__('No of Posts for Vertical Post Layout', 'vinyl-news-mag'),
    'type' => 'text',
    'section' => 'main_banner_section',
    'settings' => 'vinyl_news_mag_theme_options[no_of_posts_vertical]',
)
);



$wp_customize->add_section('second_section', [
    'title' => esc_html__('Featured Section', 'vinyl-news-mag'),
    'panel' => 'theme_options',
    'capability' => 'edit_theme_options',
]);

$wp_customize->add_setting('vinyl_news_mag_theme_options[show_second_posts]', [
    'type' => 'option',
    'default' => true,
    'default' => $vinyl_news_mag_options['show_second_posts'],
    'sanitize_callback' => 'vinyl_news_mag_sanitize_checkbox',
]);


$wp_customize->add_control('vinyl_news_mag_theme_options[show_second_posts]', [
    'label' => esc_html__('Featured Section ', 'vinyl-news-mag'),
    'description'    => esc_html__('Only 4 Posts can be shown in free version', 'vinyl-news-mag'),
    'type' => 'Checkbox',
    'section' => 'second_section',
]);


$wp_customize->add_setting( 'second_posts', array(
	'type'       => 'theme_mod',
	'capability' => 'edit_theme_options',
	'transport'  => '',
	'sanitize_callback' => 'vinyl_news_mag_multiple_dropdown_sanitize'
) );

$wp_customize->add_control(
	new vinyl_news_mag_Customize_Control_Multiple_Select(
		$wp_customize,
		'second_posts',
		array(
			'settings' => 'second_posts',
			'label'    => esc_html__('Featured Section - Select Categories', 'vinyl-news-mag'),
			'section'  => 'second_section',
			'type'     => 'multiple-select', 
			'choices'  => vinyl_news_mag_get_categories(),
		)
	)
);
$wp_customize->add_setting('vinyl_news_mag_theme_options[second_posts_title]',
array(
    'type' => 'option',
    'sanitize_callback' => 'sanitize_text_field',
)
);
$wp_customize->add_control('second_posts_title',
array(
    'label' => esc_html__('Section Title', 'vinyl-news-mag'),
    'type' => 'text',
    'section' => 'second_section',
    'settings' => 'vinyl_news_mag_theme_options[second_posts_title]',
)
);


$wp_customize->add_section('overlay_section', [
    'title' => esc_html__('Overlay Card Section', 'vinyl-news-mag'),
    'panel' => 'theme_options',
    'capability' => 'edit_theme_options',
]);

$wp_customize->add_setting('vinyl_news_mag_theme_options[show_overlay_posts]', [
    'type' => 'option',
    'default' => true,
    'default' => $vinyl_news_mag_options['show_overlay_posts'],
    'sanitize_callback' => 'vinyl_news_mag_sanitize_checkbox',
]);


$wp_customize->add_control('vinyl_news_mag_theme_options[show_overlay_posts]', [
    'label' => esc_html__('Show Overlay Post Section ', 'vinyl-news-mag'),
    'description'    => esc_html__('Only 4 Posts can be shown in free version', 'vinyl-news-mag'),
    'type' => 'Checkbox',
    'section' => 'overlay_section',
]);

$wp_customize->add_setting( 'overlay_posts', array(
	'type'       => 'theme_mod',
	'capability' => 'edit_theme_options',
	'transport'  => '',
	'sanitize_callback' => 'vinyl_news_mag_multiple_dropdown_sanitize'
) );

$wp_customize->add_control(
	new vinyl_news_mag_Customize_Control_Multiple_Select(
		$wp_customize,
		'overlay_posts',
		array(
			'settings' => 'overlay_posts',
			'label'    => esc_html__('Overlay Post Section - Select Categories', 'vinyl-news-mag'),
			'section'  => 'overlay_section',
			'type'     => 'multiple-select', 
			'choices'  => vinyl_news_mag_get_categories(),
		)
	)
);
$wp_customize->add_setting('vinyl_news_mag_theme_options[overlay_posts_title]',
array(
    'type' => 'option',
    'sanitize_callback' => 'sanitize_text_field',
)
);
$wp_customize->add_control('overlay_posts_title',
array(
    'label' => esc_html__('Section Title', 'vinyl-news-mag'),
    'type' => 'text',
    'section' => 'overlay_section',
    'settings' => 'vinyl_news_mag_theme_options[overlay_posts_title]',
)
);



$wp_customize->add_section('sidebar_section', [
    'title' => esc_html__('Home Sidebar Section', 'vinyl-news-mag'),
    'panel' => 'theme_options',
    'capability' => 'edit_theme_options',
]);


$wp_customize->add_setting('vinyl_news_mag_theme_options[show_home_sidebar]', [
    'type' => 'option',
    'default' => true,
    'default' => $vinyl_news_mag_options['show_home_sidebar'],
    'sanitize_callback' => 'vinyl_news_mag_sanitize_checkbox',
]);


$wp_customize->add_control('vinyl_news_mag_theme_options[show_home_sidebar]', [
    'label' => esc_html__('Show Homepage Siderbar Section ', 'vinyl-news-mag'),
    'description'    => esc_html__('Sticky Sidebar is available in premium version only', 'vinyl-news-mag'),
    'type' => 'Checkbox',
    'section' => 'sidebar_section',
]);



$wp_customize->add_setting( 'sidebar_posts', array(
	'type'       => 'theme_mod',
	'capability' => 'edit_theme_options',
	'transport'  => '',
	'sanitize_callback' => 'vinyl_news_mag_multiple_dropdown_sanitize'
) );

$wp_customize->add_control(
	new vinyl_news_mag_Customize_Control_Multiple_Select(
		$wp_customize,
		'sidebar_posts',
		array(
			'settings' => 'sidebar_posts',
			'label'    => esc_html__('Homepage Siderbar Section - Select Post Categories', 'vinyl-news-mag'),
			'section'  => 'sidebar_section',
			'type'     => 'multiple-select', 
			'choices'  => vinyl_news_mag_get_categories(),
		)
	)
);
$wp_customize->add_setting('vinyl_news_mag_theme_options[sidebar_posts_title]',
array(
    'type' => 'option',
    'sanitize_callback' => 'sanitize_text_field',
)
);
$wp_customize->add_control('sidebar_posts_title',
array(
    'label' => esc_html__('Section Title', 'vinyl-news-mag'),
    'type' => 'text',
    'section' => 'sidebar_section',
    'settings' => 'vinyl_news_mag_theme_options[sidebar_posts_title]',
)
);





}
add_action('customize_register', 'vinyl_news_mag_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function vinyl_news_mag_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function vinyl_news_mag_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function vinyl_news_mag_customize_preview_js() {
	wp_enqueue_script( 'vinyl-news-mag-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), true );
}
add_action( 'customize_preview_init', 'vinyl_news_mag_customize_preview_js' );

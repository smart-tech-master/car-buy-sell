<?php

/**
 * Loads the child theme textdomain.
 */
function across_load_language()
{
    load_child_theme_textdomain('across');
}
add_action('after_setup_theme', 'across_load_language');

if (!defined('ACROSS_S_VERSION')) {
    // Replace the version number of the theme on each release.
    define('ACROSS_S_VERSION', '1.0.0');
}

/**
 * Fairy Theme Customizer default values and infer from Fairy
 *
 * @package Fairy
 */
if (!function_exists('fairy_default_theme_options_values')) :
    function fairy_default_theme_options_values()
    {
        $default_theme_options = array(
            /*Top Header*/
            'fairy-enable-top-header' => false,
            'fairy-enable-top-header-social' => true,
            'fairy-enable-top-header-menu' => true,
            'fairy-enable-top-header-search' => true,

            /*Slider Settings Option*/
            'fairy-enable-slider' => false,
            'fairy-select-category' => 0,
            'fairy-image-size-slider' => 'cropped-image',

            /*Category Boxes*/
            'fairy-enable-category-boxes' => false,
            'fairy-single-cat-posts-select-1' => 0,


            /*Sidebar Options*/
            'fairy-sidebar-blog-page' => 'no-sidebar',
            'fairy-sidebar-single-page' => 'right-sidebar',
            'fairy-enable-sticky-sidebar' => true,


            /*Blog Page Default Value*/
            'fairy-column-blog-page' => 'two-column',
            'fairy-content-show-from' => 'excerpt',
            'fairy-excerpt-length' => 25,
            'fairy-pagination-options' => 'ajax',
            'fairy-read-more-text' => '',
            'fairy-blog-page-masonry-normal' => 'masonry',
            'fairy-blog-page-image-position' => 'left-image',
            'fairy-image-size-blog-page' => 'original-image',
            'fairy-site-layout-blog-overlay' => 1,

            /*Single Page Default Value*/
            'fairy-single-page-featured-image' => true,
            'fairy-single-page-tags' => false,
            'fairy-enable-underline-link' => true,
            'fairy-single-page-related-posts' => true,
            'fairy-single-page-related-posts-title' => esc_html__('Related Posts', 'across'),


            /*Breadcrumb Settings*/
            'fairy-blog-site-breadcrumb' => true,
            'fairy-breadcrumb-display-from-option' => 'theme-default',
            'fairy-breadcrumb-text' => '',

            /*General Colors*/
            'fairy-primary-color' => '#ff7e00',
            'fairy-header-description-color' => '#404040',

            'fairy-overlay-color' => 'rgba(255, 126, 0, 0.5)',
            'fairy-overlay-second-color' => 'rgba(0, 0, 0, 0.5)',

            /*Footer Options*/
            'fairy-footer-copyright' => esc_html__('All Rights Reserved 2022.', 'across'),
            'fairy-go-to-top' => true,
            'fairy-go-to-top-icon'=> esc_html__('fa-long-arrow-up','across'),
            'fairy-footer-social-icons' => false,
            'fairy-footer-mailchimp-subscribe' => false,
            'fairy-footer-instagram' => '',
            'fairy-footer-mailchimp-form-id' => '',
            'fairy-footer-mailchimp-form-title' =>  esc_html__('Subscribe to my Newsletter', 'across'),
            'fairy-footer-mailchimp-form-subtitle' => esc_html__('Be the first to receive the latest buzz on upcoming contests & more!', 'across'),

            /*Font Options*/
            'fairy-font-family-url' => 'Muli:400,300italic,300',
            'fairy-font-heading-family-url' => 'Poppins:400,500,600,700',

            /*Extra Options*/
            'fairy-post-published-updated-date' => 'post-published',
            'fairy-font-awesome-version-loading'=> 'version-4',


        );
        return apply_filters('fairy_default_theme_options_values', $default_theme_options);
    }
endif;

/**
 * Enqueue Style
 */
add_action('wp_enqueue_scripts', 'across_style');
function across_style()
{
    wp_enqueue_style('fairy-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('across-style', get_stylesheet_directory_uri() . '/style.css', array('fairy-style'));
    wp_enqueue_script('across-custom-js', get_stylesheet_directory_uri() . '/inc/js/custom.js', array('jquery'), _S_VERSION, true);
    global $fairy_theme_options;
    $fairy_pagination_option = !empty($fairy_theme_options['fairy-pagination-options']) ? $fairy_theme_options['fairy-pagination-options'] : '';
    if ($fairy_pagination_option == 'ajax') {
        wp_enqueue_script('across-custom-pagination', get_stylesheet_directory_uri() . '/inc/js/custom-infinte-pagination.js', array('jquery'), _S_VERSION, true);
        global $wp_query;
        $paged = (get_query_var('paged') > 1) ? get_query_var('paged') : 1;
        $max_num_pages = $wp_query->max_num_pages;

        wp_localize_script('across-custom-pagination', 'fairy_ajax', array(
            'ajaxurl' => esc_url(admin_url('admin-ajax.php')),
            'paged'     => absint($paged),
            'max_num_pages'      => absint($max_num_pages),
            'next_posts'      => next_posts(absint($max_num_pages), false),
            'show_more'      => __('Load More', 'across'),
            'no_more_posts'        => __('No More', 'across'),
            'pagination_option'  => $fairy_pagination_option
        ));
    }
}

/**
 * Enqueue fonts for the editor style
 */
function across_block_styles()
{

    /*heading  */
    wp_enqueue_style('across-editor-heading-font', '//fonts.googleapis.com/css?family=Poppins:400,500,600,700');

    $across_custom_css = '
    .editor-post-title__block .editor-post-title__input,
    .editor-styles-wrapper h1,
    .editor-styles-wrapper h2,
    .editor-styles-wrapper h3,
    .editor-styles-wrapper h4,
    .editor-styles-wrapper h5,
    .editor-styles-wrapper h6{
        font-family:Muli;
    } 
    ';

    wp_add_inline_style('across-editor-styles', $across_custom_css);
}

add_action('enqueue_block_editor_assets', 'across_block_styles');


/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function across_customize_register($wp_customize)
{

    $default = fairy_default_theme_options_values();

    /*Instagram Feed Area*/
    $wp_customize->add_setting('fairy_options[fairy-footer-instagram]', array(
        'capability'        => 'edit_theme_options',
        'transport' => 'refresh',
        'default'           => $default['fairy-footer-instagram'],
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('fairy_options[fairy-footer-instagram]', array(
        'label'     => __('Instagram Feed ID', 'across'),
        'description' => sprintf(
            '%1$s <a href="%2$s" target="_blank">%3$s</a> %4$s',
            __('Install and Customize', 'across'),
            esc_url('https://wordpress.org/plugins/instagram-feed'),
            __('Instagram Feed Plugin', 'across'),
            __('and paste the shortcodes here. You need to go to the plugins settings after installing it.', 'across')
        ),
        'section'   => 'fairy_footer_section',
        'settings'  => 'fairy_options[fairy-footer-instagram]',
        'type'      => 'text',
        'priority'  => 15,
    ));

    /*Blog Page Pagination Options*/
    $wp_customize->add_setting('fairy_options[fairy-pagination-options]', array(
        'capability'        => 'edit_theme_options',
        'transport' => 'refresh',
        'default'           => $default['fairy-pagination-options'],
        'sanitize_callback' => 'fairy_sanitize_select'
    ));
    $wp_customize->add_control('fairy_options[fairy-pagination-options]', array(
        'choices' => array(
            'default'    => __('Default', 'across'),
            'numeric'    => __('Numeric', 'across'),
            'ajax'    => __('Load More', 'across'),
        ),
        'label'     => __('Pagination Types', 'across'),
        'description' => __('Select the Required Pagination Type', 'across'),
        'section'   => 'fairy_blog_page_section',
        'settings'  => 'fairy_options[fairy-pagination-options]',
        'type'      => 'select',
        'priority'  => 10,
    ));

    //remove upgarde to pro from parent theme 
    $wp_customize->remove_section('fairy');
    $wp_customize->remove_section('fairy_about_theme_section');
    $wp_customize->remove_section('fairy_site_layout_section');
}
add_action('customize_register', 'across_customize_register', 999);

//load widget
require get_stylesheet_directory() . '/inc/widget-init.php';
require get_stylesheet_directory() . '/inc/across-post-featured.php';

//load custom functions
require get_stylesheet_directory() . '/inc/custom-functions.php';

/**
 * Load Dynamic CSS from Customizer
 */
require get_stylesheet_directory() . '/inc/custom-css.php';

/**
 * upgrade to pro
 */
require get_stylesheet_directory() . '/inc/customizer-pro/class-customize.php';

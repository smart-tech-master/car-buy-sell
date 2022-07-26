<?php

/**
 * Dynamic CSS elements.
 *
 * @package Fairy
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}


if (!function_exists('across_dynamic_css')) :
    /**
     * Dynamic CSS
     *
     * @since 1.0.0
     *
     * @param null
     * @return null
     *
     */
    function across_dynamic_css()
    {

        global $fairy_theme_options;
        $across_custom_css = '';
        $primary_color = !empty($fairy_theme_options['fairy-primary-color']) ? esc_html($fairy_theme_options['fairy-primary-color']) : '';

        if (!empty($primary_color)) {

            $across_custom_css .= ".ajax-pagination .show-more { background-color: {$primary_color}; }";

            $across_custom_css .= ".ajax-pagination .show-more { border-color: {$primary_color}; }";
        }
        wp_add_inline_style('fairy-style', $across_custom_css);
    }
endif;
add_action('wp_enqueue_scripts', 'across_dynamic_css', 99);

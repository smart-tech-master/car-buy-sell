<?php
/**
 * Blossomthemes Email Newsletter Functions.
 *
 * @package Feminine_Business
 */

if( ! function_exists( 'feminine_business_add_inner_div' ) ) :
    function feminine_business_add_inner_div(){
        return true;
    }
endif;
add_filter( 'bt_newsletter_widget_inner_wrap_display', 'feminine_business_add_inner_div' );

if( ! function_exists( 'feminine_business_start_inner_div' ) ) :
    function feminine_business_start_inner_div(){
        echo '<div class="container">';
    }
endif;
add_action( 'bt_newsletter_widget_inner_wrap_start', 'feminine_business_start_inner_div' );

if( ! function_exists( 'feminine_business_end_inner_div' ) ) :
    function feminine_business_end_inner_div(){
        echo '</div>';
    }
endif;
add_action( 'bt_newsletter_widget_inner_wrap_close', 'feminine_business_end_inner_div' );

if( ! function_exists( 'feminine_business_shortcode_add_inner_div' ) ) :
    function feminine_business_shortcode_add_inner_div(){
        return true;
    }
endif;
add_filter( 'bt_newsletter_shortcode_inner_wrap_display', 'feminine_business_shortcode_add_inner_div' );

if( ! function_exists( 'feminine_business_shortcode_start_inner_div' ) ) :
    function feminine_business_shortcode_start_inner_div(){
        echo '<div class="container">';
    }
endif;
add_action( 'bt_newsletter_shortcode_inner_wrap_start', 'feminine_business_shortcode_start_inner_div' );

if( ! function_exists( 'feminine_business_shortcode_end_inner_div' ) ) :
    function feminine_business_shortcode_end_inner_div(){
        echo '</div>';
    }
endif;
add_action( 'bt_newsletter_shortcode_inner_wrap_close', 'feminine_business_shortcode_end_inner_div' );
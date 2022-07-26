<?php
/**
 * @package Coupons Deals
 * @subpackage coupons-deals
 * @since coupons-deals 1.0
 * Setup the WordPress core custom header feature.
 * @uses coupons_deals_header_style()
*/

function coupons_deals_custom_header_setup() {

	add_theme_support( 'custom-header', apply_filters( 'coupons_deals_custom_header_args', array(
		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1600,
		'height'                 => 120,
		'flex-width'         	=> true,
        'flex-height'        	=> true,
		'wp-head-callback'       => 'coupons_deals_header_style',
	) ) );
}

add_action( 'after_setup_theme', 'coupons_deals_custom_header_setup' );

if ( ! function_exists( 'coupons_deals_header_style' ) ) :

add_action( 'wp_enqueue_scripts', 'coupons_deals_header_style' );
function coupons_deals_header_style() {
	if ( get_header_image() ) :
	$coupons_deals_custom_css = "
        #header{
			background-image:url('".esc_url(get_header_image())."');
			background-position: center top;
			background-size: 100% 100%;
		}";
	   	wp_add_inline_style( 'coupons-deals-basic-style', $coupons_deals_custom_css );
	endif;
}
endif;
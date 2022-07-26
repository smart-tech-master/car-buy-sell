<?php
/**
 * Custom header
 */

function beauty_salon_spa_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'beauty_salon_spa_custom_header_args', array(
		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1600,
		'height'                 => 100,
		'wp-head-callback'       => 'beauty_salon_spa_header_style',
	) ) );
}

add_action( 'after_setup_theme', 'beauty_salon_spa_custom_header_setup' );

if ( ! function_exists( 'beauty_salon_spa_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see beauty_salon_spa_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'beauty_salon_spa_header_style' );
function beauty_salon_spa_header_style() {
	if ( get_header_image() ) :
	$custom_css = "
        .wrap_figure,.page-template-custom-home-page .wrap_figure{
			background-image:url('".esc_url(get_header_image())."') !important;
			background-position: center top;
		}";
	   	wp_add_inline_style( 'beauty-salon-spa-style', $custom_css );
	endif;
}
endif;
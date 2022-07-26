<?php
/**
 * Front Page Settings
 * 
 * @package Feminine_Business
 */
if ( ! function_exists( 'feminine_business_customize_register_frontpage' ) ) :

function feminine_business_customize_register_frontpage( $wp_customize ) {
	
    /** Front Page Settings */
    $wp_customize->add_panel( 
        'frontpage_settings',
         array(
            'priority'    => 40,
            'capability'  => 'edit_theme_options',
            'title'       => esc_html__( 'Front Page Settings', 'feminine-business' ),
            'description' => esc_html__( 'Static Home Page settings.', 'feminine-business' ),
        ) 
    );    
      
}
endif;
add_action( 'customize_register', 'feminine_business_customize_register_frontpage' );
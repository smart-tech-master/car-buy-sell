<?php
/**
 * General Settings
 * 
 * @package Feminine_Business
 */
if ( ! function_exists( 'feminine_business_customize_register_general_settings' ) ) :

function feminine_business_customize_register_general_settings( $wp_customize ) {
	
    /** General Settings Settings */
    $wp_customize->add_panel( 
        'general_settings',
            array(
            'priority'    => 45,
            'capability'  => 'edit_theme_options',
            'title'       => esc_html__( 'General Settings', 'feminine-business' ),
        ) 
    );    
 
}
endif;
add_action( 'customize_register', 'feminine_business_customize_register_general_settings' );
<?php
/**
 * Appearance Settings
 *
 * @package Feminine_Business
 */
if ( ! function_exists( 'feminine_business_customize_register_appearance' ) ) :

function feminine_business_customize_register_appearance( $wp_customize ) {

    $wp_customize->get_section( 'colors' )->panel               = 'appearance_settings';
    $wp_customize->get_section( 'background_image' )->panel     = 'appearance_settings';
    
    $wp_customize->add_panel( 
        'appearance_settings', 
        array(
            'title'       => __( 'Appearance Settings', 'feminine-business' ),
            'priority'    => 25,
            'capability'  => 'edit_theme_options',
            'description' => __( 'Change color and body background.', 'feminine-business' ),
        ) 
    );
}
endif;
add_action( 'customize_register', 'feminine_business_customize_register_appearance' );
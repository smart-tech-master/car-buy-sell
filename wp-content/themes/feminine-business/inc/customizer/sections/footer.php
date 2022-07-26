<?php
/**
 * Footer Setting
 *
 * @package Feminine_Business
 */
if ( ! function_exists( 'feminine_business_customize_register_footer' ) ) :

function feminine_business_customize_register_footer( $wp_customize ) {
    
    $wp_customize->add_section(
        'footer_settings',
        array(
            'title'      => __( 'Footer Settings', 'feminine-business' ),
            'priority'   => 199,
            'capability' => 'edit_theme_options',
        )
    );
    
    /** Footer Copyright */
    $wp_customize->add_setting(
        'footer_copyright',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'footer_copyright',
        array(
            'label'       => __( 'Footer Copyright Text', 'feminine-business' ),
            'section'     => 'footer_settings',
            'type'        => 'textarea',
        )
    );
    
    $wp_customize->selective_refresh->add_partial( 'footer_copyright', array(
        'selector'        => '.footer-b .site-info .copy-right',
        'render_callback' => 'feminine_business_get_footer_copyright',
    ) );
    
}
endif;
add_action( 'customize_register', 'feminine_business_customize_register_footer' );
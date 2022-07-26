<?php
/**
 * Header Settings
 *
 * @package Feminine_Business
 */
if ( ! function_exists( 'feminine_business_customize_register_header_settings' ) ) :

function feminine_business_customize_register_header_settings( $wp_customize ) {

    /*--------------------------
     * HEADER SECTION
     --------------------------*/
    
    $wp_customize->add_section(
        'header_settings',
        array(
            'panel'     => 'general_settings',
            'title'         => esc_html__( 'Header Settings', 'feminine-business' ),
            'priority'  => 10,
        )
    );
    
    /** Enable Cart */
    $wp_customize->add_setting( 
        'ed_header_cart', 
        array(
            'default'           => false,
            'sanitize_callback' => 'feminine_business_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
        new Feminine_Business_Toggle_Control( 
            $wp_customize,
            'ed_header_cart',
            array(
                'section'         => 'header_settings',
                'label'           => esc_html__( 'Enable Cart', 'feminine-business' ),
                'description'     => esc_html__( 'Enable to show cart icon at header.', 'feminine-business' ),
                'active_callback' => 'is_woocommerce_activated'
            )
        )
    );

    /** Topbar Phone */
    $wp_customize->add_setting(
        'topbar_phone',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'topbar_phone',
        array(
            'section'       => 'header_settings',
            'type'          => 'text',
            'label'         => __( 'Phone', 'feminine-business' ),
        )    
    );

    $wp_customize->selective_refresh->add_partial( 'topbar_phone', array(
        'selector'        => '.right-wrap a.phone',
        'render_callback' => 'feminine_business_topbar_phone',
    ) );

    /** Topbar Email */
    $wp_customize->add_setting(
        'topbar_email',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'topbar_email',
        array(
            'section'       => 'header_settings',
            'type'          => 'text',
            'label'         => __( 'Email', 'feminine-business' ),
        )    
    );

    $wp_customize->selective_refresh->add_partial( 'topbar_email', array(
        'selector'        => '.right-wrap a.email',
        'render_callback' => 'feminine_business_topbar_email',
    ) );

}
endif;
add_action( 'customize_register', 'feminine_business_customize_register_header_settings' );
<?php
/**
 * Top Bar Settings
 *
 * @package Feminine_Business
 */
if ( ! function_exists( 'feminine_business_customize_register_topbar' ) ) :

function feminine_business_customize_register_topbar( $wp_customize ) {

    $wp_customize->add_section(
        'topbar_settings',
        array(
            'panel'     => 'general_settings',
            'title'         => esc_html__( 'Topbar Settings', 'feminine-business' ),
            'priority'  => 9,
        )
    );

    /** Enable Search */
    $wp_customize->add_setting( 
        'ed_topbar', 
        array(
            'default'           => false,
            'sanitize_callback' => 'feminine_business_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
        new Feminine_Business_Toggle_Control( 
            $wp_customize,
            'ed_topbar',
            array(
                'section'     => 'topbar_settings',
                'label'	      => __( 'Enable Topbar', 'feminine-business' ),
                'description' => __( 'Enable to show Topbar at top of the header.', 'feminine-business' ),
            )
        )
    );

    /** Topbar Title */
    $wp_customize->add_setting(
        'topbar_title',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'topbar_title',
        array(
            'section'       => 'topbar_settings',
            'type'          => 'text',
            'label'         => __( 'Topbar Title', 'feminine-business' ),
        )    
    );

    $wp_customize->selective_refresh->add_partial( 'topbar_title', array(
        'selector'        => '.header-t-wrapper .text-holder p',
        'render_callback' => 'feminine_business_topbar_title',
    ) );

    /** Topbar Button Label */
    $wp_customize->add_setting(
        'topbar_btn',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'topbar_btn',
        array(
            'section'       => 'topbar_settings',
            'type'          => 'text',
            'label'         => __( 'Button Label', 'feminine-business' ),
        )    
    );

    $wp_customize->selective_refresh->add_partial( 'topbar_btn', array(
        'selector'        => '.header-t-wrapper .text-holder a',
        'render_callback' => 'feminine_business_topbar_btn',
    ) );

    /** Topbar Button Label */
    $wp_customize->add_setting(
        'topbar_btn_link',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'topbar_btn_link',
        array(
            'section'       => 'topbar_settings',
            'type'          => 'url',
            'label'         => __( 'Button Link', 'feminine-business' ),
        )    
    );  

    /** Open in a New Tab */
    $wp_customize->add_setting( 
        'topbar_btn_target', 
        array(
            'default'           => false,
            'sanitize_callback' => 'feminine_business_sanitize_checkbox'
        ) 
    );

    $wp_customize->add_control(
        new Feminine_Business_Toggle_Control( 
            $wp_customize,
            'topbar_btn_target',
            array(
                'section'     => 'topbar_settings',
                'label'	      => __( 'Open in a new tab', 'feminine-business' ),
                'description' => __( 'Enable to open the link in a new tab.', 'feminine-business' ),
            )
        )
    );

    /*--------------------------
     * TOPBAR SECTION END
     --------------------------*/
}
endif;
add_action( 'customize_register', 'feminine_business_customize_register_topbar' );
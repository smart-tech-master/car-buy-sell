<?php
/**
 * Instagram Settings
 * 
 * @package Feminine_Business
 */
if ( ! function_exists( 'feminine_business_instagram_section' ) ) :

function feminine_business_instagram_section( $wp_customize ){
    
	$wp_customize->add_section( 'instagram_section', 
	    array(
	        'title'         => esc_html__( 'Instagram Section', 'feminine-business' ),
	        'priority'      => 70,
	        'panel'         => 'frontpage_settings'
	    ) 
	);

    $wp_customize->add_setting(
        'ed_instagram_section',
        array(
            'default'           => false,
            'sanitize_callback' => 'feminine_business_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        new Feminine_Business_Toggle_Control( 
            $wp_customize,
            'ed_instagram_section',
            array(
                'section'       => 'instagram_section',
                'label'         => __( 'Enable Instagram Section', 'feminine-business' ),
            )
        )
    ); 

     /** Instagram title */
     $wp_customize->add_setting(
        'instagram_title',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'instagram_title',
        array(
            'section'           => 'instagram_section',
            'label'             => __( 'Section Title', 'feminine-business' ),
            'type'              => 'text',
        )
    );

    $wp_customize->selective_refresh->add_partial( 'instagram_title', array(
        'selector'        => '.instagram-section .section-header h2.section-title',
        'render_callback' => 'feminine_business_instagram_title',
    ) );

    $wp_customize->add_setting(
        'instagram_content',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'instagram_content',
        array(
            'section'           => 'instagram_section',
            'label'             => __( 'Section Description', 'feminine-business' ),
            'type'              => 'text',
        )
    );

    $wp_customize->selective_refresh->add_partial( 'instagram_content', array(
        'selector'        => '.instagram-section .desc',
        'render_callback' => 'feminine_business_instagram_content',
    ) );

    $wp_customize->add_setting(
        'instagram_shortcode',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post',
        )
    );
    
    $wp_customize->add_control(
        'instagram_shortcode',
        array(
            'label'             => __( 'Instagram Shortcode', 'feminine-business' ),
            'description'       => __( 'Please Install and activate Smash Balloon Social Photo Feed and insert the shortcode', 'feminine-business' ),
            'type'              => 'text',
            'section'           => 'instagram_section',
        )
    );
}
endif;
add_action( 'customize_register', 'feminine_business_instagram_section' );
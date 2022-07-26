<?php
/**
 * Newsletter Settings
 * 
 * @package Feminine_Business
 */
if ( ! function_exists( 'feminine_business_newsletter_frontpage_settings' ) ) :

function feminine_business_newsletter_frontpage_settings( $wp_customize ){
    
	$wp_customize->add_section( 'feminine_business_newsletter', 
	    array(
	        'title'         => esc_html__( 'Newsletter Section', 'feminine-business' ),
	        'priority'      => 15,
	        'panel'         => 'frontpage_settings'
	    ) 
	);

    $wp_customize->add_setting(
        'ed_newsletter_section',
        array(
            'default'           => false,
            'sanitize_callback' => 'feminine_business_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        new Feminine_Business_Toggle_Control( 
            $wp_customize,
            'ed_newsletter_section',
            array(
                'section'       => 'feminine_business_newsletter',
                'label'         => __( 'Enable Newsletter Section', 'feminine-business' ),
            )
        )
    ); 

    $wp_customize->add_setting( 'newsletter_img',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control( 
        new WP_Customize_Image_Control( $wp_customize, 'newsletter_img',
            array(
                'label'           => esc_html__( 'Upload an Image', 'feminine-business' ),
                'description'     => esc_html__( 'Choose the image for the newsletter. The recommended image size is 340px by 246px in PNG format.', 'feminine-business' ),
                'section'         => 'feminine_business_newsletter',
                'type'            => 'image',
            )
        )
    );
    $wp_customize->add_setting(
        'newsletter_shortcode',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post',
        )
    );
    
    $wp_customize->add_control(
        'newsletter_shortcode',
        array(
            'label'             => __( 'Newsletter Shortcode', 'feminine-business' ),
            'description'       => __( 'Please download BlossomThemes Email Newsletter and place the shortcode for newsletter section', 'feminine-business' ),
            'type'              => 'text',
            'section'           => 'feminine_business_newsletter',
        )
    );
}
endif;
add_action( 'customize_register', 'feminine_business_newsletter_frontpage_settings' );
<?php
/**
 * Contact Form Settings
 * 
 * @package Feminine_Business
 */
if ( ! function_exists( 'feminine_business_contact_page_form' ) ) :

function feminine_business_contact_page_form( $wp_customize ){
    
	$wp_customize->add_section( 'contact_page_form', 
	    array(
	        'title'         => esc_html__( 'Contact Form Section', 'feminine-business' ),
	        'priority'      => 20,
            'panel'         => 'contact_page_settings',
	    ) 
	);

	$wp_customize->add_setting(
		'contact_form_title',
		array(
			'default'           => __( 'Ready to Talk', 'feminine-business' ),
			'sanitize_callback' => 'sanitize_text_field',
			'transport'			=> 'postMessage'
		)
	);
	
	$wp_customize->add_control(
		'contact_form_title',
		array(
			'section'           => 'contact_page_form',
			'label'             => __( 'Contact Form Title', 'feminine-business' ),
			'type'              => 'text',
		)
	);

	$wp_customize->selective_refresh->add_partial( 'contact_form_title', array(
        'selector'        => '.page-template-contact .contact-main-wrap .contact-wrapper h2.page-title',
        'render_callback' => 'feminine_business_contact_form_title',
    ) );

	$wp_customize->add_setting(
		'contact_form_shortcode',
		array(
			'default'           => '',
			'sanitize_callback' => 'wp_kses_post',
		)
	);
	
	$wp_customize->add_control(
		'contact_form_shortcode',
		array(
			'section'           => 'contact_page_form',
			'label'             => __( 'Contact Form Shortcode', 'feminine-business' ),
            'description'       => __( 'Please generate the shortcode from contact form 7 widget', 'feminine-business' ),
			'type'              => 'text',
		)
	);
}
endif;
add_action( 'customize_register', 'feminine_business_contact_page_form' );
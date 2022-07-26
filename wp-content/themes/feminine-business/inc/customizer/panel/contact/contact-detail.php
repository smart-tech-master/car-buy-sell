<?php
/**
 * Contact Form Settings
 * 
 * @package Feminine_Business
 */
if ( ! function_exists( 'feminine_business_contact_page_info' ) ) :

function feminine_business_contact_page_info( $wp_customize ){
    
	$wp_customize->add_section( 'contact_info_section', 
	    array(
	        'title'         => esc_html__( 'Contact Details Section', 'feminine-business' ),
	        'priority'      => 10,
            'panel'         => 'contact_page_settings',
	    ) 
	);

	$wp_customize->add_setting(
		'contact_page_subtitle',
		array(
			'default'           => __( 'CONTACT US', 'feminine-business' ),
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'postMessage'
		)
	);
	
	$wp_customize->add_control(
		'contact_page_subtitle',
		array(
			'section'           => 'contact_info_section',
			'label'             => __( 'Contact Page Subtitle', 'feminine-business' ),
			'description'       => __( 'Kindly leave this blank if you do not want a page subtitle', 'feminine-business' ),
			'type'              => 'text',
		)
	);

	$wp_customize->selective_refresh->add_partial( 'contact_page_subtitle', array(
        'selector'        => '.page-template-contact .contact-us .contact-wrapper .contact-desc .subtitle',
        'render_callback' => 'feminine_business_contact_page_subtitle',
    ) );

	$wp_customize->add_setting(
		'phone_title',
		array(
			'default'           => __( 'Drop us a line', 'feminine-business' ),
			'sanitize_callback' => 'sanitize_text_field',
			'transport'			=> 'postMessage'
		)
	);
	
	$wp_customize->add_control(
		'phone_title',
		array(
			'section'           => 'contact_info_section',
			'label'             => __( 'Phone Us Title', 'feminine-business' ),
			'type'              => 'text',
		)
	);

	$wp_customize->selective_refresh->add_partial( 'phone_title', array(
        'selector'        => '.page-template-contact .contact-us-wrapper .contact-left .contact-info h3.phone',
        'render_callback' => 'feminine_business_contact_phone_title',
    ) );

	$wp_customize->add_setting(
		'phone_number',
		array(
			'default'           => __( '+1 (800) 123 456 789', 'feminine-business' ),
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	
	$wp_customize->add_control(
		'phone_number',
		array(
			'section'           => 'contact_info_section',
			'label'             => __( 'Phone Number', 'feminine-business' ),
			'description'       => __( 'You can add multiple phone number seperating with comma', 'feminine-business' ),
			'type'              => 'text',
		)
	);

	$wp_customize->add_setting(
		'email_address',
		array(
			'default'           => __( 'info@glfeminine.com', 'feminine-business' ),
			'sanitize_callback' => 'wp_kses_post',
		)
	);
	
	$wp_customize->add_control(
		'email_address',
		array(
			'section'           => 'contact_info_section',
			'label'             => __( 'Email Address', 'feminine-business' ),
			'description'		=> __( 'You can add multiple emails by seperating it with comma. For example: xyz@gmail.com, abc@yahoo.com', 'feminine-business' ), 
			'type'              => 'text',
		)
	);

	$wp_customize->add_setting(
		'contact_hours',
		array(
			'default'           => __( 'Hours of Operation', 'feminine-business' ),
			'sanitize_callback' => 'sanitize_text_field',
			'transport'			=> 'postMessage'
		)
	);
	
	$wp_customize->add_control(
		'contact_hours',
		array(
			'section'           => 'contact_info_section',
			'label'             => __( 'Contact Timing Title', 'feminine-business' ),
			'type'              => 'text',
		)
	);

	$wp_customize->selective_refresh->add_partial( 'contact_hours', array(
        'selector'        => '.page-template-contact .contact-us-wrapper .contact-left .contact-info h3.hours',
        'render_callback' => 'feminine_business_contact_hours',
    ) );

	$wp_customize->add_setting(
		'contact_hrs_content',
		array(
			'default'           => __( 'Monday - Friday: 9am - 4pm EST', 'feminine-business' ),
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	
	$wp_customize->add_control(
		'contact_hrs_content',
		array(
			'section'           => 'contact_info_section',
			'label'             => __( 'Contact Timing Content', 'feminine-business' ),
			'description'       => __( 'You can add multiple contact hours seperating with comma. For example: Monday - Friday: 09.00 - 20.00, Sunday & Saturday: 10.30 - 22.30', 'feminine-business' ),
			'type'              => 'text',
		)
	);

	$wp_customize->add_setting(
		'location_title',
		array(
			'default'           => __( 'Address', 'feminine-business' ),
			'sanitize_callback' => 'sanitize_text_field',
			'transport'			=> 'postMessage'
		)
	);
	
	$wp_customize->add_control(
		'location_title',
		array(
			'section'           => 'contact_info_section',
			'label'             => __( 'Location Title', 'feminine-business' ),
			'type'              => 'text',
		)
	);

	$wp_customize->selective_refresh->add_partial( 'location_title', array(
        'selector'        => '.page-template-contact .contact-us-wrapper .contact-left .contact-info h3.location',
        'render_callback' => 'feminine_business_contact_location_title',
    ) );

	$wp_customize->add_setting(
		'location',
		array(
			'default'           => __( 'Your Business Name 220 Woodland Ave Fairmount MN 56031', 'feminine-business' ),
			'sanitize_callback' => 'sanitize_text_field',
			'transport'			=> 'postMessage'
		)
	);
	
	$wp_customize->add_control(
		'location',
		array(
			'section'           => 'contact_info_section',
			'label'             => __( 'Location Description', 'feminine-business' ),
			'type'              => 'text',
		)
	);

	$wp_customize->selective_refresh->add_partial( 'location', array(
        'selector'        => '.page-template-contact .contact-us-wrapper .contact-left .contact-info .location-content',
        'render_callback' => 'feminine_business_contact_location_description',
    ) );

	$wp_customize->add_setting( 
		'contact_featured_img', 
		array(
			'default' 			=> '',
			'sanitize_callback' => 'esc_url_raw'
    	)
	);
 
    $wp_customize->add_control( 
		new WP_Customize_Image_Control( 
			$wp_customize, 
			'contact_featured_img', 
			array(
				'label'      => __( 'Upload the image', 'feminine-business' ),
				'section'    => 'contact_info_section',
			)
    	)
	);
}
endif;
add_action( 'customize_register', 'feminine_business_contact_page_info' );
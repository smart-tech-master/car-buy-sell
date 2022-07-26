<?php
/**
 * Featured Settings
 * 
 * @package Feminine_Business
 */
if ( ! function_exists( 'feminine_business_home_featured_section' ) ) :

function feminine_business_home_featured_section( $wp_customize ){
    
	$wp_customize->add_section( 'home_featured_post_section', 
	    array(
	        'title'         => esc_html__( 'Featured Section', 'feminine-business' ),
	        'priority'      => 20,
	        'panel'         => 'frontpage_settings'
	    ) 
	);

	$wp_customize->add_setting(
        'ed_featured_post_section',
        array(
            'default'           => false,
            'sanitize_callback' => 'feminine_business_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        new Feminine_Business_Toggle_Control( 
            $wp_customize,
            'ed_featured_post_section',
            array(
                'section'       => 'home_featured_post_section',
                'label'         => __( 'Enable Featured Post Section', 'feminine-business' ),
            )
        )
    ); 

    /** Home Featured title */
	$wp_customize->add_setting(
		'home_featured_title',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'postMessage'
		)
	);
	
	$wp_customize->add_control(
		'home_featured_title',
		array(
			'section'           => 'home_featured_post_section',
			'label'             => __( 'Section Title', 'feminine-business' ),
			'type'              => 'text',
		)
	);

	$wp_customize->selective_refresh->add_partial( 'home_featured_title', array(
        'selector'        => '.welcome-section .welcome-details .section-header h2.section-title',
        'render_callback' => 'feminine_business_home_featured_title',
    ) );

	/** Home Featured description */
	$wp_customize->add_setting(
		'home_featured_content',
		array(
			'default'           => '',
			'sanitize_callback' => 'wp_kses_post',
			'transport'         => 'postMessage'
		)
	);
	
	$wp_customize->add_control(
		'home_featured_content',
		array(
			'section'           => 'home_featured_post_section',
			'label'             => __( 'Section Description', 'feminine-business' ),
			'type'              => 'text',
		)
	);

	$wp_customize->selective_refresh->add_partial( 'home_featured_content', array(
        'selector'        => '.welcome-section .welcome-details .welcome-desc',
        'render_callback' => 'feminine_business_home_featured_content',
    ) );

	/** Featured Button Label */
	$wp_customize->add_setting(
		'home_btn_label',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'			=> 'postMessage',
		)
	);
	
	$wp_customize->add_control(
		'home_btn_label',
		array(
			'label'           => __( 'Button Label', 'feminine-business' ),
			'section'         => 'home_featured_post_section',
			'type'            => 'text',
		)
	);

	$wp_customize->selective_refresh->add_partial( 'home_btn_label', array(
        'selector'        => '.welcome-section .welcome-details .button-wrap .secondary-btn',
        'render_callback' => 'feminine_business_home_btn_label',
    ) );
	
	/** Button Link */
	$wp_customize->add_setting(
		'home_btn_link',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	
	$wp_customize->add_control(
		'home_btn_link',
		array(
			'label'           => __( 'Button Link', 'feminine-business' ),
			'section'         => 'home_featured_post_section',
			'type'            => 'url',
		)
	);

	/** Home Featured Image */
	$wp_customize->add_setting( 
		'home_featured_image', 
		array(
			'default' 			=> '',
			'sanitize_callback' => 'esc_url_raw'
		)
	);
	
	$wp_customize->add_control( 
		new WP_Customize_Image_Control( 
			$wp_customize, 
			'home_featured_image', 
			array(
				'label'      => __( 'Upload the image', 'feminine-business' ),
				'description'=> __( 'The recommended image size is 630px by 547px in PNG format.', 'feminine-business' ),
				'section'    => 'home_featured_post_section',
			)
		)
	);
}
endif;
add_action( 'customize_register', 'feminine_business_home_featured_section' );
<?php
/**
 * Banner Section
 *
 * @package Feminine_Business
 */
if ( ! function_exists( 'feminine_business_customize_register_frontpage_banner' ) ) :

function feminine_business_customize_register_frontpage_banner( $wp_customize ) {
	
    $wp_customize->get_section( 'header_image' )->panel                    = 'frontpage_settings';
    $wp_customize->get_section( 'header_image' )->title                    = esc_html__( 'Banner Section', 'feminine-business' );
    $wp_customize->get_section( 'header_image' )->priority                 = 10;
    $wp_customize->get_control( 'header_image' )->active_callback          = 'feminine_business_banner_ac';
    $wp_customize->get_control( 'header_video' )->active_callback          = 'feminine_business_banner_ac';
    $wp_customize->get_control( 'external_header_video' )->active_callback = 'feminine_business_banner_ac';
    $wp_customize->get_section( 'header_image' )->description              = '';                                               
    $wp_customize->get_setting( 'header_image' )->transport                = 'refresh';
    $wp_customize->get_setting( 'header_video' )->transport                = 'refresh';
    $wp_customize->get_setting( 'external_header_video' )->transport       = 'refresh';
    
    /** Banner Options */
    $wp_customize->add_setting(
		'ed_banner_section',
		array(
			'default'			=> 'slider_banner',
			'sanitize_callback' => 'feminine_business_sanitize_select'
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
    		$wp_customize,
    		'ed_banner_section',
    		array(
                'label'	      => esc_html__( 'Banner Options', 'feminine-business' ),
                'description' => esc_html__( 'Choose banner as static image/video or as a slider.', 'feminine-business' ),
    			'section'     => 'header_image',
                'type'        => 'select',
    			'choices'     => array(
                    'no_banner'        => esc_html__( 'Disable Banner Section', 'feminine-business' ),
                    'static_banner'    => esc_html__( 'Static/Video CTA Banner', 'feminine-business' ),
                    'slider_banner'    => esc_html__( 'Banner as Slider', 'feminine-business' ),
                ),
                'priority'      => 5,
     		)            
        )
	);
    
    /** Title */
    $wp_customize->add_setting(
        'banner_title',
        array(
            'default'           => esc_html__( 'Donec Cras Ut Eget Justo Nec Semper Sapien Viverra Ante', 'feminine-business' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'			=> 'postMessage',
        )
    );
    
    $wp_customize->add_control(
        'banner_title',
        array(
            'label'           => esc_html__( 'Title', 'feminine-business' ),
            'section'         => 'header_image',
            'type'            => 'text',
            'active_callback'   => 'feminine_business_banner_ac'
        )
    );

    $wp_customize->selective_refresh->add_partial( 'banner_title', array(
        'selector'        => '.site-banner .banner-details-wrapper h2.item-title',
        'render_callback' => 'feminine_business_banner_title',
    ) );
    
    /** Content */
    $wp_customize->add_setting(
        'banner_content',
        array(
            'default'           => esc_html__( 'Structured gripped tape invisible moulded cups for sauppor firm hold strong powermesh front liner sport detail.', 'feminine-business' ),
            'sanitize_callback' => 'wp_kses_post',
            'transport'			=> 'postMessage',
        )
    );
    
    $wp_customize->add_control(
        'banner_content',
        array(
            'label'           => esc_html__( 'Description', 'feminine-business' ),
            'section'         => 'header_image',
            'type'            => 'textarea',
            'active_callback'   => 'feminine_business_banner_ac'
        )
    );

    $wp_customize->selective_refresh->add_partial( 'banner_content', array(
        'selector'        => '.site-banner .banner-details-wrapper .banner-desc p',
        'render_callback' => 'feminine_business_banner_content',
    ) );

    /** Banner Button Label */
    $wp_customize->add_setting(
        'banner_btn_label',
        array(
            'default'           => esc_html__( 'Read More', 'feminine-business' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'			=> 'postMessage',
        )
    );
    
    $wp_customize->add_control(
        'banner_btn_label',
        array(
            'label'           => esc_html__( 'Button Label', 'feminine-business' ),
            'section'         => 'header_image',
            'type'            => 'text',
            'active_callback'   => 'feminine_business_banner_ac'
        )
    );

    $wp_customize->selective_refresh->add_partial( 'banner_btn_label', array(
        'selector'        => '.site-banner .banner-details-wrapper .button-wrap a.primary-btn:first-child',
        'render_callback' => 'feminine_business_banner_btn_label',
    ) );
    
    /** Banner Link */
    $wp_customize->add_setting(
        'banner_link',
        array(
            'default'           => '#',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'banner_link',
        array(
            'label'           => esc_html__( 'Button Link', 'feminine-business' ),
            'section'         => 'header_image',
            'type'            => 'url',
            'active_callback'   => 'feminine_business_banner_ac'
        )
    ); 

    $wp_customize->add_setting(
        'banner_btn_two_label',
        array(
            'default'           => esc_html__( 'About Us', 'feminine-business' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'			=> 'postMessage',
        )
    );
    
    $wp_customize->add_control(
        'banner_btn_two_label',
        array(
            'label'           => esc_html__( 'Button 2 Label', 'feminine-business' ),
            'section'         => 'header_image',
            'type'            => 'text',
            'active_callback'   => 'feminine_business_banner_ac'
        )
    );

    $wp_customize->selective_refresh->add_partial( 'banner_btn_two_label', array(
        'selector'        => '.site-banner .banner-details-wrapper .button-wrap a.primary-btn.btn-2',
        'render_callback' => 'feminine_business_banner_btn_two_label',
    ) );
    
    /** Banner Link */
    $wp_customize->add_setting(
        'banner_btn_two_link',
        array(
            'default'           => '#',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'banner_btn_two_link',
        array(
            'label'           => esc_html__( 'Button 2 Link', 'feminine-business' ),
            'section'         => 'header_image',
            'type'            => 'url',
            'active_callback'   => 'feminine_business_banner_ac'
        )
    ); 

    /*======================
    * SLIDER BANNER SETTINGS
    =======================*/
    
    /** Slider Button Label */
    $wp_customize->add_setting(
        'slider_btn_label',
        array(
            'default'           => esc_html__( 'Read More', 'feminine-business' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'			=> 'postMessage',
        )
    );
    
    $wp_customize->add_control(
        'slider_btn_label',
        array(
            'label'           => esc_html__( 'Button Label', 'feminine-business' ),
            'section'         => 'header_image',
            'type'            => 'text',
            'active_callback'   => 'feminine_business_banner_ac'
        )
    );

    $wp_customize->selective_refresh->add_partial( 'slider_btn_label', array(
        'selector'        => '.banner-slider .button-wrap a.primary-btn.btn-1',
        'render_callback' => 'feminine_business_slider_btn_label',
    ) );

    /** Slider Auto */
    $wp_customize->add_setting(
        'slider_auto',
        array(
            'default'           => true,
            'sanitize_callback' => 'feminine_business_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Feminine_Business_Toggle_Control( 
			$wp_customize,
			'slider_auto',
			array(
				'section'     => 'header_image',
				'label'       => __( 'Slider Auto', 'feminine-business' ),
                'description' => __( 'Enable slider auto transition.', 'feminine-business' ),
                'active_callback' => 'feminine_business_banner_ac'
			)
		)
	);
    
    /** Slider Loop */
    $wp_customize->add_setting(
        'slider_loop',
        array(
            'default'           => false,
            'sanitize_callback' => 'feminine_business_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Feminine_Business_Toggle_Control( 
			$wp_customize,
			'slider_loop',
			array(
				'section'     => 'header_image',
				'label'       => __( 'Slider Loop', 'feminine-business' ),
                'description' => __( 'Enable slider loop.', 'feminine-business' ),
                'active_callback' => 'feminine_business_banner_ac'
			)
		)
	);
    
}
endif;
add_action( 'customize_register', 'feminine_business_customize_register_frontpage_banner' );
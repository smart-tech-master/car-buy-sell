<?php
/**
 * Cta Settings
 *
 * @package Feminine_Business
 */
if ( ! function_exists( 'feminine_business_customize_register_home_cta' ) ) :

function feminine_business_customize_register_home_cta( $wp_customize ){

    /** CTA Section Settings  */
    $wp_customize->add_section(
        'cta_section',
        array(
            'title'    => __( 'CTA Section', 'feminine-business' ),
            'priority' => 40,
            'panel'    => 'frontpage_settings',
        )
    );

    $wp_customize->add_setting(
        'ed_cta_section',
        array(
            'default'           => false,
            'sanitize_callback' => 'feminine_business_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        new Feminine_Business_Toggle_Control( 
            $wp_customize,
            'ed_cta_section',
            array(
                'section'       => 'cta_section',
                'label'         => __( 'Enable CTA Section', 'feminine-business' ),
            )
        )
    ); 

    /** Title Text */
    $wp_customize->add_setting( 
        'cta_title', 
        array(
            'default'           => '', 
            'sanitize_callback' => 'sanitize_text_field',
            'transport'			=> 'postMessage',
        ) 
    );
    
    $wp_customize->add_control(
        'cta_title',
        array(
            'section'         => 'cta_section',
            'label'           => __( 'Section Title', 'feminine-business' ),
            'type'            => 'text',
        )   
    );

    $wp_customize->selective_refresh->add_partial( 'cta_title', array(
        'selector'        => '.showup-section .show-desc h4.title',
        'render_callback' => 'feminine_business_get_cta_title',
    ) );

    /** Description Text */
    $wp_customize->add_setting( 
        'cta_subtitle', 
        array(
            'default'           => '', 
            'sanitize_callback' => 'sanitize_text_field',
            'transport'			=> 'postMessage',
        ) 
    );
    
    $wp_customize->add_control(
        'cta_subtitle',
        array(
            'section'         => 'cta_section',
            'label'           => __( 'Section Subtitle', 'feminine-business' ),
            'type'            => 'text',
        )   
    );

    $wp_customize->selective_refresh->add_partial( 'cta_subtitle', array(
        'selector'        => '.showup-section .show-desc p',
        'render_callback' => 'feminine_business_get_cta_subtitle',
    ) );

    /** CTA Background Image */
	$wp_customize->add_setting( 
		'cta_image', 
		array(
			'default' 			=> '' ,
			'sanitize_callback' => 'esc_url_raw'
    	)
	);
 
    $wp_customize->add_control( 
		new WP_Customize_Image_Control( 
			$wp_customize, 
			'cta_image', 
			array(
				'label'      => __( 'Upload an image', 'feminine-business' ),
				'section'    => 'cta_section',
			)
    	)
	);

    /** Contact Button Label */
    $wp_customize->add_setting(
        'cta_contact_lbl',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field', 
            'transport'			=> 'postMessage',
        )
    );
    
    $wp_customize->add_control(
        'cta_contact_lbl',
        array(
            'type'            => 'text',
            'section'         => 'cta_section',
            'label'           => __( 'Button Label', 'feminine-business' ),
        )
    );

    $wp_customize->selective_refresh->add_partial( 'cta_contact_lbl', array(
        'selector'        => '.showup-section .btn-wrap .primary-btn',
        'render_callback' => 'feminine_business_get_cta_contact_lbl',
    ) );

    /** View More Link */
    $wp_customize->add_setting(
        'cta_contact_link',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
        'cta_contact_link',
        array(
            'label'           => __( 'Button Link', 'feminine-business' ),
            'description'     => __( 'The link opens in a new tab', 'feminine-business' ),
            'section'         => 'cta_section',
            'type'            => 'url',
        )
    );

}
endif;
add_action( 'customize_register', 'feminine_business_customize_register_home_cta' );
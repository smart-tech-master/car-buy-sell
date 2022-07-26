<?php
/**
 * Shop Section
 *
 * @package Feminine_Business
 */
if ( ! function_exists( 'feminine_business_customize_register_frontpage_shop' ) ) :

function feminine_business_customize_register_frontpage_shop( $wp_customize ){

    /** Shop Section */
    $wp_customize->add_section(
        'shop_section',
        array(
            'title'           => __( 'Shop Section', 'feminine-business' ),
            'priority'        => 45,
            'panel'           => 'frontpage_settings',
            'active_callback' => 'is_woocommerce_activated'
        )
    );

	$wp_customize->add_setting(
        'ed_shop_section',
        array(
            'default'           => false,
            'sanitize_callback' => 'feminine_business_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        new Feminine_Business_Toggle_Control( 
            $wp_customize,
            'ed_shop_section',
            array(
                'section'       => 'shop_section',
                'label'         => __( 'Enable Shop Section', 'feminine-business' ),
            )
        )
    ); 

    /** Section title */
    $wp_customize->add_setting(
        'shop_section_title',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
			'transport'			=>	'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'shop_section_title',
        array(
            'section' => 'shop_section',
            'label'   => __( 'Section Title', 'feminine-business' ),
            'type'    => 'text',
        )
    );

	$wp_customize->selective_refresh->add_partial( 'shop_section_title', array(
        'selector'        => '.home .product-section .section-header h2.section-title',
        'render_callback' => 'feminine_business_shop_section_title',
    ) );

    /** Section title */
    $wp_customize->add_setting(
        'shop_section_subtitle',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
			'transport'			=>	'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'shop_section_subtitle',
        array(
            'section' => 'shop_section',
            'label'   => __( 'Section Subtitle', 'feminine-business' ),
            'type'    => 'text',
        )
    );

	$wp_customize->selective_refresh->add_partial( 'shop_section_subtitle', array(
        'selector'        => '.home .product-section .desc p',
        'render_callback' => 'feminine_business_shop_section_subtitle',
    ) );

	$wp_customize->add_setting(
		'selected_products_one',
		array(
			'default'			=> '',
			'sanitize_callback' => 'feminine_business_sanitize_select'
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'selected_products_one',
			array(
				'label'       => __( 'Select Product One', 'feminine-business' ),
				'section'     => 'shop_section',
				'choices'     => feminine_business_get_posts( 'product' ),
				'type'        => 'select'
			)
		)
	);
    
    $wp_customize->add_setting(
		'selected_products_two',
		array(
			'default'			=> '',
			'sanitize_callback' => 'feminine_business_sanitize_select'
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'selected_products_two',
			array(
				'label'       => __( 'Select Product Two', 'feminine-business' ),
				'section'     => 'shop_section',
				'choices'     => feminine_business_get_posts( 'product' ),
				'type'        => 'select'
			)
		)
	);

    $wp_customize->add_setting(
		'selected_products_three',
		array(
			'default'			=> '',
			'sanitize_callback' => 'feminine_business_sanitize_select'
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'selected_products_three',
			array(
				'label'       => __( 'Select Product Three', 'feminine-business' ),
				'section'     => 'shop_section',
				'choices'     => feminine_business_get_posts( 'product' ),
                'type'        => 'select'
			)
		)
	);

}
endif;
add_action( 'customize_register', 'feminine_business_customize_register_frontpage_shop' );
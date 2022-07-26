<?php
/**
 * Contact Map Section Theme Option.
 * 
 * @package Feminine_Business
 */
if ( ! function_exists( 'feminine_business_customize_register_map' ) ) :

function feminine_business_customize_register_map( $wp_customize ) {
    
    /** Google Map Settings */
    $wp_customize->add_section(
        'google_map_settings',
        array(
            'title'    => __( 'Google Map Section', 'feminine-business' ),
            'priority' => 30,
            'panel'    => 'contact_page_settings',
        )
    );

    /** Contact Form */
    $wp_customize->add_setting(
        'ed_googlemap',
        array(
            'default'           => true,
            'sanitize_callback' => 'feminine_business_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        new Feminine_Business_Toggle_Control( 
            $wp_customize,
            'ed_googlemap',
            array(
                'section'       => 'google_map_settings',
                'label'         => __( 'Google Map Settings', 'feminine-business' ),
                'description'   => __( 'Disable to hide the Google Map Settings', 'feminine-business' ),
            )
        )
    );

    $wp_customize->add_setting(
		'contact_map_title',
		array(
			'default'           => __( 'Locate Us', 'feminine-business' ),
			'sanitize_callback' => 'sanitize_text_field',
			'transport'			=> 'postMessage'
		)
	);
	
	$wp_customize->add_control(
		'contact_map_title',
		array(
			'section'           => 'google_map_settings',
			'label'             => __( 'Contact Map Title', 'feminine-business' ),
			'type'              => 'text',
            'active_callback'   => 'feminine_business_contact_page_ac'
		)
	);

	$wp_customize->selective_refresh->add_partial( 'contact_map_title', array(
        'selector'        => '.page-template-contact .location-wrapper  h2.page-title',
        'render_callback' => 'feminine_business_contact_map_title',
    ) );

    $wp_customize->add_setting(
        'contact_google_map_iframe',
        array(
            'default'           => '',
            'sanitize_callback' => 'feminine_business_sanitize_google_map_iframe',
        )
    );
    
    $wp_customize->add_control(
        'contact_google_map_iframe',
        array(
            'section'         => 'google_map_settings',
            'label'           => __( 'Embeded Google Map', 'feminine-business' ),
            'type'            => 'text',
            'active_callback' => 'feminine_business_contact_page_ac'
        )
    );

}
endif;
add_action( 'customize_register', 'feminine_business_customize_register_map' );
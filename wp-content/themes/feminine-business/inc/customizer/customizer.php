<?php
/**
 * Feminine Business Theme Customizer
 *
 * @package Feminine_Business
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function feminine_business_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->get_setting( 'background_color' )->transport = 'refresh';
	$wp_customize->get_setting( 'background_image' )->transport = 'refresh';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'feminine_business_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'feminine_business_customize_partial_blogdescription',
			)
		);
	}

	$wp_customize->add_setting(
        'colors_note_control',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post' 
        )
    );

    $wp_customize->add_control(
        new Feminine_Business_Note_Control( 
			$wp_customize,
			'colors_note_control',
			array(
				'section'	  => 'colors',
                'description' => sprintf( __( 'More Color Options: %1$sKnow More.%2$s', 'feminine-business' ), '<a href="' . esc_url( 'https://glthemes.com/wordpress-theme/feminine-business-pro/' ) . '" target="_blank">', '</a>' ),
			)
		)
    );

	$wp_customize->add_section( 
        'typo_settings', 
        array(
            'title'       => __( 'Typography Settings', 'feminine-business' ),
            'priority'    => 100,
			'panel'	      => 'appearance_settings'
        ) 
    );

	$wp_customize->add_setting(
        'typo_note_control',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post' 
        )
    );

    $wp_customize->add_control(
        new Feminine_Business_Note_Control( 
			$wp_customize,
			'typo_note_control',
			array(
				'section'	  => 'typo_settings',
                'description' => sprintf( __( 'More Typography Options: %1$sKnow More.%2$s', 'feminine-business' ), '<a href="' . esc_url( 'https://glthemes.com/wordpress-theme/feminine-business-pro/' ) . '" target="_blank">', '</a>' ),
			)
		)
    );

}
add_action( 'customize_register', 'feminine_business_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function feminine_business_customize_preview_js() {
	wp_enqueue_script( 'feminine-business-customizer', get_template_directory_uri() . '/inc/assets/js/customizer.js', array( 'customize-preview' ), FEMININE_BUSINESS_VERSION, true );
}
add_action( 'customize_preview_init', 'feminine_business_customize_preview_js' );

/**
 * Add misc inline scripts to our controls.
 *
 * We don't want to add these to the controls themselves, as they will be repeated
 * each time the control is initialized.
 */
function feminine_business_customize_script(){

    wp_enqueue_style( 'feminine-business-customize', get_template_directory_uri() . '/inc/assets/css/customize.css', array(), FEMININE_BUSINESS_VERSION );
	wp_enqueue_script( 'feminine-business-customize', get_template_directory_uri() . '/inc/assets/js/customize.js', array( 'jquery', 'customize-controls' ), FEMININE_BUSINESS_VERSION, true );

	$contactpage     = feminine_business_get_page_template_url( 'templates/contact.php', 'page' );

    $fbp_data_array = array(
		'home'    			=> get_permalink( get_option( 'page_on_front' ) ),
		'contactpage' 		=> $contactpage,
    );

    wp_localize_script( 'feminine-business-customize', 'fbp_data', $fbp_data_array );
	
	wp_localize_script( 'feminine-business-repeater', 'feminine_business_customize',
		array(
			'nonce' 	=> wp_create_nonce( 'feminine_business_customize_nonce' ),
			'ajaxurl'   => admin_url( 'admin-ajax.php' ),
		)
	);

}
add_action( 'customize_controls_enqueue_scripts', 'feminine_business_customize_script' );

$feminine_business_panels    = array( 'home', 'general-settings', 'contact' );

$feminine_business_sections  = array( 'footer', 'theme-info', 'layout' );

$feminine_business_sub_sections = array( 
	'general-settings'	=> array ( 'topbar', 'appearance', 'header', 'misc', 'post-page', 'social' ),
	'contact'			=> array ( 'contact-detail', 'contact-form', 'contact-map' ),
	'home'				=> array ( 'banner', 'blog-posts', 'featured-post', 'newsletter', 'cta', 'instagram', 'shop' )
);

foreach( $feminine_business_panels as $panel ){
    require get_template_directory() . '/inc/customizer/panel/' . $panel . '.php';
}

foreach( $feminine_business_sub_sections as $sub => $sec ){
    foreach( $sec as $sections ){        
        require get_template_directory() . '/inc/customizer/panel/' . $sub . '/' . $sections . '.php';
    }
}

foreach( $feminine_business_sections as $section ){
    require get_template_directory() . '/inc/customizer/sections/' . $section . '.php';
}

/**
 * Sanitization functions
 */
require get_template_directory() . '/inc/customizer/sanitization-functions.php';

/**
 *Active callback functions
 */
require get_template_directory() . '/inc/customizer/active-callback.php';

/**
 *Partial refresh functions
 */
require get_template_directory() . '/inc/customizer/partial-refresh.php';
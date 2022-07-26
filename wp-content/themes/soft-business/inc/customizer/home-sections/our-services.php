<?php
/**
 * Our Services options.
 *
 * @package Soft Business
 */

$default = soft_business_get_default_theme_options();

// Featured Our Services Section
$wp_customize->add_section( 'section_our_services',
	array(
	'title'      => __( 'Our Services', 'soft-business' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	'panel'      => 'home_page_panel',
	)
);

// Enable Our Services Section
$wp_customize->add_setting('theme_options[enable_our_services_section]', 
	array(
	'default' 			=> $default['enable_our_services_section'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'soft_business_sanitize_checkbox'
	)
);

$wp_customize->add_control('theme_options[enable_our_services_section]', 
	array(		
	'label' 	=> __('Enable Our Services Section', 'soft-business'),
	'section' 	=> 'section_our_services',
	'settings'  => 'theme_options[enable_our_services_section]',
	'type' 		=> 'checkbox',	
	)
);

// Number of items
$wp_customize->add_setting('theme_options[number_of_our_services_items]', 
	array(
	'default' 			=> $default['number_of_our_services_items'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'soft_business_sanitize_number_range'
	)
);

$wp_customize->add_control('theme_options[number_of_our_services_items]', 
	array(
	'label'       => __('Number Of Items', 'soft-business'),
	'description' => __('Save & Refresh the customizer to see its effect. Maximum is 10.', 'soft-business'),
	'section'     => 'section_our_services',   
	'settings'    => 'theme_options[number_of_our_services_items]',		
	'type'        => 'number',
	'active_callback' => 'soft_business_our_services_active',
	'input_attrs' => array(
			'min'	=> 1,
			'max'	=> 10,
			'step'	=> 1,
		),
	)
);

$wp_customize->add_setting('theme_options[our_services_content_type]', 
	array(
	'default' 			=> $default['our_services_content_type'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'soft_business_sanitize_select'
	)
);

$wp_customize->add_control('theme_options[our_services_content_type]', 
	array(
	'label'       => __('Content Type', 'soft-business'),
	'section'     => 'section_our_services',   
	'settings'    => 'theme_options[our_services_content_type]',		
	'type'        => 'select',
	'active_callback' => 'soft_business_our_services_active',
	'choices'	  => array(
			'our_services_page'	  => __('Page','soft-business'),
			'our_services_post'	  => __('Post','soft-business'),
		),
	)
);

$number_of_our_services_items = soft_business_get_option( 'number_of_our_services_items' );

for( $i=1; $i<=$number_of_our_services_items; $i++ ) {

	// Icon
	$wp_customize->add_setting('theme_options[our_services_icon_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control('theme_options[our_services_icon_'.$i.']', 
		array(
		'label'       => sprintf( __('Select Icon #%1$s', 'soft-business'), $i),
		'description' => sprintf( __('Please input icon as eg: fas fa-home. Find Font Aawesome icons %1$shere%2$s', 'soft-business'), '<a href="' . esc_url( 'https://fontawesome.com/icons' ) . '" target="_blank">', '</a>' ),
		'section'     => 'section_our_services',   
		'settings'    => 'theme_options[our_services_icon_'.$i.']',		
		'active_callback' => 'soft_business_our_services_active',			
		'type'        => 'text',
		)
	);

	// Page
	$wp_customize->add_setting('theme_options[our_services_page_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'soft_business_dropdown_pages'
		)
	);

	$wp_customize->add_control('theme_options[our_services_page_'.$i.']', 
		array(
		'label'       => sprintf( __('Select Page #%1$s', 'soft-business'), $i),
		'section'     => 'section_our_services',   
		'settings'    => 'theme_options[our_services_page_'.$i.']',		
		'type'        => 'dropdown-pages',
		'active_callback' => 'soft_business_our_services_page',
		)
	);

	// Posts
	$wp_customize->add_setting('theme_options[our_services_post_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'soft_business_dropdown_pages'
		)
	);

	$wp_customize->add_control('theme_options[our_services_post_'.$i.']', 
		array(
		'label'       => sprintf( __('Select Post #%1$s', 'soft-business'), $i),
		'section'     => 'section_our_services',   
		'settings'    => 'theme_options[our_services_post_'.$i.']',		
		'type'        => 'select',
		'choices'	  => soft_business_dropdown_posts(),
		'active_callback' => 'soft_business_our_services_post',
		)
	);
}
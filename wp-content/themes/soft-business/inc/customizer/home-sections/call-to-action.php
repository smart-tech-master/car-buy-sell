<?php
/**
 * Call to action options.
 *
 * @package Soft Business
 */

$default = soft_business_get_default_theme_options();

// Call to action section
$wp_customize->add_section( 'section_call_to_action',
	array(
		'title'      => __( 'Call To Action', 'soft-business' ),
		'priority'   => 100,
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		)
);
// Enable Call to action Section
$wp_customize->add_setting('theme_options[enable_call_to_action_section]', 
	array(
	'default' 			=> $default['enable_call_to_action_section'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'soft_business_sanitize_checkbox'
	)
);

$wp_customize->add_control('theme_options[enable_call_to_action_section]', 
	array(		
	'label' 	=> __('Enable Call to action section', 'soft-business'),
	'section' 	=> 'section_call_to_action',
	'settings'  => 'theme_options[enable_call_to_action_section]',
	'type' 		=> 'checkbox',	
	)
);

// Call to action title
$wp_customize->add_setting('theme_options[call_to_action_title]', 
	array(
	'default' 			=> $default['call_to_action_title'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[call_to_action_title]', 
	array(
	'label'       		=> __('Title', 'soft-business'),
	'section'     		=> 'section_call_to_action',   
	'settings'    		=> 'theme_options[call_to_action_title]',
	'active_callback' 	=> 'soft_business_call_to_action_active',		
	'type'        		=> 'text'
	)
);

// Call to action Button Text
$wp_customize->add_setting('theme_options[call_to_action_button_label]', 
	array(
	'default' 			=> $default['call_to_action_button_label'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[call_to_action_button_label]', 
	array(
	'label'       		=> __('Button Label', 'soft-business'),
	'section'     		=> 'section_call_to_action',   
	'settings'    		=> 'theme_options[call_to_action_button_label]',	
	'active_callback' 	=> 'soft_business_call_to_action_active',	
	'type'        		=> 'text'
	)
);

// Call to action Button Url
$wp_customize->add_setting('theme_options[call_to_action_button_url]', 
	array(
	'default' 			=> $default['call_to_action_button_url'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'esc_url_raw'
	)
);

$wp_customize->add_control('theme_options[call_to_action_button_url]', 
	array(
	'label'       		=> __('Button Url', 'soft-business'),
	'section'     		=> 'section_call_to_action',   
	'settings'    		=> 'theme_options[call_to_action_button_url]',	
	'active_callback' 	=> 'soft_business_call_to_action_active',	
	'type'        		=> 'url'
	)
);
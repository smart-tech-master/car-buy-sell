<?php
/**
 * General Layout Settings
 * 
 * @package Feminine_Business
 */
if ( ! function_exists( 'feminine_business_customize_register_layout_general' ) ) :

function feminine_business_customize_register_layout_general( $wp_customize ) {

    $wp_customize->add_section(
        'general_layout_settings',
        array(
            'title'    => __( 'General Sidebar Layout', 'feminine-business' ),
            'priority' => 55,
        )
    );
    
    /** Page Sidebar layout */
    $wp_customize->add_setting( 
        'page_sidebar_layout', 
        array(
            'default'           => 'right-sidebar',
            'sanitize_callback' => 'feminine_business_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
		new Feminine_Business_Radio_Image_Control(
			$wp_customize,
			'page_sidebar_layout',
			array(
				'section'	  => 'general_layout_settings',
				'label'		  => __( 'Page Sidebar Layout', 'feminine-business' ),
				'description' => __( 'This is the general sidebar layout for pages. You can override the sidebar layout for individual page in respective page.', 'feminine-business' ),
				'choices'	  => array(
					'no-sidebar'    => get_template_directory_uri() . '/images/sidebar/general-full.jpg',
					'left-sidebar'  => get_template_directory_uri() . '/images/sidebar/general-left.jpg',
                    'right-sidebar' => get_template_directory_uri() . '/images/sidebar/general-right.jpg',
				)
			)
		)
	);
    
    /** Post Sidebar layout */
    $wp_customize->add_setting( 
        'post_sidebar_layout', 
        array(
            'default'           => 'right-sidebar',
            'sanitize_callback' => 'feminine_business_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
		new Feminine_Business_Radio_Image_Control(
			$wp_customize,
			'post_sidebar_layout',
			array(
				'section'	  => 'general_layout_settings',
				'label'		  => __( 'Post Sidebar Layout', 'feminine-business' ),
				'description' => __( 'This is the general sidebar layout for posts & custom post. You can override the sidebar layout for individual post in respective post.', 'feminine-business' ),
				'choices'	  => array(
					'no-sidebar'    => get_template_directory_uri() . '/images/sidebar/general-full.jpg',
					'left-sidebar'  => get_template_directory_uri() . '/images/sidebar/general-left.jpg',
                    'right-sidebar' => get_template_directory_uri() . '//images/sidebar/general-right.jpg',
				)
			)
		)
	);
    
    /** Post Sidebar layout */
    $wp_customize->add_setting( 
        'layout_style', 
        array(
            'default'           => 'right-sidebar',
            'sanitize_callback' => 'feminine_business_sanitize_radio'
        ) 
    );
    
    $wp_customize->add_control(
		new Feminine_Business_Radio_Image_Control(
			$wp_customize,
			'layout_style',
			array(
				'section'	  => 'general_layout_settings',
				'label'		  => __( 'Default Sidebar Layout', 'feminine-business' ),
				'description' => __( 'This is the general sidebar layout for whole site.', 'feminine-business' ),
				'choices'	  => array(
					'no-sidebar'    => get_template_directory_uri() . '/images/sidebar/general-full.jpg',
                    'left-sidebar'  => get_template_directory_uri() . '/images/sidebar/general-left.jpg',
                    'right-sidebar' => get_template_directory_uri() . '/images/sidebar/general-right.jpg',
				)
			)
		)
	);
    
}
endif;
add_action( 'customize_register', 'feminine_business_customize_register_layout_general' );
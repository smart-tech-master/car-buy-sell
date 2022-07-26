<?php
/**
 * Defines customizer options
 *
 * @package patricia-lite 
 */

function customizer_library_patricia_lite_options() {

	// Theme defaults
	$primary_color = '#ceac92';
	$header_color = '#535353';
	$header_search_bg_color = '#3c4852';
	$widget_title_boder_color = '#eb5424';
	$pagination_bg_color = '#eb5424 ';

	// Stores all the controls that will be added
	$options = array();

	// Stores all the sections to be added
	$sections = array();

	// Stores all the panels to be added
	$panels = array();

	// Adds the sections to the $options array
	$options['sections'] = $sections;

	/**-----------------
	 * Theme Settings
	 -----------------*/
	$panel = 'vt-panel-layout';
	
    $panels[] = array(
        'id' => $panel,
        'title' => __( 'Theme Settings', 'patricia-lite' ),
        'priority' => '30'
    );
	

	/**-----------------
	 * Header Settings
	 -----------------*/
	$section = 'header_image';
    
	$sections[] = array(
		'id' => $section,
		'title' => __( 'Header', 'patricia-lite' ),
		'priority' => '20',
		'panel' => $panel
	);
	
	$options['patricia_lite_header_social'] = array(
		'id' => 'patricia_lite_header_social',
		'label'   => __( 'Display Header Social Icons', 'patricia-lite' ),
		'section' => $section,
		'type'    => 'ios',
		'default' => 1
	);
	$options['patricia_lite_header_search'] = array(
		'id' => 'patricia_lite_header_search',
		'label'   => __( 'Display Header Search', 'patricia-lite' ),
		'section' => $section,
		'type'    => 'ios',
		'default' => 1
	);
	$options['patricia_lite_header_overlay'] = array(
		'id' => 'patricia_lite_header_overlay',
		'label'   => __( 'Enable Image Overlay', 'patricia-lite' ),
		'section' => $section,
		'type'    => 'ios',
		'priority' => '30',
		'default' => 1
	);
	
	// Social Media Settings
    $section = 'vt-site-layout-section-socmed';
	
    $sections[] = array(
        'id' => $section,
        'title' => __( 'Social Media Profile', 'patricia-lite' ),
		'description'  => __('Enter social media profile links', 'patricia-lite'),
        'priority' => '30',
		'panel' => $panel
    );
	
    $options['patricia_lite_facebook'] = array(
        'id' => 'patricia_lite_facebook',
        'label'   => __( 'Facebook', 'patricia-lite' ),
        'section' => $section,
        'type'    => 'url',
        'default' => ''
    );
	$options['patricia_lite_twitter'] = array(
        'id' => 'patricia_lite_twitter',
        'label'   => __( 'Twitter', 'patricia-lite' ),
        'section' => $section,
        'type'    => 'url',
        'default' => ''
    );
	$options['patricia_lite_linkedin'] = array(
        'id' => 'patricia_lite_linkedin',
        'label'   => __( 'Linkedin', 'patricia-lite' ),
        'section' => $section,
        'type'    => 'url',
        'default' => ''
    );
	$options['patricia_lite_pinterest'] = array(
        'id' => 'patricia_lite_pinterest',
        'label'   => __( 'Pinterest', 'patricia-lite' ),
        'section' => $section,
        'type'    => 'url',
        'default' => ''
    );
	$options['patricia_lite_instagram'] = array(
        'id' => 'patricia_lite_instagram',
        'label'   => __( 'Instagram', 'patricia-lite' ),
        'section' => $section,
        'type'    => 'url',
        'default' => ''
    );
	$options['patricia_lite_youtube'] = array(
        'id' => 'patricia_lite_youtube',
        'label'   => __( 'Youtube', 'patricia-lite' ),
        'section' => $section,
        'type'    => 'url',
        'default' => ''
    );
	
	// Featured slider
    $section = 'vt-section-slider';

	$sections[] = array(
		'id' => $section,
		'title' => __( 'Featured Slider', 'patricia-lite' ),
		'priority' => '40',
		'panel' => $panel
	);
	
	$options['patricia_lite_featured_slider'] = array(
		'id' => 'patricia_lite_featured_slider',
		'label'   => __( 'Enable Featured Slider', 'patricia-lite' ),
		'section' => $section,
		'type'    => 'ios',
		'default' => 0,
		'priority' => '5'
	);	
	
	$options['patricia_lite_featured_slider_slides'] = array(
        'id' => 'patricia_lite_featured_slider_slides',
        'label'   => __( 'Amount of Slides', 'patricia-lite' ),
        'section' => $section,
        'type'    => 'number',
        'default' => 5,
		'priority' => '7'
    );
	
	/**-----------------
	 * Blog Settings
	 -----------------*/
	$section = 'theme-settings';

	$sections[] = array(
		'id' => $section,
		'title' => __( 'Blog Settings', 'patricia-lite' ),
		'priority' => '50',
		'panel' => $panel
	);

    $choices = array(
		'layout-grid' => __('Grid Layout', 'patricia-lite'),
		'layout-standard' => __('Standard Layout', 'patricia-lite'),
			
    );
    $options['blog-page-layout'] = array(
        'id' => 'blog-page-layout',
        'label'   => __( 'Homepage Layout', 'patricia-lite' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $choices,
        'default' => 'layout-grid'
    );
	
	$choices = array(
		'layout-grid' => __('Grid Layout', 'patricia-lite'),
		'layout-standard' => __('Standard Layout', 'patricia-lite'),
			
    );
    $options['archive-page-layout'] = array(
        'id' => 'archive-page-layout',
        'label'   => __( 'Archive Layout', 'patricia-lite' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $choices,
        'default' => 'layout-grid'
    );
	
	$options['patricia_lite_entry_excerpt'] = array(
		'id' => 'patricia_lite_entry_excerpt',
		'label'   => __( 'Number of words to show on excerpt', 'patricia-lite' ),
		'section' => $section,
        'type'    => 'number',
        'default' => 38,
        'description' => __( 'Default: 38', 'patricia-lite' )		
	);
	
	$options['patricia_lite_sticky_sidebar'] = array(
		'id' => 'patricia_lite_sticky_sidebar',
		'label'   => __( 'Enable Sticky Sidebar', 'patricia-lite' ),
		'section' => $section,
		'type'    => 'ios',
		'default' => 1,
	);
	$options['button_up'] = array(
		'id' => 'button_up',
		'label'   => __( 'Enable "BackToTop" button', 'patricia-lite' ),
		'section' => $section,
		'type'    => 'ios',
		'default' => 1,
	);
	
	/**-----------------
	 * Single Posts 
	 -----------------*/
	$section = 'patricia_lite_single_post_section';

	$sections[] = array(
		'id' => $section,
		'title' => __( 'Single Post', 'patricia-lite' ),
		'priority' => '60',
		'panel' => $panel
	);
	
	$options['single-tags-on'] = array(
		'id' => 'single-tags-on',
		'label'   => __( 'Display Post Tags', 'patricia-lite' ),
		'section' => $section,
		'type'    => 'ios',
		'default' => 1,
	);
	$options['single-post-nav'] = array(
		'id' => 'single-post-nav',
		'label'   => __( 'Display Post Nav', 'patricia-lite' ),
		'section' => $section,
		'type'    => 'ios',
		'default' => 1,
	);
	$options['related-posts-on'] = array(
		'id' => 'related-posts-on',
		'label'   => __( 'Display Related posts', 'patricia-lite' ),
		'section' => $section,
		'type'    => 'ios',
		'default' => 1,
	);
	
	// Footer Settings
    $section = 'vt-site-layout-section-footer';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Footer', 'patricia-lite' ),
        'priority' => '110',
		'panel' => $panel
    );
	$options['patricia_footer_logo'] = array(
		'id' => 'patricia_footer_logo',
		'label'   => __( 'Footer Logo', 'patricia-lite' ),
		'section' => $section,
		'type'    => 'upload',
		'default' => ''
	);
	$options['patricia_lite_footer_social'] = array(
		'id' => 'patricia_lite_footer_social',
		'label'   => __( 'Display Social Profile', 'patricia-lite' ),
		'section' => $section,
		'type'    => 'ios',
		'default' => 1,
	);
	
	/**-----------------
	 * Color Settings
	 -----------------*/
    $panel = 'vt-colors-settings';

    $panels[] = array(
        'id' => $panel,
        'title' => __( 'Color Settings', 'patricia-lite' ),
        'priority' => '80'
    );
    
    $section = 'colors';
	
	$options['patricia_lite_color_scheme'] = array(
        'id' => 'patricia_lite_color_scheme',
        'label'   => __( 'Color Scheme', 'patricia-lite' ),
        'section' => $section,
        'type'    => 'color',
        'default' => $primary_color,
    );
	
	$options['patricia_lite_topbar_bg_color'] = array(
        'id' => 'patricia_lite_topbar_bg_color',
        'label'   => __( 'Topbar Background', 'patricia-lite' ),
        'section' => $section,
        'type'    => 'color',
        'default' => '#f7f2ee'
    );
	
	$options['menu_link_color'] = array(
        'id' => 'menu_link_color',
        'label'   => __( 'Menu Link Color', 'patricia-lite' ),
        'section' => $section,
        'type'    => 'color',
		'default' => '#535353'
    );
	
	$options['menu_link_hover_color'] = array(
        'id' => 'menu_link_hover_color',
        'label'   => __( 'Menu Link Hover Color', 'patricia-lite' ),
        'section' => $section,
        'type'    => 'color',
        'default' => $primary_color,
    );
	
    $options['patricia_lite_header_bg_color'] = array(
        'id' => 'patricia_lite_header_bg_color',
        'label'   => __( 'Header Background', 'patricia-lite' ),
        'section' => $section,
        'type'    => 'color',
		'default' => '#ffffff'
    );
	$options['patricia_lite_site_title_color'] = array(
        'id' => 'patricia_lite_site_title_color',
        'label'   => __( 'Site Title Color', 'patricia-lite' ),
        'section' => $section,
        'type'    => 'color',
		'default' => $header_color,
    );
	$options['patricia_lite_site_desc_color'] = array(
        'id' => 'patricia_lite_site_desc_color',
        'label'   => __( 'Site Tagline Color', 'patricia-lite' ),
        'section' => $section,
        'type'    => 'color',
        'default' => '#757575'
    );
    $options['patricia_lite_footer_bg_color'] = array(
        'id' => 'patricia_lite_footer_bg_color',
        'label'   => __( 'Footer Background', 'patricia-lite' ),
        'section' => $section,
        'type'    => 'color',
		'default' => '#f7f2ee'
    );
	$options['footer_text_color'] = array(
        'id' => 'footer_text_color',
        'label'   => __( 'Footer Text Color', 'patricia-lite' ),
        'section' => $section,
        'type'    => 'color',
		'default' => '#595959'
    );
	$options['footer_link_color'] = array(
        'id' => 'footer_link_color',
        'label'   => __( 'Footer Link Color', 'patricia-lite' ),
        'section' => $section,
        'type'    => 'color',
		'default' => '#222222'
    );
	
	// Adds the sections to the $options array
	$options['sections'] = $sections;

	// Adds the panels to the $options array
	$options['panels'] = $panels;

	$customizer_library = Customizer_Library::Instance();
	$customizer_library->add_options( $options );

	// To delete custom mods use: customizer_library_remove_theme_mods();

}
add_action( 'init', 'customizer_library_patricia_lite_options' );

function patricia_lite_register_theme_customizer( $wp_customize ){
	
    // Featured Cat
	$wp_customize->add_setting( 'patricia_lite_featured_cat', array(
		'capability'        => 'edit_theme_options',
		'transport' 		=> 'refresh',
		'default'			=> '',
		'sanitize_callback' => 'absint'
	) );
	
	$wp_customize->add_control(
		new WP_Customize_Category_Control(
			$wp_customize,
			'patricia_lite_featured_cat',
			array(
				'label'			=> __('Select Featured Category', 'patricia-lite'),
				'description'	=> __('Choose category to show the slider.', 'patricia-lite'),
				'settings' 	 	=> 'patricia_lite_featured_cat',
				'section'		=> 'vt-section-slider',
				'type'      	=> 'category_dropdown',
				'priority' 		=> '6'
			)
		)
	);
	
}
add_action( 'customize_register', 'patricia_lite_register_theme_customizer' );
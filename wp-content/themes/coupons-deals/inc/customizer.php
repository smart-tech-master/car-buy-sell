<?php
/**
 * Coupons Deals Theme Customizer
 * @package Coupons Deals
 */

load_template( trailingslashit( get_template_directory() ) . '/inc/logo-sizer.php' );
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function coupons_deals_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . 'inc/custom-control.php' );
	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-changer.php' );

	$wp_customize->add_setting( 'coupons_deals_logo_sizer',array(
		'default' => 50,
		'transport' => 'refresh',
		'sanitize_callback' => 'coupons_deals_sanitize_integer'
	));
	$wp_customize->add_control( new Coupons_Deals_Custom_Control( $wp_customize, 'coupons_deals_logo_sizer',array(
		'label' => esc_html__( 'Logo Sizer','coupons-deals' ),
		'section' => 'title_tagline',
		'priority'    => 9,
		'input_attrs' => array(
			'min' => 0,
			'max' => 100,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting('coupons_deals_site_title_enable',array(
       'default' => true,
       'sanitize_callback'	=> 'coupons_deals_sanitize_checkbox'
    ));
    $wp_customize->add_control('coupons_deals_site_title_enable',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Site Title','coupons-deals'),
       'section' => 'title_tagline'
    ));

    $wp_customize->add_setting('coupons_deals_site_title_font_size',array(
		'default'=> 30,
		'transport' => 'refresh',
		'sanitize_callback' => 'coupons_deals_sanitize_integer'
	));
	$wp_customize->add_control(new Coupons_Deals_Custom_Control( $wp_customize, 'coupons_deals_site_title_font_size',array(
		'label' => esc_html__( 'Site Title Font Size (px)','coupons-deals' ),
		'section'=> 'title_tagline',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
	)));

    $wp_customize->add_setting('coupons_deals_site_tagline_enable',array(
       'default' => true,
       'sanitize_callback'	=> 'coupons_deals_sanitize_checkbox'
    ));
    $wp_customize->add_control('coupons_deals_site_tagline_enable',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Site Tagline','coupons-deals'),
       'section' => 'title_tagline'
    ));

    $wp_customize->add_setting('coupons_deals_site_tagline_font_size',array(
		'default'=> 12,
		'transport' => 'refresh',
		'sanitize_callback' => 'coupons_deals_sanitize_integer'
	));
	$wp_customize->add_control(new Coupons_Deals_Custom_Control( $wp_customize, 'coupons_deals_site_tagline_font_size',array(
		'label' => esc_html__( 'Site Tagline Font Size (px)','coupons-deals' ),
		'section'=> 'title_tagline',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
	)));

    $wp_customize->add_setting('coupons_deals_site_logo_inline',array(
       'default' => false,
       'sanitize_callback'	=> 'coupons_deals_sanitize_checkbox'
    ));
    $wp_customize->add_control('coupons_deals_site_logo_inline',array(
       'type' => 'checkbox',
       'label' => __('Site logo inline with site title','coupons-deals'),
       'section' => 'title_tagline',
    ));

    $wp_customize->add_setting('coupons_deals_background_skin',array(
        'default' => 'Without Background',
        'sanitize_callback' => 'coupons_deals_sanitize_choices'
	));
	$wp_customize->add_control('coupons_deals_background_skin',array(
        'type' => 'radio',
        'label' => __('Background Skin','coupons-deals'),
        'description' => __('Here you can add the background skin along with the background image.','coupons-deals'),
        'section' => 'background_image',
        'choices' => array(
            'With Background' => __('With Background Skin','coupons-deals'),
            'Without Background' => __('Without Background Skin','coupons-deals'),
        ),
	) );

	//add home page setting pannel
	$wp_customize->add_panel( 'coupons_deals_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Theme Settings', 'coupons-deals' ),
	    'description' => __( 'Description of what this panel does.', 'coupons-deals' ),
	) );

	$coupons_deals_font_array = array(
		''                       => 'No Fonts',
		'Abril Fatface'          => 'Abril Fatface',
		'Acme'                   => 'Acme',
		'Anton'                  => 'Anton',
		'Architects Daughter'    => 'Architects Daughter',
		'Arimo'                  => 'Arimo',
		'Arsenal'                => 'Arsenal',
		'Arvo'                   => 'Arvo',
		'Alegreya'               => 'Alegreya',
		'Alfa Slab One'          => 'Alfa Slab One',
		'Averia Serif Libre'     => 'Averia Serif Libre',
		'Bangers'                => 'Bangers',
		'Boogaloo'               => 'Boogaloo',
		'Bad Script'             => 'Bad Script',
		'Bitter'                 => 'Bitter',
		'Bree Serif'             => 'Bree Serif',
		'BenchNine'              => 'BenchNine',
		'Cabin'                  => 'Cabin',
		'Cardo'                  => 'Cardo',
		'Courgette'              => 'Courgette',
		'Cherry Swash'           => 'Cherry Swash',
		'Cormorant Garamond'     => 'Cormorant Garamond',
		'Crimson Text'           => 'Crimson Text',
		'Cuprum'                 => 'Cuprum',
		'Cookie'                 => 'Cookie',
		'Chewy'                  => 'Chewy',
		'Days One'               => 'Days One',
		'Dosis'                  => 'Dosis',
		'Droid Sans'             => 'Droid Sans',
		'Economica'              => 'Economica',
		'Fredoka One'            => 'Fredoka One',
		'Fjalla One'             => 'Fjalla One', 
		'Francois One'           => 'Francois One',
		'Frank Ruhl Libre'       => 'Frank Ruhl Libre',
		'Gloria Hallelujah'      => 'Gloria Hallelujah',
		'Great Vibes'            => 'Great Vibes',
		'Handlee'                => 'Handlee',
		'Hammersmith One'        => 'Hammersmith One',
		'Inconsolata'            => 'Inconsolata',
		'Indie Flower'           => 'Indie Flower', 
		'IM Fell English SC'     => 'IM Fell English SC',
		'Julius Sans One'        => 'Julius Sans One',
		'Josefin Slab'           => 'Josefin Slab',
		'Josefin Sans'           => 'Josefin Sans',
		'Kanit'                  => 'Kanit', 
		'Lobster'                => 'Lobster',
		'Lato'                   => 'Lato',
		'Lora'                   => 'Lora',
		'Libre Baskerville'      => 'Libre Baskerville',
		'Lobster Two'            => 'Lobster Two', 
		'Merriweather'           => 'Merriweather',
		'Monda'                  => 'Monda', 
		'Montserrat'             => 'Montserrat',
		'Muli'                   => 'Muli', 
		'Marck Script'           => 'Marck Script', 
		'Noto Serif'             => 'Noto Serif', 
		'Open Sans'              => 'Open Sans', 
		'Overpass'               => 'Overpass',
		'Overpass Mono'          => 'Overpass Mono',
		'Oxygen'                 => 'Oxygen', 
		'Orbitron'               => 'Orbitron',
		'Patua One'              => 'Patua One',
		'Pacifico'               => 'Pacifico',
		'Padauk'                 => 'Padauk',
		'Playball'               => 'Playball',
		'Playfair Display'       => 'Playfair Display', 
		'PT Sans'                => 'PT Sans',
		'Philosopher'            => 'Philosopher',
		'Permanent Marker'       => 'Permanent Marker',
		'Poiret One'             => 'Poiret One',
		'Quicksand'              => 'Quicksand',
		'Quattrocento Sans'      => 'Quattrocento Sans',
		'Raleway'                => 'Raleway',
		'Rubik'                  => 'Rubik', 
		'Rokkitt'                => 'Rokkitt',
		'Russo One'              => 'Russo One',
		'Righteous'              => 'Righteous',
		'Slabo'                  => 'Slabo', 
		'Source Sans Pro'        => 'Source Sans Pro',
		'Shadows Into Light Two' => 'Shadows Into Light Two', 
		'Shadows Into Light'     => 'Shadows Into Light',
		'Sacramento'             => 'Sacramento',
		'Shrikhand'              => 'Shrikhand',
		'Tangerine'              => 'Tangerine',
		'Ubuntu'                 => 'Ubuntu',
		'VT323'                  => 'VT323',
		'Varela Round'           => 'Varela Round',
		'Vampiro One'            => 'Vampiro One',
		'Vollkorn'               => 'Vollkorn', 
		'Volkhov'                => 'Volkhov',
		'Yanone Kaffeesatz'      => 'Yanone Kaffeesatz'
	);

	//Typography
	$wp_customize->add_section('coupons_deals_typography', array(
		'title'    => __('Typography', 'coupons-deals'),
		'panel'    => 'coupons_deals_panel_id',
	));

	// This is Paragraph Color picker setting
	$wp_customize->add_setting('coupons_deals_paragraph_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'coupons_deals_paragraph_color', array(
		'label'    => __('Paragraph Color', 'coupons-deals'),
		'section'  => 'coupons_deals_typography',
		'settings' => 'coupons_deals_paragraph_color',
	)));

	//This is Paragraph FontFamily picker setting
	$wp_customize->add_setting('coupons_deals_paragraph_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'coupons_deals_sanitize_choices',
	));
	$wp_customize->add_control(	'coupons_deals_paragraph_font_family', array(
		'section' => 'coupons_deals_typography',
		'label'   => __('Paragraph Fonts', 'coupons-deals'),
		'type'    => 'select',
		'choices' => $coupons_deals_font_array,
	));

	$wp_customize->add_setting('coupons_deals_paragraph_font_size', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('coupons_deals_paragraph_font_size', array(
		'label'   => __('Paragraph Font Size', 'coupons-deals'),
		'section' => 'coupons_deals_typography',
		'setting' => 'coupons_deals_paragraph_font_size',
		'type'    => 'text',
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting('coupons_deals_atag_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'coupons_deals_atag_color', array(
		'label'    => __('"a" Tag Color', 'coupons-deals'),
		'section'  => 'coupons_deals_typography',
		'settings' => 'coupons_deals_atag_color',
	)));

	//This is "a" Tag FontFamily picker setting
	$wp_customize->add_setting('coupons_deals_atag_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'coupons_deals_sanitize_choices',
	));
	$wp_customize->add_control(	'coupons_deals_atag_font_family', array(
		'section' => 'coupons_deals_typography',
		'label'   => __('"a" Tag Fonts', 'coupons-deals'),
		'type'    => 'select',
		'choices' => $coupons_deals_font_array,
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting('coupons_deals_li_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'coupons_deals_li_color', array(
		'label'    => __('"li" Tag Color', 'coupons-deals'),
		'section'  => 'coupons_deals_typography',
		'settings' => 'coupons_deals_li_color',
	)));

	//This is "li" Tag FontFamily picker setting
	$wp_customize->add_setting('coupons_deals_li_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'coupons_deals_sanitize_choices',
	));
	$wp_customize->add_control(	'coupons_deals_li_font_family', array(
		'section' => 'coupons_deals_typography',
		'label'   => __('"li" Tag Fonts', 'coupons-deals'),
		'type'    => 'select',
		'choices' => $coupons_deals_font_array,
	));

	// This is H1 Color picker setting
	$wp_customize->add_setting('coupons_deals_h1_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'coupons_deals_h1_color', array(
		'label'    => __('H1 Color', 'coupons-deals'),
		'section'  => 'coupons_deals_typography',
		'settings' => 'coupons_deals_h1_color',
	)));

	//This is H1 FontFamily picker setting
	$wp_customize->add_setting('coupons_deals_h1_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'coupons_deals_sanitize_choices',
	));
	$wp_customize->add_control('coupons_deals_h1_font_family', array(
		'section' => 'coupons_deals_typography',
		'label'   => __('H1 Fonts', 'coupons-deals'),
		'type'    => 'select',
		'choices' => $coupons_deals_font_array,
	));

	//This is H1 FontSize setting
	$wp_customize->add_setting('coupons_deals_h1_font_size', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('coupons_deals_h1_font_size', array(
		'label'   => __('H1 Font Size', 'coupons-deals'),
		'section' => 'coupons_deals_typography',
		'setting' => 'coupons_deals_h1_font_size',
		'type'    => 'text',
	));

	// This is H2 Color picker setting
	$wp_customize->add_setting('coupons_deals_h2_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'coupons_deals_h2_color', array(
		'label'    => __('h2 Color', 'coupons-deals'),
		'section'  => 'coupons_deals_typography',
		'settings' => 'coupons_deals_h2_color',
	)));

	//This is H2 FontFamily picker setting
	$wp_customize->add_setting('coupons_deals_h2_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'coupons_deals_sanitize_choices',
	));
	$wp_customize->add_control(
	'coupons_deals_h2_font_family', array(
		'section' => 'coupons_deals_typography',
		'label'   => __('h2 Fonts', 'coupons-deals'),
		'type'    => 'select',
		'choices' => $coupons_deals_font_array,
	));

	//This is H2 FontSize setting
	$wp_customize->add_setting('coupons_deals_h2_font_size', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('coupons_deals_h2_font_size', array(
		'label'   => __('H2 Font Size', 'coupons-deals'),
		'section' => 'coupons_deals_typography',
		'setting' => 'coupons_deals_h2_font_size',
		'type'    => 'text',
	));

	// This is H3 Color picker setting
	$wp_customize->add_setting('coupons_deals_h3_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'coupons_deals_h3_color', array(
		'label'    => __('H3 Color', 'coupons-deals'),
		'section'  => 'coupons_deals_typography',
		'settings' => 'coupons_deals_h3_color',
	)));

	//This is H3 FontFamily picker setting
	$wp_customize->add_setting('coupons_deals_h3_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'coupons_deals_sanitize_choices',
	));
	$wp_customize->add_control(
	'coupons_deals_h3_font_family', array(
		'section' => 'coupons_deals_typography',
		'label'   => __('H3 Fonts', 'coupons-deals'),
		'type'    => 'select',
		'choices' => $coupons_deals_font_array,
	));

	//This is H3 FontSize setting
	$wp_customize->add_setting('coupons_deals_h3_font_size', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('coupons_deals_h3_font_size', array(
		'label'   => __('H3 Font Size', 'coupons-deals'),
		'section' => 'coupons_deals_typography',
		'setting' => 'coupons_deals_h3_font_size',
		'type'    => 'text',
	));

	// This is H4 Color picker setting
	$wp_customize->add_setting('coupons_deals_h4_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'coupons_deals_h4_color', array(
		'label'    => __('H4 Color', 'coupons-deals'),
		'section'  => 'coupons_deals_typography',
		'settings' => 'coupons_deals_h4_color',
	)));

	//This is H4 FontFamily picker setting
	$wp_customize->add_setting('coupons_deals_h4_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'coupons_deals_sanitize_choices',
	));
	$wp_customize->add_control('coupons_deals_h4_font_family', array(
		'section' => 'coupons_deals_typography',
		'label'   => __('H4 Fonts', 'coupons-deals'),
		'type'    => 'select',
		'choices' => $coupons_deals_font_array,
	));

	//This is H4 FontSize setting
	$wp_customize->add_setting('coupons_deals_h4_font_size', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('coupons_deals_h4_font_size', array(
		'label'   => __('H4 Font Size', 'coupons-deals'),
		'section' => 'coupons_deals_typography',
		'setting' => 'coupons_deals_h4_font_size',
		'type'    => 'text',
	));

	// This is H5 Color picker setting
	$wp_customize->add_setting('coupons_deals_h5_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'coupons_deals_h5_color', array(
		'label'    => __('H5 Color', 'coupons-deals'),
		'section'  => 'coupons_deals_typography',
		'settings' => 'coupons_deals_h5_color',
	)));

	//This is H5 FontFamily picker setting
	$wp_customize->add_setting('coupons_deals_h5_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'coupons_deals_sanitize_choices',
	));
	$wp_customize->add_control('coupons_deals_h5_font_family', array(
		'section' => 'coupons_deals_typography',
		'label'   => __('H5 Fonts', 'coupons-deals'),
		'type'    => 'select',
		'choices' => $coupons_deals_font_array,
	));

	//This is H5 FontSize setting
	$wp_customize->add_setting('coupons_deals_h5_font_size', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('coupons_deals_h5_font_size', array(
		'label'   => __('H5 Font Size', 'coupons-deals'),
		'section' => 'coupons_deals_typography',
		'setting' => 'coupons_deals_h5_font_size',
		'type'    => 'text',
	));

	// This is H6 Color picker setting
	$wp_customize->add_setting('coupons_deals_h6_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'coupons_deals_h6_color', array(
		'label'    => __('H6 Color', 'coupons-deals'),
		'section'  => 'coupons_deals_typography',
		'settings' => 'coupons_deals_h6_color',
	)));

	//This is H6 FontFamily picker setting
	$wp_customize->add_setting('coupons_deals_h6_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'coupons_deals_sanitize_choices',
	));
	$wp_customize->add_control('coupons_deals_h6_font_family', array(
		'section' => 'coupons_deals_typography',
		'label'   => __('H6 Fonts', 'coupons-deals'),
		'type'    => 'select',
		'choices' => $coupons_deals_font_array,
	));

	//This is H6 FontSize setting
	$wp_customize->add_setting('coupons_deals_h6_font_size', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('coupons_deals_h6_font_size', array(
		'label'   => __('H6 Font Size', 'coupons-deals'),
		'section' => 'coupons_deals_typography',
		'setting' => 'coupons_deals_h6_font_size',
		'type'    => 'text',
	));

	//layout setting
	$wp_customize->add_section( 'coupons_deals_option', array(
    	'title'      => __( 'Layout Settings', 'coupons-deals' ),
    	'panel'    => 'coupons_deals_panel_id',
	) );

	$wp_customize->add_setting('coupons_deals_preloader',array(
       'default' => false,
       'sanitize_callback'	=> 'coupons_deals_sanitize_checkbox'
    ));
    $wp_customize->add_control('coupons_deals_preloader',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Preloader','coupons-deals'),
       'section' => 'coupons_deals_option'
    ));

    $wp_customize->add_setting('coupons_deals_preloader_type',array(
        'default' => 'First Preloader Type',
        'sanitize_callback' => 'coupons_deals_sanitize_choices'
	));
	$wp_customize->add_control('coupons_deals_preloader_type',array(
        'type' => 'radio',
        'label' => __('Preloader Types','coupons-deals'),
        'section' => 'coupons_deals_option',
        'choices' => array(
            'First Preloader Type' => __('First Preloader Type','coupons-deals'),
            'Second Preloader Type' => __('Second Preloader Type','coupons-deals'),
        ),
	) );

	$wp_customize->add_setting('coupons_deals_preloader_bg_color_option', array(
		'default'           => '#e9a229',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'coupons_deals_preloader_bg_color_option', array(
		'label'    => __('Preloader Background Color', 'coupons-deals'),
		'section'  => 'coupons_deals_option',
	)));

	$wp_customize->add_setting('coupons_deals_preloader_icon_color_option', array(
		'default'           => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'coupons_deals_preloader_icon_color_option', array(
		'label'    => __('Preloader Icon Color', 'coupons-deals'),
		'section'  => 'coupons_deals_option',
	)));

	$wp_customize->add_setting('coupons_deals_width_layout_options',array(
        'default' => 'Default',
        'sanitize_callback' => 'coupons_deals_sanitize_choices'
	));
	$wp_customize->add_control('coupons_deals_width_layout_options',array(
        'type' => 'radio',
        'label' => __('Container Box','coupons-deals'),
        'description' => __('Here you can change the Width layout. ','coupons-deals'),
        'section' => 'coupons_deals_option',
        'choices' => array(
            'Default' => __('Default','coupons-deals'),
            'Container Layout' => __('Container Layout','coupons-deals'),
            'Box Layout' => __('Box Layout','coupons-deals'),
        ),
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('coupons_deals_layout_options',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'coupons_deals_sanitize_choices'
	) );
	$wp_customize->add_control('coupons_deals_layout_options', array(
        'type' => 'select',
        'label' => __('Select different post sidebar layout','coupons-deals'),
        'section' => 'coupons_deals_option',
        'choices' => array(
            'One Column' => __('One Column','coupons-deals'),
            'Three Columns' => __('Three Columns','coupons-deals'),
            'Four Columns' => __('Four Columns','coupons-deals'),
            'Grid Layout' => __('Grid Layout','coupons-deals'),
            'Left Sidebar' => __('Left Sidebar','coupons-deals'),
            'Right Sidebar' => __('Right Sidebar','coupons-deals')
        ),
	)   );

	$wp_customize->add_setting('coupons_deals_sidebar_size',array(
        'default' => 'Sidebar 1/3',
        'sanitize_callback' => 'coupons_deals_sanitize_choices'
	));
	$wp_customize->add_control('coupons_deals_sidebar_size',array(
        'type' => 'radio',
        'label' => __('Sidebar Size Option','coupons-deals'),
        'section' => 'coupons_deals_option',
        'choices' => array(
            'Sidebar 1/3' => __('Sidebar 1/3','coupons-deals'),
            'Sidebar 1/4' => __('Sidebar 1/4','coupons-deals'),
        ),
	) );

	$wp_customize->add_setting( 'coupons_deals_image_border_radius', array(
		'default'=> 0,
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control(new Coupons_Deals_Custom_Control( $wp_customize,  'coupons_deals_image_border_radius', array(
		'label'       => esc_html__( 'Featured Image Border Radius','coupons-deals' ),
		'section'     => 'coupons_deals_option',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	)) );

	$wp_customize->add_setting( 'coupons_deals_image_box_shadow',array(
		'default' => 0,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	));
	$wp_customize->add_control(new Coupons_Deals_Custom_Control( $wp_customize,  'coupons_deals_image_box_shadow',array(
		'label' => esc_html__( 'Featured Image Shadow','coupons-deals' ),
		'section' => 'coupons_deals_option',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type'		=> 'range'
	)));

	//Global Color
	$wp_customize->add_section('coupons_deals_global_color', array(
		'title'    => __('Theme Color Option', 'coupons-deals'),
		'panel'    => 'coupons_deals_panel_id',
	));

	$wp_customize->add_setting('coupons_deals_first_color', array(
		'default'           => '#37a0e8',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'coupons_deals_first_color', array(
		'label'    => __('First Highlight Color', 'coupons-deals'),
		'section'  => 'coupons_deals_global_color',
		'settings' => 'coupons_deals_first_color',
	)));

	$wp_customize->add_setting('coupons_deals_second_color', array(
		'default'           => '#e9a229',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'coupons_deals_second_color', array(
		'label'    => __('Second Highlight Color', 'coupons-deals'),
		'section'  => 'coupons_deals_global_color',
		'settings' => 'coupons_deals_second_color',
	)));

	//Blog Post Settings
	$wp_customize->add_section('coupons_deals_post_settings', array(
		'title'    => __('Post General Settings', 'coupons-deals'),
		'panel'    => 'coupons_deals_panel_id',
	));

	$wp_customize->add_setting('coupons_deals_post_layouts',array(
     'default' => 'Layout 2',
     'sanitize_callback' => 'coupons_deals_sanitize_choices'
	));
	$wp_customize->add_control(new Coupons_Deals_Image_Radio_Control($wp_customize, 'coupons_deals_post_layouts', array(
        'type' => 'select',
        'label' => __('Post Layouts','coupons-deals'),
        'description' => __('Here you can change the 3 different layouts of post','coupons-deals'),
        'section' => 'coupons_deals_post_settings',
        'choices' => array(
            'Layout 1' => esc_url(get_template_directory_uri()).'/images/layout1.png',
            'Layout 2' => esc_url(get_template_directory_uri()).'/images/layout2.png',
            'Layout 3' => esc_url(get_template_directory_uri()).'/images/layout3.png',
    ))));

	$wp_customize->add_setting('coupons_deals_metafields_date',array(
       'default' => true,
       'sanitize_callback'	=> 'coupons_deals_sanitize_checkbox'
    ));
    $wp_customize->add_control('coupons_deals_metafields_date',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Date ','coupons-deals'),
       'section' => 'coupons_deals_post_settings'
    ));

	$wp_customize->add_setting('coupons_deals_post_date_icon',array(
		'default'	=> 'far fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Coupons_Deals_Icon_Changer(
        $wp_customize,'coupons_deals_post_date_icon',array(
		'label'	=> __('Post Date Icon','coupons-deals'),
		'transport' => 'refresh',
		'section'	=> 'coupons_deals_post_settings',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('coupons_deals_metafields_author',array(
       'default' => true,
       'sanitize_callback'	=> 'coupons_deals_sanitize_checkbox'
    ));
    $wp_customize->add_control('coupons_deals_metafields_author',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Author','coupons-deals'),
       'section' => 'coupons_deals_post_settings'
    ));

    $wp_customize->add_setting('coupons_deals_post_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Coupons_Deals_Icon_Changer(
        $wp_customize,'coupons_deals_post_author_icon',array(
		'label'	=> __('Post Author Icon','coupons-deals'),
		'transport' => 'refresh',
		'section'	=> 'coupons_deals_post_settings',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('coupons_deals_metafields_comment',array(
       'default' => true,
       'sanitize_callback'	=> 'coupons_deals_sanitize_checkbox'
    ));
    $wp_customize->add_control('coupons_deals_metafields_comment',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Comments','coupons-deals'),
       'section' => 'coupons_deals_post_settings'
    ));

    $wp_customize->add_setting('coupons_deals_post_comment_icon',array(
		'default'	=> 'fas fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Coupons_Deals_Icon_Changer(
        $wp_customize,'coupons_deals_post_comment_icon',array(
		'label'	=> __('Post Comment Icon','coupons-deals'),
		'transport' => 'refresh',
		'section'	=> 'coupons_deals_post_settings',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('coupons_deals_metafields_time',array(
       'default' => false,
       'sanitize_callback'	=> 'coupons_deals_sanitize_checkbox'
    ));
    $wp_customize->add_control('coupons_deals_metafields_time',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Time','coupons-deals'),
       'section' => 'coupons_deals_post_settings'
    ));

    $wp_customize->add_setting('coupons_deals_post_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Coupons_Deals_Icon_Changer(
        $wp_customize,'coupons_deals_post_time_icon',array(
		'label'	=> __('Post Time Icon','coupons-deals'),
		'transport' => 'refresh',
		'section'	=> 'coupons_deals_post_settings',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('coupons_deals_post_featured_image',array(
       'default' => 'Image',
       'sanitize_callback'	=> 'coupons_deals_sanitize_choices'
    ));
    $wp_customize->add_control('coupons_deals_post_featured_image',array(
       'type' => 'select',
       'label'	=> __('Post Image Options','coupons-deals'),
       'choices' => array(
            'Image' => __('Image','coupons-deals'),
            'Color' => __('Color','coupons-deals'),
            'None' => __('None','coupons-deals'),
        ),
      	'section'	=> 'coupons_deals_post_settings',
    ));

    $wp_customize->add_setting('coupons_deals_post_featured_color', array(
		'default'           => '#37a0e8',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'coupons_deals_post_featured_color', array(
		'label'    => __('Post Color', 'coupons-deals'),
		'section'  => 'coupons_deals_post_settings',
		'settings' => 'coupons_deals_post_featured_color',
		'active_callback' => 'coupons_deals_post_color_enabled'
	)));

	$wp_customize->add_setting( 'coupons_deals_custom_post_color_width',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Coupons_Deals_Custom_Control( $wp_customize, 'coupons_deals_custom_post_color_width',	array(
		'label' => esc_html__( 'Color Post Custom Width','coupons-deals' ),
		'section' => 'coupons_deals_post_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 500,
			'step' => 1,
		),
		'active_callback' => 'coupons_deals_show_post_color'
	)));

	$wp_customize->add_setting( 'coupons_deals_custom_post_color_height',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Coupons_Deals_Custom_Control( $wp_customize, 'coupons_deals_custom_post_color_height',array(
		'label' => esc_html__( 'Color Post Custom Height','coupons-deals' ),
		'section' => 'coupons_deals_post_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 350,
			'step' => 1,
		),
		'active_callback' => 'coupons_deals_show_post_color'
	)));

	$wp_customize->add_setting('coupons_deals_post_featured_image_dimention',array(
       'default' => 'Default',
       'sanitize_callback'	=> 'coupons_deals_sanitize_choices'
    ));
    $wp_customize->add_control('coupons_deals_post_featured_image_dimention',array(
       'type' => 'select',
       'label'	=> __('Post Featured Image Dimention','coupons-deals'),
       'choices' => array(
            'Default' => __('Default','coupons-deals'),
            'Custom' => __('Custom','coupons-deals'),
        ),
      	'section'	=> 'coupons_deals_post_settings',
      	'active_callback' => 'coupons_deals_enable_post_featured_image'
    ));

    $wp_customize->add_setting( 'coupons_deals_post_featured_image_custom_width',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Coupons_Deals_Custom_Control( $wp_customize, 'coupons_deals_post_featured_image_custom_width',	array(
		'label' => esc_html__( 'Post Featured Image Custom Width','coupons-deals' ),
		'section' => 'coupons_deals_post_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 500,
			'step' => 1,
		),
		'active_callback' => 'coupons_deals_enable_post_image_custom_dimention'
	)));

	$wp_customize->add_setting( 'coupons_deals_post_featured_image_custom_height',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Coupons_Deals_Custom_Control( $wp_customize, 'coupons_deals_post_featured_image_custom_height',	array(
		'label' => esc_html__( 'Post Featured Image Custom Height','coupons-deals' ),
		'section' => 'coupons_deals_post_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 350,
			'step' => 1,
		),
		'active_callback' => 'coupons_deals_enable_post_image_custom_dimention'
	)));

    //Post excerpt
	$wp_customize->add_setting( 'coupons_deals_post_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'coupons_deals_post_excerpt_number', array(
		'label'       => esc_html__( 'Blog Post Content Limit','coupons-deals' ),
		'section'     => 'coupons_deals_post_settings',
		'type'        => 'number',
		'settings'    => 'coupons_deals_post_excerpt_number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('coupons_deals_content_settings',array(
        'default' =>'Excerpt',
        'sanitize_callback' => 'coupons_deals_sanitize_choices'
	));
	$wp_customize->add_control('coupons_deals_content_settings',array(
        'type' => 'radio',
        'label' => __('Content Settings','coupons-deals'),
        'section' => 'coupons_deals_post_settings',
        'choices' => array(
            'Excerpt' => __('Excerpt','coupons-deals'),
            'Content' => __('Content','coupons-deals'),
        ),
	) );

	$wp_customize->add_setting( 'coupons_deals_post_discription_suffix', array(
		'default'   => __('[...]','coupons-deals'),
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'coupons_deals_post_discription_suffix', array(
		'label'       => esc_html__( 'Post Excerpt Suffix','coupons-deals' ),
		'section'     => 'coupons_deals_post_settings',
		'type'        => 'text',
		'settings'    => 'coupons_deals_post_discription_suffix',
	) );

	$wp_customize->add_setting( 'coupons_deals_blog_post_meta_seperator', array(
		'default'   => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'coupons_deals_blog_post_meta_seperator', array(
		'label'       => esc_html__( 'Meta Box','coupons-deals' ),
		'section'     => 'coupons_deals_post_settings',
		'description' => __('Here you can add the seperator for meta box. e.g. "|",  ",", "/", etc. ','coupons-deals'),
		'type'        => 'text',
		'settings'    => 'coupons_deals_blog_post_meta_seperator',
	) );

	$wp_customize->add_setting('coupons_deals_button_text',array(
		'default'=> __('View More','coupons-deals'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('coupons_deals_button_text',array(
		'label'	=> __('Add Button Text','coupons-deals'),
		'section'=> 'coupons_deals_post_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('coupons_deals_button_icon',array(
		'default'	=> 'fas fa-long-arrow-alt-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Coupons_Deals_Icon_Changer(
        $wp_customize,'coupons_deals_button_icon',array(
		'label'	=> __('Button Icon','coupons-deals'),
		'transport' => 'refresh',
		'section'	=> 'coupons_deals_post_settings',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'coupons_deals_post_button_padding_top',array(
		'default' => 15,
		'transport' => 'refresh',
		'sanitize_callback' => 'coupons_deals_sanitize_integer'
	));
	$wp_customize->add_control( new Coupons_Deals_Custom_Control( $wp_customize, 'coupons_deals_post_button_padding_top',	array(
		'label' => esc_html__( 'Button Top Bottom Padding (px)','coupons-deals' ),
		'section' => 'coupons_deals_post_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting( 'coupons_deals_post_button_padding_right',array(
		'default' => 15,
		'transport' => 'refresh',
		'sanitize_callback' => 'coupons_deals_sanitize_integer'
	));
	$wp_customize->add_control( new Coupons_Deals_Custom_Control( $wp_customize, 'coupons_deals_post_button_padding_right',	array(
		'label' => esc_html__( 'Button Right Left Padding (px)','coupons-deals' ),
		'section' => 'coupons_deals_post_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting( 'coupons_deals_post_button_border_radius',array(
		'default' => 30,
		'transport' => 'refresh',
		'sanitize_callback' => 'coupons_deals_sanitize_integer'
	));
	$wp_customize->add_control( new Coupons_Deals_Custom_Control( $wp_customize, 'coupons_deals_post_button_border_radius',array(
		'label' => esc_html__( 'Button Border Radius (px)','coupons-deals' ),
		'section' => 'coupons_deals_post_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting('coupons_deals_enable_post_pagination',array(
       'default' => true,
       'sanitize_callback'	=> 'coupons_deals_sanitize_checkbox'
    ));
    $wp_customize->add_control('coupons_deals_enable_post_pagination',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Blog Page Pagination','coupons-deals'),
       'section' => 'coupons_deals_post_settings'
    ));

    $wp_customize->add_setting( 'coupons_deals_post_pagination_position', array(
        'default'			=>  'Bottom', 
        'sanitize_callback'	=> 'coupons_deals_sanitize_choices'
    ));
    $wp_customize->add_control( 'coupons_deals_post_pagination_position', array(
        'section' => 'coupons_deals_post_settings',
        'type' => 'select',
        'label' => __( 'Post Pagination Position', 'coupons-deals' ),
        'choices'		=> array(
            'Top'  => __( 'Top', 'coupons-deals' ),
            'Bottom' => __( 'Bottom', 'coupons-deals' ),
            'Both Top & Bottom' => __( 'Both Top & Bottom', 'coupons-deals' ),
    )));

	$wp_customize->add_setting( 'coupons_deals_pagination_settings', array(
        'default'			=> 'Numeric Pagination',
        'sanitize_callback'	=> 'coupons_deals_sanitize_choices'
    ));
    $wp_customize->add_control( 'coupons_deals_pagination_settings', array(
        'section' => 'coupons_deals_post_settings',
        'type' => 'radio',
        'label' => __( 'Post Pagination', 'coupons-deals' ),
        'choices'		=> array(
            'Numeric Pagination'  => __( 'Numeric Pagination', 'coupons-deals' ),
            'next-prev' => __( 'Next / Previous', 'coupons-deals' ),
    )));

    $wp_customize->add_setting('coupons_deals_post_block_option',array(
        'default' => 'By Block',
        'sanitize_callback' => 'coupons_deals_sanitize_choices'
	));
	$wp_customize->add_control('coupons_deals_post_block_option',array(
        'type' => 'select',
        'label' => __('Blog Post Shown','coupons-deals'),
        'section' => 'coupons_deals_post_settings',
        'choices' => array(
            'By Block' => __('By Block','coupons-deals'),
            'By Without Block' => __('By Without Block','coupons-deals'),
        ),
	) );

    //Single Post Settings
	$wp_customize->add_section('coupons_deals_single_post_settings', array(
		'title'    => __('Single Post Settings', 'coupons-deals'),
		'panel'    => 'coupons_deals_panel_id',
	));

	$wp_customize->add_setting('coupons_deals_single_post_date',array(
       'default' => true,
       'sanitize_callback'	=> 'coupons_deals_sanitize_checkbox'
    ));
    $wp_customize->add_control('coupons_deals_single_post_date',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Date ','coupons-deals'),
       'section' => 'coupons_deals_single_post_settings'
    ));

    $wp_customize->add_setting('coupons_deals_single_post_date_icon',array(
		'default'	=> 'far fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Coupons_Deals_Icon_Changer(
        $wp_customize,'coupons_deals_single_post_date_icon',array(
		'label'	=> __('Single Post Date Icon','coupons-deals'),
		'transport' => 'refresh',
		'section'	=> 'coupons_deals_single_post_settings',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('coupons_deals_single_post_author',array(
       'default' => true,
       'sanitize_callback'	=> 'coupons_deals_sanitize_checkbox'
    ));
    $wp_customize->add_control('coupons_deals_single_post_author',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Author','coupons-deals'),
       'section' => 'coupons_deals_single_post_settings'
    ));

   $wp_customize->add_setting('coupons_deals_single_post_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Coupons_Deals_Icon_Changer(
      $wp_customize,'coupons_deals_single_post_author_icon',array(
		'label'	=> __('Single Post Author Icon','coupons-deals'),
		'transport' => 'refresh',
		'section'	=> 'coupons_deals_single_post_settings',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('coupons_deals_single_post_comment',array(
		'default' => true,
		'sanitize_callback'	=> 'coupons_deals_sanitize_checkbox'
	));
	$wp_customize->add_control('coupons_deals_single_post_comment',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Comments','coupons-deals'),
		'section' => 'coupons_deals_single_post_settings'
	));

 	$wp_customize->add_setting('coupons_deals_single_post_comment_icon',array(
		'default'	=> 'fas fa-comments',
		'sanitize_callback' => 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Coupons_Deals_Icon_Changer( $wp_customize, 'coupons_deals_single_post_comment_icon', array(
		'label'	=> __('Single Post Comment Icon','coupons-deals'),
		'transport' => 'refresh',
		'section'	=> 'coupons_deals_single_post_settings',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('coupons_deals_single_post_tags',array(
       'default' => true,
       'sanitize_callback'	=> 'coupons_deals_sanitize_checkbox'
    ));
    $wp_customize->add_control('coupons_deals_single_post_tags',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Tags','coupons-deals'),
       'section' => 'coupons_deals_single_post_settings'
    ));

    $wp_customize->add_setting('coupons_deals_single_post_time',array(
       'default' => false,
       'sanitize_callback'	=> 'coupons_deals_sanitize_checkbox'
    ));
    $wp_customize->add_control('coupons_deals_single_post_time',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Time','coupons-deals'),
       'section' => 'coupons_deals_single_post_settings',
    ));

    $wp_customize->add_setting('coupons_deals_single_post_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Coupons_Deals_Icon_Changer(
        $wp_customize,'coupons_deals_single_post_time_icon',array(
		'label'	=> __('Single Post Time Icon','coupons-deals'),
		'transport' => 'refresh',
		'section'	=> 'coupons_deals_single_post_settings',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('coupons_deals_post_comment_enable',array(
       'default' => true,
       'sanitize_callback'	=> 'coupons_deals_sanitize_checkbox'
    ));
    $wp_customize->add_control('coupons_deals_post_comment_enable',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable post comment','coupons-deals'),
       'section' => 'coupons_deals_single_post_settings',
    ));

	$wp_customize->add_setting('coupons_deals_single_post_featured_image',array(
       'default' => true,
       'sanitize_callback'	=> 'coupons_deals_sanitize_checkbox'
    ));
    $wp_customize->add_control('coupons_deals_single_post_featured_image',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Featured image','coupons-deals'),
       'section' => 'coupons_deals_single_post_settings',
    ));

	$wp_customize->add_setting('coupons_deals_single_post_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'coupons_deals_sanitize_choices'
	) );
	$wp_customize->add_control('coupons_deals_single_post_layout', array(
        'type' => 'select',
        'label' => __('Select different Single post sidebar layout','coupons-deals'),
        'section' => 'coupons_deals_single_post_settings',
        'choices' => array(
            'One Column' => __('One Column','coupons-deals'),
            'Left Sidebar' => __('Left Sidebar','coupons-deals'),
            'Right Sidebar' => __('Right Sidebar','coupons-deals')
        ),
	)   );

	$wp_customize->add_setting( 'coupons_deals_single_post_meta_seperator', array(
		'default'   => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'coupons_deals_single_post_meta_seperator', array(
		'label'       => esc_html__( 'Single Post Meta Box Seperator','coupons-deals' ),
		'section'     => 'coupons_deals_single_post_settings',
		'description' => __('Here you can add the seperator for meta box. e.g. "|",  ",", "/", etc. ','coupons-deals'),
		'type'        => 'text',
		'settings'    => 'coupons_deals_single_post_meta_seperator',
	) );

	$wp_customize->add_setting( 'coupons_deals_comment_form_width',array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'coupons_deals_sanitize_integer'
	));
	$wp_customize->add_control( new Coupons_Deals_Custom_Control( $wp_customize, 'coupons_deals_comment_form_width',	array(
		'label' => esc_html__( 'Comment Form Width','coupons-deals' ),
		'section' => 'coupons_deals_single_post_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 100,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting('coupons_deals_title_comment_form',array(
       'default' => __('Leave a Reply','coupons-deals'),
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('coupons_deals_title_comment_form',array(
       'type' => 'text',
       'label' => __('Comment Form Heading Text','coupons-deals'),
       'section' => 'coupons_deals_single_post_settings'
    ));

    $wp_customize->add_setting('coupons_deals_comment_form_button_content',array(
       'default' => __('Post Comment','coupons-deals'),
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('coupons_deals_comment_form_button_content',array(
       'type' => 'text',
       'label' => __('Comment Form Button Text','coupons-deals'),
       'section' => 'coupons_deals_single_post_settings'
    ));

	$wp_customize->add_setting('coupons_deals_enable_single_post_pagination',array(
       'default' => true,
       'sanitize_callback'	=> 'coupons_deals_sanitize_checkbox'
    ));
    $wp_customize->add_control('coupons_deals_enable_single_post_pagination',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Single Post Pagination','coupons-deals'),
       'section' => 'coupons_deals_single_post_settings'
    ));

	//Related Post Settings
	$wp_customize->add_section('coupons_deals_related_settings', array(
		'title'    => __('Related Post Settings', 'coupons-deals'),
		'panel'    => 'coupons_deals_panel_id',
	));

	$wp_customize->add_setting( 'coupons_deals_related_enable_disable',array(
		'default' => true,
      	'sanitize_callback'	=> 'coupons_deals_sanitize_checkbox'
    ) );
    $wp_customize->add_control('coupons_deals_related_enable_disable',array(
    	'type' => 'checkbox',
        'label' => __( 'Enable / Disable Related Post','coupons-deals' ),
        'section' => 'coupons_deals_related_settings'
    ));

    $wp_customize->add_setting('coupons_deals_related_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('coupons_deals_related_title',array(
		'label'	=> __('Add Section Title','coupons-deals'),
		'section'	=> 'coupons_deals_related_settings',
		'type'		=> 'text'
	));

	$wp_customize->add_setting( 'coupons_deals_related_posts_count_number', array(
		'default'              => 3,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'coupons_deals_related_posts_count_number', array(
		'label'       => esc_html__( 'Related Post Count','coupons-deals' ),
		'section'     => 'coupons_deals_related_settings',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 10,
		),
	) );

	$wp_customize->add_setting('coupons_deals_related_posts_taxanomies',array(
        'default' => 'categories',
        'sanitize_callback' => 'coupons_deals_sanitize_choices'
	));
	$wp_customize->add_control('coupons_deals_related_posts_taxanomies',array(
        'type' => 'radio',
        'label' => __('Post Taxonomies','coupons-deals'),
        'section' => 'coupons_deals_related_settings',
        'choices' => array(
            'categories' => __('Categories','coupons-deals'),
            'tags' => __('Tags','coupons-deals'),
        ),
	) );

	$wp_customize->add_setting( 'coupons_deals_related_post_excerpt_number',array(
		'default' => 15,
		'transport' => 'refresh',
		'sanitize_callback' => 'coupons_deals_sanitize_integer'
	));
	$wp_customize->add_control( new Coupons_Deals_Custom_Control( $wp_customize, 'coupons_deals_related_post_excerpt_number',	array(
		'label' => esc_html__( 'Content Limit','coupons-deals' ),
		'section' => 'coupons_deals_related_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	//Top Bar Section
	$wp_customize->add_section('coupons_deals_topbar',array(
		'title'	=> __('Topbar','coupons-deals'),
		'description'	=> __('Add contact us here','coupons-deals'),
		'priority'	=> null,
		'panel' => 'coupons_deals_panel_id',
	));

	//Show /Hide Topbar
	$wp_customize->add_setting( 'coupons_deals_show_top_header',array(
		'default' => false,
      	'sanitize_callback'	=> 'coupons_deals_sanitize_checkbox'
    ) );
    $wp_customize->add_control('coupons_deals_show_top_header',array(
    	'type' => 'checkbox',
        'label' => __( 'Topbar','coupons-deals' ),
        'section' => 'coupons_deals_topbar'
    ));

	$wp_customize->add_setting('coupons_deals_menu_font_size_option',array(
		'default'=> 12,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Coupons_Deals_Custom_Control( $wp_customize,'coupons_deals_menu_font_size_option',array(
		'label'	=> __('Menu Font Size ','coupons-deals'),
		'section'=> 'coupons_deals_topbar',
		'input_attrs' => array(
         'step' => 1,
			'min'  => 0,
			'max'  => 50,
     	),
	)));

	$wp_customize->add_setting('coupons_deals_menu_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Coupons_Deals_Custom_Control( $wp_customize,'coupons_deals_menu_padding',array(
		'label'	=> __('Main Menu Padding','coupons-deals'),
		'section'=> 'coupons_deals_topbar',
		'input_attrs' => array(
         'step' => 1,
			'min'  => 0,
			'max'  => 50,
      ),
	)));

	$wp_customize->add_setting('coupons_deals_text_tranform_menu',array(
		'default' => 'Uppercase',
		'sanitize_callback' => 'coupons_deals_sanitize_choices'
 	));
 	$wp_customize->add_control('coupons_deals_text_tranform_menu',array(
		'type' => 'select',
		'label' => __('Menu Text Transform','coupons-deals'),
		'section' => 'coupons_deals_topbar',
		'choices' => array(
		   'Uppercase' => __('Uppercase','coupons-deals'),
		   'Lowercase' => __('Lowercase','coupons-deals'),
		   'Capitalize' => __('Capitalize','coupons-deals'),
		),
	) );

	$wp_customize->add_setting('coupons_deals_font_weight_option_menu',array(
		'default' => '',
		'sanitize_callback' => 'coupons_deals_sanitize_choices'
 	));
 	$wp_customize->add_control('coupons_deals_font_weight_option_menu',array(
		'type' => 'select',
		'label' => __('Menu Font Weight','coupons-deals'),
		'section' => 'coupons_deals_topbar',
		'choices' => array(
		   'Bold' => __('Bold','coupons-deals'),
		   'Normal' => __('Normal','coupons-deals'),
		),
	) );

	$wp_customize->add_setting('coupons_deals_responsive_menu_open_icon',array(
		'default'	=> 'fas fa-bars',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Coupons_Deals_Icon_Changer(
        $wp_customize,'coupons_deals_responsive_menu_open_icon',array(
		'label'	=> __('Responsive Open Menu Icon','coupons-deals'),
		'transport' => 'refresh',
		'section'	=> 'coupons_deals_topbar',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('coupons_deals_responsive_menu_close_icon',array(
		'default'	=> 'fas fa-times',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Coupons_Deals_Icon_Changer(
        $wp_customize,'coupons_deals_responsive_menu_close_icon',array(
		'label'	=> __('Responsive Close Menu Icon','coupons-deals'),
		'transport' => 'refresh',
		'section'	=> 'coupons_deals_topbar',
		'type'		=> 'icon'
	)));

	//Social Media Section
	$wp_customize->add_section( 'coupons_deals_social_section' , array(
    	'title'      => __( 'Social Media Section', 'coupons-deals' ),
		'priority'   => null,
		'panel' => 'coupons_deals_panel_id'
	) );

   $wp_customize->add_setting('coupons_deals_facebook_icon',array(
		'default'	=> 'fab fa-facebook-f',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Coupons_Deals_Icon_Changer(
        $wp_customize,'coupons_deals_facebook_icon',array(
		'label'	=> __('Facebook Icon','coupons-deals'),
		'transport' => 'refresh',
		'section'	=> 'coupons_deals_social_section',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('coupons_deals_facebook_link',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('coupons_deals_facebook_link',array(
		'label'	=> __('Add Facebook Link','coupons-deals'),
		'section'	=> 'coupons_deals_social_section',
		'type'		=> 'url'
	));

   $wp_customize->add_setting('coupons_deals_twitter_icon',array(
		'default'	=> 'fab fa-twitter',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Coupons_Deals_Icon_Changer(
        $wp_customize,'coupons_deals_twitter_icon',array(
		'label'	=> __('Twitter Icon','coupons-deals'),
		'transport' => 'refresh',
		'section'	=> 'coupons_deals_social_section',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('coupons_deals_twitter_link',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('coupons_deals_twitter_link',array(
		'label'	=> __('Add Twitter Link','coupons-deals'),
		'section'	=> 'coupons_deals_social_section',
		'type'		=> 'url'
	));

   $wp_customize->add_setting('coupons_deals_linkdin_icon',array(
		'default'	=> 'fab fa-linkedin-in',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Coupons_Deals_Icon_Changer(
        $wp_customize,'coupons_deals_linkdin_icon',array(
		'label'	=> __('Linkdin Icon','coupons-deals'),
		'transport' => 'refresh',
		'section'	=> 'coupons_deals_social_section',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('coupons_deals_linkdin_link',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('coupons_deals_linkdin_link',array(
		'label'	=> __('Add Linkdin Link','coupons-deals'),
		'section'	=> 'coupons_deals_social_section',
		'type'		=> 'url'
	));

   $wp_customize->add_setting('coupons_deals_instagram_icon',array(
		'default'	=> 'fab fa-instagram',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Coupons_Deals_Icon_Changer(
        $wp_customize,'coupons_deals_instagram_icon',array(
		'label'	=> __('Instagram Icon','coupons-deals'),
		'transport' => 'refresh',
		'section'	=> 'coupons_deals_social_section',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('coupons_deals_instagram_link',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('coupons_deals_instagram_link',array(
		'label'	=> __('Add Instagram Link','coupons-deals'),
		'section'	=> 'coupons_deals_social_section',
		'type'		=> 'url'
	));

   $wp_customize->add_setting('coupons_deals_pintrest_icon',array(
		'default'	=> 'fab fa-pinterest-p',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Coupons_Deals_Icon_Changer(
        $wp_customize,'coupons_deals_pintrest_icon',array(
		'label'	=> __('Pintrest Icon','coupons-deals'),
		'transport' => 'refresh',
		'section'	=> 'coupons_deals_social_section',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('coupons_deals_pintrest_link',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('coupons_deals_pintrest_link',array(
		'label'	=> __('Add Pintrest Link','coupons-deals'),
		'section'	=> 'coupons_deals_social_section',
		'type'		=> 'url'
	));

	//Slider Section
	$wp_customize->add_section( 'coupons_deals_slider_section' , array(
    	'title'      => __( 'Slider Section', 'coupons-deals' ),
		'priority'   => null,
		'panel' => 'coupons_deals_panel_id'
	) );

	$wp_customize->add_setting('coupons_deals_slider_hide',array(
		'default' => false,
		'sanitize_callback'	=> 'coupons_deals_sanitize_checkbox'
	));
	$wp_customize->add_control('coupons_deals_slider_hide',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable slider','coupons-deals'),
		'section' => 'coupons_deals_slider_section',
	));

	for ( $count = 1; $count <= 4; $count++ ) {
		$wp_customize->add_setting( 'coupons_deals_slider_setting' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'coupons_deals_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'coupons_deals_slider_setting' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'coupons-deals' ),
			'description' => __('Slider image size (800 x 380)','coupons-deals'),
			'section'  => 'coupons_deals_slider_section',
			'allow_addition' => true,
			'type'     => 'dropdown-pages'
		) );
	}

	$wp_customize->add_setting('coupons_deals_slider_heading',array(
		'default' => true,
		'sanitize_callback'	=> 'coupons_deals_sanitize_checkbox'
	));
	$wp_customize->add_control('coupons_deals_slider_heading',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Slider Heading','coupons-deals'),
		'section' => 'coupons_deals_slider_section'
	));

	$wp_customize->add_setting('coupons_deals_slider_text',array(
		'default' => true,
		'sanitize_callback'	=> 'coupons_deals_sanitize_checkbox'
	));
	$wp_customize->add_control('coupons_deals_slider_text',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Slider Text','coupons-deals'),
		'section' => 'coupons_deals_slider_section'
	));

	$wp_customize->add_setting('coupons_deals_enable_slider_overlay',array(
		'default' => true,
		'sanitize_callback'	=> 'coupons_deals_sanitize_checkbox'
	));
	$wp_customize->add_control('coupons_deals_enable_slider_overlay',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Slider Image Overlay','coupons-deals'),
		'section' => 'coupons_deals_slider_section'
	));

   $wp_customize->add_setting('coupons_deals_slider_overlay_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'coupons_deals_slider_overlay_color', array(
		'label'    => __('Slider Image Overlay Color', 'coupons-deals'),
		'section'  => 'coupons_deals_slider_section',
		'settings' => 'coupons_deals_slider_overlay_color',
	)));

	//Opacity
	$wp_customize->add_setting('coupons_deals_slider_opacity',array(
		'default'           => 0.7,
		'sanitize_callback' => 'coupons_deals_sanitize_choices'
	));
	$wp_customize->add_control( 'coupons_deals_slider_opacity', array(
		'label'       => esc_html__( 'Slider Image Opacity','coupons-deals' ),
		'section'     => 'coupons_deals_slider_section',
		'type'        => 'select',
		'settings'    => 'coupons_deals_slider_opacity',
		'choices' => array(
			'0' =>  esc_attr('0','coupons-deals'),
			'0.1' =>  esc_attr('0.1','coupons-deals'),
			'0.2' =>  esc_attr('0.2','coupons-deals'),
			'0.3' =>  esc_attr('0.3','coupons-deals'),
			'0.4' =>  esc_attr('0.4','coupons-deals'),
			'0.5' =>  esc_attr('0.5','coupons-deals'),
			'0.6' =>  esc_attr('0.6','coupons-deals'),
			'0.7' =>  esc_attr('0.7','coupons-deals'),
			'0.8' =>  esc_attr('0.8','coupons-deals'),
			'0.9' =>  esc_attr('0.9','coupons-deals')
		),
	));

	//content layout
    $wp_customize->add_setting('coupons_deals_slider_content_layout',array(
    	'default' => 'Left',
		'sanitize_callback' => 'coupons_deals_sanitize_choices'
	));
	$wp_customize->add_control('coupons_deals_slider_content_layout',array(
		'type' => 'radio',
		'label' => __('Slider Content Layout','coupons-deals'),
		'section' => 'coupons_deals_slider_section',
		'choices' => array(
		   'Center' => __('Center','coupons-deals'),
		   'Left' => __('Left','coupons-deals'),
		   'Right' => __('Right','coupons-deals'),
		),
	) );

	$wp_customize->add_setting('coupons_deals_option_slider_height',array(
		'default'=> '380',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('coupons_deals_option_slider_height',array(
		'label'	=> __('Slider Height','coupons-deals'),
		'section'=> 'coupons_deals_slider_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('coupons_deals_slider_content_top_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Coupons_Deals_Custom_Control( $wp_customize,  'coupons_deals_slider_content_top_padding',array(
		'label' => __('Top Bottom Slider Content Spacing','coupons-deals'),
		'section'=> 'coupons_deals_slider_section',
		'input_attrs' => array(
         'step'             => 1,
			'min'              => 0,
			'max'              => 50,
     	),
	)));

	$wp_customize->add_setting('coupons_deals_slider_content_left_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Coupons_Deals_Custom_Control( $wp_customize,  'coupons_deals_slider_content_left_padding',array(
		'label' => __('Left Right Slider Content Spacing','coupons-deals'),
		'section'=> 'coupons_deals_slider_section',
		'input_attrs' => array(
         'step'             => 1,
			'min'              => 0,
			'max'              => 50,
  		),
	)));

	//Slider excerpt
	$wp_customize->add_setting( 'coupons_deals_slider_excerpt_number', array(
		'default'            => 15,
		'type'               => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'coupons_deals_slider_excerpt_number', array(
		'label'       => esc_html__( 'Slider Content Limit','coupons-deals' ),
		'section'     => 'coupons_deals_slider_section',
		'type'        => 'number',
		'settings'    => 'coupons_deals_slider_excerpt_number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'coupons_deals_slider_speed',array(
		'default' => 3000,
		'transport' => 'refresh',
		'type' => 'theme_mod',
		'sanitize_callback' => 'coupons_deals_sanitize_integer'
	));
	$wp_customize->add_control( new Coupons_Deals_Custom_Control( $wp_customize, 'coupons_deals_slider_speed',array(
		'label' => esc_html__( 'Slider Slide Speed','coupons-deals' ),
		'section' => 'coupons_deals_slider_section',
		'input_attrs' => array(
			'min' => 1000,
			'max' => 5000,
			'step' => 500,
		),
	)));

	//Our Services
  	$wp_customize->add_section('coupons_deals_coupon_section',array(
		'title' => __('Coupon Section','coupons-deals'),
		'description' => '',
		'priority'  => null,
		'panel' => 'coupons_deals_panel_id',
	));

	$wp_customize->add_setting('coupons_deals_coupon_text',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('coupons_deals_coupon_text',array(
		'type' => 'text',
		'label' => __('Coupon Text','coupons-deals'),
		'section' => 'coupons_deals_coupon_section'
	));

	$wp_customize->add_setting('coupons_deals_coupon_button_text',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('coupons_deals_coupon_button_text',array(
		'type' => 'text',
		'label' => __('Coupon Button Text','coupons-deals'),
		'section' => 'coupons_deals_coupon_section'
	));

	$wp_customize->add_setting('coupons_deals_coupon_button_url',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('coupons_deals_coupon_button_url',array(
		'type' => 'text',
		'label' => __('Coupon Button URL','coupons-deals'),
		'section' => 'coupons_deals_coupon_section'
	));

	$wp_customize->add_setting('coupons_deals_coupon_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'coupons_deals_coupon_image',array(
		'label' => __('Coupon Image','coupons-deals'),
		'section' => 'coupons_deals_coupon_section'
	)));

	//Our Services
  	$wp_customize->add_section('coupons_deals_category_section',array(
		'title' => __('Featured Coupon','coupons-deals'),
		'description' => '',
		'priority'  => null,
		'panel' => 'coupons_deals_panel_id',
	));

	$wp_customize->add_setting('coupons_deals_featured_enable',array(
		'default' => false,
		'sanitize_callback'	=> 'coupons_deals_sanitize_checkbox'
	));
	$wp_customize->add_control('coupons_deals_featured_enable',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Featured Coupon','coupons-deals'),
		'section' => 'coupons_deals_category_section'
	));

	$wp_customize->add_setting('coupons_deals_featured_section_title',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('coupons_deals_featured_section_title',array(
		'type' => 'text',
		'label' => __('Section Title','coupons-deals'),
		'section' => 'coupons_deals_category_section'
	));

	$wp_customize->add_setting('coupons_deals_featured_text',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('coupons_deals_featured_text',array(
		'type' => 'text',
		'label' => __('Add Section Text','coupons-deals'),
		'section' => 'coupons_deals_category_section'
	));

	// category 
	$categories = get_categories();
	$cats = array();
	$i = 0;
	$cat_post[]= 'select';
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_post[$category->slug] = $category->name;
	}

   $wp_customize->add_setting('coupons_deals_featured_coupons',array(
		'default' => 'select',
		'sanitize_callback' => 'coupons_deals_sanitize_choices',
  	));
  	$wp_customize->add_control('coupons_deals_featured_coupons',array(
		'type'    => 'select',
		'choices' => $cat_post,
		'label' => __('Select Category to display Latest Events','coupons-deals'),
		'section' => 'coupons_deals_category_section',
	));

	//footer text
	$wp_customize->add_section('coupons_deals_footer_section',array(
		'title'	=> __('Footer Text','coupons-deals'),
		'panel' => 'coupons_deals_panel_id'
	));

	$wp_customize->add_setting('coupons_deals_footer_bg_color', array(
		'default'           => '#0d0d0f',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'coupons_deals_footer_bg_color', array(
		'label'    => __('Footer Background Color', 'coupons-deals'),
		'section'  => 'coupons_deals_footer_section',
	)));

	$wp_customize->add_setting('coupons_deals_footer_bg_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'coupons_deals_footer_bg_image',array(
		'label' => __('Footer Background Image','coupons-deals'),
		'section' => 'coupons_deals_footer_section'
	)));

	$wp_customize->add_setting('footer_widget_areas',array(
		'default'           => 4,
		'sanitize_callback' => 'coupons_deals_sanitize_choices',
	));
	$wp_customize->add_control('footer_widget_areas',array(
		'type'        => 'radio',
		'label'       => __('Footer widget area', 'coupons-deals'),
		'section'     => 'coupons_deals_footer_section',
		'description' => __('Select the number of widget areas you want in the footer. After that, go to Appearance > Widgets and add your widgets.', 'coupons-deals'),
		'choices' => array(
		   '1'     => __('One', 'coupons-deals'),
		   '2'     => __('Two', 'coupons-deals'),
		   '3'     => __('Three', 'coupons-deals'),
		   '4'     => __('Four', 'coupons-deals')
		),
	));

	$wp_customize->add_setting('coupons_deals_hide_show_scroll',array(
		'default' => true,
		'sanitize_callback'	=> 'coupons_deals_sanitize_checkbox'
	));
	$wp_customize->add_control('coupons_deals_hide_show_scroll',array(
     	'type' => 'checkbox',
      	'label' => __('Enable / Disable Back To Top','coupons-deals'),
      	'section' => 'coupons_deals_footer_section',
	));

	$wp_customize->add_setting('coupons_deals_back_to_top_icon',array(
		'default'	=> 'fas fa-long-arrow-alt-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Coupons_Deals_Icon_Changer(
        $wp_customize,'coupons_deals_back_to_top_icon',array(
		'label'	=> __('Back to Top Icon','coupons-deals'),
		'transport' => 'refresh',
		'section'	=> 'coupons_deals_footer_section',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('coupons_deals_scroll_icon_font_size',array(
		'default'=> 22,
		'transport' => 'refresh',
		'sanitize_callback' => 'coupons_deals_sanitize_integer'
	));
	$wp_customize->add_control(new Coupons_Deals_Custom_Control( $wp_customize, 'coupons_deals_scroll_icon_font_size',array(
		'label'	=> __('Back To Top Icon Font Size','coupons-deals'),
		'section'=> 'coupons_deals_footer_section',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
	)));

	$wp_customize->add_setting('coupons_deals_footer_options',array(
        'default' => 'Right align',
        'sanitize_callback' => 'coupons_deals_sanitize_choices'
	));
	$wp_customize->add_control('coupons_deals_footer_options',array(
        'type' => 'radio',
        'label' => __('Back To Top Alignment','coupons-deals'),
        'section' => 'coupons_deals_footer_section',
        'choices' => array(
            'Left align' => __('Left Align','coupons-deals'),
            'Right align' => __('Right Align','coupons-deals'),
            'Center align' => __('Center Align','coupons-deals'),
        ),
	) );

	$wp_customize->add_setting( 'coupons_deals_top_bottom_scroll_padding',array(
		'default' => 12,
		'transport' => 'refresh',
		'sanitize_callback' => 'coupons_deals_sanitize_integer'
	));
	$wp_customize->add_control( new Coupons_Deals_Custom_Control( $wp_customize, 'coupons_deals_top_bottom_scroll_padding',	array(
		'label' => esc_html__( 'Top Bottom Scroll Padding (px)','coupons-deals' ),
		'section' => 'coupons_deals_footer_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting( 'coupons_deals_left_right_scroll_padding',array(
		'default' => 17,
		'transport' => 'refresh',
		'sanitize_callback' => 'coupons_deals_sanitize_integer'
	));
	$wp_customize->add_control( new Coupons_Deals_Custom_Control( $wp_customize, 'coupons_deals_left_right_scroll_padding',	array(
		'label' => esc_html__( 'Left Right Scroll Padding (px)','coupons-deals' ),
		'section' => 'coupons_deals_footer_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting( 'coupons_deals_back_to_top_border_radius',array(
		'default' => 50,
		'sanitize_callback' => 'coupons_deals_sanitize_integer'
	));
	$wp_customize->add_control( new Coupons_Deals_Custom_Control( $wp_customize, 'coupons_deals_back_to_top_border_radius', array(
		'label' => esc_html__( 'Back to Top Border Radius (px)','coupons-deals' ),
		'section' => 'coupons_deals_footer_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));
	
	$wp_customize->add_setting('coupons_deals_footer_copy',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('coupons_deals_footer_copy',array(
		'label'	=> __('Copyright Text','coupons-deals'),
		'section'	=> 'coupons_deals_footer_section',
		'description'	=> __('Add some text for footer like copyright etc.','coupons-deals'),
		'type'		=> 'text'
	));

	$wp_customize->add_setting('coupons_deals_footer_text_align',array(
        'default' => 'center',
        'sanitize_callback' => 'coupons_deals_sanitize_choices'
	));
	$wp_customize->add_control('coupons_deals_footer_text_align',array(
        'type' => 'radio',
        'label' => __('Copyright Text Alignment ','coupons-deals'),
        'section' => 'coupons_deals_footer_section',
        'choices' => array(
            'left' => __('Left Align','coupons-deals'),
            'right' => __('Right Align','coupons-deals'),
            'center' => __('Center Align','coupons-deals'),
        ),
	) );

	$wp_customize->add_setting('coupons_deals_copyright_text_font_size',array(
		'default'=> 15,
		'transport' => 'refresh',
		'sanitize_callback' => 'coupons_deals_sanitize_integer'
	));
	$wp_customize->add_control(new Coupons_Deals_Custom_Control( $wp_customize, 'coupons_deals_copyright_text_font_size',array(
		'label' => esc_html__( 'Copyright Font Size (px)','coupons-deals' ),
		'section'=> 'coupons_deals_footer_section',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
	)));

	$wp_customize->add_setting( 'coupons_deals_footer_text_padding',array(
		'default' => 20,
		'transport' => 'refresh',
		'sanitize_callback' => 'coupons_deals_sanitize_integer'
	));
	$wp_customize->add_control( new Coupons_Deals_Custom_Control( $wp_customize, 'coupons_deals_footer_text_padding',	array(
		'label' => esc_html__( 'Copyright Text Padding (px)','coupons-deals' ),
		'section' => 'coupons_deals_footer_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting('coupons_deals_footer_text_bg_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'coupons_deals_footer_text_bg_color', array(
		'label'    => __('Copyright Text Background Color', 'coupons-deals'),
		'section'  => 'coupons_deals_footer_section',
	)));

	//Responsive Media Settings
	$wp_customize->add_section('coupons_deals_responsive_media',array(
		'title'	=> __('Responsive Media','coupons-deals'),
		'panel' => 'coupons_deals_panel_id',
	));

	$wp_customize->add_setting('coupons_deals_display_post_date',array(
       'default' => true,
       'sanitize_callback'	=> 'coupons_deals_sanitize_checkbox'
    ));
    $wp_customize->add_control('coupons_deals_display_post_date',array(
       'type' => 'checkbox',
       'label' => __('Display Post Date','coupons-deals'),
       'section' => 'coupons_deals_responsive_media'
    ));

    $wp_customize->add_setting('coupons_deals_display_post_author',array(
       'default' => true,
       'sanitize_callback'	=> 'coupons_deals_sanitize_checkbox'
    ));
    $wp_customize->add_control('coupons_deals_display_post_author',array(
       'type' => 'checkbox',
       'label' => __('Display Post Author','coupons-deals'),
       'section' => 'coupons_deals_responsive_media'
    ));

    $wp_customize->add_setting('coupons_deals_display_post_comment',array(
       'default' => true,
       'sanitize_callback'	=> 'coupons_deals_sanitize_checkbox'
    ));
    $wp_customize->add_control('coupons_deals_display_post_comment',array(
       'type' => 'checkbox',
       'label' => __('Display Post Comment','coupons-deals'),
       'section' => 'coupons_deals_responsive_media'
    ));

    $wp_customize->add_setting('coupons_deals_display_slider',array(
       'default' => false,
       'sanitize_callback'	=> 'coupons_deals_sanitize_checkbox'
    ));
    $wp_customize->add_control('coupons_deals_display_slider',array(
       'type' => 'checkbox',
       'label' => __('Display Slider','coupons-deals'),
       'section' => 'coupons_deals_responsive_media'
    ));

	$wp_customize->add_setting('coupons_deals_display_sidebar',array(
       'default' => true,
       'sanitize_callback'	=> 'coupons_deals_sanitize_checkbox'
    ));
    $wp_customize->add_control('coupons_deals_display_sidebar',array(
       'type' => 'checkbox',
       'label' => __('Display Sidebar','coupons-deals'),
       'section' => 'coupons_deals_responsive_media'
    ));

    $wp_customize->add_setting('coupons_deals_display_scrolltop',array(
       'default' => true,
       'sanitize_callback'	=> 'coupons_deals_sanitize_checkbox'
    ));
    $wp_customize->add_control('coupons_deals_display_scrolltop',array(
       'type' => 'checkbox',
       'label' => __('Display Scroll To Top','coupons-deals'),
       'section' => 'coupons_deals_responsive_media'
    ));

    $wp_customize->add_setting('coupons_deals_display_preloader',array(
       'default' => false,
       'sanitize_callback'	=> 'coupons_deals_sanitize_checkbox'
    ));
    $wp_customize->add_control('coupons_deals_display_preloader',array(
       'type' => 'checkbox',
       'label' => __('Display Preloader','coupons-deals'),
       'section' => 'coupons_deals_responsive_media'
    ));

    //404 Page Setting
	$wp_customize->add_section('coupons_deals_page_not_found',array(
		'title'	=> __('404 Page Not Found / No Result','coupons-deals'),
		'panel' => 'coupons_deals_panel_id',
	));	

	$wp_customize->add_setting('coupons_deals_page_not_found_heading',array(
		'default'=> __('404 Not Found','coupons-deals'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('coupons_deals_page_not_found_heading',array(
		'label'	=> __('404 Heading','coupons-deals'),
		'section'=> 'coupons_deals_page_not_found',
		'type'=> 'text'
	));

	$wp_customize->add_setting('coupons_deals_page_not_found_text',array(
		'default'=> __('Looks like you have taken a wrong turn. Dont worry it happens to the best of us.','coupons-deals'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('coupons_deals_page_not_found_text',array(
		'label'	=> __('404 Content','coupons-deals'),
		'section'=> 'coupons_deals_page_not_found',
		'type'=> 'text'
	));

	$wp_customize->add_setting('coupons_deals_page_not_found_button',array(
		'default'=>  __('Back to Home Page','coupons-deals'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('coupons_deals_page_not_found_button',array(
		'label'	=> __('404 Button','coupons-deals'),
		'section'=> 'coupons_deals_page_not_found',
		'type'=> 'text'
	));

	$wp_customize->add_setting('coupons_deals_no_search_result_heading',array(
		'default'=> __('Nothing Found','coupons-deals'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('coupons_deals_no_search_result_heading',array(
		'label'	=> __('No Search Results Heading','coupons-deals'),
		'description'=>__('The search page heading display when no results are found.','coupons-deals'),
		'section'=> 'coupons_deals_page_not_found',
		'type'=> 'text'
	));

	$wp_customize->add_setting('coupons_deals_no_search_result_text',array(
		'default'=> __('Sorry, but nothing matched your search terms. Please try again with some different keywords.','coupons-deals'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('coupons_deals_no_search_result_text',array(
		'label'	=> __('No Search Results Text','coupons-deals'),
		'description'=>__('The search page text display when no results are found.','coupons-deals'),
		'section'=> 'coupons_deals_page_not_found',
		'type'=> 'text'
	));

	//Woocommerce Section
	$wp_customize->add_section( 'coupons_deals_woocommerce_section' , array(
    	'title'      => __( 'Woocommerce Settings', 'coupons-deals' ),
    	'description'=>__('The below settings are apply on woocommerce pages.','coupons-deals'),
		'priority'   => null,
		'panel' => 'coupons_deals_panel_id'
	) );

	/**
	 * Product Columns
	 */
	$wp_customize->add_setting( 'coupons_deals_per_columns' , array(
		'default'           => 3,
		'transport'         => 'refresh',
		'sanitize_callback' => 'coupons_deals_sanitize_choices',
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'coupons_deals_per_columns', array(
		'label'    => __( 'Product per columns', 'coupons-deals' ),
		'section'  => 'coupons_deals_woocommerce_section',
		'type'     => 'select',
		'choices'  => array(
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5',
		),
	) ) );

	$wp_customize->add_setting('coupons_deals_product_per_page',array(
		'default'	=> 9,
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('coupons_deals_product_per_page',array(
		'label'	=> __('Product per page','coupons-deals'),
		'section'	=> 'coupons_deals_woocommerce_section',
		'type'		=> 'number'
	));

	$wp_customize->add_setting('coupons_deals_shop_sidebar_enable',array(
       'default' => true,
       'sanitize_callback'	=> 'coupons_deals_sanitize_checkbox'
    ));
    $wp_customize->add_control('coupons_deals_shop_sidebar_enable',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable shop page sidebar','coupons-deals'),
       'section' => 'coupons_deals_woocommerce_section',
    ));

    $wp_customize->add_setting('coupons_deals_product_page_sidebar_enable',array(
       'default' => true,
       'sanitize_callback'	=> 'coupons_deals_sanitize_checkbox'
    ));
    $wp_customize->add_control('coupons_deals_product_page_sidebar_enable',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable product page sidebar','coupons-deals'),
       'section' => 'coupons_deals_woocommerce_section',
    ));

    $wp_customize->add_setting('coupons_deals_related_product_enable',array(
       'default' => true,
       'sanitize_callback'	=> 'coupons_deals_sanitize_checkbox'
    ));
    $wp_customize->add_control('coupons_deals_related_product_enable',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Related product','coupons-deals'),
       'section' => 'coupons_deals_woocommerce_section',
    ));

    $wp_customize->add_setting( 'coupons_deals_woo_product_sale_border_radius',array(
		'default' => 50,
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control(new Coupons_Deals_Custom_Control( $wp_customize, 'coupons_deals_woo_product_sale_border_radius', array(
        'label'  => __('Woocommerce Product Sale Border Radius','coupons-deals'),
        'section'  => 'coupons_deals_woocommerce_section',
        'type'        => 'number',
        'input_attrs' => array(
        	'step'=> 1,
            'min' => 0,
            'max' => 50,
        )
    )));

    $wp_customize->add_setting('coupons_deals_wooproduct_sale_font_size',array(
		'default'=> 14,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Coupons_Deals_Custom_Control( $wp_customize, 'coupons_deals_wooproduct_sale_font_size',array(
		'label'	=> __('Woocommerce Product Sale Font Size','coupons-deals'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'coupons_deals_woocommerce_section',
	)));

    $wp_customize->add_setting('coupons_deals_woo_product_sale_top_bottom_padding',array(
		'default'=> 0,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Coupons_Deals_Custom_Control( $wp_customize, 'coupons_deals_woo_product_sale_top_bottom_padding',array(
		'label'	=> __('Woocommerce Product Sale Top Bottom Padding ','coupons-deals'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'coupons_deals_woocommerce_section',
		'type'=> 'number'
	)));

	$wp_customize->add_setting('coupons_deals_woo_product_sale_left_right_padding',array(
		'default'=> 0,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Coupons_Deals_Custom_Control( $wp_customize, 'coupons_deals_woo_product_sale_left_right_padding',array(
		'label'	=> __('Woocommerce Product Sale Left Right Padding','coupons-deals'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'coupons_deals_woocommerce_section',
		'type'=> 'number'
	)));

	$wp_customize->add_setting('coupons_deals_woo_product_sale_position',array(
        'default' => 'Right',
        'sanitize_callback' => 'coupons_deals_sanitize_choices'
	));
	$wp_customize->add_control('coupons_deals_woo_product_sale_position',array(
        'type' => 'select',
        'label' => __('Woocommerce Product Sale Position','coupons-deals'),
        'section' => 'coupons_deals_woocommerce_section',
        'choices' => array(
            'Right' => __('Right','coupons-deals'),
            'Left' => __('Left','coupons-deals'),
        ),
	));

	$wp_customize->add_setting( 'coupons_deals_woocommerce_button_padding_top',array(
		'default' => 12,
		'transport' => 'refresh',
		'sanitize_callback' => 'coupons_deals_sanitize_integer'
	));
	$wp_customize->add_control( new Coupons_Deals_Custom_Control( $wp_customize, 'coupons_deals_woocommerce_button_padding_top',	array(
		'label' => esc_html__( 'Button Top Bottom Padding (px)','coupons-deals' ),
		'section' => 'coupons_deals_woocommerce_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting( 'coupons_deals_woocommerce_button_padding_right',array(
		'default' => 15,
		'transport' => 'refresh',
		'sanitize_callback' => 'coupons_deals_sanitize_integer'
	));
	$wp_customize->add_control( new Coupons_Deals_Custom_Control( $wp_customize, 'coupons_deals_woocommerce_button_padding_right',	array(
		'label' => esc_html__( 'Button Right Left Padding (px)','coupons-deals' ),
		'section' => 'coupons_deals_woocommerce_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting( 'coupons_deals_woocommerce_button_border_radius',array(
		'default' => 10,
		'transport' => 'refresh',
		'sanitize_callback' => 'coupons_deals_sanitize_integer'
	));
	$wp_customize->add_control( new Coupons_Deals_Custom_Control( $wp_customize, 'coupons_deals_woocommerce_button_border_radius',array(
		'label' => esc_html__( 'Button Border Radius (px)','coupons-deals' ),
		'section' => 'coupons_deals_woocommerce_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

    $wp_customize->add_setting('coupons_deals_woocommerce_product_border_enable',array(
       'default' => true,
       'sanitize_callback'	=> 'coupons_deals_sanitize_checkbox'
    ));
    $wp_customize->add_control('coupons_deals_woocommerce_product_border_enable',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable product border','coupons-deals'),
       'section' => 'coupons_deals_woocommerce_section',
    ));

	$wp_customize->add_setting( 'coupons_deals_woocommerce_product_padding_top',array(
		'default' => 10,
		'transport' => 'refresh',
		'sanitize_callback' => 'coupons_deals_sanitize_integer'
	));
	$wp_customize->add_control( new Coupons_Deals_Custom_Control( $wp_customize, 'coupons_deals_woocommerce_product_padding_top',	array(
		'label' => esc_html__( 'Product Top Bottom Padding (px)','coupons-deals' ),
		'section' => 'coupons_deals_woocommerce_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting( 'coupons_deals_woocommerce_product_padding_right',array(
		'default' => 10,
		'transport' => 'refresh',
		'sanitize_callback' => 'coupons_deals_sanitize_integer'
	));
	$wp_customize->add_control( new Coupons_Deals_Custom_Control( $wp_customize, 'coupons_deals_woocommerce_product_padding_right',	array(
		'label' => esc_html__( 'Product Right Left Padding (px)','coupons-deals' ),
		'section' => 'coupons_deals_woocommerce_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting( 'coupons_deals_woocommerce_product_border_radius',array(
		'default' => 0,
		'transport' => 'refresh',
		'sanitize_callback' => 'coupons_deals_sanitize_integer'
	));
	$wp_customize->add_control( new Coupons_Deals_Custom_Control( $wp_customize, 'coupons_deals_woocommerce_product_border_radius',array(
		'label' => esc_html__( 'Product Border Radius (px)','coupons-deals' ),
		'section' => 'coupons_deals_woocommerce_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting( 'coupons_deals_woocommerce_product_box_shadow',array(
		'default' => 5,
		'transport' => 'refresh',
		'sanitize_callback' => 'coupons_deals_sanitize_integer'
	));
	$wp_customize->add_control( new Coupons_Deals_Custom_Control( $wp_customize, 'coupons_deals_woocommerce_product_box_shadow',array(
		'label' => esc_html__( 'Product Box Shadow (px)','coupons-deals' ),
		'section' => 'coupons_deals_woocommerce_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting('coupons_deals_wooproducts_nav',array(
       'default' => 'Yes',
       'sanitize_callback'	=> 'coupons_deals_sanitize_choices'
    ));
    $wp_customize->add_control('coupons_deals_wooproducts_nav',array(
       'type' => 'select',
       'label' => __('Shop Page Products Navigation','coupons-deals'),
       'choices' => array(
            'Yes' => __('Yes','coupons-deals'),
            'No' => __('No','coupons-deals'),
        ),
       'section' => 'coupons_deals_woocommerce_section',
    ));
	
}
add_action( 'customize_register', 'coupons_deals_customize_register' );	

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Coupons_Deals_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Coupons_Deals_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Coupons_Deals_Customize_Section_Pro(
				$manager,
				'coupons_deals_example_1',
				array(
					'title'   =>  esc_html__( 'Coupon Pro', 'coupons-deals' ),
					'pro_text' => esc_html__( 'Go Pro', 'coupons-deals' ),
					'pro_url'  => esc_url( 'https://www.buywptemplates.com/themes/deals-wordpress-theme/' ),
					'priority'   => 9
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'coupons-deals-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'coupons-deals-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/css/customize-controls.css' );
	}

	//Footer widget areas
	function coupons_deals_sanitize_choices( $input ) {
	    $valid = array(
	        '1'     => __('One', 'coupons-deals'),
	        '2'     => __('Two', 'coupons-deals'),
	        '3'     => __('Three', 'coupons-deals'),
	        '4'     => __('Four', 'coupons-deals')
	    );
	    if ( array_key_exists( $input, $valid ) ) {
	        return $input;
	    } else {
	        return '';
	    }
	}
}

// Doing this customizer thang!
Coupons_Deals_Customize::get_instance();
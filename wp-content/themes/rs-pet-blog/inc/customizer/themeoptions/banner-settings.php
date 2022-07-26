<?php

// ========================= Hero One Content  ======================================

Kirki::add_section( 'banner_section', array(
    'title'          => esc_html__( 'Banner Section', 'rs-pet-blog' ),
    'description'    => esc_html__( 'Customize Banner section', 'rs-pet-blog' ),
    'panel'          => 'rs_pet_blog_global_panel',
    'capability'     => 'edit_theme_options',
) );

Kirki::add_field( 'rs_pet_blog_config', [
    'type'        => 'switch',
    'settings'    => 'banner_section_on_off',
    'label'       => esc_html__( 'Show//Hide Banner Section', 'rs-pet-blog' ),
    'section'     => 'banner_section',
    'default'     => 'off',
    'choices'     => [
        'on'  => esc_html__( 'Show', 'rs-pet-blog' ),
        'off' => esc_html__( 'Hide', 'rs-pet-blog' ),
    ],
] );

Kirki::add_field( 'rs_pet_blog_config', [
	'type'     => 'textarea',
	'settings' => 'banner_title',
	'label'    => esc_html__( 'Banner Title', 'rs-pet-blog' ),
	'section'  => 'banner_section',
	'default'  => esc_html__( 'Welcome to Reptiles World', 'rs-pet-blog' ),
	'transport' => 'postMessage',
    'js_vars'   => [
        [
            'element'  => '.hero-content .banner-title',
            'function' => 'html',
        ]
    ],

] );

Kirki::add_field( 'rs_pet_blog_config', [
    'type'     => 'textarea',
    'settings' => 'banner_descriptions',
    'label'    => esc_html__( 'Banner Description', 'rs-pet-blog' ),
    'section'  => 'banner_section',
    'default'  => esc_html__( 'Simply dummy text of the printing and typesetting industry.
has been theindustry\'s standard dummy text ever since the
1500s, when an unknownprinter ', 'rs-pet-blog' ),
    'transport' => 'postMessage',
    'js_vars'   => [
        [
            'element'  => '.hero-content .banner-descriptions',
            'function' => 'html',
        ]
    ],

] );

Kirki::add_field( 'rs_pet_blog_config', [
    'type'     => 'text',
    'settings' => 'banner_button_text',
    'label'    => esc_html__( 'Button Text', 'rs-pet-blog' ),
    'section'  => 'banner_section',
    'default'  => esc_html__( 'Discover', 'rs-pet-blog' ),
    'transport' => 'postMessage',
    'js_vars'   => [
        [
            'element'  => '.discover-me-button a',
            'function' => 'html',
        ]
    ],
] );

Kirki::add_field( 'rs_pet_blog_config', [
    'type'     => 'link',
    'settings' => 'banner_button_link',
    'label'    => esc_html__( 'Button Link', 'rs-pet-blog' ),
    'section'  => 'banner_section',
    'default'  => '#',

] );

Kirki::add_field( 'rs_pet_blog_config', [
    'type'        => 'image',
    'settings'    => 'banner_image',
    'label'       => esc_html__( 'Banner image', 'rs-pet-blog' ),
    'section'     => 'banner_section',
    'transport'   => 'refresh',
    'choices'     => [
		'save_as' => 'array',
	],
] );

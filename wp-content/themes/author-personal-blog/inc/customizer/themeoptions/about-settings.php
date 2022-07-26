<?php
Kirki::add_section( 'about_section_settings', array(
    'title'          => esc_html__( 'About Section Settings', 'author-personal-blog' ),
    'description'    => esc_html__( 'Customize About Section section', 'author-personal-blog' ),
    'panel'          => 'author_personal_blog_global_panel',
    'capability'     => 'edit_theme_options',
) );

Kirki::add_field( 'author_personal_blog_config', [
    'type'        => 'switch',
    'settings'    => 'show_about_section',
    'label'       => esc_html__( 'Show About Section', 'author-personal-blog' ),
    'section'     => 'about_section_settings',
    'default'     => '0',
    'choices'     => [
        'on'  => esc_html__( 'Show', 'author-personal-blog' ),
        'off' => esc_html__( 'Hide', 'author-personal-blog' ),
    ],
] );

Kirki::add_field( 'author_personal_blog_config', [
    'type'        => 'image',
    'settings'    => 'author_image',
    'label'       => esc_html__( 'Image', 'author-personal-blog' ),
    'section'     => 'about_section_settings',
    'choices'     => [
                'save_as' => 'array',
            ],
] );

Kirki::add_field( 'author_personal_blog_config', [
    'type'        => 'textarea',
    'settings'    => 'author_title',
    'label'       => esc_html__( 'Title', 'author-personal-blog' ),
    'section'     => 'about_section_settings',
    'default'    => __( 'Hi,My Name Johan Smih', 'author-personal-blog' ),
] );

Kirki::add_field( 'author_personal_blog_config', [
    'type'        => 'textarea',
    'settings'    => 'author_subtitle',
    'label'       => esc_html__( 'Sub Title', 'author-personal-blog' ),
    'section'     => 'about_section_settings',
    'default'    => __( 'New York Times & International Bestselling Author', 'author-personal-blog' ),
] );

Kirki::add_field( 'author_personal_blog_config', [
    'type'        => 'switch',
    'settings'    => 'show_social_icon',
    'label'       => esc_html__( 'Show Social Links', 'author-personal-blog' ),
    'section'     => 'about_section_settings',
    'default'    => false,
] );

Kirki::add_field( 'rs_personal_blog_config', array(
    'type'        => 'custom',
    'settings'    => 'unlock_about_section_style_field',
    'label'       => '',
    'section'     => 'about_section_settings',
    'default'     => '<a target="_blank" href="'.esc_url( 'https://rswpthemes.com/author-personal-blog-pro-wordpress-theme/' ).'">'.esc_html__('Unlock Style Options', 'author-personal-blog').'</a>',
) );

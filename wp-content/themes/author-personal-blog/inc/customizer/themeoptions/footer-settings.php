<?php
Kirki::add_section( 'footer_section_settings', array(
    'title'          => esc_html__( 'Footer Settings', 'author-personal-blog' ),
    'panel'          => 'author_personal_blog_global_panel',
    'capability'     => 'edit_theme_options',
) );

Kirki::add_field( 'author_personal_blog_config', [
    'type'        => 'switch',
    'settings'    => 'show_footer_social_links',
    'label'       => esc_html__( 'Show Footer Social Links', 'author-personal-blog' ),
    'section'     => 'footer_section_settings',
    'default'     => '0',
    'choices'     => [
        'on'  => esc_html__( 'Show', 'author-personal-blog' ),
        'off' => esc_html__( 'Hide', 'author-personal-blog' ),
    ],
] );
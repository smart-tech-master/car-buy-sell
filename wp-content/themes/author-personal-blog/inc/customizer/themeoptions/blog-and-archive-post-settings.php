<?php
/*Blog Page Settings*/

Kirki::add_section( 'blog_and_archive_post_section', array(
    'title'          => esc_html__( 'Blog & Archive Post Settings', 'author-personal-blog' ),
    'panel'          => 'author_personal_blog_global_panel',
) );

Kirki::add_field( 'author_personal_blog_config', [
    'type'        => 'switch',
    'settings'    => 'active_masonry_layout',
    'label'       => esc_html__( 'Activate Masonry Layout', 'author-personal-blog' ),
    'section'     => 'blog_and_archive_post_section',
    'default'     => '1',
    'choices' => [
        'on'  => esc_html__( 'Activate', 'author-personal-blog' ),
        'off' => esc_html__( 'Deactivate', 'author-personal-blog' )
    ]
] );

Kirki::add_field( 'rs_personal_blog_config', array(
    'type'        => 'custom',
    'settings'    => 'sep_after_post_column',
    'label'       => '',
    'section'     => 'blog_and_archive_post_section',
    'default'     => '<hr>',
) );

Kirki::add_field( 'author_personal_blog_config', [
    'type'        => 'toggle',
    'settings'    => 'show_post_category',
    'label'       => esc_html__( 'Show Post Category', 'author-personal-blog' ),
    'section'     => 'blog_and_archive_post_section',
    'default'     => '1',
] );

Kirki::add_field( 'author_personal_blog_config', [
    'type'        => 'toggle',
    'settings'    => 'show_post_title',
    'label'       => esc_html__( 'Show Post Title', 'author-personal-blog' ),
    'section'     => 'blog_and_archive_post_section',
    'default'     => '1',
] );

Kirki::add_field( 'author_personal_blog_config', [
    'type'        => 'toggle',
    'settings'    => 'show_post_author',
    'label'       => esc_html__( 'Show Post Author', 'author-personal-blog' ),
    'section'     => 'blog_and_archive_post_section',
    'default'     => '1',
] );

Kirki::add_field( 'author_personal_blog_config', [
    'type'        => 'toggle',
    'settings'    => 'show_post_date',
    'label'       => esc_html__( 'Show Post Date', 'author-personal-blog' ),
    'section'     => 'blog_and_archive_post_section',
    'default'     => '1',
] );
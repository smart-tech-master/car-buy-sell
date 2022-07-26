<?php
/**
 * Blog single content customization
 */

Kirki::add_section( 'post_page_section', array(
    'title'          => esc_html__( 'Post Page Settings', 'author-personal-blog' ),
    'description'    => esc_html__( 'Customize The Looks of Post Page', 'author-personal-blog' ),
    'panel'          => 'author_personal_blog_global_panel',
) );


Kirki::add_field( 'author_personal_blog_config', [
    'type'        => 'toggle',
    'settings'    => 'show_single_post_category',
    'label'       => esc_html__( 'Show Post Category', 'author-personal-blog' ),
    'section'     => 'post_page_section',
    'default'     => '1',
] );

Kirki::add_field( 'author_personal_blog_config', [
    'type'        => 'toggle',
    'settings'    => 'show_single_post_author',
    'label'       => esc_html__( 'Show Post Author', 'author-personal-blog' ),
    'section'     => 'post_page_section',
    'default'     => '1',
] );

Kirki::add_field( 'author_personal_blog_config', [
    'type'        => 'toggle',
    'settings'    => 'show_single_post_thumbnail',
    'label'       => esc_html__( 'Show Post Thumbnail', 'author-personal-blog' ),
    'section'     => 'post_page_section',
    'default'     => '1',

] );

Kirki::add_field( 'author_personal_blog_config', [
    'type'        => 'toggle',
    'settings'    => 'show_single_post_title',
    'label'       => esc_html__( 'Show Post Title', 'author-personal-blog' ),
    'section'     => 'post_page_section',
    'default'     => '1',
] );

Kirki::add_field( 'author_personal_blog_config', [
    'type'        => 'toggle',
    'settings'    => 'show_single_post_date',
    'label'       => esc_html__( 'Show Post Date', 'author-personal-blog' ),
    'section'     => 'post_page_section',
    'default'     => '1',

] );

Kirki::add_field( 'author_personal_blog_config', [
    'type'        => 'toggle',
    'settings'    => 'show_single_post_comments',
    'label'       => esc_html__( 'Show Post Comments', 'author-personal-blog' ),
    'section'     => 'post_page_section',
    'default'     => '1',

] );

Kirki::add_field( 'author_personal_blog_config', [
    'type'        => 'toggle',
    'settings'    => 'show_single_post_tags',
    'label'       => esc_html__( 'Show Post Tags', 'author-personal-blog' ),
    'section'     => 'post_page_section',
    'default'     => '1',

] );

Kirki::add_field( 'author_personal_blog_config', [
    'type'        => 'toggle',
    'settings'    => 'show_post_author_box',
    'label'       => esc_html__( 'Show Post Author Box', 'author-personal-blog' ),
    'section'     => 'post_page_section',
    'default'     => '1',
] );

Kirki::add_field( 'author_personal_blog_config', [
    'type'        => 'toggle',
    'settings'    => 'show_recommend_posts',
    'label'       => esc_html__( 'Show Recommend Posts', 'author-personal-blog' ),
    'section'     => 'post_page_section',
    'default'     => '1',
] );

Kirki::add_field( 'author_personal_blog_config', [
    'type'        => 'toggle',
    'settings'    => 'show_post_navigation',
    'label'       => esc_html__( 'Show Post Navigation', 'author-personal-blog' ),
    'section'     => 'post_page_section',
    'default'     => '1',
] );

<?php
/*Blog Page Settings*/

Kirki::add_section( 'sidebar_settings_section', array(
    'title'          => esc_html__( 'Sidebar Settings', 'author-personal-blog' ),
    'description'          => esc_html__( 'Control Sidebar Of Your Website', 'author-personal-blog' ),
    'panel'          => 'author_personal_blog_global_panel',
) );

Kirki::add_field( 'author_personal_blog_config', [
	'type'        => 'select',
	'settings'    => 'blog_page_sidebar',
	'label'       => esc_html__( 'Blog Page Sidebar', 'author-personal-blog' ),
	'section'     => 'sidebar_settings_section',
	'default'     => 'no',
	'multiple'    => 1,
	'choices'     => [
		'left' => esc_html__( 'left Sidebar', 'author-personal-blog' ),
		'right' => esc_html__( 'Right Sidebar', 'author-personal-blog' ),
		'no' => esc_html__( 'No Sidebar', 'author-personal-blog' ),
	],
] );

Kirki::add_field( 'author_personal_blog_config', [
	'type'        => 'select',
	'settings'    => 'blog_page_post_column',
	'label'       => esc_html__( 'Post Column', 'author-personal-blog' ),
	'section'     => 'sidebar_settings_section',
	'default'    => '3',
	'choices' => [
			'4' => __( '4 Colmun', 'author-personal-blog' ),
			'3' => __( '3 Column', 'author-personal-blog' ),
			'2' => __( '2 Column', 'author-personal-blog' ),
		],
] );

Kirki::add_field( 'author_personal_blog_config', array(
    'type'        => 'custom',
    'settings'    => 'sep_after_blog_post_column',
    'label'       => '',
    'section'     => 'sidebar_settings_section',
    'default'     => '<hr>',
) );

Kirki::add_field( 'author_personal_blog_config', [
	'type'        => 'select',
	'settings'    => 'archive_page_sidebar',
	'label'       => esc_html__( 'Archive Page Sidebar', 'author-personal-blog' ),
	'section'     => 'sidebar_settings_section',
	'default'     => 'no',
	'multiple'    => 1,
	'choices'     => [
		'left' => esc_html__( 'left Sidebar', 'author-personal-blog' ),
		'right' => esc_html__( 'Right Sidebar', 'author-personal-blog' ),
		'no' => esc_html__( 'No Sidebar', 'author-personal-blog' ),
	],
] );

Kirki::add_field( 'author_personal_blog_config', [
	'type'        => 'select',
	'settings'    => 'archive_page_post_column',
	'label'       => esc_html__( 'Post Column', 'author-personal-blog' ),
	'section'     => 'sidebar_settings_section',
	'default'    => '3',
	'choices' => [
			'4' => __( '4 Colmun', 'author-personal-blog' ),
			'3' => __( '3 Column', 'author-personal-blog' ),
			'2' => __( '2 Column', 'author-personal-blog' ),
		],
] );

Kirki::add_field( 'author_personal_blog_config', array(
    'type'        => 'custom',
    'settings'    => 'sep_after_archive_post_column',
    'label'       => '',
    'section'     => 'sidebar_settings_section',
    'default'     => '<hr>',
) );

Kirki::add_field( 'author_personal_blog_config', [
	'type'        => 'select',
	'settings'    => 'page_sidebar',
	'label'       => esc_html__( 'Page Sidebar', 'author-personal-blog' ),
	'section'     => 'sidebar_settings_section',
	'default'     => 'no',
	'multiple'    => 1,
	'choices'     => [
		'left' => esc_html__( 'left Sidebar', 'author-personal-blog' ),
		'right' => esc_html__( 'Right Sidebar', 'author-personal-blog' ),
		'no' => esc_html__( 'No Sidebar', 'author-personal-blog' ),
	],
] );

Kirki::add_field( 'author_personal_blog_config', array(
    'type'        => 'custom',
    'settings'    => 'sep_after_page_sidebar',
    'label'       => '',
    'section'     => 'sidebar_settings_section',
    'default'     => '<hr>',
) );


Kirki::add_field( 'author_personal_blog_config', [
	'type'        => 'select',
	'settings'    => 'post_sidebar',
	'label'       => esc_html__( 'Post Sidebar', 'author-personal-blog' ),
	'section'     => 'sidebar_settings_section',
	'default'     => 'no',
	'multiple'    => 1,
	'choices'     => [
		'left' => esc_html__( 'left Sidebar', 'author-personal-blog' ),
		'right' => esc_html__( 'Right Sidebar', 'author-personal-blog' ),
		'no' => esc_html__( 'No Sidebar', 'author-personal-blog' ),
	],
] );

Kirki::add_field( 'author_personal_blog_config', array(
    'type'        => 'custom',
    'settings'    => 'sep_after_post_sidebar',
    'label'       => '',
    'section'     => 'sidebar_settings_section',
    'default'     => '<hr>',
) );

Kirki::add_field( 'author_personal_blog_config', [
	'type'        => 'select',
	'settings'    => 'search_page_sidebar',
	'label'       => esc_html__( 'Search Page Sidebar', 'author-personal-blog' ),
	'section'     => 'sidebar_settings_section',
	'default'     => 'no',
	'multiple'    => 1,
	'choices'     => [
		'left' => esc_html__( 'left Sidebar', 'author-personal-blog' ),
		'right' => esc_html__( 'Right Sidebar', 'author-personal-blog' ),
		'no' => esc_html__( 'No Sidebar', 'author-personal-blog' ),
	],
] );

Kirki::add_field( 'author_personal_blog_config', [
	'type'        => 'select',
	'settings'    => 'search_page_post_column',
	'label'       => esc_html__( 'Post Column', 'author-personal-blog' ),
	'section'     => 'sidebar_settings_section',
	'default'    => '3',
	'choices' => [
			'4' => __( '4 Colmun', 'author-personal-blog' ),
			'3' => __( '3 Column', 'author-personal-blog' ),
			'2' => __( '2 Column', 'author-personal-blog' ),
		],
] );
<?php
Kirki::add_section( 'social_links_settings_section', array(
    'title'          => esc_html__( 'Social Links Settings', 'author-personal-blog' ),
    'panel'          => 'author_personal_blog_global_panel',
    'capability'     => 'edit_theme_options',
) );

Kirki::add_field( 'author_personal_blog_config', [
	'type'        => 'repeater',
	'label'       => esc_html__( 'Add Social Links', 'author-personal-blog' ),
	'section'     => 'social_links_settings_section',
	'row_label' => [
		'type'  => 'field',
		'value' => esc_html__( 'Social Icon Name', 'author-personal-blog' ),
		'field' => 'social_link',
	],
	'button_label' => esc_html__('Add New Social Link ', 'author-personal-blog' ),
	'settings'     => 'social_links',
	'default'      => [
		[
			'social_icon_class' => 'fa fa-facebook',
			'social_link'  => 'https://facebook.com',
		],
		[
			'social_icon_class' => 'fa fa-twitter',
			'social_link'  => 'https://twitter.com',
		],
		[
			'social_icon_class' => 'fa fa-pinterest',
			'social_link'  => 'https://pinterest.com',
		],
		[
			'social_icon_class' => 'fa fa-instagram',
			'social_link'  => 'https://instagram.com',
		],
		[
			'social_icon_class' => 'fa fa-medium',
			'social_link'  => 'https://medium.com/',
		],
	],
	'fields' => [
		'social_icon_class' => [
			'type'        => 'text',
			'label'       => esc_html__( 'Social Icon Class', 'author-personal-blog' ),
			'description' => esc_html__( 'Example: "fa fa-facebook"', 'author-personal-blog' ),
			'default'     => '',
		],
		'social_link'  => [
			'type'        => 'text',
			'label'       => esc_html__( 'Link URL', 'author-personal-blog' ),
			'description' => esc_html__( 'Social Icon Links', 'author-personal-blog' ),
			'default'     => '',
		],
	]
] );
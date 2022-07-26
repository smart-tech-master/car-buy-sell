<?php
Kirki::add_section( 'copyright_section', array(
    'title'          => esc_html__( 'Copyright Settings', 'author-personal-blog' ),
    'panel'          => 'author_personal_blog_global_panel',
    'capability'     => 'edit_theme_options',
) );

Kirki::add_field( 'author_personal_blog_config', [
	'type'     => 'editor',
	'settings' => 'copyright_text',
	'label'    => esc_html__( 'Edit Copyright Text', 'author-personal-blog' ),
	'section'  => 'copyright_section',
	'default'  => wp_kses_post( 'Copyright <i class="fa fa-copyright" aria-hidden="true"></i> 2022. All rights reserved.', 'author-personal-blog' ),
	'transport' => 'postMessage',
    'js_vars'   => [
        [
            'element'  => '.site-copyright .site-info .site-copyright-text',
            'function' => 'html',
        ]
    ],

] );
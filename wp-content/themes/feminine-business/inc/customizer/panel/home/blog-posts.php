<?php
/**
 * Blog Posts Settings
 * 
 * @package Feminine_Business
 */
if ( ! function_exists( 'feminine_business_blog_posts_frontpage_settings' ) ) :

function feminine_business_blog_posts_frontpage_settings( $wp_customize ){
    
	$wp_customize->add_section( 'feminine_business_blog_posts', 
	    array(
	        'title'         => esc_html__( 'Blog Posts Section', 'feminine-business' ),
	        'priority'      => 60,
	        'panel'         => 'frontpage_settings'
	    ) 
	);

    $wp_customize->add_setting(
        'ed_blog_post_section',
        array(
            'default'           => false,
            'sanitize_callback' => 'feminine_business_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        new Feminine_Business_Toggle_Control( 
            $wp_customize,
            'ed_blog_post_section',
            array(
                'section'       => 'feminine_business_blog_posts',
                'label'         => __( 'Enable Blog Posts Section', 'feminine-business' ),
            )
        )
    ); 

    /** Blog title */
    $wp_customize->add_setting(
        'blog_section_title',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
			'transport'			=>	'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'blog_section_title',
        array(
            'section'           => 'feminine_business_blog_posts',
            'label'             => __( 'Section Title', 'feminine-business' ),
            'type'              => 'text',
        )
    );

	$wp_customize->selective_refresh->add_partial( 'blog_section_title', array(
        'selector'        => '.home .blog-section .section-header h2.section-title',
        'render_callback' => 'feminine_business_blog_posts_title',
    ) );

    $wp_customize->add_setting(
        'blog_section_content',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'blog_section_content',
        array(
            'section'           => 'feminine_business_blog_posts',
            'label'             => __( 'Section Description', 'feminine-business' ),
            'type'              => 'text',
        )
    );

    $wp_customize->selective_refresh->add_partial( 'blog_section_content', array(
        'selector'        => '.home .blog-section .desc',
        'render_callback' => 'feminine_business_blog_section_content',
    ) );

    $wp_customize->add_setting(
        'blog_readmore',
        array(
            'default'           => __( 'Read More', 'feminine-business' ),
            'sanitize_callback' => 'sanitize_text_field',
			'transport'			=>	'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'blog_readmore',
        array(
            'section'           => 'feminine_business_blog_posts',
            'label'             => __( 'Readmore Button Label', 'feminine-business' ),
            'type'              => 'text',
        )
    );

	$wp_customize->selective_refresh->add_partial( 'blog_readmore', array(
        'selector'        => '.home .blog-section .secondary-btn',
        'render_callback' => 'feminine_business_blog_readmore',
    ) );

}
endif;
add_action( 'customize_register', 'feminine_business_blog_posts_frontpage_settings' );
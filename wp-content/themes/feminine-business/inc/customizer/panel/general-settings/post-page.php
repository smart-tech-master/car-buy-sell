<?php
/**
 * Post Page Settings
 *
 * @package Feminine_Business
 */
if ( ! function_exists( 'feminine_business_customize_register_post_page_settings' ) ) :

function feminine_business_customize_register_post_page_settings( $wp_customize ) {

    /** Post Page Settings */
    $wp_customize->add_section(
        'post_page_settings',
        array(
            'title'    => __( 'Post-Page Settings', 'feminine-business' ),
            'priority' => 20,
            'panel'    => 'general_settings',
        )
    ); 

    /** Prefix Archive Page */
    $wp_customize->add_setting( 
        'ed_prefix_archive', 
        array(
            'default'           => false,
            'sanitize_callback' => 'feminine_business_sanitize_checkbox'
        ) 
    );
    
    $wp_customize->add_control(
		new Feminine_Business_Toggle_Control( 
			$wp_customize,
			'ed_prefix_archive',
			array(
				'section'     => 'post_page_settings',
				'label'	      => __( 'Hide Prefix in Archive Page', 'feminine-business' ),
                'description' => __( 'Enable to hide prefix in archive page.', 'feminine-business' ),
			)
		)
    );
    
    /** Hide Author Section */
    $wp_customize->add_setting( 
        'ed_post_author', 
        array(
            'default'           => false,
            'sanitize_callback' => 'feminine_business_sanitize_checkbox'
        ) 
    );

    $wp_customize->add_control(
        new Feminine_Business_Toggle_Control( 
            $wp_customize,
            'ed_post_author',
            array(
                'section'     => 'post_page_settings',
                'label'	      => __( 'Hide Author Box', 'feminine-business' ),
                'description' => __( 'Enable to hide author box.', 'feminine-business' ),
            )
        )
    );

    /** Hide Posted Date */
    $wp_customize->add_setting( 
        'ed_post_date', 
        array(
            'default'           => false,
            'sanitize_callback' => 'feminine_business_sanitize_checkbox'
        ) 
    );

    $wp_customize->add_control(
        new Feminine_Business_Toggle_Control( 
            $wp_customize,
            'ed_post_date',
            array(
                'section'     => 'post_page_settings',
                'label'	      => __( 'Hide Posted Date', 'feminine-business' ),
                'description' => __( 'Enable to hide posted date.', 'feminine-business' ),
            )
        )
    );
    
    /** Hide Comment count in Banner meta */
    $wp_customize->add_setting( 
        'ed_banner_comments', 
        array(
            'default'           => false,
            'sanitize_callback' => 'feminine_business_sanitize_checkbox'
        ) 
    );

    $wp_customize->add_control(
        new Feminine_Business_Toggle_Control( 
            $wp_customize,
            'ed_banner_comments',
            array(
                'section'     => 'post_page_settings',
                'label'	      => __( 'Hide comments', 'feminine-business' ),
                'description' => __( 'Enable to hide comments.', 'feminine-business' ),
            )
        )
    );

    /** Author box title */
    $wp_customize->add_setting(
        'author_box_title',
        array(
            'default'           => __( 'About The Author', 'feminine-business' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage' 
        )
    );
    
    $wp_customize->add_control(
        'author_box_title',
        array(
            'type'            => 'text',
            'section'         => 'post_page_settings',
            'label'           => __( 'Author Box Title', 'feminine-business' ),
            'description'     => __( 'Title of the author box in Single Post and Author Archive.', 'feminine-business' ),
        )
    );

    $wp_customize->selective_refresh->add_partial( 'author_box_title', array(
        'selector'        => '.author-section h3.author-name',
        'render_callback' => 'feminine_business_author_box_title',
    ) );
    
    /** Related Posts section title */
    $wp_customize->add_setting(
        'related_post_title',
        array(
            'default'           => __( 'You might also like', 'feminine-business' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage' 
        )
    );
    
    $wp_customize->add_control(
        'related_post_title',
        array(
            'type'            => 'text',
            'section'         => 'post_page_settings',
            'label'           => __( 'Related Posts Section Title', 'feminine-business' ),
        )
    );
    
    $wp_customize->selective_refresh->add_partial( 'related_post_title', array(
        'selector'        => '.related-posts .related-title',
        'render_callback' => 'feminine_business_related_posts_title',
    ) );
}
endif;
add_action( 'customize_register', 'feminine_business_customize_register_post_page_settings' );
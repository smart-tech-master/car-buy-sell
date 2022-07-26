<?php
/**
 * Social Settings
 *
 * @package Feminine_Business
 */
if ( ! function_exists( 'feminine_business_customize_register_social_links' ) ) :

function feminine_business_customize_register_social_links( $wp_customize ) {

    /*--------------------------
     * SOCIAL LINKS SECTION
     --------------------------*/
    
    $wp_customize->add_section(
        'social_settings',
        array(
            'panel'     => 'general_settings',
            'title'         => esc_html__( 'Social Media Settings', 'feminine-business' ),
            'priority'  => 10,
        )
    );

    /** Enable Social Links */
    $wp_customize->add_setting( 
        'ed_social_links', 
        array(
            'default'           => false,
            'sanitize_callback' => 'feminine_business_sanitize_checkbox'
        ) 
    );

    $wp_customize->add_control(
        new Feminine_Business_Toggle_Control( 
            $wp_customize,
            'ed_social_links',
            array(
                'section'     => 'social_settings',
                'label'	      => esc_html__( 'Enable Social Links', 'feminine-business' ),
                'description' => esc_html__( 'Enable to show social links at topbar.', 'feminine-business' ),
            )
        )
    );

    /** 
     * Social Share Repeater 
     * */
    $wp_customize->add_setting( 
        new Feminine_Business_Repeater_Setting( 
            $wp_customize, 
            'social_links', 
            array(
                'default' => '',
                'sanitize_callback' => array( 'Feminine_Business_Repeater_Setting', 'sanitize_repeater_setting' ),
            ) 
        ) 
    );

    $wp_customize->add_control(
        new Feminine_Business_Control_Repeater(
            $wp_customize,
            'social_links',
            array(
                'section' => 'social_settings',
                'label'   => esc_html__( 'Social Links', 'feminine-business' ),
                'fields'  => array(
                    'fbp_icon' => array(
                        'type'        => 'select',
                        'label'       => esc_html__( 'Social Media', 'feminine-business' ),
                        'choices'     => feminine_business_get_svg_icons()
                    ),
                    'fbp_link' => array(
                        'type'        => 'url',
                        'label'       => esc_html__( 'Link', 'feminine-business' ),
                        'description' => esc_html__( 'Example: https://facebook.com', 'feminine-business' ),
                    ),
                    'fbp_checkbox' => array(
                        'type'        => 'checkbox',
                        'label'       => esc_html__( 'Open link in new tab', 'feminine-business' ),
                    )
                ),
                'row_label' => array(
                    'type'  => 'field',
                    'value' => esc_html__( 'links', 'feminine-business' ),
                    'field' => 'link'
                )                        
            )
        )
    );
}
endif;
add_action( 'customize_register', 'feminine_business_customize_register_social_links' );
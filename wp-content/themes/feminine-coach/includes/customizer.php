<?php
/**
 * Theme Customizer
 *
 * @package Feminine_Coach
 */

/**
 * Register Custom Controls
 */
function feminine_business_register_custom_controls($wp_customize)
{

    // Load our custom control.
    require_once get_template_directory() . '/inc/custom-controls/note/class-note-control.php';
    require_once get_template_directory() . '/inc/custom-controls/radioimg/class-radio-image-control.php';
    require_once get_template_directory() . '/inc/custom-controls/repeater/class-repeater-setting.php';
    require_once get_template_directory() . '/inc/custom-controls/repeater/class-control-repeater.php';
    require_once get_template_directory() . '/inc/custom-controls/toggle/class-toggle-control.php';
    // Register the control type.

    $wp_customize->register_control_type('Feminine_Business_Radio_Image_Control');
    $wp_customize->register_control_type('Feminine_Business_Toggle_Control');
}
add_action('customize_register', 'feminine_business_register_custom_controls');

function feminine_coach_overide_customizer_values( $wp_customize ) {
    $wp_customize->remove_setting('ed_header_cart');
    $wp_customize->remove_control('ed_header_cart');
	$wp_customize->remove_section( 'shop_section' );
}
add_action( 'customize_register', 'feminine_coach_overide_customizer_values', 999 );

function feminine_business_customize_register_social_links($wp_customize)
{

    /*--------------------------
     * SOCIAL LINKS SECTION
     --------------------------*/

    $wp_customize->add_section(
        'social_settings',
        array(
            'title'     => esc_html__('Social Media Settings', 'feminine-coach'),
            'priority'  => 10,
        )
    );

    /** Enable Social Links */
    $wp_customize->add_setting(
        'ed_social_links',
        array(
            'default'           => true,
            'sanitize_callback' => 'feminine_business_sanitize_checkbox'
        )
    );

    $wp_customize->add_control(
        new Feminine_Business_Toggle_Control(
            $wp_customize,
            'ed_social_links',
            array(
                'section'     => 'social_settings',
                'label'          => esc_html__('Enable Social Links', 'feminine-coach'),
                'description' => esc_html__('Enable to show social links at topbar.', 'feminine-coach'),
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
                'sanitize_callback' => array('Feminine_Business_Repeater_Setting', 'sanitize_repeater_setting'),
            )
        )
    );

    $wp_customize->add_control(
        new Feminine_Business_Control_Repeater(
            $wp_customize,
            'social_links',
            array(
                'section' => 'social_settings',
                'label'   => esc_html__('Social Links', 'feminine-coach'),
                'fields'  => array(
                    'fbp_pro_icon' => array(
                        'type'        => 'select',
                        'label'       => esc_html__('Social Media', 'feminine-coach'),
                        'choices'     => feminine_business_get_svg_icons()
                    ),
                    'fbp_pro_link' => array(
                        'type'        => 'url',
                        'label'       => esc_html__('Link', 'feminine-coach'),
                        'description' => esc_html__('Example: https://facebook.com', 'feminine-coach'),
                    ),
                    'fbp_pro_checkbox' => array(
                        'type'        => 'checkbox',
                        'label'       => esc_html__('Open link in new tab', 'feminine-coach'),
                    )
                ),
                'row_label' => array(
                    'type'  => 'field',
                    'value' => esc_html__('links', 'feminine-coach'),
                    'field' => 'link'
                )
            )
        )
    );

    /** Enable Search */
    $wp_customize->add_setting(
        'ed_search',
        array(
            'default'           => true,
            'sanitize_callback' => 'feminine_business_sanitize_checkbox'
        )
    );

    $wp_customize->add_control(
        new Feminine_Business_Toggle_Control(
            $wp_customize,
            'ed_search',
            array(
                'section'     => 'header_settings',
                'label'          => esc_html__('Enable Search', 'feminine-coach'),
                'description' => esc_html__('Enable to show Search icon at header.', 'feminine-coach'),
            )
        )
    );

    $wp_customize->add_setting(
        'newsletter_title',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post',
        )
    );

    $wp_customize->add_control(
        'newsletter_title',
        array(
            'label'             => __('Newsletter Title', 'feminine-coach'),
            'type'              => 'text',
            'section'           => 'feminine_business_newsletter',
            'priority'          => 50
        )
    );
}
add_action('customize_register', 'feminine_business_customize_register_social_links');

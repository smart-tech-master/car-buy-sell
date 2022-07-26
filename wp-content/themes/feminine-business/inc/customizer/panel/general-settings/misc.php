<?php
/**
 * Miscellaneous Settings
 *
 * @package Feminine_Business
 */
if ( ! function_exists( 'feminine_business_customize_register_misc_settings' ) ) :

function feminine_business_customize_register_misc_settings( $wp_customize ) {

    /** Miscellaneous Settings */
    $wp_customize->add_section(
        'misc_settings',
        array(
            'title'    => __( 'Misc Settings', 'feminine-business' ),
            'priority' => 85,
            'panel'    => 'general_settings',
        )
    );

    $wp_customize->add_setting(
        'ed_scroll_top',
        array(
            'default'           => false,
            'sanitize_callback' => 'feminine_business_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        new Feminine_Business_Toggle_Control( 
            $wp_customize,
            'ed_scroll_top',
            array(
                'section'		=> 'misc_settings',
                'label'			=> __( 'Scroll To Top', 'feminine-business' ),
                'description'	=> __( 'You can enable/disable Scroll to Top.', 'feminine-business' ),
            )
        )
    );

}
endif;
add_action( 'customize_register', 'feminine_business_customize_register_misc_settings' );
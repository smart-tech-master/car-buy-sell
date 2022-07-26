<?php
/**
 * Feminine Business Custom Control
 * 
 * @package Feminine_Business
*/

if( ! function_exists( 'feminine_business_register_custom_controls' ) ) :
/**
 * Register Custom Controls
*/
function feminine_business_register_custom_controls( $wp_customize ){    
    
    // Load our custom control.
    require_once get_template_directory() . '/inc/custom-controls/note/class-note-control.php';
    require_once get_template_directory() . '/inc/custom-controls/radioimg/class-radio-image-control.php';
    require_once get_template_directory() . '/inc/custom-controls/repeater/class-repeater-setting.php';
    require_once get_template_directory() . '/inc/custom-controls/repeater/class-control-repeater.php';
    require_once get_template_directory() . '/inc/custom-controls/toggle/class-toggle-control.php';    
    // Register the control type.

    $wp_customize->register_control_type( 'Feminine_Business_Radio_Image_Control' );
    $wp_customize->register_control_type( 'Feminine_Business_Toggle_Control' );
}
endif;
add_action( 'customize_register', 'feminine_business_register_custom_controls' );
<?php
/**
 * Contact Page Theme Option.
 * 
 * @package Feminine_Business
 */
if ( ! function_exists( 'feminine_business_customize_register_contact' ) ) :
    
function feminine_business_customize_register_contact( $wp_customize ) {
    
    /** contact Page Settings */
    $wp_customize->add_panel( 
        'contact_page_settings',
         array(
            'priority'    => 50,
            'title'       => __( 'Contact Page Settings', 'feminine-business' ),
            'description' => __( 'Customize contact Page Sections', 'feminine-business' ),
        ) 
    );

}
endif;
add_action( 'customize_register', 'feminine_business_customize_register_contact' );
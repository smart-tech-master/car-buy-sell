<?php
/**
 * Active Callback
 * 
 * @package Feminine_Business
*/

if ( ! function_exists( 'feminine_business_banner_ac' ) ) :
/**
 * Active Callback for Banner Slider
*/
function feminine_business_banner_ac( $control ){
    $banner           = $control->manager->get_setting( 'ed_banner_section' )->value();
    $control_id       = $control->id;
    
    if ( $control_id == 'header_image' && $banner == 'static_banner' ) return true;
    if ( $control_id == 'header_video' && $banner == 'static_banner' ) return true;
    if ( $control_id == 'external_header_video' && $banner == 'static_banner' ) return true;
    if ( $control_id == 'banner_title' && $banner == 'static_banner' ) return true;
    if ( $control_id == 'banner_content' && $banner == 'static_banner' ) return true;
    if ( $control_id == 'banner_btn_label' && $banner == 'static_banner' ) return true;
    if ( $control_id == 'banner_link' && $banner == 'static_banner' ) return true;
    if ( $control_id == 'banner_btn_two_label' && $banner == 'static_banner' ) return true;
    if ( $control_id == 'banner_btn_two_link' && $banner == 'static_banner' ) return true;
    
    if ( $control_id == 'slider_btn_label' && $banner == 'slider_banner' ) return true;
    if ( $control_id == 'slider_auto' && $banner == 'slider_banner' ) return true;
    if ( $control_id == 'slider_loop' && $banner == 'slider_banner' ) return true;           

    return false;
}
endif;

if ( ! function_exists( 'feminine_business_contact_page_ac' ) ) :
/**
 * Active Callback for Contact Page Map section
 */
function feminine_business_contact_page_ac( $control ){
    $ed_map     = $control->manager->get_setting( 'ed_googlemap' )->value();
    $control_id = $control->id;

    if( $ed_map && $control_id == 'contact_map_title' ) return true;
    if( $ed_map && $control_id == 'contact_google_map_iframe' ) return true;
    
    return false;
}
endif;
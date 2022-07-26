<?php
/**
 * Active callback functions.
 *
 * @package Soft Business
 */

function soft_business_featured_slider_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[enable_featured_slider_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

function soft_business_featured_slider_page( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[featured_slider_content_type]' )->value();
    return ( soft_business_featured_slider_active( $control ) && ( 'featured_slider_page' == $content_type ) );
}

function soft_business_featured_slider_post( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[featured_slider_content_type]' )->value();
    return ( soft_business_featured_slider_active( $control ) && ( 'featured_slider_post' == $content_type ) );
}

function soft_business_our_services_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[enable_our_services_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

function soft_business_our_services_page( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[our_services_content_type]' )->value();
    return ( soft_business_our_services_active( $control ) && ( 'our_services_page' == $content_type ) );
}

function soft_business_our_services_post( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[our_services_content_type]' )->value();
    return ( soft_business_our_services_active( $control ) && ( 'our_services_post' == $content_type ) );
}

function soft_business_call_to_action_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[enable_call_to_action_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

function soft_business_blog_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[enable_blog_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}
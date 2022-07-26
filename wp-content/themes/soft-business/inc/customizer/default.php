<?php
/**
 * Default theme options.
 *
 * @package Soft Business
 */

if ( ! function_exists( 'soft_business_get_default_theme_options' ) ) :

	/**
	 * Get default theme options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Default theme options.
	 */
function soft_business_get_default_theme_options() {

	$defaults = array();

    // Homepage Options
	$defaults['enable_frontpage_content'] 		= false;

	// Featured Slider Section	
	$defaults['enable_featured_slider_section']		= false;
	$defaults['number_of_featured_slider_items']	= 3;
	$defaults['featured_slider_content_type']		= 'featured_slider_page';

	// Our Services Section	
	$defaults['enable_our_services_section']		= false;
	$defaults['number_of_our_services_items']		= 3;
	$defaults['our_services_content_type']			= 'our_services_page';

	// Call to action Section	
	$defaults['enable_call_to_action_section']	   	= false;
	$defaults['call_to_action_title']	   	 		= esc_html__( 'We Provide Business Planing Solution', 'soft-business' );
	$defaults['call_to_action_button_label']	   	= esc_html__( 'Contact Us', 'soft-business' );
	$defaults['call_to_action_button_url']	   	 	= '#';

	// Latest Posts Section
	$defaults['enable_blog_section']		= false;
	$defaults['blog_section_title']			= esc_html__( 'Latest News & Articles', 'soft-business' );
	$defaults['blog_category']	   			= 0; 
	$defaults['blog_number']				= 3;

	//General Section
	$defaults['readmore_text']					= esc_html__('Read More','soft-business');
	$defaults['your_latest_posts_title']		= esc_html__('Blog','soft-business');
	$defaults['excerpt_length']					= 15;
	$defaults['layout_options_blog']			= 'no-sidebar';
	$defaults['layout_options_archive']			= 'no-sidebar';
	$defaults['layout_options_page']			= 'no-sidebar';	
	$defaults['layout_options_single']			= 'right-sidebar';	

	//Footer section 		
	$defaults['copyright_text']					= esc_html__( 'Copyright &copy; All rights reserved.', 'soft-business' );

	// Pass through filter.
	$defaults = apply_filters( 'soft_business_filter_default_theme_options', $defaults );
	return $defaults;
}

endif;

/**
*  Get theme options
*/
if ( ! function_exists( 'soft_business_get_option' ) ) :

	/**
	 * Get theme option
	 *
	 * @since 1.0.0
	 *
	 * @param string $key Option key.
	 * @return mixed Option value.
	 */
	function soft_business_get_option( $key ) {

		$default_options = soft_business_get_default_theme_options();
		if ( empty( $key ) ) {
			return;
		}

		$theme_options = (array)get_theme_mod( 'theme_options' );
		$theme_options = wp_parse_args( $theme_options, $default_options );

		$value = null;

		if ( isset( $theme_options[ $key ] ) ) {
			$value = $theme_options[ $key ];
		}

		return $value;

	}

endif;
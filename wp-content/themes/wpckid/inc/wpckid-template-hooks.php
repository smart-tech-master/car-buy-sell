<?php
/**
 * WPCkid hooks
 *
 * @package wpckid
 */

/**
 * General
 *
 * @see  wpckid_get_sidebar()
 */

add_action( 'wpckid_sidebar', 'wpckid_get_sidebar', 10 );

/**
 * Header
 *
 * @see  wpckid_skip_links()
 * @see  wpckid_secondary_navigation()
 * @see  wpckid_site_branding()
 * @see  wpckid_primary_navigation()
 */
add_action( 'wpckid_header', 'wpckid_header_container', 0 );
add_action( 'wpckid_header', 'wpckid_header_row', 1 );
add_action( 'wpckid_header', 'wpckid_header_left_open', 2 );
add_action( 'wpckid_header', 'wpckid_skip_links', 5 );
add_action( 'wpckid_header', 'wpckid_handheld_navigation_button', 10 );
add_action( 'wpckid_header', 'wpckid_primary_navigation', 15 );
add_action( 'wpckid_header', 'wpckid_header_left_close', 16 );
add_action( 'wpckid_header', 'wpckid_site_branding', 20 );
add_action( 'wpckid_header', 'wpckid_header_right_open', 21 );
add_action( 'wpckid_header', 'wpckid_header_right_close', 36 );
add_action( 'wpckid_header', 'wpckid_header_row_close', 41 );
add_action( 'wpckid_header', 'wpckid_header_row', 70 );
add_action( 'wpckid_header', 'wpckid_handheld_navigation', 75 );
add_action( 'wpckid_header', 'wpckid_header_row_close', 79 );
add_action( 'wpckid_header', 'wpckid_header_container_close', 99 );

/**
 * Before Content
 *
 * @see  woocommerce_breadcrumb()
 * @see  wpckid_page_title()
 */
add_action( 'wpckid_before_content', 'wpckid_title_bar_open', 10 );
add_action( 'wpckid_before_content', 'wpckid_page_title', 11 );
if ( wpckid_is_woo_activated() ) {
	add_action( 'wpckid_before_content', 'woocommerce_breadcrumb', 12 );
}
add_action( 'wpckid_before_content', 'wpckid_title_bar_close', 13 );

/**
 * Footer
 *
 * @see  wpckid_footer_widgets()
 * @see  wpckid_credit()
 */
add_action( 'wpckid_footer', 'wpckid_footer_widgets', 10 );
add_action( 'wpckid_footer', 'wpckid_credit', 20 );


/**
 * Posts
 *
 * @see  wpckid_post_header()
 * @see  wpckid_post_meta()
 * @see  wpckid_post_content()
 * @see  wpckid_paging_nav()
 * @see  wpckid_single_post_header()
 * @see  wpckid_post_nav()
 * @see  wpckid_display_comments()
 */
add_action( 'wpckid_post_header_before', 'wpckid_post_meta', 5 );
add_action( 'wpckid_loop_post', 'wpckid_post_header', 10 );
add_action( 'wpckid_loop_post', 'wpckid_post_content', 30 );
add_action( 'wpckid_loop_after', 'wpckid_paging_nav', 10 );
add_action( 'wpckid_single_post', 'wpckid_post_header', 10 );
add_action( 'wpckid_single_post', 'wpckid_post_content', 30 );
add_action( 'wpckid_single_post_bottom', 'wpckid_edit_post_link', 5 );
add_action( 'wpckid_single_post_bottom', 'wpckid_display_comments', 20 );
add_action( 'wpckid_post_content_before', 'wpckid_post_thumbnail', 10 );

/**
 * Pages
 *
 * @see  wpckid_page_header()
 * @see  wpckid_page_content()
 * @see  wpckid_display_comments()
 */
add_action( 'wpckid_page', 'wpckid_page_header', 10 );
add_action( 'wpckid_page', 'wpckid_page_content', 20 );
add_action( 'wpckid_page', 'wpckid_edit_post_link', 30 );
add_action( 'wpckid_page_after', 'wpckid_display_comments', 10 );


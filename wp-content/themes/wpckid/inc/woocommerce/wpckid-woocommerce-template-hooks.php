<?php
/**
 * WPCkid WooCommerce hooks
 *
 * @package wpckid
 */

/**
 * Layout
 *
 * @see  wpckid_before_content()
 * @see  wpckid_after_content()
 * @see  woocommerce_breadcrumb()
 * @see  wpckid_shop_messages()
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

add_action( 'woocommerce_before_main_content', 'wpckid_before_content', 10 );
add_action( 'woocommerce_after_main_content', 'wpckid_after_content', 10 );
add_action( 'wpckid_content_top', 'wpckid_shop_messages', 15 );
add_action( 'woocommerce_before_shop_loop', 'wpckid_show_category_list', 5 );
add_action( 'woocommerce_before_shop_loop', 'wpckid_sorting_wrapper', 9 );
add_action( 'woocommerce_before_shop_loop', 'wpckid_button_grid_list_layout', 30 );
add_action( 'woocommerce_before_shop_loop', 'wpckid_sorting_wrapper_close', 31 );

/**
 * Products
 *
 * @see wpckid_edit_post_link()
 * @see wpckid_upsell_display()
 */
remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );

add_action( 'woocommerce_single_product_summary', 'woocommerce_show_product_sale_flash', 4 );
add_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_link_close', - 1 );
add_action( 'woocommerce_before_shop_loop_item_title', 'wpckid_product_label_stock', 9 );
add_action( 'woocommerce_after_shop_loop_item_title', 'wpckid_woocommerce_get_product_description', 15 );
add_action( 'woocommerce_single_product_summary', 'wpckid_edit_post_link', 60 );
add_action( 'woocommerce_after_single_product_summary', 'wpckid_upsell_display', 15 );
add_action( 'woocommerce_after_add_to_cart_button', 'wpckid_wishlist_button', 20 );
add_action( 'woocommerce_after_add_to_cart_button', 'wpckid_compare_button', 25 );

/**
 * WPC plugins compatible
 */
// WPC Smart Quick View
add_filter( 'woosq_button_position', function () {
	return 'after_add_to_cart';
} );

// WPC Smart Compare
add_filter( 'woosc_button_position_single', '__return_false' );
add_filter( 'woosc_button_position_archive', function () {
	return 'after_add_to_cart';
} );
add_filter( 'woosc_bar_bg_color_default', function () {
	return '#222222';
}, 10 );
add_filter( 'woosc_bar_btn_color_default', function () {
	return '#63A86D';
}, 10 );

// WPC Smart Wishlist
add_filter( 'woosw_button_position_single', '__return_false' );
add_filter( 'woosw_button_position_archive', function () {
	return 'after_add_to_cart';
} );
add_filter( 'woosw_color_default', function () {
	return '#63A86D';
}, 10 );

/**
 * Header
 *
 * @see wpckid_header_search()
 * @see wpckid_header_account()
 * @see wpckid_header_wishlist()
 * @see wpckid_header_cart()
 */
add_action( 'wpckid_header', 'wpckid_header_search', 22 );
add_action( 'wpckid_header', 'wpckid_header_account', 25 );
add_action( 'wpckid_header', 'wpckid_header_compare', 27 );
add_action( 'wpckid_header', 'wpckid_header_wishlist', 29 );
add_action( 'wpckid_header', 'wpckid_header_cart', 30 );

/**
 * Cart fragment
 *
 * @see wpckid_cart_link_fragment()
 */
add_filter( 'woocommerce_add_to_cart_fragments', 'wpckid_cart_link_fragment' );

/**
 * Removing the title on the WooCommerce archive pages
 */
add_filter( 'woocommerce_show_page_title', '__return_null' );

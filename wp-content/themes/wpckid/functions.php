<?php
/**
 * WPCkid engine room
 *
 * @package wpckid
 */

/**
 * Assign the WPCkid version to a var
 */
$wpckid_theme   = wp_get_theme( 'wpckid' );
$wpckid_version = $wpckid_theme['Version'];

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 980; /* pixels */
}

$wpckid = (object) array(
	'version'    => $wpckid_version,
	'main'       => require 'inc/class-wpckid.php',
	'customizer' => require 'inc/customizer/class-wpckid-customizer.php',
);

require 'inc/wpckid-functions.php';
require 'inc/wpckid-template-hooks.php';
require 'inc/wpckid-template-functions.php';
require 'inc/wpckid-notice.php';
require 'inc/wordpress-shims.php';

if ( wpckid_is_woo_activated() ) {
	$wpckid->woocommerce = require 'inc/woocommerce/class-wpckid-woocommerce.php';

	require 'inc/woocommerce/wpckid-woocommerce-template-hooks.php';
	require 'inc/woocommerce/wpckid-woocommerce-template-functions.php';
	require 'inc/woocommerce/wpckid-woocommerce-functions.php';
}

<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * Feminine Coach functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Feminine_Coach
 */

/**
 * After Setup Theme Hooks, Styles and Scripts
 */
require get_stylesheet_directory() . '/includes/custom-functions.php';

/**
* Customizer settings
*/
require get_stylesheet_directory() . '/includes/customizer.php';

/**
* Extra Functions
*/
require get_stylesheet_directory() . '/includes/extra-functions.php';
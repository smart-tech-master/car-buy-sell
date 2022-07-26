<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package wpckid
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="//gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<?php do_action( 'wpckid_before_site' ); ?>

<div id="page" class="hfeed site">
	<?php do_action( 'wpckid_before_header' ); ?>

  <header id="masthead" class="site-header" role="banner" style="<?php wpckid_header_styles(); ?>">

	  <?php
	  do_action( 'wpckid_header' );
	  /**
	   * Functions hooked into wpckid_header action
	   *
	   * @see wpckid_header_container                 - 0
	   * @see wpckid_header_row                       - 1
	   * @see wpckid_skip_links                       - 5
	   * @see wpckid_handheld_navigation_button       - 10
	   * @see wpckid_primary_navigation               - 15
	   * @see wpckid_site_branding                    - 20
	   * @see wpckid_header_search                    - 22
	   * @see wpckid_header_account                   - 25
	   * @see wpckid_header_wishlist                  - 28
	   * @see wpckid_header_cart                      - 30
	   * @see wpckid_header_row_close                 - 41
	   * @see wpckid_header_row                       - 70
	   * @see wpckid_handheld_navigation              - 75
	   * @see wpckid_header_row_close                 - 79
	   * @see wpckid_header_container_close           - 99
	   *
	   */
	  ?>

  </header><!-- #masthead -->

	<?php
	/**
	 * Functions hooked in to wpckid_before_content
	 *
	 * @see woocommerce_breadcrumb - 10
	 */
	do_action( 'wpckid_before_content' );
	?>

  <div id="content" class="site-content" tabindex="-1">
    <div class="col-full">

<?php
do_action( 'wpckid_content_top' );


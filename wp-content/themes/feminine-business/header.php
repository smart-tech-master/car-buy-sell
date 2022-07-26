<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */

/**
 * @package Feminine_Business
 *
 * DOCTYPE hook
 * 
 * @hooked feminine_business_doctype
 * 
 */
do_action( 'feminine_business_doctype' );
?>
<head itemscope itemtype="https://schema.org/WebSite">
<?php 
    /**
     * Before wp_head
     * 
     * @hooked feminine_business_head
    */
    do_action( 'feminine_business_before_wp_head' );

	wp_head(); ?>
</head>

<body <?php body_class(); ?> itemscope itemtype="https://schema.org/WebPage">
<?php wp_body_open(); ?>

<?php
    /**
     * Before Header
     * 
     * @hooked feminine_business_page_start 
    */
    do_action( 'feminine_business_before_header' );

	/**
	 * Header
	 * 
	 * @hooked feminine_business_top_header        - 10 
     * @hooked feminine_business_banner            - 20
     * @hooked feminine_business_content_start     - 30
	 */
	do_action( 'feminine_business_header' );
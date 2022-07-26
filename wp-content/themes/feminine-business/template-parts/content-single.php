<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Feminine_Business
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<?php 
	/**
	 * Entry Header
	 * @hooked feminine_business_entry_header - 10
	 */
	do_action( 'feminine_business_post_entry_header' );

	/**
	 * @hooked feminine_business_entry_content - 15
	 * @hooked feminine_business_entry_footer - 20
	 */
	do_action( 'feminine_business_post_entry_content' ) ; 
	?>
	
</article><!-- #post-<?php the_ID(); ?> -->

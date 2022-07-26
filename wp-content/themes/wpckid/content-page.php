<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package wpckid
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	/**
	 * Functions hooked in to wpckid_page add_action
	 *
	 * @see wpckid_page_header          - 10
	 * @see wpckid_page_content         - 20
	 */
	do_action( 'wpckid_page' );
	?>
</article><!-- #post-## -->

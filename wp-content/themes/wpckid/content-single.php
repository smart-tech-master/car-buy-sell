<?php
/**
 * Template used to display post content on single pages.
 *
 * @package wpckid
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
	do_action( 'wpckid_single_post_top' );

	/**
	 * Functions hooked into wpckid_single_post add_action
	 *
	 * @see wpckid_post_header          - 10
	 * @see wpckid_post_content         - 30
	 */
	do_action( 'wpckid_single_post' );

	/**
	 * Functions hooked in to wpckid_single_post_bottom action
	 *
	 * @see wpckid_post_nav         - 10
	 * @see wpckid_display_comments - 20
	 */
	do_action( 'wpckid_single_post_bottom' );
	?>

</article><!-- #post-## -->

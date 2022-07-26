<?php
/**
 * Template used to display post content.
 *
 * @package wpckid
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
	/**
	 * Functions hooked in to wpckid_loop_post action.
	 *
	 * @see wpckid_post_header          - 10
	 * @see wpckid_post_content         - 30
	 * @see wpckid_post_taxonomy        - 40
	 */
	do_action( 'wpckid_loop_post' );
	?>

</article><!-- #post-## -->

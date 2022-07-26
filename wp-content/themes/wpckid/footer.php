<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package wpckid
 */

?>

</div><!-- .col-full -->
</div><!-- #content -->

<?php do_action( 'wpckid_before_footer' ); ?>

<?php if ( ! is_404() ) { ?>
  <footer id="colophon" class="site-footer" role="contentinfo">
    <div class="col-full">

		<?php
		/**
		 * Functions hooked in to wpckid_footer action
		 *
		 * @see wpckid_footer_widgets - 10
		 * @see wpckid_credit         - 20
		 */
		do_action( 'wpckid_footer' );
		?>

    </div><!-- .col-full -->
  </footer><!-- #colophon -->
<?php } ?>

<?php do_action( 'wpckid_after_footer' ); ?>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

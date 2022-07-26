<?php
/**
 * Template Name: Full-width Page Template
 *
 * @package patricia-lite
 */

get_header(); ?>

<div class="col-md-12 content-area">
	<div class="post-inner">

	<?php
		while ( have_posts() ) : the_post();
		$sticky_class = ( is_sticky() ) ? 'vt-post-sticky' : null;
	?>
		
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						  
			<div class="post-inner">
				
				<div class="entry-content">
					<h2 class="entry-title post-title"><?php the_title_attribute(); ?></h2>
							
					<div class="entry-summary">
						<?php the_content(); ?>
						<?php
							wp_link_pages( array(
								'before' => '<div class="page-links">' . __( 'Pages:', 'patricia-lite' ),
								'after'  => '</div>',
							) );
						?>
						<?php edit_post_link( __( 'Edit', 'patricia-lite' ), '<span class="edit-link">', '</span>' ); ?>
					</div>

					<?php
						// If comments are open or we have at least one comment, load up the comment template
						if ( comments_open() || '0' != get_comments_number() ) :
							comments_template();
						endif;
					?>

				</div><!-- .entry-content -->

			</div><!-- post-inner -->
			  
		</article><!-- #post-## -->
			
	<?php endwhile; // end of the loop. ?>

	</div>
</div><!-- content-area -->

<?php get_footer(); ?>
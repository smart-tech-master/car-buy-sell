<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Feminine_Business
 */

get_header();
$ed_author    = get_theme_mod( 'ed_post_author', false );
?>
	<div class="container">
		<div class="page-grid">
			<div id="primary" class="content-area">
				<main id="main" class="site-main">
					<?php
						while ( have_posts() ) :
							
							the_post();

							get_template_part( 'template-parts/content', 'single' );

						endwhile; // End of the loop.

						if( !$ed_author && get_the_author_meta( 'description' ) ) feminine_business_author_box(); 
						
						feminine_business_get_related_posts();

						feminine_business_get_comments(); 
					
					?>
				</main><!-- #main -->
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>
<?php
get_footer();

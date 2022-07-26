<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Feminine_Business
 */

get_header();
?>
	<div class="content-area" id="primary">
        <div class="container">
            <div class="page-grid">
				<main id="main" class="site-main">
					<?php         
                    /**
                     * * @hooked feminine_business_primary_page_header - 10
                    */
                    do_action( 'feminine_business_before_posts_content' ); ?>
					<div class="content-wrap-main">
					<?php
						if ( have_posts() ) :

							/* Start the Loop */
							while ( have_posts() ) :
								the_post();

								/*
								* Include the Post-Type-specific template for the content.
								* If you want to override this in a child theme, then include a file
								* called content-___.php (where ___ is the Post Type name) and that will be used instead.
								*/
								get_template_part( 'template-parts/content', get_post_type() );

							endwhile;

						else :

							get_template_part( 'template-parts/content', 'none' );

						endif;
					?>
					</div>
					<?php feminine_business_nav(); ?>
				</main><!-- #main -->
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
<?php
get_footer();

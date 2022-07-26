<?php
/**
 *


 *
 * @package Vinyl News Magazine
 */

get_header();

if(get_header_image()){ ?>
    <div class="header-image"><img alt="" src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>"></div>
    <?php } ?>

<div class="royal-news-magazine-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
				<main id="primary" class="site-main">

					<?php if ( have_posts() ) : ?>

						
						<div class="archive-posts">
						<?php
						/* Start the Loop */
						while ( have_posts() ) :
							the_post();

							/*
							* Include the Post-Type-specific template for the content.
							* If you want to override this in a child theme, then include a file
							* called content-___.php (where ___ is the Post Type name) and that will be used instead.
							*/
							get_template_part( 'template-parts/content', get_post_type() );

						endwhile; ?>
						
						</div>

						<?php the_posts_navigation();
						
						

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif;
					?>
					

				</main><!-- #main -->
			</div>


			</div>
				</div>
				</div>

<?php

get_footer();
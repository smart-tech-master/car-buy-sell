<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Feminine_Business
 */

get_header(); ?>
	<div class="content-area" id="primary">
		<div class="container">
			<div class="page-grid">
				<div id="primary" class="content-area">
					<div id="main" class="site-main">
						<?php         
						/**
						 * * @hooked feminine_business_primary_page_header - 10
						*/
						do_action( 'feminine_business_before_posts_content' ); ?>
						<div class="content-wrap-main">
							<?php
								if ( have_posts() ) { 
									/* Start the Loop */
									while ( have_posts() ) {
										the_post();

										/**
										 * Run the loop for the search to output the results.
										 * If you want to overload this in a child theme then include a file
										 * called content-search.php and that will be used instead.
										 */
										get_template_part( 'template-parts/content', 'archive' );

									}
								}else{
									get_template_part( 'template-parts/content', 'none' );
								} ?>
						</div> 
						<?php feminine_business_nav(); ?>
					</div>
				</div>
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
<?php
get_footer();

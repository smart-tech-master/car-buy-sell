<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Author Personal Blog
 */
get_header();
get_template_part('template-parts/page-header/page', 'header');
?>
	<section id="primary" class="content-area archive-page-section">
		<main id="main" class="site-main">
			<?php
			do_action( 'author_personal_blog_before_default_page' );
			if ( have_posts() ) :
				echo '<div class="row'.author_personal_blog_masonry_layout_control().'">';
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();
						get_template_part( 'template-parts/content/content', 'search' );
					endwhile;
					echo '</div>';
					author_personal_blog_navigation();
				else :
					get_template_part( 'template-parts/content/content', 'none' );
				endif;
				do_action( 'author_personal_blog_after_default_page' );
				?>
		</main><!-- #main -->
	</section><!-- #primary -->
<?php get_footer(); ?>

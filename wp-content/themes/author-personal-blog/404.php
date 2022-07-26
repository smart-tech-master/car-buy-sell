<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Author Personal Blog
 */
get_header();
?>
<div id="primary" class="content-area">
	<main id="main" class="site-main">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<section class="error-404 not-found">
						<header class="page-header">
							<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'author-personal-blog' ); ?></h1>
						</header><!-- .page-header -->
						<div class="page-content">
							<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'author-personal-blog' ); ?></p>
							<?php get_search_form(); ?>
						</div><!-- .page-content -->
					</section><!-- .error-404 -->
				</div>
			</div>
			<aside id="secondary" class="row widget-area">
				<div class="col-md-4 pr-xl-5">
					<?php the_widget('WP_Widget_Categories', array('count' => 1)); ?>
				</div>
				<div class="col-md-4 pr-xl-5">
					<?php the_widget('WP_Widget_Recent_Posts', array('title' => __( 'Recent Posts','author-personal-blog' ), 'number' => 6)); ?>
				</div>
				<div class="col-md-4">
					<?php the_widget('WP_Widget_Tag_Cloud'); ?>
				</div>
			</div>
		</div>
	</main><!-- #main -->
</div><!-- #primary -->
<?php get_footer(); ?>

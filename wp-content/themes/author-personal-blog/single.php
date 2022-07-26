<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Author Personal Blog
 */
get_header();
$s_post_el_is_on = array(
	'show_post_category' => get_theme_mod('show_single_post_category', true),
	'show_post_thumbnail' => get_theme_mod('show_single_post_thumbnail', true),
	'show_post_date' => get_theme_mod('show_single_post_date', true),
	'show_post_comments' => get_theme_mod('show_single_post_comments', true),
	'show_post_author' => get_theme_mod('show_single_post_author', true),
	'show_post_title' => get_theme_mod('show_single_post_title', true),
	'show_recommend_posts' => get_theme_mod('show_recommend_posts', true),
	'show_post_navigation' => get_theme_mod('show_post_navigation', true),
	'show_post_tags' => get_theme_mod('show_single_post_tags', true),
	'post_layout' => get_theme_mod('post_page_layout', '1'),
	'show_post_author_box' => get_theme_mod('show_post_author_box', true),
);
?>

<div class="single-post-header-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="single-post-header-content text-left">
					<?php
					if(true == $s_post_el_is_on['show_post_category']) :
					?>
					<div class="author-personal-blog-standard-post__post-meta">
						<?php author_personal_blog_categories(); ?>
					</div>
					<?php endif;?>
					<div class="author-personal-blog-standard-post__post-title pl-0">
						<?php
						if(true == $s_post_el_is_on['show_post_title']) :?>
							<h1 class="single-post-title"><?php the_title(); ?></h1>
						<?php endif;
						?>
					</div>
					<div class="author-personal-blog-standard-post__post-meta-wrapper">
						<div class="author-personal-blog-standard-post__post-meta-single pl-0">
							<?php
							if (true == $s_post_el_is_on['show_post_author']) :
								author_personal_blog_posted_by( false );
							endif;
							if(true == $s_post_el_is_on['show_post_date']) :
								author_personal_blog_posted_on(false);
							endif;
							if (true == $s_post_el_is_on['show_post_comments']) :
								author_personal_blog_comment_popuplink();
							endif;
							?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<?php if ( has_post_thumbnail() ) : ?>
					<div class="author-personal-blog-standard-post__thumbnail post-header p-0">
						<?php
						if (true == $s_post_el_is_on['show_post_thumbnail']) :
							author_personal_blog_post_thumbnail();
						endif;?>
					</div>
				<?php endif;?>
			</div>
		</div>
	</div>
</div>


<div id="primary" class="content-area">
	<main id="main" class="site-main">
		<?php do_action('author_personal_blog_before_default_page'); ?>
			<div class="post-details-page">
				<?php
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/content/content', 'single' );
				endwhile; // End of the loop.
				if(true == $s_post_el_is_on['show_post_navigation']):
					author_personal_blog_post_page_navigation();
				endif;

				if( true == $s_post_el_is_on['show_post_author_box'] ) :
					author_personal_blog_postedby();
				endif;
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
				if (true == $s_post_el_is_on['show_recommend_posts']) :
					echo '<div class="related-post-wrapper">';
						author_personal_blog_cats_related_post();
					echo '</div>';
				endif;
				?>
			</div>
		<?php do_action('author_personal_blog_after_default_page'); ?>
	</main><!-- #main -->
</div><!-- #primary -->
<?php
get_footer();

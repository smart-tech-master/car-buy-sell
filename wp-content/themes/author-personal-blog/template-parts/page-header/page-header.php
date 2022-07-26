<?php
/**
 * Rs Personal Blog Pro Page Header
 */
?>
<section class="page-header-area">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-left">
				<?php
				do_action('author_personal_blog_before_page_title');
				if (is_page()) :
				?>
				<h1 class="page-title text-left"><?php the_title(); ?></h1>
				<?php
				elseif(is_category() || is_tag() || is_tax()):
					the_archive_title( '<h1 class="page-title text-left">', '</h1>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
				elseif(is_author()):
					author_personal_blog_author_vcard();
				elseif (is_search()):
					printf( esc_html__( 'Search Results for: %s', 'author-personal-blog' ), '<span>' . get_search_query() . '</span>' );
				elseif (is_post_type_archive()) :
					?>
					<h1 class="page-title text-left">
						<?php post_type_archive_title(); ?>
					</h1>
					<div class="archive-description">
						<?php the_archive_description(); ?>
					</div>
					<?php
				endif;
				 do_action('author_personal_blog_after_page_title'); ?>
			</div>
		</div>
	</div>
</section>
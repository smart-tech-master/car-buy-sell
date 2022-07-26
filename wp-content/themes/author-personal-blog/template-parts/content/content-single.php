<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Author Personal Blog
 */

$s_post_el_is_on = array(
	'show_post_author' => get_theme_mod('show_single_post_author', true),
	'show_post_tags' => get_theme_mod('show_single_post_tags', true),
);

$nolinebetweenmeta = '';
if (false == $s_post_el_is_on['show_post_author']) {
	$nolinebetweenmeta = ' no-line-between-meta';
}
$singlePostExtraClassess = 'author-personal-blog-standard-post';
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( $singlePostExtraClassess ); ?>>
	<div class="author-personal-blog-standard-post__entry-content text-left">
		<div class="author-personal-blog-standard-post__content-wrapper pl-0 pr-0">
			<div class="author-personal-blog-standard-post__content-inner">
				<div class="author-personal-blog-standard-post__full-summery text-left">
					<?php
						the_content();
						wp_link_pages(
							array(
								'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'author-personal-blog' ),
								'after'  => '</div>',
							)
						);
					?>
				</div>
				<?php if( true == $s_post_el_is_on['show_post_tags']) : ?>
					<div class="author-personal-blog-standard-post_post-meta text-left">
						<?php author_personal_blog_post_tag(); ?>
					</div>
				<?php endif;?>
			</div>
		</div>
	</div>
</article>

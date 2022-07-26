<?php
$get_post_column_layout = '3';
if (is_home()) {
	$get_post_column_layout = get_theme_mod('blog_page_post_column', '3');
}elseif(is_search()){
	$get_post_column_layout = get_theme_mod('search_page_post_column', '3');
}elseif(is_archive()){
	$get_post_column_layout = get_theme_mod('archive_page_post_column', '3');
}
$post_column_layout = 'col-sm-12 col-md-6 col-lg-4';
if ( $get_post_column_layout == 2 ) {
	$post_column_layout = 'col-lg-6 col-md-12';
} elseif ( $get_post_column_layout == 3 ) {
	$post_column_layout = 'col-sm-12 col-md-6 col-lg-4';
} elseif ( $get_post_column_layout == 4 ) {
	$post_column_layout = 'col-sm-12 col-md-6 col-lg-3';
}
$post_classes = 'author-personal-blog-standard-post';
if ( ! has_post_thumbnail() ) {
	$post_classes = 'author-personal-blog-standard-post no-post-thumbnail ';
}
$post_el_is_on = array(
	'show_post_category' => get_theme_mod('show_post_category', true),
	'show_post_thumbnail' => get_theme_mod('show_post_thumbnail', true),
	'show_post_date' => get_theme_mod('show_post_date', true),
	'show_post_author' => get_theme_mod('show_post_author', true),
	'show_post_title' => get_theme_mod('show_post_title', true),
	'show_post_excerpt' => get_theme_mod('show_post_excerpt', true),
);
if (!is_single()) :
?>
<div class="<?php echo esc_attr( $post_column_layout ); ?> blog-grid-layout">
<?php endif; ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class( $post_classes ); ?>>
		<div class="author-personal-blog-standard-post__entry-content text-left">
			<div class="author-personal-blog-standard-post__overlay-layout">
				<?php
				$hasPostThumb = true;
				$hasPostThumbClass = ' has-post-thumbnail';
				if (!has_post_thumbnail() || false === get_the_post_thumbnail_url(get_the_ID())) {
					$hasPostThumb = false;
					$hasPostThumbClass = ' no-post-thumbnail';
				}elseif (has_post_thumbnail()) {
					$hasPostThumbClass = ' has-post-thumbnail';
					$hasPostThumb = true;
				}else{
					$hasPostThumbClass = '';
				}
				?>
				<div class="post-thumbnail<?php echo esc_attr($hasPostThumbClass);?>" style="background-image: url(<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'author-personal-blog-overlay-thumbnail') );?>);"></div>
				<div class="author-personal-blog-standard-post__overlay-content<?php echo esc_attr($hasPostThumbClass);?>">
					<div class="content-container">
						<div class="author-personal-blog-standard-post__post-meta">
							<?php
							if(true == $post_el_is_on['show_post_category']) :
							?>
							<div class="author-personal-blog-standard-post__post-meta mb-3">
								<?php author_personal_blog_categories(); ?>
							</div>
							<?php
							endif;?>
						</div>
						<div class="author-personal-blog-standard-post__post-title">
							<?php
							if(true == $post_el_is_on['show_post_title']) :?>
								<a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
							<?php
							endif;
							?>
						</div>
						<div class="author-personal-blog-standard-post__blog-meta">
							<?php
							if (true == $post_el_is_on['show_post_author']) :
								author_personal_blog_posted_by( false );
							endif;
							if(true == $post_el_is_on['show_post_date']) :
								author_personal_blog_posted_on(false);
							endif;
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</article>
<?php
if (!is_single()) : ?>
</div>
<?php endif; ?>
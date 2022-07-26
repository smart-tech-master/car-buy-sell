<?php
/**
 * Books Slider
 */
$booksPerPage = get_theme_mod('books_per_page', 5);
$slideToShow = get_theme_mod('slide_to_show', 4);
$booksArgs = array(
	'post_type' => 'book',
	'posts_per_page' => $booksPerPage,
);
$booksSliderQuery = new WP_Query($booksArgs);
?>
<section id="blog-page-header-sidebar" class="blog-page-header-area">
	<div class="container">
		<div class="books-slider-widget-area">
			<div class="books-slider-wrapper">
				<div class="books-slider-inner books-slider-active" data-slideToShow="<?php echo esc_attr($slideToShow);?>">
					<?php
					while ($booksSliderQuery->have_posts()) :
						$booksSliderQuery->the_post();
						?>
						<article class="books-product-layout books-content books-loop-item">
							<?php if (function_exists('rswpbs_get_book_image') && '' !== rswpbs_get_book_image()) :?>
						    <div class="loop-book-image-wrapper">
						        <a href="<?php echo esc_url(get_the_permalink()); ?>">
						            <?php echo wp_kses_post(rswpbs_get_book_image(get_the_ID())); ?>
						        </a>
						        <a href="<?php echo esc_url(get_the_permalink());?>" class="view-book-details"><?php esc_html_e('View Book', 'author-personal-blog'); ?></a>
						    </div>
							<?php endif; ?>
						    <div class="loop-book-content-wrapper">
						    	<?php
						    	if (function_exists('rswpbs_get_book_name')) :
						    	?>
						        <div class="content-item">
						            <h2 class="book-name">
						                <a href="<?php the_permalink(); ?>"><?php echo wp_kses_post(rswpbs_get_book_name(get_the_ID())); ?></a>
						            </h2>
						        </div>
						    	<?php endif;
						    	if (function_exists('rswpbs_get_book_author')) :?>
							        <div class="content-item">
							            <h4 class="book-author">
							               <strong><?php esc_html_e( 'By ', 'author-personal-blog' );?></strong> <?php echo wp_kses_post(rswpbs_get_book_author(get_the_ID())); ?>
							            </h4>
							        </div>
						    	<?php endif;
						    	if (function_exists('rswpbs_get_book_price')):
						    	?>
							        <div class="content-item">
							            <h2 class="book-price d-flex justify-content-center">
							                <?php echo wp_kses_post(rswpbs_get_book_price(get_the_ID())); ?>
							            </h2>
							        </div>
						    	<?php endif; ?>
						    </div>
						</article>
						<?php
					endwhile;
					?>
				</div>
			</div>
		</div>
	</div>
</section>

<?php wp_reset_postdata(); ?>
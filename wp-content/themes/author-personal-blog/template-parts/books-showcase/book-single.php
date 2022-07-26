<?php
/**
 * Book Single Template
 */

?>
<div class="book-header-area book-info-bg">
	<div class="row justify-content-center">
		<div class="col-lg-3 col-md-5">
			<?php if (function_exists('rswpbs_get_book_image') && !empty(rswpbs_get_book_image(get_the_ID()))):?>
				<div class="book-image-wrapper">
					<?php
					echo wp_kses_post(rswpbs_get_book_image(get_the_ID()));
					?>
				</div>
			<?php endif; ?>
		</div>
		<div class="col-lg-6 col-md-7 pl-lg-5">
			<div class="book-info-wrapper">
				<?php if(function_exists('rswpbs_get_book_name') && !empty(rswpbs_get_book_name(get_the_ID()))) : ?>
					<div class="book-name">
						<h2><?php echo esc_html( rswpbs_get_book_name(get_the_ID()) );?></h2>
					</div>
				<?php endif;
				if(function_exists('rswpbs_get_book_author') && !empty(rswpbs_get_book_author(get_the_ID()))) : ?>
				<div class="book-author">
					<strong><?php esc_html_e( 'By: ', 'author-personal-blog' );?></strong>
					<p class="d-inline m-0">
						<?php echo wp_kses_post(rswpbs_get_book_author(get_the_ID())); ?>
					</p>
				</div>
				<?php endif;
				if(function_exists('rswpbs_get_book_desc') && !empty(rswpbs_get_book_desc(get_the_ID()))) : ?>
				<div class="book-short-description">
					<p><?php echo wp_kses_post( rswpbs_get_book_desc(get_the_ID()) );?></p>
				</div>
				<?php endif;
				if(function_exists('rswpbs_get_book_price') && !empty(rswpbs_get_book_price(get_the_ID()))) : ?>
					<div class="book-price">
						<h5><?php echo wp_kses_post( rswpbs_get_book_price(get_the_ID()) );?></h5>
					</div>
				<?php endif;
				if ( function_exists('rswpbs_get_book_buy_btn') && ! empty(rswpbs_get_book_buy_btn()) ) :
				?>
				<div class="rswpthemes-buy-now-button-wrapper d-flex justify-content-start">
					<?php echo rswpbs_get_book_buy_btn(); ?>
				</div>
				<?php
				endif;
				do_action('rswpbs_after_book_main_details');
				?>
			</div>
		</div>
	</div>
</div>
<div class="book-overview-area">
	<div class="row mb-4">
		<div class="col-md-8">
			<div class="book-overview">
				<?php the_content(); ?>
			</div>
		</div>
		<div class="col-md-4">
			<div class="book-info-wrapper book-info-bg">
				<?php
				if(function_exists('rswpbs_get_book_categories') && !empty(rswpbs_get_book_categories())) : ?>
				<div class="book-categories">
					<div class="d-flex">
						<div class="key">
							<strong><?php esc_html_e( 'Category: ', 'author-personal-blog' );?></strong>
						</div>
						<div class="value">
							<p>
							<?php echo wp_kses_post(rswpbs_get_book_categories()); ?>
							</p>
						</div>
					</div>
				</div>
				<?php endif;
				if(function_exists('rswpbs_get_book_format') && !empty(rswpbs_get_book_format(get_the_ID()))) : ?>
				<div class="book-format">
					<div class="d-flex">
						<div class="key">
							<strong><?php esc_html_e( 'Format: ', 'author-personal-blog' );?></strong>
						</div>
						<div class="value">
							<p>
							<?php echo esc_html( rswpbs_get_book_format(get_the_ID()) );?>
							</p>
						</div>
					</div>
				</div>
				<?php endif;
				if(function_exists('rswpbs_get_book_publish_date') && !empty(rswpbs_get_book_publish_date(get_the_ID()))) : ?>
				<div class="book-publish-date">
					<div class="d-flex">
						<div class="key">
							<strong><?php esc_html_e( 'Publish Date: ', 'author-personal-blog' );?></strong>
						</div>
						<div class="value">
							<p>
							<?php echo esc_html( rswpbs_get_book_publish_date(get_the_ID()) );?>
							</p>
						</div>
					</div>
				</div>
				<?php endif;
				if(function_exists('rswpbs_get_book_publisher_name') && !empty(rswpbs_get_book_publisher_name(get_the_ID()))) : ?>
				<div class="book-publisher-name">
					<div class="d-flex">
						<div class="key">
							<strong><?php esc_html_e( 'Publisher: ', 'author-personal-blog' );?></strong>
						</div>
						<div class="value">
							<p>
							<?php echo esc_html( rswpbs_get_book_publisher_name(get_the_ID()) );?>
							</p>
						</div>
					</div>
				</div>
				<?php endif;
				if(function_exists('rswpbs_get_book_isbn') && !empty(rswpbs_get_book_isbn(get_the_ID()))) : ?>
				<div class="book-isbn">
					<div class="d-flex">
						<div class="key">
							<strong><?php esc_html_e( 'ISBN: ', 'author-personal-blog' );?></strong>
						</div>
						<div class="value">
							<p>
							<?php echo esc_html( rswpbs_get_book_isbn(get_the_ID()) );?>
							</p>
						</div>
					</div>
				</div>
				<?php endif;
				if(function_exists('rswpbs_get_book_isbn_10') && !empty(rswpbs_get_book_isbn_10(get_the_ID()))) : ?>
				<div class="book-isbn-10">
					<div class="d-flex">
						<div class="key">
							<strong><?php esc_html_e( 'ISBN: -10 ', 'author-personal-blog' );?></strong>
						</div>
						<div class="value">
							<p>
							<?php echo esc_html( rswpbs_get_book_isbn_10(get_the_ID()) );?>
							</p>
						</div>
					</div>
				</div>
				<?php endif;
				if(function_exists('rswpbs_get_book_isbn_13') && !empty(rswpbs_get_book_isbn_13(get_the_ID()))) : ?>
				<div class="book-isbn-13">
					<div class="d-flex">
						<div class="key">
							<strong><?php esc_html_e( 'ISBN: -13', 'author-personal-blog' );?></strong>
						</div>
						<div class="value">
							<p>
							<?php echo esc_html( rswpbs_get_book_isbn_13(get_the_ID()) );?>
							</p>
						</div>
					</div>
				</div>
				<?php endif;
				if(function_exists('rswpbs_get_book_asin') && !empty(rswpbs_get_book_asin(get_the_ID()))) : ?>
				<div class="book-asin">
					<div class="d-flex">
						<div class="key">
							<strong><?php esc_html_e( 'ASIN: ', 'author-personal-blog' );?></strong>
						</div>
						<div class="value">
							<p>
							<?php echo esc_html( rswpbs_get_book_asin(get_the_ID()) );?>
							</p>
						</div>
					</div>
				</div>
				<?php endif;
				if(function_exists('rswpbs_get_book_pages') && !empty(rswpbs_get_book_pages(get_the_ID()))) : ?>
				<div class="book-pages">
					<div class="d-flex">
						<div class="key">
							<strong><?php esc_html_e( 'Pages: ', 'author-personal-blog' );?></strong>
						</div>
						<div class="value">
							<p>
							<?php echo esc_html( rswpbs_get_book_pages(get_the_ID()) );?>
							</p>
						</div>
					</div>
				</div>
				<?php endif;
				if(function_exists('rswpbs_get_book_country') && !empty(rswpbs_get_book_country(get_the_ID()))) : ?>
				<div class="book-country">
					<div class="d-flex">
						<div class="key">
							<strong><?php esc_html_e( 'Country: ', 'author-personal-blog' );?></strong>
						</div>
						<div class="value">
							<p>
							<?php echo esc_html( rswpbs_get_book_country(get_the_ID()) );?>
							</p>
						</div>
					</div>
				</div>
				<?php endif;
				if(function_exists('rswpbs_get_book_lanuage') && !empty(rswpbs_get_book_lanuage(get_the_ID()))) : ?>
				<div class="book-language">
					<div class="d-flex">
						<div class="key">
							<strong><?php esc_html_e( 'Language: ', 'author-personal-blog' );?></strong>
						</div>
						<div class="value">
							<p>
							<?php echo esc_html( rswpbs_get_book_lanuage(get_the_ID()) );?>
							</p>
						</div>
					</div>
				</div>
				<?php endif;
				if(function_exists('rswpbs_get_book_translator') && !empty(rswpbs_get_book_translator(get_the_ID()))) : ?>
				<div class="book-translator">
					<div class="d-flex">
						<div class="key">
							<strong><?php esc_html_e( 'Translator: ', 'author-personal-blog' );?></strong>
						</div>
						<div class="value">
							<p>
							<?php echo esc_html( rswpbs_get_book_translator(get_the_ID()) );?>
							</p>
						</div>
					</div>
				</div>
				<?php endif;
				if(function_exists('rswpbs_get_book_file_size') && !empty(rswpbs_get_book_file_size(get_the_ID()))) : ?>
				<div class="book-file-size">
					<div class="d-flex">
						<div class="key">
							<strong><?php esc_html_e( 'File:  Size', 'author-personal-blog' );?></strong>
						</div>
						<div class="value">
							<p>
							<?php echo esc_html( rswpbs_get_book_file_size(get_the_ID()) );?>
							</p>
						</div>
					</div>
				</div>
				<?php endif;
				if(function_exists('rswpbs_get_book_dimension') && !empty(rswpbs_get_book_dimension(get_the_ID()))) : ?>
				<div class="book-dimension">
					<div class="d-flex">
						<div class="key">
							<strong><?php esc_html_e( 'Dimension: ', 'author-personal-blog' );?></strong>
						</div>
						<div class="value">
							<p>
							<?php echo esc_html( rswpbs_get_book_dimension(get_the_ID()) );?>
							</p>
						</div>
					</div>
				</div>
				<?php endif;
				if(function_exists('rswpbs_get_book_weight') && !empty(rswpbs_get_book_weight(get_the_ID()))) : ?>
				<div class="book-weight">
					<div class="d-flex">
						<div class="key">
							<strong><?php esc_html_e( 'Weight: ', 'author-personal-blog' );?></strong>
						</div>
						<div class="value">
							<p>
							<?php echo esc_html( rswpbs_get_book_weight(get_the_ID()) );?>
							</p>
						</div>
					</div>
				</div>
				<?php endif;?>
			</div>
		</div>
	</div>
</div>
<?php
do_action('rswpbs_book_page_after');
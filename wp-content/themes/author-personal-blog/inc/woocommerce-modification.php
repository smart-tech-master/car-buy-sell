<?php
/**
 * Wrapper Markup
 */
add_action( 'woocommerce_before_main_content', 'author_personal_blog_woo_before_main_content', 10 );
function author_personal_blog_woo_before_main_content() {
	?>
	<section class="shop-page-main-block">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
	<?php
}
add_action( 'woocommerce_after_main_content', 'author_personal_blog_woo_after_main_content', 10 );
function author_personal_blog_woo_after_main_content() {
	?>
				</div>
			</div>
		</div>
	</section>
	<?php
}
// Remove Woocommerce Default Sidebar
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
// Remove WooCommerce Default Breadcrumb
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
add_filter( 'woocommerce_show_page_title', 'author_personal_blog_woocommerce_default_title_false' );
function author_personal_blog_woocommerce_default_title_false( $default ) {
	return true;
}
/**
 * Remove "Description" Heading Title @ WooCommerce Single Product Tabs
 */
add_filter( 'woocommerce_product_description_heading', '__return_null' );
add_filter( 'woocommerce_reviews_title', '__return_null' );

remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20);

function author_personal_blog_product_gallery_images($gallery_image_size = 'full', $gallery_extra_classes = '', $lightbox = false){
	global $product;
	$attachment_ids = $product->get_gallery_image_ids();
	if ( $attachment_ids && $product->get_image_id() ) {
		foreach ( $attachment_ids as $attachment_id ) {
			$thumbnail_src = wp_get_attachment_image_url($attachment_id, 'full');
			?>
			<div class="gallery-slider-item <?php echo esc_attr($gallery_extra_classes);?>">
				<?php
				if(true === $lightbox):
				?>
				<div class="picture-lightbox-icon">
					<a href="<?php echo esc_url($thumbnail_src);?>" data-lightbox="product-gallery<?php the_ID(); ?>" class="fa fa-picture-o"></a>
				</div>
				<?php endif; ?>
				<?php echo wp_get_attachment_image($attachment_id, $gallery_image_size); ?>
			</div>
			<?php
		}
	}
}

/**
 * Author Personal Blog Product Gallery Slider
 */
add_action('woocommerce_before_single_product_summary', 'author_personal_blog_product_gallery_sliders');

function author_personal_blog_product_gallery_sliders(){
	?>
	<div class="product-gallery-section">
		<div class="product-single-gallary-section">
			<div class="single-gallery-inner">
				<div class="active-single-gallery">
					<div class="gallery-slider-item large-slider-item">
						<div class="picture-lightbox-icon">
							<a href="<?php echo esc_url(get_the_post_thumbnail_url());?>" data-lightbox="product-gallery<?php the_ID(); ?>" class="fa fa-picture-o"></a>
						</div>
						<?php the_post_thumbnail( 'author-personal-blog-header-single-product' );?>
					</div>
					<?php author_personal_blog_product_gallery_images('author-personal-blog-header-single-product', 'large-slider-item', true);?>
				</div>
			</div>
		</div>
		<div class="product-thumbnail-gallary-section">
			<div class="thumbnail-gallery-inner">
				<div class="active-thumbnail-gallery">
					<div class="gallery-slider-item thumbnail-slider-item">
						<?php the_post_thumbnail( 'author-personal-blog-grid-thumbnail' );?>
					</div>
					<?php author_personal_blog_product_gallery_images('author-personal-blog-grid-thumbnail', 'thumbnail-slider-item', false);?>
				</div>
			</div>
		</div>
	</div>
	<?php
}
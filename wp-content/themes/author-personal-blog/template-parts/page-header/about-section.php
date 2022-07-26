<?php
/**
 * About Section
 */

$about_section_args = array(
	'image' => get_theme_mod('author_image'),
	'title' => get_theme_mod('author_title', __( 'Hi,My Name Johan Smih', 'author-personal-blog' )),
	'subtitle' => get_theme_mod('author_subtitle', __( 'New York Times & International Bestselling Author', 'author-personal-blog' )),
	'show_icon' => get_theme_mod('show_social_icon', false),
);
?>
<div class="about-section-area">
	<div class="container">
		<div class="row justify-content-between">
			<div class="col-lg-6 col-md-7 align-self-center">
				<div class="about-section-content">
					<?php
					if (!empty($about_section_args['title'])) :
					?>
					<h2><?php echo wp_kses_post( $about_section_args['title'] );?></h2>
					<?php
					endif;
					if(!empty($about_section_args['subtitle'])) :
					?>
					<h4><?php echo esc_html( $about_section_args['subtitle'] );?></h4>
					<?php
					endif;
					if('1' == $about_section_args['show_icon']) :?>
						<div class="about-section-social-links">
							<?php author_personal_blog_social_links(); ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
			<div class="col-lg-5 col-md-5 text-center text-sm-center text-md-right pt-5 pt-md-0 align-self-center">
				<?php
				if (!empty($about_section_args['image'])) :
				?>
				<div class="about-section-image">
					<div class="image-wraper">
						<img src="<?php echo esc_url($about_section_args['image']['url']);?>" alt="<?php echo esc_attr($about_section_args['subtitle']);?>">
					</div>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
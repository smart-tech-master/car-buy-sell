<?php
	if (has_nav_menu('footer-menu')) {
		$social_links_column = 'col-lg-2';
	}else{
		$social_links_column = 'col-lg-12 text-center';
	}

$show_social_links = get_theme_mod('show_footer_social_links', false);

if ( has_nav_menu('footer-menu') || true == $show_social_links ) :
?>

<section class="footer-content">
	<div class="container">
		<div class="row justify-content-center text-center">
			<?php
			if(has_nav_menu('footer-menu')){
			?>
			<div class="col-lg-10 mt-3 mb-3 mb-lg-0 mt-lg-0">
				<div class="footer-menu">
				<?php
					wp_nav_menu(
							array(
								'theme_location'    => 'footer-menu',
								'container'         => 'ul',
							)
						);
				 ?>
				</div>
			</div>
			<?php }
			if (true == $show_social_links) :
			?>
			<div class="<?php echo esc_attr($social_links_column);?>">
				<div class="footer-social-links">
					<?php author_personal_blog_social_links(); ?>
				</div>
			</div>
			<?php
			endif;
			?>
		</div>
	</div>
</section>
<?php
endif; ?>
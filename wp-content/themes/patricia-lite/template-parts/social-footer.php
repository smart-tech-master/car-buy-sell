<?php if (get_theme_mod('patricia_lite_footer_social', 1) == 1) : ?>
	<div class="social-footer">
		<?php if(get_theme_mod('patricia_lite_facebook')) : ?><a href="<?php echo esc_url( get_theme_mod('patricia_lite_facebook') ); ?>" target="_blank" title="<?php esc_attr_e( 'Facebook', 'patricia-lite' ); ?>"><i class="fab fa-facebook-f" aria-hidden="true"></i></a><?php endif; ?>
		<?php if(get_theme_mod('patricia_lite_twitter')) : ?><a href="<?php echo esc_url( get_theme_mod('patricia_lite_twitter') ); ?>" target="_blank" title="<?php esc_attr_e( 'Twitter', 'patricia-lite' ); ?>"><i class="fab fa-twitter" aria-hidden="true"></i></a><?php endif; ?>
		<?php if(get_theme_mod('patricia_lite_linkedin')) : ?><a href="<?php echo esc_url( get_theme_mod('patricia_lite_linkedin') ); ?>" target="_blank" title="<?php esc_attr_e( 'LinkedIn', 'patricia-lite' ); ?>"><i class="fab fa-linkedin" aria-hidden="true"></i></a><?php endif; ?>
		<?php if(get_theme_mod('patricia_lite_pinterest')) : ?><a href="<?php echo esc_url( get_theme_mod('patricia_lite_pinterest') ); ?>" target="_blank" title="<?php esc_attr_e( 'Pinterest', 'patricia-lite' ); ?>"><i class="fab fa-pinterest" aria-hidden="true"></i></a><?php endif; ?>
		<?php if(get_theme_mod('patricia_lite_instagram')) : ?><a href="<?php echo esc_url( get_theme_mod('patricia_lite_instagram') ); ?>" target="_blank" title="<?php esc_attr_e( 'Instagram', 'patricia-lite' ); ?>"><i class="fab fa-instagram" aria-hidden="true"></i></a><?php endif; ?>
		<?php if(get_theme_mod('patricia_lite_youtube')) : ?><a href="<?php echo esc_url( get_theme_mod('patricia_lite_youtube') ); ?>" target="_blank" title="<?php esc_attr_e( 'YouTube', 'patricia-lite' ); ?>"><i class="fab fa-youtube-play" aria-hidden="true"></i></a><?php endif; ?>	
	</div>
<?php endif; ?>
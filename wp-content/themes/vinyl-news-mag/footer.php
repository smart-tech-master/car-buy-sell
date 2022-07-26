<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package vinyl_news_mag
 */


$vinyl_news_mag_options = vinyl_news_mag_theme_options();

$show_prefooter = $vinyl_news_mag_options['show_prefooter'];
$show_dark = $vinyl_news_mag_options['show_dark'];

?>
	<?php if ($show_dark== 1){ ?>

<footer id="colophon" class="site-footer dark">
	<?php } 
	
	else{ ?>
		
		<footer id="colophon" class="site-footer">
	<?php } ?>


	<?php if ($show_prefooter== 1){ ?>
	    <section class="vinyl-news-mag-footer-sec">
	        <div class="container">
	            <div class="row">

					
	                <?php if (is_active_sidebar('vinyl_news_mag_footer_1')) : ?>
	                    <div class="col-md-3">
	                        <?php dynamic_sidebar('vinyl_news_mag_footer_1') ?>
	                    </div>
	                    <?php
	                else: vinyl_news_mag_blank_widget();
	                endif; ?>
	                <?php if (is_active_sidebar('vinyl_news_mag_footer_2')) : ?>
	                    <div class="col-md-3">
	                        <?php dynamic_sidebar('vinyl_news_mag_footer_2') ?>
	                    </div>
	                    <?php
	                else: vinyl_news_mag_blank_widget();
	                endif; ?>
	                <?php if (is_active_sidebar('vinyl_news_mag_footer_3')) : ?>
	                    <div class="col-md-3">
	                        <?php dynamic_sidebar('vinyl_news_mag_footer_3') ?>
	                    </div>
	                    <?php
	                else: vinyl_news_mag_blank_widget();
	                endif; ?>

					<?php if (is_active_sidebar('vinyl_news_mag_footer_4')) : ?>
	                    <div class="col-md-3">
	                        <?php dynamic_sidebar('vinyl_news_mag_footer_4') ?>
	                    </div>
	                    <?php
	                else: vinyl_news_mag_blank_widget();
	                endif; ?>
				
	            </div>
	        </div>
	    </section>
	<?php } ?>

		<div class="site-info">
		<p><?php esc_html_e('Powered By WordPress', 'vinyl-news-mag');
                    esc_html_e(' | ', 'vinyl-news-mag') ?>
                    <span><a href="https://elegantblogthemes.com/theme/vinyl-news-mag-best-newspaper-and-magazine-wordpress-theme/"><?php esc_html_e('Vinyl News Mag' , 'vinyl-news-mag'); ?></a></span>
                </p>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

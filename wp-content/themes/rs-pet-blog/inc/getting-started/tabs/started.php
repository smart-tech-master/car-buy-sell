<?php
/**
 * Help Panel.
 *
 * @package Rs Pet Blog Pro
 */
?>
<!-- Updates panel -->
<div id="plugins-panel" class="panel-left visible">
	<div class="panel-aside">
        <h4><?php esc_html_e( 'Congratulations! Now you are a member of our RS WP THEMES Family. Your Satisfaction is our Priority.','rs-pet-blog' ); ?></h4>
        <p><?php echo wp_kses_post( 'if you are having any kind of trouble to use any features of this theme. please check <a href="'.esc_url('https://rswpthemes.com/rs-pet-blog-wordpress-theme-pro/').'" style="color: #fc0008;">RS PET BLOG documentation.</a> if there is no documenation availeble for that features. please ask for help in our support forum.','rs-pet-blog' ); ?></p>
        <a class="button button-primary" href="<?php echo esc_url( 'https://rswpthemes.com/forums' ); ?>" title="<?php esc_attr_e( 'Support Forum','rs-pet-blog' ); ?>" target="_blank">
            <?php esc_html_e( 'Support Forum >>','rs-pet-blog' ); ?>
        </a>
        <p><?php esc_html_e( 'if you are having any kind of error or technical issue. please contact us through our live chat. that is available in our website right bottom corner.','rs-pet-blog' ); ?></p>
    </div><!-- .panel-aside Theme Support -->
</div><!-- .panel-left -->
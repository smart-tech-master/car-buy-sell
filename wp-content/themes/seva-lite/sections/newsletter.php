<?php
/**
 * Newsletter Section
 * 
 * @package Seva_Lite
 */
if( is_active_sidebar( 'newsletter' ) ){ ?>
<section id="newsletter_section" class="newsletter-section">
    <?php dynamic_sidebar( 'newsletter' ); ?>
</section> <!-- .newsletter-section -->
<?php
}
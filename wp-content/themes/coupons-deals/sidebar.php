<?php
/**
 * The Sidebar containing the main widget areas.
 * @package Coupons Deals
 */
?>
<div id="sidebar">    
    <?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>
        <aside role="complementary" aria-label="firstsidebar" id="archives" class="widget">
            <h3 class="widget-title"><?php esc_html_e( 'Archives', 'coupons-deals' ); ?></h3>
            <ul>
                <?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
            </ul>
        </aside>
        <aside role="complementary" aria-label="secondsidebar" id="meta" class="widget">
            <h3 class="widget-title"><?php esc_html_e( 'Meta', 'coupons-deals' ); ?></h3>
            <ul>
                <?php wp_register(); ?>
                <li><?php wp_loginout(); ?></li>
                <?php wp_meta(); ?>
            </ul>
        </aside>
    <?php endif; // end sidebar widget area ?>  
</div>
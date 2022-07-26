<?php
/**
 * Displays footer site info
 *
 * @subpackage Beauty Salon Spa
 * @since 1.0
 * @version 1.4
 */

?>
<div class="site-info py-4 text-center">
    <?php
        echo esc_html( get_theme_mod( 'beauty_salon_spa_footer_text' ) );
        printf(
            /* translators: %s: Spa WordPress Theme. */
            esc_html__( ' %s ', 'beauty-salon-spa' ),
            '<a target="_blank" href="' . esc_attr__( 'https://www.ovationthemes.com/wordpress/free-salon-wordpress-theme/', 'beauty-salon-spa' ) . '"> Salon WordPress Theme</a>'
        );
    ?>
</div>
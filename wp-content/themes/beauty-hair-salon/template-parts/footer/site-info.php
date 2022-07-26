<?php
/**
 * Displays footer site info
 *
 * @subpackage Beauty Hair Salon
 * @since 1.0
 * @version 1.4
 */

?>

<div class="site-info py-4 text-center">
    <?php
        echo esc_html( get_theme_mod( 'beauty_salon_spa_footer_text' ) );
        printf(
            /* translators: %s: Spa WordPress Theme. */
            esc_html__( ' %s ', 'beauty-hair-salon' ),
            '<a  href="' . esc_attr__( 'https://www.ovationthemes.com/wordpress/free-beauty-wordpress-theme/', 'beauty-hair-salon' ) . '"> Beauty Hair Salon WordPress Theme</a>'
        );
    ?>
</div>

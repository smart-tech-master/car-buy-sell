<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Author Personal Blog
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>
<aside id="secondary" class="widget-area">
	<?php
    if (is_single()) {
        ?>
        <div class="sticky-sidebar-inner">
        <?php
    }
        dynamic_sidebar( 'sidebar-1' );
    if (is_single()) {
        ?>
        </div>
        <?php
    }
    ?>


</aside><!-- #secondary -->

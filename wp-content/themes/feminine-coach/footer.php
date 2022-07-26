<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Feminine_Coach
 */

?>
	<footer id="colophon" class="site-footer" itemscope itemtype="https://schema.org/WPFooter">
        <div class="container">
            <div class="footer--wrapper">
                <?php
                    feminine_business_footer_top();
                ?>
            </div>
        </div>
        <div class="footer-b">
            <?php
                feminine_business_footer_site_info();
                feminine_business_footer_menu();
            ?>
        </div>
    </footer>
    <div class="overlay"></div>
    <?php feminine_business_scroll_to_top();
    /**
     * @hooked feminine_business_footer_page_end
     */
    do_action( 'feminine_business_after_footer' );  ?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

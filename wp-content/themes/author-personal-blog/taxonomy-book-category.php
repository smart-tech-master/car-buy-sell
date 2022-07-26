<?php
if (!class_exists('Rswpbs')) {
    return;
}
/**
 *   The template for displaying Book Taxomony Page
 *   This Template Will Work Once you will install RS BOOK SHOWCASE Plugin
 *   @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 *   @package Author Personal Blog
 */
get_header();
?>
<div id="primary" class="content-area">
     <?php get_template_part('template-parts/books-showcase/book-category', 'header'); ?>
	<main id="main" class="site-main">
        <div class="books-archive-wrapper">
            <div class="container">
               <div class="row">
                    <?php
                    while(have_posts()) :
                        the_post();
                        get_template_part('template-parts/books-showcase/layouts/book-layout', 'product');
                    endwhile;
                   ?>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <?php author_personal_blog_navigation(); ?>
                    </div>
                </div>
            </div>
        </div>
	</main><!-- #main -->
</div><!-- #primary -->
<?php get_footer();
wp_reset_postdata();
?>

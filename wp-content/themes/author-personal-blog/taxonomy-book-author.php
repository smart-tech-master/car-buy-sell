<?php
if (!class_exists('Rswpbs')) {
    return;
}
/**
 *   The template for displaying Book Author Page
 *   This Template Will Work Once you will install RS BOOK SHOWCASE Plugin
 *   @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 *   @package Author Personal Blog
 */
get_header();
$current_author_id = get_queried_object_id();
$get_author = get_term($current_author_id);
?>
<div id="primary" class="content-area">
	<main id="main" class="site-main">
        <div class="books-author-wrapper">
            <div class="container">
               <?php get_template_part('template-parts/books-showcase/author-category', 'header');?>
               <div class="row author-books-list-section ml-0 mr-0">
                    <div class="col-md-12">
                        <div class="author-books-lists mb-5">
                            <h2><?php echo esc_html( $get_author->name );?><?php esc_html_e( ' Books', 'author-personal-blog');?></h2>
                        </div>
                    </div>
                    <?php
                    wp_reset_postdata();
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

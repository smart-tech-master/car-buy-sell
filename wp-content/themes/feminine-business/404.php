<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Feminine_Business
 */

get_header();
?>
    <div id="content" class="site-content">
        <div class="container">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <section class="error-404 not-found">
                        <header class="page-content">
                            <h1 class="page-title">
                                <?php echo esc_html__( 'Oops! 404 Page not found', 'feminine-business' ); ?>
                            </h1>
                            <div class="error-text">
                                <p><?php echo esc_html__( 'The page you’re looking for does not exist. Try the search below...', 'feminine-business' ); ?></p>
                            </div>
                            <div class="error404-search">
                                <?php get_search_form(); ?>
                            </div>
                        </header>
                    </section>
                    <!-- End of error section -->           
                    <?php feminine_business_get_posts_list( 'latest' ); ?>
                </main>
            </div>
        </div>
    </div>

<?php
get_footer();

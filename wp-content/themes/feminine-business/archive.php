<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Feminine_Business
 */

get_header(); ?>
<div id="content" class="site-content">
    <div class="container">
        <div class="page-grid">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <?php         
                    /**
                     * * @hooked feminine_business_primary_page_header - 10
                    */
                    do_action( 'feminine_business_before_posts_content' ); ?>
                    <div class="content-wrapper">   
                        <?php
                            if ( have_posts() ) :

                                /* Start the Loop */
                                while ( have_posts() ) :
                                    the_post();

                                    /*
                                    * Include the Post-Type-specific template for the content.
                                    * If you want to override this in a child theme, then include a file
                                    * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                                    */
                                    get_template_part( 'template-parts/content', 'archive' );

                                endwhile;

                            else :

                                get_template_part( 'template-parts/content', 'none' );

                            endif;
                        ?>          
                        <!-- Contentwrapper -->
                    </div>
                    <?php feminine_business_nav(); ?>
                </main>
                <!-- Site-main -->
            </div>
            <!-- Primary -->
            <?php get_sidebar(); ?>
            <!-- Aside -->
        </div>
        <!-- page-grid -->
    </div>
</div>
<?php
get_footer();

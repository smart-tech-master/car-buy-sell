<?php


/**
 * List down the get category
 *
 * @param int $post_id
 * @return string list of category
 *
 * @since 1.0.0
 *
 */
if (!function_exists('fairy_get_category')) :
    function fairy_get_category($post_id = 0)
    {

        if (0 == $post_id) {
            global $post;
            $post_id = $post->ID;
        }
        $categories = get_the_category($post_id);
        $output = '';
        $separator = ' ';
        if ($categories) {
            $output .= '<div class="category-label-group bg-label">';
            $output .= '<span class="cat-links">';
            foreach ($categories as $category) {
                $output .= '<a class="ct-cat-item-' . esc_attr($category->term_id) . '" href="' . esc_url(get_category_link($category->term_id)) . '"  rel="category tag">' . esc_html($category->cat_name) . '</a>' . $separator;
            }
            $output .= '</span>';
            $output .= '</div>';
            return $output;

        }
    }
endif;

if (!function_exists('fairy_constuct_carousel')) {
    /**
     * Add carousel on header
     *
     * @since 1.0.0
     */
    function fairy_constuct_carousel()
    {

        if (is_front_page()) {
            global $fairy_theme_options;
            if ($fairy_theme_options['fairy-enable-slider'] != 1)
                return false;
            $featured_cat = absint($fairy_theme_options['fairy-select-category']);
            $fairy_slider_args = array();
            if(is_rtl()){
                $fairy_slider_args['rtl'] = true;
            }
            $fairy_slider_args_encoded = wp_json_encode( $fairy_slider_args );
            $query_args = array(
                'post_type' => 'post',
                'ignore_sticky_posts' => true,
                'posts_per_page' => 6,
                'cat' => $featured_cat
            );

            $query = new WP_Query($query_args);
            if ($query->have_posts()) :
                ?>
                <section class="hero hero-slider-section">
                    <div class="container">
                        <!-- slick slider component start -->
                        <div class="hero-style-carousel">
                            <?php
                            $i = 1;
                            while ($query->have_posts()) :
                                $query->the_post();

                                ?>
                                <div class="card card-bg-image">
                                    <?php
                                    if (has_post_thumbnail()) {
                                        ?>
                                        <div class="post-thumb">
                                            <figure class="card_media">
                                                <a href="<?php the_permalink(); ?>">
                                                    <?php
                                                    $cropped_image = $fairy_theme_options['fairy-image-size-slider'];
                                                    if($cropped_image == 'cropped-image'){
                                                        the_post_thumbnail('fairy-large');
                                                    }else{
                                                        the_post_thumbnail();
                                                    }
                                                    ?>
                                                </a>
                                            </figure>
                                        </div>
                                        <?php
                                    } else {
                                        ?>
                                        <div class="post-thumb">
                                            <a href="<?php the_permalink(); ?>">

                                                <img src="<?php echo esc_url(get_template_directory_uri()) . '/candidthemes/assets/custom/img/fairy-default.jpg' ?>"
                                                     alt="<?php the_title(); ?>">

                                            </a>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                    <article class="card_body">
                                        <?php
                                        fairy_list_category();
                                        ?>

                                        <h3 class="card_title">
                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </h3>

                                        <div class="entry-meta">
                                            <?php
                                            fairy_posted_on();
                                            fairy_posted_by();
                                            ?>
                                        </div>
                                    </article>

                                </div>
                                <?php
                                $i++;

                            endwhile;
                            ?>
                        </div>
                    </div>
                </section><!-- .hero -->
            <?php
            endif;
            wp_reset_postdata();


        }//is_front_page
    }
}


if (!function_exists('across_custom_body_class')) {
    /**
     * Add sidebar class in body
     *
     * @since 1.0.0
     *
     */
    function across_custom_body_class($classes)
    {
        $classes[] = 'fairy-widget-title-two';
        return $classes;
    }
}
add_filter('body_class', 'across_custom_body_class');



if (!function_exists('fairy_posts_navigation')) {
    /**
     * Display pagination based on type seclected
     *
     * @since 1.0.0
     *
     */
    function fairy_posts_navigation()
    {
        global $fairy_theme_options;
        if ($fairy_theme_options['fairy-pagination-options'] == 'numeric') {
            the_posts_pagination();
        }
        elseif ($fairy_theme_options['fairy-pagination-options'] == 'ajax') {
            $page_number = get_query_var('paged');
            if ($page_number == 0) {
                $output_page = 2;
            } else {
                $output_page = $page_number + 1;
            }
            if (paginate_links()) {
                echo "<div class='ajax-pagination text-center'><div class='show-more' data-number='$output_page'><i class='fa fa-refresh'></i>" . __('Load More', 'across') . "</div><div id='free-temp-post'></div></div>";
            }
        }
        else {
            the_posts_navigation();
        }

    }
}
add_action('fairy_action_navigation', 'fairy_posts_navigation', 10);


if (!function_exists('across_footer_instagram_feed')) {
    /**
     * Add Go to Top Button on Site.
     *
     * @param none
     * @return void
     *
     * @since 1.0.0
     *
     */
    function across_footer_instagram_feed()
    {
        global $fairy_theme_options;
        $instagram_shortcode = $fairy_theme_options['fairy-footer-instagram'];
        if (!empty($instagram_shortcode) && function_exists('sb_instagram_feed_init')) {
            echo do_shortcode($instagram_shortcode);
        }
    }
}
add_action('fairy_newsletter', 'across_footer_instagram_feed', 20);


if (!function_exists('fairy_constuct_single_cat_posts')) {
    /**
     * Display latest posts boxes of 3 different categories
     *
     * @since 1.0.0
     *
     */
    function fairy_constuct_single_cat_posts()
    {
        global $fairy_theme_options;
        $cat1 = absint($fairy_theme_options['fairy-single-cat-posts-select-1']);
        if (!empty($cat1)) {
            ?>
            <section class="promo-section sec-spacing">
                <div class="container">
                    <div class="row">
                        <?php
                        $fairy_cat_post_args = array(
                            'category__in' => $cat1,
                            'post_type' => 'post',
                            'posts_per_page' => 3,
                            'post_status' => 'publish',
                            'ignore_sticky_posts' => true
                        );
                        $fairy_featured_query = new WP_Query($fairy_cat_post_args);
                        if ($fairy_featured_query->have_posts()) :

                            while ($fairy_featured_query->have_posts()) : $fairy_featured_query->the_post();
                                ?>
                                <div class="col-1-1 col-sm-1-2 col-md-1-3">
                                    <div class="card card-promo">
                                        <figure class="card_media">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php
                                                if (has_post_thumbnail()) {
                                                    the_post_thumbnail('fairy-medium');
                                                }
                                                ?>
                                            </a>
                                        </figure>

                                        <article class="card_body">
                                            <?php
                                            fairy_list_category();
                                            ?>

                                            <h3 class="card_title">
                                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                            </h3>

                                            <div class="entry-meta">
                                                <?php
                                                fairy_posted_on();
                                                fairy_posted_by();
                                                ?>
                                            </div>
                                        </article>
                                    </div>
                                </div>
                            <?php
                            endwhile;
                        endif;
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </section>
            <?php
        }
    }
}


if (!function_exists('fairy_footer_theme_info')) {
    /**
     * Add Powered by texts on footer
     *
     * @since 1.0.0
     */
    function fairy_footer_theme_info()
    {
        ?>
        <div class="site-info text-center">
            <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'across' ) ); ?>" target="_blank">
                <?php
                /* translators: %s: CMS name, i.e. WordPress. */
                printf( esc_html__( 'Proudly powered by %s', 'across' ), 'WordPress' );
                ?>
            </a>
            <span class="sep"> | </span>
            <?php
            /* translators: 1: Theme name, 2: Theme author. */
            printf( esc_html__( 'Theme: %1$s by %2$s.', 'across' ), 'Across', '<a href="http://www.candidthemes.com/" target="_blank">Candid Themes</a>' );
            ?>
        </div><!-- .site-info -->
        <?php
    }
}
<?php
if (!function_exists('vinyl_news_mag_theme_options')) :
    function vinyl_news_mag_theme_options()
    {
        $defaults = array(


            'show_featured_image' => 1,
            'show_post_navigation' => 1,
            'show_metas' => 1,
            'show_sidebar' => 1,
            'show_breadcrumbs' => 0,
            'show_vertical_posts' => 1,
            'no_of_posts_vertical' => '5',
            

            'show_main_slider' => 1,
            'show_second_posts' => 1,
            'show_overlay_posts' => 1,
            'show_home_sidebar' => 1,

            'show_dark' => 0,

            'show_date' => 1,
            'show_category' => 1,
            'show_preloader' => 0,

            'show_links' => 1,




            'main_slider_title' => '',
            'vertical_thumbnail_title' => '',
            'overlay_posts_title' => '',
            'facebook' => '',
            'pinterest' => '',


            'main_banner_category' => '',
            'vinyl_news_mag_slider_category' => '',

            'second_posts' => '',
            'second_posts_title' => '',

            'sidebar_posts' => '',
            'sidebar_posts_title' => '',




            
            'main_banner_third_column_category' => '',
            'main_banner_second_column_category' => '',

            'nt_featured_cat' => '',
            

            'vertical_thumbnail' => '',
            'main_banner_second_column_title' => '',
            'main_banner_third_column_title' => '',

            'eight_post_section_category' => '',
            'eight_post_section_title' => '',

            'three_column_post_title' => '',
            'three_column_post_category' => '',

            'four_column_post_one_title' => '',
            'four_column_post_one_category' => '',

            'four_column_post_two_title' => '',
            'four_column_post_two_category' => '',

            'four_column_post_three_title' => '',
            'four_column_post_three_category' => '',


      



            'show_eight_post' => 1,
            'show_three_post' => 1,
            'show_four_post1' => 1,
            'show_four_post2' => 1,
            'show_four_post3' => 1,

            

            'show_prefooter' => 1,



        );

        $options = get_option('vinyl_news_mag_theme_options', $defaults);

        //Parse defaults again - see comments
        $options = wp_parse_args($options, $defaults);

        return $options;
    }
endif;

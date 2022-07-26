<?php
/**
 *
 * Template Name: Frontpage

 *
 * @package Vinyl News Magazine
 */

$vinyl_news_mag_options = vinyl_news_mag_theme_options();

$show_main_slider = $vinyl_news_mag_options['show_main_slider'];
$show_vertical_posts = $vinyl_news_mag_options['show_vertical_posts'];
$show_second_posts = $vinyl_news_mag_options['show_second_posts'];
$show_overlay_posts = $vinyl_news_mag_options['show_overlay_posts'];
$show_home_sidebar = $vinyl_news_mag_options['show_home_sidebar'];

get_header();

?>


<?php
if ($show_main_slider==1): 

get_template_part('template-parts/home/main-slider', 'section');
endif;

if ($show_second_posts==1): 
get_template_part('template-parts/home/eight-post', 'section');
endif;

if ($show_overlay_posts==1): 
get_template_part('template-parts/home/overlay', 'section');
endif;

if ($show_home_sidebar==1): 
get_template_part('template-parts/home/sidebar', 'section');
endif;

get_footer();

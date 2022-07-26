<?php
/**
 * Author Personal Blog Theme Global Options
 */

Kirki::add_panel( 'author_personal_blog_global_panel', array(
    'priority'    => 10,
    'title'       => esc_html__( 'Global Settings', 'author-personal-blog' ),
) );

require get_theme_file_path('inc/customizer/themeoptions/about-settings.php');
require get_theme_file_path('inc/customizer/themeoptions/social-links-settings.php');
require get_theme_file_path('inc/customizer/themeoptions/sidebar-settings.php');
require get_theme_file_path('inc/customizer/themeoptions/post-page-settings.php');
require get_theme_file_path('inc/customizer/themeoptions/theme-color-settings.php');
require get_theme_file_path('inc/customizer/themeoptions/blog-and-archive-post-settings.php');
require get_theme_file_path('inc/customizer/themeoptions/copyright-settings.php');
require get_theme_file_path('inc/customizer/themeoptions/typography-settings.php');
require get_theme_file_path('inc/customizer/themeoptions/footer-settings.php');
require get_theme_file_path('inc/customizer/themeoptions/scroll-top-button-settings.php');


Kirki::add_panel( 'author_personal_blog_book_settings_panel', array(
    'priority'    => 10,
    'title'       => esc_html__( 'Books Appearance Settings', 'author-personal-blog' ),
) );
require get_theme_file_path('inc/customizer/themeoptions/book-settings.php');
<?php
/**
 * Enqueue scripts and styles.
 */
function author_personal_blog_scripts() {
	wp_enqueue_style( 'slick', esc_url(get_theme_file_uri( 'assets/css/slick.css' )) );
	wp_enqueue_style( 'author-personal-blog-style', get_stylesheet_uri() );
	$banner_btn_default_style = array(
        'btn_bg'    => '#fb4747',
        'btn_text'   => '#ffffff',
        'btn_hover_bg'   => '#000000',
        'btn_hover_text'   => '#ffffff',
	);
	$get_banner_btn_style = get_theme_mod('banner_button_colors', $banner_btn_default_style);
	$inline_style_data = '
		.banner-section .discover-me-button a{
			background-color: '.$get_banner_btn_style['btn_bg'].';
			color: '.$get_banner_btn_style['btn_text'].';
		}
		.banner-section .discover-me-button a:hover, .banner-section .discover-me-button a:active{
			background-color: '.$get_banner_btn_style['btn_hover_bg'].';
			color: '.$get_banner_btn_style['btn_hover_text'].';
		}
	';
	wp_add_inline_style('author-personal-blog-style', $inline_style_data);
	wp_enqueue_script( 'imagesloaded', esc_url( get_template_directory_uri() ) . '/assets/js/imagesloaded.pkgd.min.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'masonry' );
	wp_enqueue_script( 'author-personal-blog-menu', esc_url( get_template_directory_uri() ) . '/assets/js/menu.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'slick', esc_url( get_template_directory_uri() ) . '/assets/js/slick.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'author-personal-blog-active', esc_url( get_template_directory_uri() ) . '/assets/js/active.js', array( 'jquery' ), '1.0', true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'author_personal_blog_scripts' );

add_action('customize_controls_enqueue_scripts', 'author_personal_blog_customizer_scripts');
function author_personal_blog_customizer_scripts(){
	wp_enqueue_style('customizer-style', esc_url(get_theme_file_uri('assets/customizer/customizer-style.css')));
}

add_action('enqueue_block_editor_assets', 'author_personal_blog_global_scripts');
add_action('wp_enqueue_scripts', 'author_personal_blog_global_scripts');

function author_personal_blog_global_scripts(){
	wp_enqueue_style( 'bootstrap-grid', esc_url(get_theme_file_uri( 'assets/css/bootstrap-grid.css' )) );
	wp_enqueue_style( 'fontawesome', esc_url(get_theme_file_uri( 'assets/css/fontawesome.css' )) );
	wp_enqueue_style( 'block-style', esc_url(get_theme_file_uri( 'assets/blocks-style/block-styles.css' )) );
}
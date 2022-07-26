<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Author Personal Blog
 */
get_header();

global $wp;
$current_url = home_url( add_query_arg( array(), $wp->request ) );
$isPagination = '/page/';
$show_blog_extra_sections = true;
if (strpos($current_url, $isPagination) !== false) {
	$show_blog_extra_sections = false;
}else{
	$show_blog_extra_sections = true;
}
if (true === $show_blog_extra_sections) :
	$showAboutSection = get_theme_mod('show_about_section', false);
	if (true == $showAboutSection) {
		get_template_part('template-parts/page-header/about', 'section');
	}
	$showHideBookSlider = get_theme_mod('books_slider_on_off', false);
	if (class_exists('Rswpbs')) {
		if (true == $showHideBookSlider) {
			get_template_part('template-parts/books-showcase/books', 'slider');
		}
	}
endif;
?>
<div id="primary" class="content-area">
	<main id="main" class="site-main">
	<?php
		do_action( 'author_personal_blog_before_default_page' );
		if ( have_posts() ) :
			echo '<div class="row'.author_personal_blog_masonry_layout_control().'">';
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content/content', get_post_type() );
				endwhile;
			echo '</div>';
				author_personal_blog_navigation();
			else :
				get_template_part( 'template-parts/content/content', 'none' );
		endif;
		do_action( 'author_personal_blog_after_default_page' );
		?>
	</main><!-- #main -->
</div>
<?php
get_footer();

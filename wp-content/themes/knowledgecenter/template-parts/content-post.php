<?php
/**
 *  Template part for displaying post content in single.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package KnowledgeCenter
 * @subpackage KnowledgeCenter
 * @since KnowledgeCenter 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header>
		<?php the_title( '<h1 class="title is-spaced has-text-centered">', '</h1>' ); ?>
		<?php if ( has_excerpt() ): ?>
            <div class="subtitle"><?php the_excerpt(); ?></div>
		<?php endif; ?>
    </header>

	<?php if ( has_post_thumbnail() === true ) : ?>
        <figure class="image mt-6">
			<?php the_post_thumbnail(); ?>
        </figure>
	<?php endif; ?>

    <div class="entry-content content mt-6">
		<?php the_content(); ?><?php
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'knowledgecenter' ),
				'after'  => '</div>',
			)
		);
		?>
    </div>

	<?php do_action('knowledgecenter_post_footer');?>

    <footer class="entry-footer tags mt-6">
		<?php the_tags( '', ' ', '' ); ?>
    </footer>
    <hr/>
</article>

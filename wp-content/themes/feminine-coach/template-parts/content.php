<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Feminine_Coach
 */
$blog_readmore  = get_theme_mod( 'blog_readmore', __( 'Read More', 'feminine-coach' ) );
$ed_comments    = get_theme_mod( 'ed_banner_comments', false );
$ed_date        = get_theme_mod( 'ed_post_date', false );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="https://schema.org/Blog">

	<?php feminine_business_post_thumbnail(); ?>
	<?php if ( ! is_front_page() ) echo '<div class="content-wrap">';
		if ( !$ed_comments || !$ed_date ){ ?>
			<header class="entry-header">
				<div class="entry-meta">
					<span class="posted-on">
						<?php feminine_business_posted_on(); ?>
					</span>
				</div>
			</header>
		<?php }
		if ( ! is_front_page() ) { ?>
			<div class="categories">
				<?php feminine_business_category(); ?>
			</div>
		<?php } ?>
		<div class="details-wrap">
			<?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
		</div>
	<?php if ( ! is_front_page() ) echo '</div>';
	if( is_front_page() ){ ?>
		<a href="<?php the_permalink(); ?>" class="btn-link"><?php echo esc_html( $blog_readmore ); ?></a>
	<?php } ?>

</article><!-- #post-<?php the_ID(); ?> -->

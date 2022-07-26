<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Feminine_Business
 */
$ed_comments    = get_theme_mod( 'ed_banner_comments', false );
$ed_date        = get_theme_mod( 'ed_post_date', false );
?>
    
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="https://schema.org/Blog">
    <?php feminine_business_post_thumbnail(); ?>
    <div class="content-wrap">
        <?php if ( !$ed_comments || !$ed_date ){ ?>
            <header class="entry-header">
                <div class="entry-meta">
                    <?php
                        feminine_business_posted_on(); 
                        feminine_business_comment_count();
                    ?>
                </div>
            </header>
        <?php } ?>
        <div class="categories">
            <?php feminine_business_category(); ?>
        </div>
        <div class="details-wrap">
            <?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
            <div class="entry-details">
                <?php the_excerpt(); ?>
            </div>
        </div>
    </div>
</article>

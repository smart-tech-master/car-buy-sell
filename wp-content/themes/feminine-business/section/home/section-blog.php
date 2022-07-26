<?php
/**
 * Blog Section 
 * 
 * @package Feminine_Business
 */

$ed_blog_post         = get_theme_mod( 'ed_blog_post_section', false );
$blog_section_title   = get_theme_mod( 'blog_section_title' );
$blog_section_content = get_theme_mod( 'blog_section_content' );

$blog_args   = array(  
    'post_status'    => 'publish',
    'posts_per_page' => 3,
); 
$blog_qry = new WP_Query( $blog_args );

if( $ed_blog_post && have_posts() ){ ?>
    <article id="blog-section" class="blog-section" itemscope itemtype="https://schema.org/Blog">
        <div class="container">                              
            <?php if( $blog_section_title ){ ?>
                <header class="section-header">
                    <h2 class="section-title">
                        <?php echo esc_html( $blog_section_title ); ?>
                    </h2>
                </header>
            <?php } if ( $blog_section_content ) { ?>
                <div class="desc">
                    <?php echo esc_html( $blog_section_content ); ?>
                </div>
            <?php } ?>
            <div class="blog-wrapper">
                <?php 
                while ( $blog_qry->have_posts() ){ 
                    $blog_qry->the_post();
                    get_template_part( 'template-parts/content', get_post_type() );
                } wp_reset_postdata(); ?>
            </div>
        </div>
    </article>
<?php }
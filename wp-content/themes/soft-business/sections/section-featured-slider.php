<?php 
/**
 * Template part for displaying Featured Slider Section
 *
 *@package Soft Business
 */

    $featured_slider_content_type            = soft_business_get_option( 'featured_slider_content_type' );
    $number_of_featured_slider_items         = soft_business_get_option( 'number_of_featured_slider_items' );

    if( $featured_slider_content_type == 'featured_slider_page' ) :
        for( $i=1; $i<=$number_of_featured_slider_items; $i++ ) :
            $featured_slider_posts[] = absint( soft_business_get_option( 'featured_slider_page_'.$i ) );
        endfor;  
    elseif( $featured_slider_content_type == 'featured_slider_post' ) :
        for( $i=1; $i<=$number_of_featured_slider_items; $i++ ) :
            $featured_slider_posts[] = absint( soft_business_get_option( 'featured_slider_post_'.$i ) );
        endfor;
    endif;
    ?>

    <?php if( $featured_slider_content_type == 'featured_slider_page' ) : ?>
        <div class="section-content" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "infinite": false, "speed": 1000, "dots": false, "arrows": true, "autoplay": false, "draggable": false, "fade": false }'>
            <?php $args = array (
                'post_type'     => 'page',
                'posts_per_page' => absint( $number_of_featured_slider_items ),
                'post__in'      => $featured_slider_posts,
                'orderby'       =>'post__in',
            );        
            $loop = new WP_Query($args);                        
            if ( $loop->have_posts() ) :
            $i=-1;
                while ($loop->have_posts()) : $loop->the_post(); $i++;

                $class='';
                if ($i==0) {
                    $class='display-block';
                } else{
                    $class='display-none';}
                ?>              
                
                <article class="<?php echo esc_attr($class); ?>" style="background-image: url('<?php the_post_thumbnail_url( 'full' ); ?>');">
                    <div class="wrapper">
                        <div class="featured-content-wrapper">
                            <header class="entry-header">
                                <h2 class="entry-title"><?php the_title();?></h2>
                            </header>

                            <div class="entry-content">
                                <?php
                                    $excerpt = soft_business_the_excerpt( 25 );
                                    echo wp_kses_post( wpautop( $excerpt ) );
                                ?>
                            </div><!-- .entry-content -->

                            <?php $readmore_text = soft_business_get_option( 'readmore_text' );?>
                            <?php if (!empty($readmore_text) ) :?>
                                <div class="read-more">
                                    <a href="<?php the_permalink();?>" class="btn"><?php echo esc_html($readmore_text);?><i class="fas fa-plus"></i></a>
                                </div><!-- .read-more -->
                            <?php endif; ?>
                        </div><!-- .featured-content-wrapper -->
                    </div><!-- .wrapper -->
                </article>

                <?php endwhile; ?>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
        </div><!-- .section-content -->
    
    <?php else: ?>
        <div class="section-content" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "infinite": false, "speed": 1000, "dots": false, "arrows": true, "autoplay": false, "draggable": false, "fade": false }'>
            <?php $args = array (
                'post_type'     => 'post',
                'posts_per_page' => absint( $number_of_featured_slider_items ),
                'post__in'      => $featured_slider_posts,
                'orderby'       =>'post__in',
                'ignore_sticky_posts' => true,
            );        
            $loop = new WP_Query($args);                        
            if ( $loop->have_posts() ) :
            $i=-1;
                while ($loop->have_posts()) : $loop->the_post(); $i++;

                $class='';
                if ($i==0) {
                    $class='display-block';
                } else{
                    $class='display-none';}
                ?>            
                
                <article class="<?php echo esc_attr($class); ?>" style="background-image: url('<?php the_post_thumbnail_url( 'full' ); ?>');">
                    <div class="wrapper">
                        <div class="featured-content-wrapper">
                            <header class="entry-header">
                                <h2 class="entry-title"><?php the_title();?></h2>
                            </header>

                            <div class="entry-content">
                                <?php
                                    $excerpt = soft_business_the_excerpt( 25 );
                                    echo wp_kses_post( wpautop( $excerpt ) );
                                ?>
                            </div><!-- .entry-content -->

                            <?php $readmore_text = soft_business_get_option( 'readmore_text' );?>
                            <?php if (!empty($readmore_text) ) :?>
                                <div class="read-more">
                                    <a href="<?php the_permalink();?>" class="btn"><?php echo esc_html($readmore_text);?><i class="fas fa-plus"></i></a>
                                </div><!-- .read-more -->
                            <?php endif; ?>
                        </div><!-- .featured-content-wrapper -->
                    </div><!-- .wrapper -->
                </article>

                <?php endwhile; ?>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
        </div><!-- .section-content -->
    <?php endif;
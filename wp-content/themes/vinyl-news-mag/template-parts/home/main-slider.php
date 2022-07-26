<?php
$vinyl_news_mag_options = vinyl_news_mag_theme_options();


$show_date = $vinyl_news_mag_options['show_date'];
$show_category = $vinyl_news_mag_options['show_category'];
$no_of_posts_vertical = $vinyl_news_mag_options['no_of_posts_vertical'];



$main_slider_categories = get_theme_mod( 'main_slider');
$vertical_thumbnail_category = get_theme_mod( 'vertical_thumbnail_category');




$main_slider_title = $vinyl_news_mag_options['main_slider_title'];
$show_vertical_posts = $vinyl_news_mag_options['show_vertical_posts'];
$vertical_thumbnail_title = $vinyl_news_mag_options['vertical_thumbnail_title'];
$content_length = '250';
?>


<?php if($show_vertical_posts==1){ ?>

<div class="main-slider-section" id="primary">
    <div class="container">
    <div class="row">

    <div class="col-md-8">

         <?php   if ($main_slider_categories && 'none' != $main_slider_categories) {
    $args = [
        'post_type'      => array( 'post' ),
        'posts_per_page' => 20,
        'post_status' => 'publish',
        'cat'            => $main_slider_categories,
        'order' => 'desc',
        'orderby' => 'menu_order date',
    ];
} else {
    $args = [
        'post_type'      => array( 'post' ),
        'posts_per_page' => 20,
        'post_status' => 'publish',
        'order' => 'desc',
        'orderby' => 'menu_order date',
    ];
}

$blog_query = new WP_Query($args);

$loop = 0;

if ($blog_query->have_posts()): ?>
            <div class="main-slider">
                
                    <?php
                        while ($blog_query->have_posts()):
                            $blog_query->the_post();

                            $image_src = wp_get_attachment_image_src(
                                get_post_thumbnail_id(),
                                'vinyl-news-mag-blog-thumbnail-img'
                            );
                            if($image_src){
                                $url = $image_src[0];
                                }

                                if (!empty($image_src)) {
                                    $image_style =
                                        "style='background-image:url(" . esc_url($url) . ")'"; ?>
                                    <?php
                                } else {
                                    $image_style = '';
                                }
                            ?>
                        <div class="main-slider-wrap">
						<div class="carousel-thumb" <?php echo wp_kses_post($image_style); ?>>
                        
    
						</div>
						<div class="post-content">
                        <ul class="post-meta">
                        <?php if($show_category){ ?>
                            <?php $cats = get_the_category();
                        $cat_name = $cats[0]->name;
                        echo '<a class="post-category inline" href="'.esc_url(get_category_link($cats[0]->cat_ID)).'">'.esc_html($cats[0]->cat_name).'</a>';

                         } ?>

                         <?php if($show_date){ ?>
                            <li class="meta-date"><a href="<?php echo esc_url(
                                vinyl_news_mag_archive_link($post)
                            ); ?>"><time class="entry-date published" datetime="<?php echo esc_url(
    vinyl_news_mag_archive_link($post)
); ?>"><?php echo esc_html(the_time(get_option('date_format'))); ?></time>
                                                </a></li>
                                                

                                        <?php } ?>
                                               
							</ul>
							<h3>
								<a href="<?php echo esc_url(get_the_permalink()); ?>"><?php the_title(); ?></a>
							</h3>
							
                            <p><?php echo wp_kses_post(
                                        vinyl_news_mag_get_excerpt(
                                            $blog_query->post->ID,
                                            $content_length
                                        )
                                    ); ?></p>
						</div>  
					</div>
                        <?php endwhile;
                        wp_reset_postdata();
                        ?>
                </div>
                <?php endif;
        ?>
        </div>
        




        <div class="col-md-4">
        <div class="title-wrap">
                            <?php
                            
                             if ($vertical_thumbnail_title):
                                echo '<h3>' . esc_html($vertical_thumbnail_title) . '</h3>';
                          
                           endif; ?>
     
                        </div>

                        <?php   if ($vertical_thumbnail_category && 'none' != $vertical_thumbnail_category) {
    $args = [
        'post_type'      => array( 'post' ),
        'posts_per_page' => $no_of_posts_vertical,
        'post_status' => 'publish',
        'cat'            => $vertical_thumbnail_category,
        'order' => 'desc',
        'orderby' => 'menu_order date',
    ];
} else {
    $args = [
        'post_type'      => array( 'post' ),
        'posts_per_page' => $no_of_posts_vertical,
        'post_status' => 'publish',
        'order' => 'desc',
        'orderby' => 'menu_order date',
    ];
}

$third_blog_query = new WP_Query($args);
$loop = 0;
if ($third_blog_query->have_posts()): ?>
            <div class="with-thumbnail-section">
                
                <?php
                    while ($third_blog_query->have_posts()):
                        $third_blog_query->the_post();

                        $image_src = wp_get_attachment_image_src(
                            get_post_thumbnail_id(),
                            'thumbnail'
                        );
                        if($image_src){
                            $url = $image_src[0];
                            }

                            if (!empty($image_src)) {
                                $image_style =
                                    "style='background-image:url(" . esc_url($url) . ")'"; ?>
                                <?php
                            } else {
                                $image_style = '';
                            }
                        ?>
                    <div class="with-thumbnail-wrap">
                    <div class="carousel-thumb">
                        
                        <a href="<?php echo esc_url(get_the_permalink()); ?>"><img src="<?php echo esc_url($url); ?>"></a>
						</div>
                    <div class="post-content">
                    <?php if($show_category){ ?>
                            <?php $cats = get_the_category();
                        $cat_name = $cats[0]->name;
                        echo '<a class="post-category inline" href="'.esc_url(get_category_link($cats[0]->cat_ID)).'">'.esc_html($cats[0]->cat_name).'</a>';

                         } ?>
                     

                        <h3>
                            <a href="<?php echo esc_url(get_the_permalink()); ?>"><?php the_title(); ?></a>
                        </h3>
                        <ul class="post-meta">
                        <?php if($show_date){ ?>
                            <li class="meta-date"><a href="<?php echo esc_url(
                                vinyl_news_mag_archive_link($post)
                            ); ?>"><time class="entry-date published" datetime="<?php echo esc_url(
    vinyl_news_mag_archive_link($post)
); ?>"><?php echo esc_html(the_time(get_option('date_format'))); ?></time>
                                                </a></li>
                                                

                                        <?php } ?>

                        </ul>
                       
                    </div>
                </div>
                    <?php endwhile;
                    wp_reset_postdata();
                    ?>
            </div>
            <?php endif;
        ?>

        </div>
    </div>
</div>
</div>


<?php }
else { ?>

<div class="main-slider-section" id="primary">
    <div class="container">
    <div class="row">

    <div class="col-md-12">

         <?php   if ($main_slider_categories && 'none' != $main_slider_categories) {
    $args = [
        'post_type'      => array( 'post' ),
        'posts_per_page' => 20,
        'post_status' => 'publish',
        'cat'            => $main_slider_categories,
        'order' => 'desc',
        'orderby' => 'menu_order date',
    ];
} else {
    $args = [
        'post_type'      => array( 'post' ),
        'posts_per_page' => 20,
        'post_status' => 'publish',
        'order' => 'desc',
        'orderby' => 'menu_order date',
    ];
}

$blog_query = new WP_Query($args);

$loop = 0;

if ($blog_query->have_posts()): ?>
            <div class="main-slider">
                
                    <?php
                        while ($blog_query->have_posts()):
                            $blog_query->the_post();

                            $image_src = wp_get_attachment_image_src(
                                get_post_thumbnail_id(),
                                'vinyl-news-mag-blog-thumbnail-img'
                            );
                            if($image_src){
                                $url = $image_src[0];
                                }

                                if (!empty($image_src)) {
                                    $image_style =
                                        "style='background-image:url(" . esc_url($url) . ")'"; ?>
                                    <?php
                                } else {
                                    $image_style = '';
                                }
                            ?>
                        <div class="main-slider-wrap">
						<div class="carousel-thumb" <?php echo wp_kses_post($image_style); ?>>
                        
    
						</div>
						<div class="post-content">
                        <ul class="post-meta">
                        <?php if($show_category){ ?>
                            <?php $cats = get_the_category();
                        $cat_name = $cats[0]->name;
                        echo '<a class="post-category inline" href="'.esc_url(get_category_link($cats[0]->cat_ID)).'">'.esc_html($cats[0]->cat_name).'</a>';

                         } ?>

                         <?php if($show_date){ ?>
                            <li class="meta-date"><a href="<?php echo esc_url(
                                vinyl_news_mag_archive_link($post)
                            ); ?>"><time class="entry-date published" datetime="<?php echo esc_url(
    vinyl_news_mag_archive_link($post)
); ?>"><?php echo esc_html(the_time(get_option('date_format'))); ?></time>
                                                </a></li>
                                                

                                        <?php } ?>
                                               
							</ul>
							<h3>
								<a href="<?php echo esc_url(get_the_permalink()); ?>"><?php the_title(); ?></a>
							</h3>
							
                            <p><?php echo wp_kses_post(
                                        vinyl_news_mag_get_excerpt(
                                            $blog_query->post->ID,
                                            $content_length
                                        )
                                    ); ?></p>
						</div>  
					</div>
                        <?php endwhile;
                        wp_reset_postdata();
                        ?>
                </div>
                <?php endif;
        ?>
        </div>
        

    </div>
</div>
</div>

<?php } ?>
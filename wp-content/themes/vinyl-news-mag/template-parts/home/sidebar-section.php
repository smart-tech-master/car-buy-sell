<?php
$vinyl_news_mag_options = vinyl_news_mag_theme_options();

$sidebar_posts = get_theme_mod( 'sidebar_posts');
$content_length = '150';

$show_date = $vinyl_news_mag_options['show_date'];
$show_category = $vinyl_news_mag_options['show_category'];

$sidebar_posts_title = $vinyl_news_mag_options['sidebar_posts_title'];

?>



<?php
 if ($sidebar_posts && 'none' != $sidebar_posts) {
    $args = [
        'post_type'      => array( 'post' ),
        'posts_per_page' => 4,
        'post_status' => 'publish',
        'cat'            => $sidebar_posts,
        'order' => 'desc',
        'orderby' => 'menu_order date',
        'paged' => 1,
    ];
} else {
    $args = [
        'post_type'      => array( 'post' ),
        'posts_per_page' => 4,
        'post_status' => 'publish',
        'order' => 'desc',
        'orderby' => 'menu_order date',
        'paged' => 1,
    ];
}

$blog_query = new WP_Query($args);
$loop = 0;

if ($blog_query->have_posts()): ?>




<div class="home-sidebar section">

	<div class="container">
		<div class="row">
            <div class="col-md-8">
            <div class="title-wrap">
                    <?php
                    
                        if ($sidebar_posts_title):
                        echo '<h3>' . esc_html($sidebar_posts_title) . '</h3>';
                    
                    endif; ?>

                </div>
                <div class="card-sidebar-wrap">

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
                    ?>

  
                        <div class="sidebar-content-wrap">
                            <div class="sidebar-thumb">
                            
                            <a href="<?php echo esc_url(get_the_permalink()); ?>"><img src="<?php echo esc_url($url); ?>"></a>
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
                                <figcaption>
                                    
                                    <p><?php echo wp_kses_post(
                                        vinyl_news_mag_get_excerpt(
                                            $blog_query->post->ID,
                                            $content_length
                                        )
                                    ); ?></p>

                                  </figcaption>
                                  <a class="btn btn-default" href="<?php echo esc_url(
          get_the_permalink()
      ); ?>"><?php esc_html_e('Read More', 'vinyl-news-mag'); ?><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                                
                            </div>
                        </div>
            

                    <?php
                endwhile;
                wp_reset_postdata();

                
                ?>
                   
                </div>
                <div class="loadmore"><?php esc_html_e('Load More', 'vinyl-news-mag'); ?></div>
                <span class="no-more-post"><?php esc_html_e('NO MORE POST AVAILABLE', 'vinyl-news-mag'); ?></span>
            </div>

            <?php if (is_active_sidebar('home-sidebar')): ?>
                    
                    <div class="col-md-4">
                    <aside id="secondary" class="widget-area">
                        <?php dynamic_sidebar('home-sidebar'); ?>
                        </aside>
                    </div>
                    
                    

                    <?php
	                else: vinyl_news_mag_blank_sidebar_widget();
	                endif; ?>
		</div>
	</div>
</div>

<?php endif;
?>


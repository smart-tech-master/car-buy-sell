<?php
$vinyl_news_mag_options = vinyl_news_mag_theme_options();
$second_posts = get_theme_mod( 'second_posts');
$second_posts_title = $vinyl_news_mag_options['second_posts_title'];

$show_date = $vinyl_news_mag_options['show_date'];
$show_category = $vinyl_news_mag_options['show_category'];


?>

<?php
 if ($second_posts && 'none' != $second_posts) {
            $args = [
                'post_type'      => array( 'post' ),
                'posts_per_page' => 4,
                'post_status' => 'publish',
                'cat'            => $second_posts,
                'order' => 'desc',
                'orderby' => 'menu_order date',
            ];
        } else {
            $args = [
                'post_type'      => array( 'post' ),
                'posts_per_page' => 4,
                'post_status' => 'publish',
                'order' => 'desc',
                'orderby' => 'menu_order date',
            ];
        }

$blog_query = new WP_Query($args);
$loop = 0;

if ($blog_query->have_posts()): ?>




<div class="blog-eight-section section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
      
        <div class="title-wrap">
                            <?php
                            
                             if ($second_posts_title):
                                echo '<h3>' . esc_html($second_posts_title) . '</h3>';
                          
                           endif; ?>
            
                        </div>
                   
                </div>
        </div>
    </div>
    
	<div class="container">
    <div class="col-md-12 withbg">
		<div class="greybg row">
   
			<div class="card-eight-wrap">

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

				<div class="eight-wraps">
					<div class="eight-content-wrap">
						<div class="eight-thumb">
                        
                        <a href="<?php echo esc_url(get_the_permalink()); ?>"><img src="<?php echo esc_url($url); ?>"></a>
						</div>
						<div class="post-content">
							<h3>
								<a href="<?php echo esc_url(get_the_permalink()); ?>"><?php the_title(); ?></a>
							</h3>
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
						</div>
					</div>
				</div>

                <?php
            endwhile;
            wp_reset_postdata();
            ?>
			</div>
		</div>
        </div>
	</div>
</div>

<?php endif;
?>


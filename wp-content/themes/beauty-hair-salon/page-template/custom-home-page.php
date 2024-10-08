<?php
/**
 * Template Name: Custom Home Page
 */
get_header(); ?>

<main id="content">
  <?php if( get_theme_mod('beauty_salon_spa_slider_arrows') != ''){ ?>
    <section id="slider">
      <span class="design-right"></span>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"> 
        <?php
          for ( $i = 1; $i <= 4; $i++ ) {
            $mod =  get_theme_mod( 'beauty_salon_spa_post_setting' . $i );
            if ( 'page-none-selected' != $mod ) {
              $beauty_salon_spa_slide_post[] = $mod;
            }
          }
           if( !empty($beauty_salon_spa_slide_post) ) :
          $args = array(
            'post_type' =>array('post'),
            'post__in' => $beauty_salon_spa_slide_post
          );
          $query = new WP_Query( $args );
          if ( $query->have_posts() ) :
            $i = 1;
        ?>
        <div class="carousel-inner" role="listbox">
          <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
          <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
            <img src="<?php esc_url(the_post_thumbnail_url('full')); ?>"/>
            <div class="carousel-caption text-center text-md-right">
              <h2 class="slider-title"><?php the_title();?></h2>
              <p class="mb-0"><?php echo esc_html(wp_trim_words(get_the_content(),'20') );?></p>
              <div class="home-btn text-center text-md-right my-4">
                <a class="py-3 px-4" href="<?php the_permalink(); ?>"><?php echo esc_html('READ MORE','beauty-hair-salon'); ?></a>
              </div>
            </div>
          </div>
          <?php $i++; endwhile;
          wp_reset_postdata();?>
        </div>
        <?php else : ?>
        <div class="no-postfound"></div>
          <?php endif;
        endif;?>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-long-arrow-alt-left"></i></span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-long-arrow-alt-right"></i></span>
          </a>
      </div>
      <div class="clearfix"></div>
    </section>
  <?php }?>

  <section id="home-services" class="py-5">
    <div class="container">
      <?php if( get_theme_mod('beauty_salon_spa_services_short_title') != '' ){ ?>
        <h6 class="text-center"><?php echo esc_html(get_theme_mod('beauty_salon_spa_services_short_title','')); ?></h6>
      <?php }?>
      <?php if( get_theme_mod('beauty_salon_spa_services_main_title') != '' ){ ?>
        <h3 class="text-center"><?php echo esc_html(get_theme_mod('beauty_salon_spa_services_main_title','')); ?></h3>
      <?php }?>
      <div class="owl-carousel pt-5">
        <?php
          $project_category=  get_theme_mod('beauty_salon_spa_services_category_setting');if($project_category){
          $page_query = new WP_Query(array( 'category_name' => esc_html($project_category ,'beauty-hair-salon')));?>
            <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
              <div class="box">
                <div class="row">
                  <div class="col-lg-6 col-md-6 align-self-center">
                    <div class="img-box">
                      <?php the_post_thumbnail(); ?>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 align-self-center">
                    <div class="box-content">
                      <span class="mr-2"><?php the_time( get_option( 'date_format' ) ); ?></span>
                      <span class="entry-author"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?></a></span>
                      <a href="<?php the_permalink(); ?>"><h4 class="mt-3"><?php the_title();?></h4></a>
                      <p><?php echo esc_html(wp_trim_words(get_the_content(),'10') );?></p>
                      <div class="box-button">
                        <a class="py-2 px-3" href="<?php the_permalink(); ?>"><?php esc_html_e('READ MORE','beauty-hair-salon');?></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php endwhile;
          wp_reset_postdata();
        }?>
      </div>
    </div>
  </section>

  <section id="product" class="py-5 text-center">
    <div class="container">
      <?php if( get_theme_mod('beauty_hair_salon_shop_text') != '' ){ ?>
        <h5 class="mb-4"><?php echo esc_html( get_theme_mod('beauty_hair_salon_shop_text')); ?></h5>
      <?php }?>
      <?php if( get_theme_mod('beauty_hair_salon_shop_title') != '' ){ ?>
        <h3><?php echo esc_html( get_theme_mod('beauty_hair_salon_shop_title')); ?></h3>
      <?php }?>
      <div class="row mt-5">
        <?php
        $beauty_hair_salon_catData = get_theme_mod('beauty_hair_salon_shop_category');
        $beauty_hair_salon_count_catData = get_theme_mod('beauty_hair_salon_shop_number');
        if ( class_exists( 'WooCommerce' ) ) {
        $args = array(
          'post_type' => 'product',
          'posts_per_page' => $beauty_hair_salon_count_catData,
          'product_cat' => $beauty_hair_salon_catData,
          'order' => 'ASC'
        );
        $loop = new WP_Query( $args );
        while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
          <div class="col-lg-3 col-md-3 col-sm-3 mb-4">
            <div class="box mb-3">
              <?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, ''); else echo '<img src="'.esc_url(woocommerce_placeholder_img_src()).'" />'; ?>
              <div class="box-content">
                <?php if( $product->is_type( 'simple' ) ) { woocommerce_template_loop_add_to_cart(  $loop->post, $product );} ?>
              </div>
              <ul class="icon">
                <li><?php woocommerce_show_product_sale_flash( $post, $product ); ?></li>
              </ul>
            </div>
            <h4><a href="<?php echo esc_url(get_permalink( $loop->post->ID )); ?>"><?php the_title(); ?></a></h4>
            <span><?php esc_attr( apply_filters( 'woocommerce_product_price_class', '' ) ); ?><?php echo $product->get_price_html(); ?></span>
          </div>
        <?php endwhile; wp_reset_query(); ?>
        <?php } ?>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>
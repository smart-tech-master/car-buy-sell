<?php
/**
 * Homepage Shop Section
 * 
 * @package Feminine_Business
 */
 
$ed_shop          = get_theme_mod( 'ed_shop_section', false );
$section_title    = get_theme_mod( 'shop_section_title' );
$section_subtitle = get_theme_mod( 'shop_section_subtitle' );
$product_one      = get_theme_mod( 'selected_products_one' );
$product_two      = get_theme_mod( 'selected_products_two' );
$product_three    = get_theme_mod( 'selected_products_three' );

$args = array(
    'post_type'      => 'product',
    'post_status'    => 'publish',
    'posts_per_page' => 3,
    'post__in'       => array( $product_one, $product_two, $product_three ),
    'orderby'        => 'post__in'
);

$qry = new WP_Query( $args );

if( $ed_shop && is_woocommerce_activated() && ( $section_title || $section_subtitle ) ){ ?>
    <section id="product-section" class="product-section">
        <div class="container">
            <?php if ( $section_title ) { ?>
            <header class="section-header">
                <h2 class="section-title"><?php echo esc_html( $section_title ); ?></h2>
            </header>
            <?php } if( $section_subtitle ) { ?>
                <div class="desc">
                    <p><?php echo esc_html( $section_subtitle ); ?></p>
                </div>
            <?php } if( $qry->have_posts() ){ ?> 
                <div class="products-wrapper">
                    <?php while( $qry->have_posts() ){
                        $qry->the_post(); ?>
                        <div class="item">
                            <?php 
                            $stock = get_post_meta( get_the_ID(), '_stock_status', true );
                            if( $stock == 'outofstock' ){
                                echo '<span class="outofstock">' . esc_html__( 'Sold Out', 'feminine-business' ) . '</span>';
                            }else{
                                woocommerce_show_product_sale_flash();    
                            }
                            ?>   
                            <div class="popular-image">
                                <a href="<?php the_permalink(); ?>">
                                    <?php 
                                    if( has_post_thumbnail() ){
                                        the_post_thumbnail( 'feminine-business-products-home', array( 'itemprop' => 'image' ) );    
                                    }else{
                                        feminine_business_get_fallback_svg( 'feminine-business-products-home' );
                                    }
                                    ?>
                                </a>
                            </div>
                            <?php the_title( '<h3 class="product-title"><a href="' . esc_url( get_permalink() ) . '">', '</a></h3>' ); 
                            $product = wc_get_product( get_the_ID() );
                            echo '<div class="woocommerce">' . wc_get_rating_html( $product->get_average_rating() ) . '</div>';
                            woocommerce_template_single_price();
                            woocommerce_template_loop_add_to_cart(); ?>
                        </div>
                    <?php } ?>
                </div>
            <?php } wp_reset_postdata(); ?>
        </div>
    </section>
<?php }
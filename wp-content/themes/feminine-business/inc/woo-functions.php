<?php 
/**
 *
 * @link https://docs.woothemes.com/document/third-party-custom-theme-compatibility/
 *
 * @package Feminine_Business
 */

 /**
 * Woocommerce related hooks
*/
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content',  'woocommerce_output_content_wrapper_end', 10 );
remove_action( 'woocommerce_sidebar',             'woocommerce_get_sidebar', 10 );
add_filter( 'woocommerce_show_page_title' ,     '__return_false' );

/**
 * Changing priority of category display in single product
 */
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 9 );

if ( ! function_exists( 'feminine_business_woocommerce_support' ) ) :
    /**
     * Declare Woocommerce Support
    */
    function feminine_business_woocommerce_support() {
        global $woocommerce;
        
        add_theme_support( 'woocommerce' );
        
        if( version_compare( $woocommerce->version, '3.0', ">=" ) ) {
            add_theme_support( 'wc-product-gallery-zoom' );
            add_theme_support( 'wc-product-gallery-lightbox' );
            add_theme_support( 'wc-product-gallery-slider' );
        }
    }
endif;
add_action( 'after_setup_theme', 'feminine_business_woocommerce_support');

if ( ! function_exists( 'feminine_business_wc_wrapper' ) ) :
    /**
     * Before Content
     * Wraps all WooCommerce content in wrappers which match the theme markup
    */
    function feminine_business_wc_wrapper(){    
        ?>
        <div id="primary" class="content-area">
            <div class="container">
                <div class="page-grid">
                    <div id="main" class="site-main">
                    <?php         
                    /**
                     * * @hooked feminine_business_primary_page_header - 10
                    */
                    do_action( 'feminine_business_before_posts_content' );
    }
endif;
add_action( 'woocommerce_before_main_content', 'feminine_business_wc_wrapper' );

if ( ! function_exists( 'feminine_business_wc_wrapper_end' ) ) :
    /**
     * After Content
     * Closes the wrapping divs
    */
    function feminine_business_wc_wrapper_end(){ ?>
                    </div>
                </div>
            </div>
        </div>
        <?php 
    }
endif;
add_action( 'woocommerce_after_main_content', 'feminine_business_wc_wrapper_end' );

if ( ! function_exists( 'feminine_business_woo_header_cart' ) ) :

function feminine_business_woo_header_cart(){
    $cart_page      = get_option( 'woocommerce_cart_page_id' );
    $count          = WC()->cart->cart_contents_count;
    $ed_header_cart = get_theme_mod( 'ed_header_cart', false );
    if( $ed_header_cart && $cart_page ){ 
    ?>
    <div class="header-cart">
        <a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="woo-cart">
            <?php echo feminine_business_misc_svg( 'cart' ); ?>
            <span class="count">
                <?php echo absint( $count ); ?>
            </span>
        </a>
    </div>
    <?php 
    }
}
endif;
/**
 * Ensure cart contents update when products are added to the cart via AJAX
 * 
 * @link https://isabelcastillo.com/woocommerce-cart-icon-count-theme-header
 */
if ( ! function_exists( 'feminine_business_add_to_cart_fragment' ) ) :

function feminine_business_add_to_cart_fragment( $fragments ){
    ob_start();
    $count = WC()->cart->cart_contents_count; ?>    
        <a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="woo-cart">
            <?php echo feminine_business_misc_svg( 'cart' ); ?>
            <span class="count">
                <?php echo absint( $count ); ?>
            </span>
        </a>
    <?php
 
    $fragments['a.woo-cart'] = ob_get_clean();
     
    return $fragments;
}
endif;
add_filter( 'woocommerce_add_to_cart_fragments', 'feminine_business_add_to_cart_fragment' );
<?php 
/**
 * Template Name: Contact page
 * 
 * @package Feminine_Business
 */ 
$page_subtitle = get_theme_mod( 'contact_page_subtitle', __( 'CONTACT US', 'feminine-business' ) );
$img           = get_theme_mod( 'contact_featured_img' );
$form_title    = get_theme_mod( 'contact_form_title', __( 'Ready to Talk', 'feminine-business' ) );
$shortcode     = get_theme_mod( 'contact_form_shortcode' );
$alt_image     = attachment_url_to_postid( $img );

get_header(); ?>

    <section id="contact-us" class="contact-us">
        <div class="container">
            <div class="contact-wrapper">
                <div class="contact-desc">
                    <?php if ( $page_subtitle ) { ?>
                        <span class="subtitle">
                            <?php echo esc_html( $page_subtitle ); ?>
                        </span>         
                    <?php }
                    the_title( '<h1 class="page-title">', '</h1>' ); ?>
                    <div class="description">
                        <?php the_content(); ?>
                    </div>
                </div>
                <?php if( has_post_thumbnail() ){ ?>
                    <div class="image-wrapper">
                        <?php the_post_thumbnail( 'feminine-business-contact-page', array( 'itemprop' => 'image' ) ); ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <!-- Contactus -->
    <div class="contact-us-wrapper" id="contact">
        <div class="container">
            <div class="contact-main-wrap">
                <div class="contact-left">
                    <?php 
                        /**
                         * 
                         * @hooked feminine_business_phone_email    - 10
                         * @hooked feminine_business_contact_hours  - 20
                         * @hooked feminine_business_location       - 30
                         */
                        do_action( 'feminine_business_contact_page_details' );
                    ?>
                </div>
                <?php if( $img ) echo '<div class="contact-image"><img src="' . esc_url( $img ) . '" alt="' . esc_attr( get_post_meta( $alt_image, '_wp_attachment_image_alt', true ) ) . '"></div>'; 
                feminine_business_contact_form( $form_title, $shortcode); ?>
            </div>
        </div>
    </div>
    <?php feminine_business_map_section();
get_footer();
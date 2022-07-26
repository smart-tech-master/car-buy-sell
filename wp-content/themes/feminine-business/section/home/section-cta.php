<?php
/**
 * CTA Section
 * 
 * @package Feminine_Business
 */

$ed_cta           = get_theme_mod( 'ed_cta_section', false );
$cta_title        = get_theme_mod( 'cta_title' );
$cta_subtitle     = get_theme_mod( 'cta_subtitle' );
$cta_btn          = get_theme_mod( 'cta_contact_lbl' );
$cta_btn_link     = get_theme_mod( 'cta_contact_link' );
$cta_image        = get_theme_mod( 'cta_image' );
$alt_image        = attachment_url_to_postid( $cta_image );

if ( $ed_cta && ( $cta_title || $cta_subtitle || $cta_btn || $cta_image ) ) { ?>
    <section id="showup-section" class="showup-section">
        <div class="container">
            <div class="wrapper">
                <?php if( $cta_image ) { ?>
                    <div class="img-wrap">
                        <img width="340" height="246" src="<?php echo esc_url( $cta_image ); ?>" alt="<?php echo esc_attr( get_post_meta( $alt_image, '_wp_attachment_image_alt', true ) ); ?>">
                    </div>
                <?php } if( $cta_title || $cta_subtitle ) { ?>
                    <div class="show-desc">
                        <?php 
                            if( $cta_subtitle ) echo '<p>' . esc_html( $cta_subtitle ) . '</p>';
                            if( $cta_title ) echo '<h4 class="title">' . esc_html( $cta_title ) . '</h4>';
                        ?>
                    </div>
                <?php } if( $cta_btn && $cta_btn_link) { ?>
                    <div class="btn-wrap">
                        <a href="<?php echo esc_url( $cta_btn_link ); ?>" class="primary-btn"><?php echo esc_html( $cta_btn ); ?></a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
<?php }
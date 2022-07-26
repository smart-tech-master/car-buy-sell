<?php
/**
 * Newsletter Section
 * 
 * @package Feminine_Business
 */

$ed_newsletter        = get_theme_mod( 'ed_newsletter_section', false );
$newsletter_shortcode = get_theme_mod( 'newsletter_shortcode' );
$newsletter_img       = get_theme_mod( 'newsletter_img' );
$alt_image            = attachment_url_to_postid( $newsletter_img );

if( $ed_newsletter && is_btnw_activated() && $newsletter_shortcode ){ ?>
    <section id="sign-up-section" class="sign-up-section">
        <div class="container">
            <div class="wrapper">
                <?php if( $newsletter_img ) { ?>
                    <div class="img-wrap">
                        <img width="226" height="281" src="<?php echo esc_url( $newsletter_img ); ?>" alt="<?php echo esc_attr( get_post_meta( $alt_image, '_wp_attachment_image_alt', true ) ); ?>">
                    </div>
                <?php } if( $newsletter_shortcode ) { ?>
                    <div class="details-wrap">
                        <div class="form-wrapper">
                            <?php echo do_shortcode( $newsletter_shortcode ); ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
<?php }

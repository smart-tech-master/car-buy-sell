<?php 
/**
 * Section Section 
 * 
 * @package Feminine_Business
 */

$ed_instagram        = get_theme_mod( 'ed_instagram_section', false );
$instagram_title     = get_theme_mod( 'instagram_title' );
$instagram_shortcode = get_theme_mod( 'instagram_shortcode' );
$instagram_content   = get_theme_mod( 'instagram_content' );

if( $ed_instagram && ( $instagram_title || $instagram_shortcode || $instagram_content ) ){ ?>
    <section id="instagram_section" class="instagram-section">
        <div class="wrapper">
            <div class="container">
                <div class="section-header">
                    <?php if( $instagram_title ){ ?>
                        <h2 class="section-title">
                            <?php echo esc_html( $instagram_title ); ?>
                        </h2>
                    <?php } if ( $instagram_content ) { ?>
                        <div class="desc">
                            <?php echo esc_html( $instagram_content ); ?>
                        </div>
                    <?php } ?>
                </div>
                <?php if( $instagram_shortcode ){ ?>
                    <div class="instagram-wrapper">
                        <?php echo do_shortcode( $instagram_shortcode ); ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
<?php }
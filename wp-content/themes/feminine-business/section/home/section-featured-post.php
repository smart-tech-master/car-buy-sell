<?php
/**
 * Featured Post Section 
 * 
 * @package Feminine_Business
 */

$ed_featured_post   = get_theme_mod( 'ed_featured_post_section', false );
$featured_title     = get_theme_mod( 'home_featured_title' );
$featured_content   = get_theme_mod( 'home_featured_content' );
$featured_btn_lbl   = get_theme_mod( 'home_btn_label' );
$featured_btn_link  = get_theme_mod( 'home_btn_link' );
$featured_image     = get_theme_mod( 'home_featured_image' );
$alt_image          = attachment_url_to_postid( $featured_image );

if( $ed_featured_post && ( $featured_title || $featured_content || $featured_image || ( $featured_btn_lbl && $featured_btn_link ) ) ){  ?>
    <section id="welcome-section" class="welcome-section">
        <div class="container">
            <div class="wrapper">
                <?php 
                if( $featured_image ) echo '<div class="img-wrap"><img width="627" height="551" src="'. esc_url( $featured_image ) . '" alt="' .  esc_attr( get_post_meta( $alt_image, '_wp_attachment_image_alt', true ) ) . '"></div>'; 
                if( $featured_title || $featured_content || ( $featured_btn_lbl && $featured_btn_link ) ){ ?>
                    <div class="welcome-details">
                        <?php if( $featured_title ) echo '<header class="section-header"><h2 class="section-title">' . esc_html( $featured_title ) . '</h2></header>';
                        if( $featured_content ) echo '<div class="welcome-desc">' . wp_kses_post( wpautop( $featured_content ) ) . '</div>';
                        if( $featured_btn_lbl && $featured_btn_link ) echo '<div class="button-wrap"><a href="' . esc_url( $featured_btn_link ) . '" class="secondary-btn">' . esc_html( $featured_btn_lbl ) . '</a></div>'; ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
<?php }

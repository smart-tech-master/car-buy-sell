<?php
/**
 * Feminine_Business Customizer Partials
 *
 * @package Feminine_Business
 *
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function feminine_business_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function feminine_business_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

if( ! function_exists( 'feminine_business_topbar_title' ) ) :
/**
 * Topbar Title
*/
function feminine_business_topbar_title(){
    return get_theme_mod( 'topbar_title' );
}
endif;

if( ! function_exists( 'feminine_business_topbar_btn' ) ) :
/**
 * Topbar Button Label
*/
function feminine_business_topbar_btn(){
    return get_theme_mod( 'topbar_btn' );
}
endif;

if( ! function_exists( 'feminine_business_topbar_phone' ) ) :
/**
 * Topbar Phone
*/
function feminine_business_topbar_phone(){
    return get_theme_mod( 'topbar_phone' );
}
endif;

if( ! function_exists( 'feminine_business_topbar_email' ) ) :
/**
 * Topbar Email
*/
function feminine_business_topbar_email(){
    return get_theme_mod( 'topbar_email' );
}
endif;

if( ! function_exists( 'feminine_business_blog_posts_title' ) ) :
/**
 * Blog Post Title
*/
function feminine_business_blog_posts_title(){
    return get_theme_mod( 'blog_section_title' );
}
endif;

if( ! function_exists( 'feminine_business_blog_section_content' ) ) :
/**
 * Blog Post Content
*/
function feminine_business_blog_section_content(){
    return get_theme_mod( 'blog_section_content' );
}
endif;

if( ! function_exists( 'feminine_business_blog_readmore' ) ) :
/**
 * Blog Read More Button
*/
function feminine_business_blog_readmore(){
    return get_theme_mod( 'blog_readmore', __( 'Read More', 'feminine-business' ) );
}
endif;

if( ! function_exists( 'feminine_business_get_cta_title' ) ) :
/**
 * CTA section title
*/
function feminine_business_get_cta_title(){
    return get_theme_mod( 'cta_title' );
}
endif;

if( ! function_exists( 'feminine_business_get_cta_subtitle' ) ) :
/**
 * CTA section subtitle
*/
function feminine_business_get_cta_subtitle(){
    return get_theme_mod( 'cta_subtitle' );
}
endif;

if( ! function_exists( 'feminine_business_get_cta_contact_lbl' ) ) :
/**
 * CTA section Button Label
*/
function feminine_business_get_cta_contact_lbl(){
    return get_theme_mod( 'cta_contact_lbl' );
}
endif;

if( ! function_exists( 'feminine_business_instagram_title' ) ) :
/**
 * Instagram Section Title
*/
function feminine_business_instagram_title(){
    return get_theme_mod( 'instagram_title' );
}
endif;

if( ! function_exists( 'feminine_business_instagram_content' ) ) :
/**
 * Instagram Section Content
*/
function feminine_business_instagram_content(){
    return get_theme_mod( 'instagram_content' );
}
endif;

if( ! function_exists( 'feminine_business_shop_section_title' ) ) :
/**
 * Shop Section Title 
*/
function feminine_business_shop_section_title(){
    return get_theme_mod( 'shop_section_title' );
}
endif;

if( ! function_exists( 'feminine_business_shop_section_subtitle' ) ) :
/**
 * Shop Section Subtitle
*/
function feminine_business_shop_section_subtitle(){
    return get_theme_mod( 'shop_section_subtitle' );
}
endif;


if( ! function_exists( 'feminine_business_author_box_title' ) ) :
/**
 * Author Box Title
*/
function feminine_business_author_box_title(){
    return get_theme_mod( 'author_box_title', __( 'About The Author', 'feminine-business' ) );
}
endif;

if( ! function_exists( 'feminine_business_related_posts_title' ) ) :
/**
 * Related Posts Title
*/
function feminine_business_related_posts_title(){
    return get_theme_mod( 'related_post_title', __( 'You might also like', 'feminine-business' ) );
}
endif;

if( ! function_exists( 'feminine_business_contact_location_title' ) ) :
/**
 * Contact Location Title
*/
function feminine_business_contact_location_title(){
    return get_theme_mod( 'location_title', __( 'Address', 'feminine-business' ) );
}
endif;

if( ! function_exists( 'feminine_business_contact_location_description' ) ) :
/**
 * Contact Location Description
*/
function feminine_business_contact_location_description(){
    return get_theme_mod( 'location', __( 'Your Business Name 220 Woodland Ave Fairmount MN 56031', 'feminine-business' ) );
}
endif;


if( ! function_exists( 'feminine_business_contact_phone_title' ) ) :
/**
 * Contact Phone Title
*/
function feminine_business_contact_phone_title(){
    return get_theme_mod( 'phone_title', __( 'Drop us a line', 'feminine-business' ) );
}
endif;

if( ! function_exists( 'feminine_business_contact_form_title' ) ) :
/**
 * Contact Page Form Title
*/
function feminine_business_contact_form_title(){
    return get_theme_mod( 'contact_form_title', __( 'Ready to Talk', 'feminine-business' ) );
}
endif;

if( ! function_exists( 'feminine_business_banner_title' ) ) :
/**
 * Banner Title
*/
function feminine_business_banner_title(){
    return get_theme_mod( 'banner_title', __( 'Donec Cras Ut Eget Justo Nec Semper Sapien Viverra Ante', 'feminine-business' ) );
}
endif;

if( ! function_exists( 'feminine_business_banner_content' ) ) :
/**
 * Banner Content
*/
function feminine_business_banner_content(){
    return get_theme_mod( 'banner_content', __( 'Structured gripped tape invisible moulded cups for sauppor firm hold strong powermesh front liner sport detail.', 'feminine-business' ) );
}
endif;

if( ! function_exists( 'feminine_business_banner_btn_label' ) ) :
/**
 * Banner Button Label
*/
function feminine_business_banner_btn_label(){
    return get_theme_mod( 'banner_btn_label', __( 'Read More', 'feminine-business' ) );
}
endif;

if( ! function_exists( 'feminine_business_banner_btn_two_label' ) ) :
/**
 * Banner Button Two Label
*/
function feminine_business_banner_btn_two_label(){
    return get_theme_mod( 'banner_btn_two_label', __( 'About Us', 'feminine-business' ) );
}
endif;

if( ! function_exists( 'feminine_business_slider_btn_label' ) ) :
/**
 * Slider Button Label
*/
function feminine_business_slider_btn_label(){
    return get_theme_mod( 'slider_btn_label', __( 'Read More', 'feminine-business' ) );
}
endif;

if( ! function_exists( 'feminine_business_get_footer_copyright' ) ) :
/**
 * Show/Hide Author link in footer
*/
function feminine_business_get_footer_copyright(){
    $copyright = get_theme_mod( 'footer_copyright' );
    echo '<span class="copy-right">';
    if( ! empty( $copyright ) ){
        echo wp_kses_post( $copyright );
    }else{
        esc_html_e( 'Copyright &copy; ', 'feminine-business' ) . date_i18n( esc_html__( 'Y', 'feminine-business' ) );
        echo ' <a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html( get_bloginfo( 'name' ) ) . '</a>. ';
    }
    echo '</span>';
}
endif;

if( ! function_exists( 'feminine_business_ed_author_link' ) ) :
/**
 * Show/Hide Author link in footer
*/
function feminine_business_ed_author_link(){
    echo '<span class="author-link">'; 
    esc_html_e( 'Developed By ', 'feminine-business' );
    echo '<a href="' . esc_url( 'https://glthemes.com/' ) .'" rel="nofollow" target="_blank">' . esc_html__( 'Good Looking Themes', 'feminine-business' ) . '</a>.';
    echo '</span>';
    
}
endif;

if( ! function_exists( 'feminine_business_ed_wp_link' ) ) :
/**
 * Show/Hide WordPress link in footer
*/
function feminine_business_ed_wp_link(){
    printf( esc_html__( '%1$s Powered by %2$s%3$s', 'feminine-business' ), '<span class="wp-link">', '<a href="'. esc_url( __( 'https://wordpress.org/', 'feminine-business' ) ) .'" target="_blank">WordPress</a>.', '</span>' );
}
endif;

if( ! function_exists( 'feminine_business_home_featured_title' ) ) :
/**
 * Home Featured Title
*/
function feminine_business_home_featured_title(){
    return get_theme_mod( 'home_featured_title' );
}
endif;

if( ! function_exists( 'feminine_business_home_featured_content' ) ) :
/**
 * Home Featured Content
*/
function feminine_business_home_featured_content(){
    return get_theme_mod( 'home_featured_content' );
}
endif;

if( ! function_exists( 'feminine_business_home_btn_label' ) ) :
/**
 * Home Featured Button Label
*/
function feminine_business_home_btn_label(){
    return get_theme_mod( 'home_btn_label' );
}
endif;

if( ! function_exists( 'feminine_business_contact_page_subtitle' ) ) :
/**
 * Contact page subtitle
*/
function feminine_business_contact_page_subtitle(){
    return get_theme_mod( 'contact_page_subtitle', __( 'CONTACT US', 'feminine-business' ) );
}
endif;

if( ! function_exists( 'feminine_business_contact_hours' ) ) :
/**
 * Contact Hours
*/
function feminine_business_contact_hours(){
    return get_theme_mod( 'contact_hours', __( 'Hours of Operation', 'feminine-business' ) );
}
endif;

if( ! function_exists( 'feminine_business_contact_map_title' ) ) :
/**
 * Contact Hours
*/
function feminine_business_contact_map_title(){
    return get_theme_mod( 'contact_map_title', __( 'Locate Us', 'feminine-business' ) );
}
endif;
<?php

	/*---------------------------Width Layout -------------------*/
	$coupons_deals_theme_lay = get_theme_mod( 'coupons_deals_width_layout_options','Default');
    if($coupons_deals_theme_lay == 'Default'){
		$coupons_deals_custom_css .='body{';
			$coupons_deals_custom_css .='max-width: 100%;';
		$coupons_deals_custom_css .='}';
	}else if($coupons_deals_theme_lay == 'Container Layout'){
		$coupons_deals_custom_css .='body{';
			$coupons_deals_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$coupons_deals_custom_css .='}';
	}else if($coupons_deals_theme_lay == 'Box Layout'){
		$coupons_deals_custom_css .='body{';
			$coupons_deals_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$coupons_deals_custom_css .='}';
	}

	/*---------------------------Slider Content Layout -------------------*/
	$coupons_deals_theme_lay = get_theme_mod( 'coupons_deals_slider_content_layout','Left');
    if($coupons_deals_theme_lay == 'Left'){
		$coupons_deals_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .more-btn {';
			$coupons_deals_custom_css .='text-align:left;';
		$coupons_deals_custom_css .='}';
	}else if($coupons_deals_theme_lay == 'Center'){
		$coupons_deals_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .more-btn{';
			$coupons_deals_custom_css .='text-align:center;';
		$coupons_deals_custom_css .='}';
	}else if($coupons_deals_theme_lay == 'Right'){
		$coupons_deals_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .more-btn {';
			$coupons_deals_custom_css .='text-align:right;';
		$coupons_deals_custom_css .='}';
	}

	/*------------ Slider Opacity -------------------*/
	$coupons_deals_theme_lay = get_theme_mod( 'coupons_deals_slider_opacity','0.7');
	if($coupons_deals_theme_lay == '0'){
	$coupons_deals_custom_css .='#slider .slider-bg img{';
		$coupons_deals_custom_css .='opacity:0';
	$coupons_deals_custom_css .='}';
	}else if($coupons_deals_theme_lay == '0.1'){
	$coupons_deals_custom_css .='#slider .slider-bg img{';
		$coupons_deals_custom_css .='opacity:0.1';
	$coupons_deals_custom_css .='}';
	}else if($coupons_deals_theme_lay == '0.2'){
	$coupons_deals_custom_css .='#slider .slider-bg img{';
		$coupons_deals_custom_css .='opacity:0.2';
	$coupons_deals_custom_css .='}';
	}else if($coupons_deals_theme_lay == '0.3'){
	$coupons_deals_custom_css .='#slider .slider-bg img{';
		$coupons_deals_custom_css .='opacity:0.3';
	$coupons_deals_custom_css .='}';
	}else if($coupons_deals_theme_lay == '0.4'){
	$coupons_deals_custom_css .='#slider .slider-bg img{';
		$coupons_deals_custom_css .='opacity:0.4';
	$coupons_deals_custom_css .='}';
	}else if($coupons_deals_theme_lay == '0.5'){
	$coupons_deals_custom_css .='#slider .slider-bg img{';
		$coupons_deals_custom_css .='opacity:0.5';
	$coupons_deals_custom_css .='}';
	}else if($coupons_deals_theme_lay == '0.6'){
	$coupons_deals_custom_css .='#slider .slider-bg img{';
		$coupons_deals_custom_css .='opacity:0.6';
	$coupons_deals_custom_css .='}';
	}else if($coupons_deals_theme_lay == '0.7'){
	$coupons_deals_custom_css .='#slider .slider-bg img{';
		$coupons_deals_custom_css .='opacity:0.7';
	$coupons_deals_custom_css .='}';
	}else if($coupons_deals_theme_lay == '0.8'){
	$coupons_deals_custom_css .='#slider .slider-bg img{';
		$coupons_deals_custom_css .='opacity:0.8';
	$coupons_deals_custom_css .='}';
	}else if($coupons_deals_theme_lay == '0.9'){
	$coupons_deals_custom_css .='#slider .slider-bg img{';
		$coupons_deals_custom_css .='opacity:0.9';
	$coupons_deals_custom_css .='}';
	}

	/*-------------- Footer Text -------------------*/
	$coupons_deals_footer_text_align = get_theme_mod('coupons_deals_footer_text_align');
	$coupons_deals_custom_css .='.copyright-wrapper{';
		$coupons_deals_custom_css .='text-align: '.esc_attr($coupons_deals_footer_text_align).';';
	$coupons_deals_custom_css .='}';

	$coupons_deals_footer_text_padding = get_theme_mod('coupons_deals_footer_text_padding');
	$coupons_deals_custom_css .='.copyright-wrapper{';
		$coupons_deals_custom_css .='padding-top: '.esc_attr($coupons_deals_footer_text_padding).'px !important; padding-bottom: '.esc_attr($coupons_deals_footer_text_padding).'px !important;';
	$coupons_deals_custom_css .='}';

	$coupons_deals_footer_bg_color = get_theme_mod('coupons_deals_footer_bg_color');
	$coupons_deals_custom_css .='.footer-wp{';
		$coupons_deals_custom_css .='background-color: '.esc_attr($coupons_deals_footer_bg_color).';';
	$coupons_deals_custom_css .='}';

	$coupons_deals_footer_bg_image = get_theme_mod('coupons_deals_footer_bg_image');
	if($coupons_deals_footer_bg_image != false){
		$coupons_deals_custom_css .='.footer-wp{';
			$coupons_deals_custom_css .='background: url('.esc_attr($coupons_deals_footer_bg_image).');';
		$coupons_deals_custom_css .='}';
	}

	$coupons_deals_copyright_text_font_size = get_theme_mod('coupons_deals_copyright_text_font_size', 15);
	$coupons_deals_custom_css .='.copyright-wrapper p, .copyright-wrapper a{';
		$coupons_deals_custom_css .='font-size: '.esc_attr($coupons_deals_copyright_text_font_size).'px;';
	$coupons_deals_custom_css .='}';

	/*------------- Back to Top  -------------------*/
	$coupons_deals_back_to_top_border_radius = get_theme_mod('coupons_deals_back_to_top_border_radius');
	$coupons_deals_custom_css .='#scrollbutton i{';
		$coupons_deals_custom_css .='border-radius: '.esc_attr($coupons_deals_back_to_top_border_radius).'px;';
	$coupons_deals_custom_css .='}';

	$coupons_deals_scroll_icon_font_size = get_theme_mod('coupons_deals_scroll_icon_font_size', 22);
	$coupons_deals_custom_css .='#scrollbutton i{';
		$coupons_deals_custom_css .='font-size: '.esc_attr($coupons_deals_scroll_icon_font_size).'px;';
	$coupons_deals_custom_css .='}';

	$coupons_deals_top_bottom_scroll_padding = get_theme_mod('coupons_deals_top_bottom_scroll_padding', 12);
	$coupons_deals_custom_css .='#scrollbutton i{';
		$coupons_deals_custom_css .='padding-top: '.esc_attr($coupons_deals_top_bottom_scroll_padding).'px; padding-bottom: '.esc_attr($coupons_deals_top_bottom_scroll_padding).'px;';
	$coupons_deals_custom_css .='}';

	$coupons_deals_left_right_scroll_padding = get_theme_mod('coupons_deals_left_right_scroll_padding', 17);
	$coupons_deals_custom_css .='#scrollbutton i{';
		$coupons_deals_custom_css .='padding-left: '.esc_attr($coupons_deals_left_right_scroll_padding).'px; padding-right: '.esc_attr($coupons_deals_left_right_scroll_padding).'px;';
	$coupons_deals_custom_css .='}';

	/*-------------- Post Button  -------------------*/
	$coupons_deals_post_button_padding_top = get_theme_mod('coupons_deals_post_button_padding_top');
	$coupons_deals_custom_css .='.postbtn a, #comments input[type="submit"].submit{';
		$coupons_deals_custom_css .='padding-top: '.esc_attr($coupons_deals_post_button_padding_top).'px; padding-bottom: '.esc_attr($coupons_deals_post_button_padding_top).'px;';
	$coupons_deals_custom_css .='}';

	$coupons_deals_post_button_padding_right = get_theme_mod('coupons_deals_post_button_padding_right');
	$coupons_deals_custom_css .='.postbtn a, #comments input[type="submit"].submit{';
		$coupons_deals_custom_css .='padding-left: '.esc_attr($coupons_deals_post_button_padding_right).'px; padding-right: '.esc_attr($coupons_deals_post_button_padding_right).'px;';
	$coupons_deals_custom_css .='}';

	$coupons_deals_post_button_border_radius = get_theme_mod('coupons_deals_post_button_border_radius');
	$coupons_deals_custom_css .='.postbtn a, #comments input[type="submit"].submit{';
		$coupons_deals_custom_css .='border-radius: '.esc_attr($coupons_deals_post_button_border_radius).'px;';
	$coupons_deals_custom_css .='}';

	$coupons_deals_post_comment_enable = get_theme_mod('coupons_deals_post_comment_enable',true);
	if($coupons_deals_post_comment_enable == false){
		$coupons_deals_custom_css .='#comments{';
			$coupons_deals_custom_css .='display: none;';
		$coupons_deals_custom_css .='}';
	}

	/*----------- Preloader Color Option  ----------------*/
	$coupons_deals_preloader_bg_color_option = get_theme_mod('coupons_deals_preloader_bg_color_option');
	$coupons_deals_preloader_icon_color_option = get_theme_mod('coupons_deals_preloader_icon_color_option');
	$coupons_deals_custom_css .='.frame{';
		$coupons_deals_custom_css .='background-color: '.esc_attr($coupons_deals_preloader_bg_color_option).';';
	$coupons_deals_custom_css .='}';
	$coupons_deals_custom_css .='.dot-1,.dot-2,.dot-3{';
		$coupons_deals_custom_css .='background-color: '.esc_attr($coupons_deals_preloader_icon_color_option).';';
	$coupons_deals_custom_css .='}';

	// preloader type
	$coupons_deals_theme_lay = get_theme_mod( 'coupons_deals_preloader_type','First Preloader Type');
    if($coupons_deals_theme_lay == 'First Preloader Type'){
		$coupons_deals_custom_css .='.dot-1, .dot-2, .dot-3{';
			$coupons_deals_custom_css .='';
		$coupons_deals_custom_css .='}';
	}else if($coupons_deals_theme_lay == 'Second Preloader Type'){
		$coupons_deals_custom_css .='.dot-1, .dot-2, .dot-3{';
			$coupons_deals_custom_css .='border-radius:0;';
		$coupons_deals_custom_css .='}';
	}

	/*------------------ Skin Option  -------------------*/
	$coupons_deals_theme_lay = get_theme_mod( 'coupons_deals_background_skin','Without Background');
    if($coupons_deals_theme_lay == 'With Background'){
		$coupons_deals_custom_css .='.inner-service,#sidebar .widget,.woocommerce ul.products li.product, .woocommerce-page ul.products li.product,.front-page-content,.background-img-skin{';
			$coupons_deals_custom_css .='background-color: #fff; padding:20px;';
		$coupons_deals_custom_css .='}';
		$coupons_deals_custom_css .='.login-box a{';
			$coupons_deals_custom_css .='background-color: #fff;';
		$coupons_deals_custom_css .='}';
	}else if($coupons_deals_theme_lay == 'Without Background'){
		$coupons_deals_custom_css .='{';
			$coupons_deals_custom_css .='background-color: transparent;';
		$coupons_deals_custom_css .='}';
	}

	/*-------------- Woocommerce Button  -------------------*/
	$coupons_deals_woocommerce_button_padding_top = get_theme_mod('coupons_deals_woocommerce_button_padding_top',12);
	$coupons_deals_custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt{';
		$coupons_deals_custom_css .='padding-top: '.esc_attr($coupons_deals_woocommerce_button_padding_top).'px; padding-bottom: '.esc_attr($coupons_deals_woocommerce_button_padding_top).'px;';
	$coupons_deals_custom_css .='}';
	

	$coupons_deals_woocommerce_button_padding_right = get_theme_mod('coupons_deals_woocommerce_button_padding_right',15);
	$coupons_deals_custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt{';
		$coupons_deals_custom_css .='padding-left: '.esc_attr($coupons_deals_woocommerce_button_padding_right).'px; padding-right: '.esc_attr($coupons_deals_woocommerce_button_padding_right).'px;';
	$coupons_deals_custom_css .='}';

	$coupons_deals_woocommerce_button_border_radius = get_theme_mod('coupons_deals_woocommerce_button_border_radius',10);
	$coupons_deals_custom_css .='.woocommerce ul.products li.product .button, a.checkout-button.button.alt.wc-forward,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt{';
		$coupons_deals_custom_css .='border-radius: '.esc_attr($coupons_deals_woocommerce_button_border_radius).'px;';
	$coupons_deals_custom_css .='}';

	$coupons_deals_related_product_enable = get_theme_mod('coupons_deals_related_product_enable',true);
	if($coupons_deals_related_product_enable == false){
		$coupons_deals_custom_css .='.related.products{';
			$coupons_deals_custom_css .='display: none;';
		$coupons_deals_custom_css .='}';
	}

	$coupons_deals_woocommerce_product_border_enable = get_theme_mod('coupons_deals_woocommerce_product_border_enable',true);
	if($coupons_deals_woocommerce_product_border_enable == false){
		$coupons_deals_custom_css .='.products li{';
			$coupons_deals_custom_css .='border: none;';
		$coupons_deals_custom_css .='}';
	}

	$coupons_deals_woocommerce_product_padding_top = get_theme_mod('coupons_deals_woocommerce_product_padding_top',10);
	$coupons_deals_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
		$coupons_deals_custom_css .='padding-top: '.esc_attr($coupons_deals_woocommerce_product_padding_top).'px !important; padding-bottom: '.esc_attr($coupons_deals_woocommerce_product_padding_top).'px !important;';
	$coupons_deals_custom_css .='}';

	$coupons_deals_woocommerce_product_padding_right = get_theme_mod('coupons_deals_woocommerce_product_padding_right',10);
	$coupons_deals_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
		$coupons_deals_custom_css .='padding-left: '.esc_attr($coupons_deals_woocommerce_product_padding_right).'px !important; padding-right: '.esc_attr($coupons_deals_woocommerce_product_padding_right).'px !important;';
	$coupons_deals_custom_css .='}';

	$coupons_deals_woocommerce_product_border_radius = get_theme_mod('coupons_deals_woocommerce_product_border_radius',0);
	$coupons_deals_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
		$coupons_deals_custom_css .='border-radius: '.esc_attr($coupons_deals_woocommerce_product_border_radius).'px;';
	$coupons_deals_custom_css .='}';

	$coupons_deals_woocommerce_product_box_shadow = get_theme_mod('coupons_deals_woocommerce_product_box_shadow', 5);
	$coupons_deals_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
		$coupons_deals_custom_css .='box-shadow: '.esc_attr($coupons_deals_woocommerce_product_box_shadow).'px '.esc_attr($coupons_deals_woocommerce_product_box_shadow).'px '.esc_attr($coupons_deals_woocommerce_product_box_shadow).'px #eee;';
	$coupons_deals_custom_css .='}';

	$coupons_deals_woo_product_sale_top_bottom_padding = get_theme_mod('coupons_deals_woo_product_sale_top_bottom_padding', 0);
	$coupons_deals_woo_product_sale_left_right_padding = get_theme_mod('coupons_deals_woo_product_sale_left_right_padding', 0);
	$coupons_deals_custom_css .='.woocommerce span.onsale{';
		$coupons_deals_custom_css .='padding-top: '.esc_attr($coupons_deals_woo_product_sale_top_bottom_padding).'px; padding-bottom: '.esc_attr($coupons_deals_woo_product_sale_top_bottom_padding).'px; padding-left: '.esc_attr($coupons_deals_woo_product_sale_left_right_padding).'px; padding-right: '.esc_attr($coupons_deals_woo_product_sale_left_right_padding).'px; display:inline-block;';
	$coupons_deals_custom_css .='}';

	$coupons_deals_woo_product_sale_border_radius = get_theme_mod('coupons_deals_woo_product_sale_border_radius',50);
	$coupons_deals_custom_css .='.woocommerce span.onsale {';
		$coupons_deals_custom_css .='border-radius: '.esc_attr($coupons_deals_woo_product_sale_border_radius).'px;';
	$coupons_deals_custom_css .='}';

	$coupons_deals_woo_product_sale_position = get_theme_mod('coupons_deals_woo_product_sale_position', 'Right');
	if($coupons_deals_woo_product_sale_position == 'Right' ){
		$coupons_deals_custom_css .='.woocommerce ul.products li.product .onsale{';
			$coupons_deals_custom_css .=' left:auto; right:0;';
		$coupons_deals_custom_css .='}';
	}elseif($coupons_deals_woo_product_sale_position == 'Left' ){
		$coupons_deals_custom_css .='.woocommerce ul.products li.product .onsale{';
			$coupons_deals_custom_css .=' left:0; right:auto;';
		$coupons_deals_custom_css .='}';
	}

	$coupons_deals_wooproduct_sale_font_size = get_theme_mod('coupons_deals_wooproduct_sale_font_size',14);
	$coupons_deals_custom_css .='.woocommerce span.onsale{';
		$coupons_deals_custom_css .='font-size: '.esc_attr($coupons_deals_wooproduct_sale_font_size).'px;';
	$coupons_deals_custom_css .='}';

	// Responsive Media
	$coupons_deals_post_date = get_theme_mod( 'coupons_deals_display_post_date',true);
	if($coupons_deals_post_date == true && get_theme_mod( 'coupons_deals_metafields_date',true) != true){
    	$coupons_deals_custom_css .='.metabox .entry-date{';
			$coupons_deals_custom_css .='display:none;';
		$coupons_deals_custom_css .='} ';
	}
    if($coupons_deals_post_date == true){
    	$coupons_deals_custom_css .='@media screen and (max-width:575px) {';
		$coupons_deals_custom_css .='.metabox .entry-date{';
			$coupons_deals_custom_css .='display:inline-block;';
		$coupons_deals_custom_css .='} }';
	}else if($coupons_deals_post_date == false){
		$coupons_deals_custom_css .='@media screen and (max-width:575px){';
		$coupons_deals_custom_css .='.metabox .entry-date{';
			$coupons_deals_custom_css .='display:none;';
		$coupons_deals_custom_css .='} }';
	}

	$coupons_deals_post_author = get_theme_mod( 'coupons_deals_display_post_author',true);
	if($coupons_deals_post_author == true && get_theme_mod( 'coupons_deals_metafields_author',true) != true){
    	$coupons_deals_custom_css .='.metabox .entry-author{';
			$coupons_deals_custom_css .='display:none;';
		$coupons_deals_custom_css .='} ';
	}
    if($coupons_deals_post_author == true){
    	$coupons_deals_custom_css .='@media screen and (max-width:575px) {';
		$coupons_deals_custom_css .='.metabox .entry-author{';
			$coupons_deals_custom_css .='display:inline-block;';
		$coupons_deals_custom_css .='} }';
	}else if($coupons_deals_post_author == false){
		$coupons_deals_custom_css .='@media screen and (max-width:575px){';
		$coupons_deals_custom_css .='.metabox .entry-author{';
			$coupons_deals_custom_css .='display:none;';
		$coupons_deals_custom_css .='} }';
	}

	$coupons_deals_post_comment = get_theme_mod( 'coupons_deals_display_post_comment',true);
	if($coupons_deals_post_comment == true && get_theme_mod( 'coupons_deals_metafields_comment',true) != true){
    	$coupons_deals_custom_css .='.metabox .entry-comments{';
			$coupons_deals_custom_css .='display:none;';
		$coupons_deals_custom_css .='} ';
	}
    if($coupons_deals_post_comment == true){
    	$coupons_deals_custom_css .='@media screen and (max-width:575px) {';
		$coupons_deals_custom_css .='.metabox .entry-comments{';
			$coupons_deals_custom_css .='display:inline-block;';
		$coupons_deals_custom_css .='} }';
	}else if($coupons_deals_post_comment == false){
		$coupons_deals_custom_css .='@media screen and (max-width:575px){';
		$coupons_deals_custom_css .='.metabox .entry-comments{';
			$coupons_deals_custom_css .='display:none;';
		$coupons_deals_custom_css .='} }';
	}

	$coupons_deals_post_time = get_theme_mod( 'coupons_deals_display_post_time',false);
	if($coupons_deals_post_time == true && get_theme_mod( 'coupons_deals_metafields_time',false) != true){
    	$coupons_deals_custom_css .='.metabox .entry-time{';
			$coupons_deals_custom_css .='display:none;';
		$coupons_deals_custom_css .='} ';
	}
    if($coupons_deals_post_time == true){
    	$coupons_deals_custom_css .='@media screen and (max-width:575px) {';
		$coupons_deals_custom_css .='.metabox .entry-time{';
			$coupons_deals_custom_css .='display:inline-block;';
		$coupons_deals_custom_css .='} }';
	}else if($coupons_deals_post_time == false){
		$coupons_deals_custom_css .='@media screen and (max-width:575px){';
		$coupons_deals_custom_css .='.metabox .entry-time{';
			$coupons_deals_custom_css .='display:none;';
		$coupons_deals_custom_css .='} }';
	}

	if($coupons_deals_post_date == false && $coupons_deals_post_author == false && $coupons_deals_post_comment == false && $coupons_deals_post_time == false){
		$coupons_deals_custom_css .='@media screen and (max-width:575px) {';
    	$coupons_deals_custom_css .='.metabox {';
			$coupons_deals_custom_css .='display:none;';
		$coupons_deals_custom_css .='} }';
	}

	$coupons_deals_metafields_date = get_theme_mod( 'coupons_deals_metafields_date',true);
	$coupons_deals_metafields_author = get_theme_mod( 'coupons_deals_metafields_author',true);
	$coupons_deals_metafields_comment = get_theme_mod( 'coupons_deals_metafields_comment',true);
	$coupons_deals_metafields_time = get_theme_mod( 'coupons_deals_metafields_time',true);
	if($coupons_deals_metafields_date == false && $coupons_deals_metafields_author == false && $coupons_deals_metafields_comment == false && $coupons_deals_metafields_time == false){
		$coupons_deals_custom_css .='@media screen and (min-width:576px) {';
    	$coupons_deals_custom_css .='.metabox {';
			$coupons_deals_custom_css .='display:none;';
		$coupons_deals_custom_css .='} }';
	}

	$coupons_deals_slider = get_theme_mod( 'coupons_deals_display_slider',false);
	if($coupons_deals_slider == true && get_theme_mod( 'coupons_deals_slider_hide', false) == false){
    	$coupons_deals_custom_css .='#slider{';
			$coupons_deals_custom_css .='display:none;';
		$coupons_deals_custom_css .='} ';
	}
    if($coupons_deals_slider == true){
    	$coupons_deals_custom_css .='@media screen and (max-width:575px) {';
		$coupons_deals_custom_css .='#slider{';
			$coupons_deals_custom_css .='display:block;';
		$coupons_deals_custom_css .='} }';
	}else if($coupons_deals_slider == false){
		$coupons_deals_custom_css .='@media screen and (max-width:575px){';
		$coupons_deals_custom_css .='#slider{';
			$coupons_deals_custom_css .='display:none;';
		$coupons_deals_custom_css .='} }';
	}

	$coupons_deals_sidebar = get_theme_mod( 'coupons_deals_display_sidebar',true);
    if($coupons_deals_sidebar == true){
    	$coupons_deals_custom_css .='@media screen and (max-width:575px) {';
		$coupons_deals_custom_css .='#sidebar{';
			$coupons_deals_custom_css .='display:block;';
		$coupons_deals_custom_css .='} }';
	}else if($coupons_deals_sidebar == false){
		$coupons_deals_custom_css .='@media screen and (max-width:575px) {';
		$coupons_deals_custom_css .='#sidebar{';
			$coupons_deals_custom_css .='display:none;';
		$coupons_deals_custom_css .='} }';
	}

	$coupons_deals_scroll = get_theme_mod( 'coupons_deals_display_scrolltop',true);
	if($coupons_deals_scroll == true && get_theme_mod( 'coupons_deals_hide_show_scroll',true) != true){
    	$coupons_deals_custom_css .='#scrollbutton i{';
			$coupons_deals_custom_css .='display:none;';
		$coupons_deals_custom_css .='} ';
	}
    if($coupons_deals_scroll == true){
    	$coupons_deals_custom_css .='@media screen and (max-width:575px) {';
		$coupons_deals_custom_css .='#scrollbutton i{';
			$coupons_deals_custom_css .='display:block;';
		$coupons_deals_custom_css .='} }';
	}else if($coupons_deals_scroll == false){
		$coupons_deals_custom_css .='@media screen and (max-width:575px){';
		$coupons_deals_custom_css .='#scrollbutton i{';
			$coupons_deals_custom_css .='display:none;';
		$coupons_deals_custom_css .='} }';
	}

	$coupons_deals_preloader = get_theme_mod( 'coupons_deals_display_preloader',false);
	if($coupons_deals_preloader == true && get_theme_mod( 'coupons_deals_preloader',false) == false){
		$coupons_deals_custom_css .='@media screen and (min-width:575px) {';
    	$coupons_deals_custom_css .='.frame{';
			$coupons_deals_custom_css .=' visibility: hidden;';
		$coupons_deals_custom_css .='} }';
	}
    if($coupons_deals_preloader == true){
    	$coupons_deals_custom_css .='@media screen and (max-width:575px) {';
		$coupons_deals_custom_css .='.frame{';
			$coupons_deals_custom_css .='visibility:visible;';
		$coupons_deals_custom_css .='} }';
	}else if($coupons_deals_preloader == false){
		$coupons_deals_custom_css .='@media screen and (max-width:575px){';
		$coupons_deals_custom_css .='.frame{';
			$coupons_deals_custom_css .='visibility: hidden;';
		$coupons_deals_custom_css .='} }';
	}

	$coupons_deals_search = get_theme_mod( 'coupons_deals_display_search_category',true);
	if($coupons_deals_search == true && get_theme_mod( 'coupons_deals_search_enable_disable',true) != true){
    	$coupons_deals_custom_css .='.search-cat-box{';
			$coupons_deals_custom_css .='display:none;';
		$coupons_deals_custom_css .='} ';
	}
    if($coupons_deals_search == true){
    	$coupons_deals_custom_css .='@media screen and (max-width:575px) {';
		$coupons_deals_custom_css .='.search-cat-box{';
			$coupons_deals_custom_css .='display:block;';
		$coupons_deals_custom_css .='} }';
	}else if($coupons_deals_search == false){
		$coupons_deals_custom_css .='@media screen and (max-width:575px){';
		$coupons_deals_custom_css .='.search-cat-box{';
			$coupons_deals_custom_css .='display:none;';
		$coupons_deals_custom_css .='} }';
	}

	$coupons_deals_myaccount = get_theme_mod( 'coupons_deals_display_myaccount',true);
	if($coupons_deals_myaccount == true && get_theme_mod( 'coupons_deals_myaccount_enable_disable',true) != true){
    	$coupons_deals_custom_css .='.login-box{';
			$coupons_deals_custom_css .='display:none;';
		$coupons_deals_custom_css .='} ';
	}
    if($coupons_deals_myaccount == true){
    	$coupons_deals_custom_css .='@media screen and (max-width:575px) {';
		$coupons_deals_custom_css .='.login-box{';
			$coupons_deals_custom_css .='display:block;';
		$coupons_deals_custom_css .='} }';
	}else if($coupons_deals_myaccount == false){
		$coupons_deals_custom_css .='@media screen and (max-width:575px){';
		$coupons_deals_custom_css .='.login-box{';
			$coupons_deals_custom_css .='display:none;';
		$coupons_deals_custom_css .='} }';
	}

	// menu settings
	$coupons_deals_menu_font_size_option = get_theme_mod('coupons_deals_menu_font_size_option');
	$coupons_deals_custom_css .='.primary-navigation ul li a{';
		$coupons_deals_custom_css .='font-size: '.esc_attr($coupons_deals_menu_font_size_option).'px;';
	$coupons_deals_custom_css .='}';

	$coupons_deals_menu_padding = get_theme_mod('coupons_deals_menu_padding');
	$coupons_deals_custom_css .='.primary-navigation ul li a{';
		$coupons_deals_custom_css .='padding: '.esc_attr($coupons_deals_menu_padding).'px;';
	$coupons_deals_custom_css .='}';

	$coupons_deals_theme_lay = get_theme_mod( 'coupons_deals_text_tranform_menu','Uppercase');
    if($coupons_deals_theme_lay == 'Uppercase'){
		$coupons_deals_custom_css .='.primary-navigation ul li a{';
			$coupons_deals_custom_css .='';
		$coupons_deals_custom_css .='}';
	}else if($coupons_deals_theme_lay == 'Lowercase'){
		$coupons_deals_custom_css .='.primary-navigation ul li a{';
			$coupons_deals_custom_css .='text-transform: lowercase;';
		$coupons_deals_custom_css .='}';
	}
	else if($coupons_deals_theme_lay == 'Capitalize'){
		$coupons_deals_custom_css .='.primary-navigation ul li a{';
			$coupons_deals_custom_css .='text-transform: Capitalize;';
		$coupons_deals_custom_css .='}';
	}

	$coupons_deals_theme_lay = get_theme_mod( 'coupons_deals_font_weight_option_menu','');
    if($coupons_deals_theme_lay == 'Bold'){
		$coupons_deals_custom_css .='.primary-navigation ul li a{';
			$coupons_deals_custom_css .='font-weight:bold;';
		$coupons_deals_custom_css .='}';
	}else if($coupons_deals_theme_lay == 'Normal'){
		$coupons_deals_custom_css .='.primary-navigation ul li a{';
			$coupons_deals_custom_css .='font-weight: normal;';
		$coupons_deals_custom_css .='}';
	}

	// slider height
	$coupons_deals_option_slider_height = get_theme_mod('coupons_deals_option_slider_height');
	$coupons_deals_custom_css .='#slider .slider-bg img{';
		$coupons_deals_custom_css .='height: '.esc_attr($coupons_deals_option_slider_height).'px;';
	$coupons_deals_custom_css .='}';

	// slider content spacing
	$coupons_deals_slider_content_top_padding = get_theme_mod('coupons_deals_slider_content_top_padding');
	$coupons_deals_slider_content_left_padding = get_theme_mod('coupons_deals_slider_content_left_padding');
	$coupons_deals_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .readbutton{';
		$coupons_deals_custom_css .='top: '.esc_attr($coupons_deals_slider_content_top_padding).'%; bottom: '.esc_attr($coupons_deals_slider_content_top_padding).'%;left: '.esc_attr($coupons_deals_slider_content_left_padding).'%;right: '.esc_attr($coupons_deals_slider_content_left_padding).'%;';
	$coupons_deals_custom_css .='}';

	// slider overlay
	$coupons_deals_enable_slider_overlay = get_theme_mod('coupons_deals_enable_slider_overlay', true);
	if($coupons_deals_enable_slider_overlay == false){
		$coupons_deals_custom_css .='#slider image{';
			$coupons_deals_custom_css .='opacity:1;';
		$coupons_deals_custom_css .='}';
	} 
	$coupons_deals_slider_overlay_color = get_theme_mod('coupons_deals_slider_overlay_color', true);
	if($coupons_deals_enable_slider_overlay != false){
		$coupons_deals_custom_css .='#slider{';
			$coupons_deals_custom_css .='background: '.esc_attr($coupons_deals_slider_overlay_color).';';
		$coupons_deals_custom_css .='}';
	}

	//  comment form width
	$coupons_deals_comment_form_width = get_theme_mod( 'coupons_deals_comment_form_width');
	$coupons_deals_custom_css .='#comments textarea{';
		$coupons_deals_custom_css .='width: '.esc_attr($coupons_deals_comment_form_width).'%;';
	$coupons_deals_custom_css .='}';

	$coupons_deals_title_comment_form = get_theme_mod('coupons_deals_title_comment_form', 'Leave a Reply');
	if($coupons_deals_title_comment_form == ''){
		$coupons_deals_custom_css .='#comments h2#reply-title {';
			$coupons_deals_custom_css .='display: none;';
		$coupons_deals_custom_css .='}';
	}

	$coupons_deals_comment_form_button_content = get_theme_mod('coupons_deals_comment_form_button_content', 'Post Comment');
	if($coupons_deals_comment_form_button_content == ''){
		$coupons_deals_custom_css .='#comments p.form-submit {';
			$coupons_deals_custom_css .='display: none;';
		$coupons_deals_custom_css .='}';
	}

	// featured image setting
	$coupons_deals_image_border_radius = get_theme_mod('coupons_deals_image_border_radius', 0);
	$coupons_deals_custom_css .='.box-image img, .content_box img{';
		$coupons_deals_custom_css .='border-radius: '.esc_attr($coupons_deals_image_border_radius).'%;';
	$coupons_deals_custom_css .='}';

	$coupons_deals_image_box_shadow = get_theme_mod('coupons_deals_image_box_shadow',0);
	$coupons_deals_custom_css .='.box-image img, .content_box img{';
		$coupons_deals_custom_css .='box-shadow: '.esc_attr($coupons_deals_image_box_shadow).'px '.esc_attr($coupons_deals_image_box_shadow).'px '.esc_attr($coupons_deals_image_box_shadow).'px #b5b5b5;';
	$coupons_deals_custom_css .='}';

	// Post Block
	$coupons_deals_post_block_option = get_theme_mod( 'coupons_deals_post_block_option','By Block');
    if($coupons_deals_post_block_option == 'By Without Block'){
		$coupons_deals_custom_css .='.inner-service, #blog_sec .sticky{';
			$coupons_deals_custom_css .='border:none; margin:30px 0;';
		$coupons_deals_custom_css .='}';
	}

	// post image 
	$coupons_deals_post_featured_color = get_theme_mod('coupons_deals_post_featured_color', '#37a0e8');
	$coupons_deals_post_featured_image = get_theme_mod('coupons_deals_post_featured_image','Image');
	if($coupons_deals_post_featured_image == 'Color'){
		$coupons_deals_custom_css .='.post-color{';
			$coupons_deals_custom_css .='background-color: '.esc_attr($coupons_deals_post_featured_color).';';
		$coupons_deals_custom_css .='}';
	}

	// featured image dimention
	$coupons_deals_post_featured_image_dimention = get_theme_mod('coupons_deals_post_featured_image_dimention', 'Default');
	$coupons_deals_post_featured_image_custom_width = get_theme_mod('coupons_deals_post_featured_image_custom_width');
	$coupons_deals_post_featured_image_custom_height = get_theme_mod('coupons_deals_post_featured_image_custom_height');
	if($coupons_deals_post_featured_image_dimention == 'Custom'){
		$coupons_deals_custom_css .='.box-image img{';
			$coupons_deals_custom_css .='width: '.esc_attr($coupons_deals_post_featured_image_custom_width).'px; height: '.esc_attr($coupons_deals_post_featured_image_custom_height).'px;';
		$coupons_deals_custom_css .='}';
	}

	// featured image dimention
	$coupons_deals_custom_post_color_width = get_theme_mod('coupons_deals_custom_post_color_width');
	$coupons_deals_custom_post_color_height = get_theme_mod('coupons_deals_custom_post_color_height');
	if($coupons_deals_post_featured_image == 'Color'){
		$coupons_deals_custom_css .='.post-color{';
			$coupons_deals_custom_css .='width: '.esc_attr($coupons_deals_custom_post_color_width).'px; height: '.esc_attr($coupons_deals_custom_post_color_height).'px;';
		$coupons_deals_custom_css .='}';
	}

	// site title font size
	$coupons_deals_site_title_font_size = get_theme_mod('coupons_deals_site_title_font_size', 30);
	$coupons_deals_custom_css .='.logo h1, .site-title a, .logo .site-title a{';
	$coupons_deals_custom_css .='font-size: '.esc_attr($coupons_deals_site_title_font_size).'px;';
	$coupons_deals_custom_css .='}';

	// site tagline font size
	$coupons_deals_site_tagline_font_size = get_theme_mod('coupons_deals_site_tagline_font_size', 15);
	$coupons_deals_custom_css .='p.site-description{';
	$coupons_deals_custom_css .='font-size: '.esc_attr($coupons_deals_site_tagline_font_size).'px;';
	$coupons_deals_custom_css .='}';

	// woocommerce Product Navigation
	$coupons_deals_wooproducts_nav = get_theme_mod('coupons_deals_wooproducts_nav', 'Yes');
	if($coupons_deals_wooproducts_nav == 'No'){
		$coupons_deals_custom_css .='.woocommerce nav.woocommerce-pagination{';
			$coupons_deals_custom_css .='display: none;';
		$coupons_deals_custom_css .='}';
	}

	/*------ Footer background css -------*/
	$coupons_deals_footer_text_bg_color = get_theme_mod('coupons_deals_footer_text_bg_color');
	if($coupons_deals_footer_text_bg_color != false){
		$coupons_deals_custom_css .='.copyright-wrapper{';
			$coupons_deals_custom_css .='background-color: '.esc_attr($coupons_deals_footer_text_bg_color).';';
		$coupons_deals_custom_css .='}';
	}

	/*----------- Global First Color -----------*/
	$coupons_deals_first_color = get_theme_mod('coupons_deals_first_color');

	$coupons_deals_second_color = get_theme_mod('coupons_deals_second_color');

	$coupons_deals_custom_css ='';

	$coupons_deals_custom_css .='input[type="submit"],span.cart-value, .menu-section, .primary-navigation ul ul a, .pagination a:hover, #sidebar .tagcloud a:hover,.footer-wp .tagcloud a:hover, #sidebar input[type="submit"]:hover, .nav-next a:hover, .nav-previous a:hover, #slider .carousel-control-prev-icon:hover, #slider .carousel-control-next-icon:hover, .postbtn a, #featured-coupon .text-content .show-btn a, #featured-coupon .text-content .show-btn a:hover i, .woocommerce nav.woocommerce-pagination ul li a, .woocommerce nav.woocommerce-pagination ul li span, .woocommerce span.onsale, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, nav.woocommerce-MyAccount-navigation ul li, .woocommerce .widget_price_filter .ui-slider .ui-slider-range,.woocommerce .widget_price_filter .ui-slider .ui-slider-handle, .woocommerce a.added_to_cart, .blog-section h2:after, #comments input[type="submit"].submit, #comments a.comment-reply-link, #sidebar h3:after, .widget_calendar tbody a, .page-content .read-moresec a.button, #scrollbutton i, .copyright-wrapper, .footer-wp h3:after, .footer-wp input[type="submit"], .footer-wp button, #sidebar button, .pagination .current, .tags a:hover{';
			$coupons_deals_custom_css .='background-color: '.esc_attr($coupons_deals_first_color).';';
	$coupons_deals_custom_css .='}';

	$coupons_deals_custom_css .='#slider .more-btn a:hover, .nav-previous a:hover ,.nav-next a:hover, #sidebar .textwidget p a:hover, .footer-wp .textwidget p a,.footer-wp a.rsswidget, .footer-wp li a:hover, #sidebar .custom_read_more a:hover, .footer-wp .custom_read_more a, .navigation.post-navigation a:hover, .metabox a:hover, .blog-section h2 a:hover, td.product-name a:hover, #sidebar .wp-block-latest-comments li a:hover, .footer-wp h3, .woocommerce-message::before{';
			$coupons_deals_custom_css .='color: '.esc_attr($coupons_deals_first_color).';';
	$coupons_deals_custom_css .='}';

	$coupons_deals_custom_css .='.entry-date:hover i, .entry-date:hover a, .entry-author:hover i, .entry-author:hover a{';
			$coupons_deals_custom_css .='color: '.esc_attr($coupons_deals_first_color).'!important;';
	$coupons_deals_custom_css .='}';

	$coupons_deals_custom_css .='.footer-wp .custom-contact-us div.wpcf7-validation-errors, .footer-wp .custom-contact-us div.wpcf7-acceptance-missing, .page-content .read-moresec a.button, #scrollbutton i{';
			$coupons_deals_custom_css .='border-color: '.esc_attr($coupons_deals_first_color).';';
	$coupons_deals_custom_css .='}';

	$coupons_deals_custom_css .='.woocommerce-message{';
			$coupons_deals_custom_css .='border-top-color: '.esc_attr($coupons_deals_first_color).';';
	$coupons_deals_custom_css .='}';

	$coupons_deals_custom_css .='#header{';
		$coupons_deals_custom_css .='border-bottom-color: '.esc_attr($coupons_deals_first_color).';';
	$coupons_deals_custom_css .='}';

	$coupons_deals_custom_css .='{';
		$coupons_deals_custom_css .='box-shadow: inset 0px 0px 0px '.esc_attr($coupons_deals_first_color).', 0px 5px 0px 0px #871c1c, 0px 5px 4px #000;';
	$coupons_deals_custom_css .='}';

	// second color
	$coupons_deals_custom_css .='input[type="submit"]:hover, .menu-search input[type="submit"], .primary-navigation ul li a:after, .primary-navigation ul li a:before, .primary-navigation ul ul a:hover, .primary-navigation ul ul a:focus, .postbtn a:hover, .coupon-content a.coupon-btn:hover, #featured-coupon .text-content .show-btn a i, #featured-coupon .text-content .show-btn a:hover, .nav-previous a, .nav-next a, .woocommerce nav.woocommerce-pagination ul li a:focus, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current, .postbtn:hover i, .postbtn:hover a, #comments input[type="submit"].submit:hover, .woocommerce #respond input#submit:hover, .woocommerce .product a.button:hover, .woocommerce .product button.button:hover, .woocommerce input.button:hover,.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, #sidebar input[type="submit"], #sidebar .custom_read_more a, .page-content .read-moresec a.button:hover, .frame, #sidebar button:hover, .footer-wp button:hover, .toggle-menu i, .metabox i:before, #sidebar ul li:before{';
			$coupons_deals_custom_css .='background-color: '.esc_attr($coupons_deals_second_color).';';
	$coupons_deals_custom_css .='}';

	$coupons_deals_custom_css .='h1,h2,h3,h4,h5,h6, a.button.wc-forward:hover, .pagination a:hover, #comments a time, .bradcrumbs span, .bradcrumbs a, a, a:hover, .tags, .pagination .current, #sidebar .textwidget p a, #sidebar .textwidget a:hover,.footer-wp .woocommerce a.button:hover, .woocommerce .widget_price_filter .price_slider_amount .button:hover, .page-content .read-moresec a.button, a.button, #sidebar .widget_calendar td a, .widget_calendar tbody a, #sidebar ul li a:hover, #sidebar input[type="submit"]:hover,.widget_calendar caption, #comments a.comment-reply-link:hover,.new-text p a,.comment p a, .woocommerce ul.products li.product .price,.woocommerce div.product p.price, .woocommerce div.product span.price, h2.woocommerce-loop-product__title,.woocommerce div.product .product_title, a.r_button, input[type="submit"], td.product-name a, .social-icons i:hover, .postbtn i, .nav-next a:hover, .nav-previous a:hover, .woocommerce nav.woocommerce-pagination ul li a, .woocommerce nav.woocommerce-pagination ul li span, .woocommerce .quantity .qty, p.logged-in-as a, #sidebar input[type="search"], input[type="search"], .menu-brand .closebtn{';
			$coupons_deals_custom_css .='color: '.esc_attr($coupons_deals_second_color).';';
	$coupons_deals_custom_css .='}';

	$coupons_deals_custom_css .='.woocommerce nav.woocommerce-pagination ul li a:focus, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current, .woocommerce nav.woocommerce-pagination ul li a, .woocommerce nav.woocommerce-pagination ul li span, .woocommerce .quantity .qty, a.button, .page-content .read-moresec a.button:hover{';
			$coupons_deals_custom_css .='border-color: '.esc_attr($coupons_deals_second_color).';';
	$coupons_deals_custom_css .='}';

	$coupons_deals_custom_css .='.woocommerce form .form-row input:focus.input-text, #sidebar .textwidget a:focus, textarea:focus, input:focus, .menu-header a:focus, .mid-header a:focus, #sidebar a:focus, a:focus, #woonavbar-header .nav ul li a:focus,a.closebtn.mobile-menu:focus,.logo a:focus, .toggle-menu.responsive-menu a:focus, .menu-brand .closebtn:focus, .main-navigation .sub-menu > li > a:focus,.search-box i:focus, .menu-header a:focus, #comments textarea:focus, input[type="submit"]:focus, label:focus, input:focus, button:focus,input:focus, input:focus, textarea:focus,img.custom-logo a:focus, .woocommerce  a:focus, button.product-btn:focus,.woocommerce ul.products li.product a:focus, .select2-container--default .select2-selection--single:focus{';
			$coupons_deals_custom_css .='outline-color: '.esc_attr($coupons_deals_second_color).';';
	$coupons_deals_custom_css .='}';

	$coupons_deals_custom_css .='.main-menu-navigation a:focus, a.closebtn:focus{';
			$coupons_deals_custom_css .='outline-color: '.esc_attr($coupons_deals_second_color).' !important;';
	$coupons_deals_custom_css .='}';

	$coupons_deals_custom_css .='.woocommerce form .form-row input:focus.input-text, #sidebar .textwidget a:focus, textarea:focus, input:focus, .menu-header a:focus, .mid-header a:focus, #sidebar a:focus, a:focus, #woonavbar-header .nav ul li a:focus,a.closebtn.mobile-menu:focus,.logo a:focus, .toggle-menu.responsive-menu a:focus, .menu-brand .closebtn:focus, .main-navigation .sub-menu > li > a:focus,.search-box i:focus, .menu-header a:focus, #comments textarea:focus, input[type="submit"]:focus, label:focus, input:focus, button:focus,input:focus, input:focus, textarea:focus,img.custom-logo a:focus, .woocommerce  a:focus, button.product-btn:focus,.woocommerce ul.products li.product a:focus, .select2-container--default .select2-selection--single:focus, .main-menu-navigation a:focus, a.closebtn:focus{';
		$coupons_deals_custom_css .='border-bottom-color: '.esc_attr($coupons_deals_second_color).'!important;';
	$coupons_deals_custom_css .='}';

	// media
		$coupons_deals_custom_css .='@media screen and (max-width:1000px) {';
		$coupons_deals_custom_css .='.primary-navigation ul li a, .primary-navigation ul ul a:hover, .primary-navigation ul ul a:focus, .primary-navigation ul ul a, #site-navigation li a{';
				$coupons_deals_custom_css .='color: '.esc_attr($coupons_deals_second_color).'!important;';
		$coupons_deals_custom_css .='} }';

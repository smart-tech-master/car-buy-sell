<?php
/**
 * The template part for displaying content
 * @package Coupons Deals
 * @subpackage coupons_deals
 * @since 1.0
 */
?>

<?php $coupons_deals_theme_lay = get_theme_mod( 'coupons_deals_post_layouts','Layout 2');
if($coupons_deals_theme_lay == 'Layout 1'){ 
	get_template_part('template-parts/Post-layouts/layout1'); 
}else if($coupons_deals_theme_lay == 'Layout 2'){ 
	get_template_part('template-parts/Post-layouts/layout2'); 
}else if($coupons_deals_theme_lay == 'Layout 3'){ 
	get_template_part('template-parts/Post-layouts/layout3'); 
}else{ 
	get_template_part('template-parts/Post-layouts/layout2'); 
}
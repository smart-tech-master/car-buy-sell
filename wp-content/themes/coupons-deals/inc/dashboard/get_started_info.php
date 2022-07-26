<?php

add_action( 'admin_menu', 'coupons_deals_gettingstarted' );
function coupons_deals_gettingstarted() {    	
	add_theme_page( esc_html__('About Theme', 'coupons-deals'), esc_html__('About Theme', 'coupons-deals'), 'edit_theme_options', 'coupons-deals-guide-page', 'coupons_deals_guide');   
}

function coupons_deals_admin_theme_style() {
   wp_enqueue_style('coupons-deals-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/dashboard/get_started_info.css');
}
add_action('admin_enqueue_scripts', 'coupons_deals_admin_theme_style');

function coupons_deals_notice(){
    global $pagenow;
    if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {?>
    <div class="notice notice-success is-dismissible getting_started">
		<div class="notice-content">
			<h2><?php esc_html_e( 'Thanks for installing Coupons Deals, you rock!', 'coupons-deals' ) ?> </h2>
			<p><?php esc_html_e( 'Take benefit of a variety of features, functionalities, elements, and an exclusive set of customization options to build your own professional Coupons website. Please Click on the link below to know the theme setup information.', 'coupons-deals' ) ?></p>
			<p><a href="<?php echo esc_url( admin_url( 'themes.php?page=coupons-deals-guide-page' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Getting Started', 'coupons-deals' ); ?></a></p>
		</div>
	</div>
	<?php }
}
add_action('admin_notices', 'coupons_deals_notice');

/**
 * Theme Info Page
 */
function coupons_deals_guide() {

	// Theme info
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'coupons-deals' ); ?>

	<div class="wrap getting-started">
		<div class="getting-started__header">
			<div class="row">
				<div class="col-md-5 intro">
					<div class="pad-box">
						<h2><?php esc_html_e( 'Welcome to Coupons Deals', 'coupons-deals' ); ?></h2>
						<p>Version: <?php echo esc_html($theme['Version']);?></p>
						<span class="intro__version"><?php esc_html_e( 'Congratulations! You are about to use the most easy to use and flexible WordPress theme.', 'coupons-deals' ); ?>	
						</span>
						<div class="powered-by">
							<p><strong><?php esc_html_e( 'Theme created by Buy WP Templates', 'coupons-deals' ); ?></strong></p>
							<p>
								<img class="logo" src="<?php echo esc_url(get_template_directory_uri() . '/inc/dashboard/media/theme-logo.png'); ?>"/>
							</p>
						</div>
					</div>
				</div>
				<div class="col-md-7">
					<div class="pro-links">
				    	<a href="<?php echo esc_url( COUPONS_DEALS_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'coupons-deals'); ?></a>
						<a href="<?php echo esc_url( COUPONS_DEALS_BUY_PRO ); ?>" target="_blank"><?php esc_html_e('Buy Pro', 'coupons-deals'); ?></a>
						<a href="<?php echo esc_url( COUPONS_DEALS_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'coupons-deals'); ?></a>
					</div>
					<div class="install-plugins">
						<img src="<?php echo esc_url(get_template_directory_uri() . '/inc/dashboard/media/responsive1.png'); ?>" alt="" />
					</div>
				</div>
			</div>
			<h2 class="tg-docs-section intruction-title" id="section-4"><?php esc_html_e( '1). Setup Coupons Deals Theme', 'coupons-deals' ); ?></h2>
			<div class="row">
				<div class="theme-instruction-block col-md-7">
					<div class="pad-box">
	                    <p><?php esc_html_e( 'Coupons Deals has been designed and created to showcase amazing deals and discount coupons online. Accompanied by a clean, responsive, and modern design, this theme’s layout has been crafted to showcase your deals in a beautiful manner. This user-friendly theme takes care of the requirements of any coupon website and comes with a theme options panel for having a great user-friendly experience while designing and curating your website with minimal effort. Responsive layout is its USP since your website will work magnificently on several devices without facing any resizing issues. This will deliver a fantastic user experience as well. This free theme has been crafted by professionals that have carefully curated it by including thoroughly tested HTML codes. These are optimized codes that are also made SEO friendly so that finding you in the search engine results will be very easy. Apart from that, this theme delivers a faster page load time to keep your visitor’s interest alive. A few personalization options are also included thanks to the intuitive theme options panel. With Call To Action Button (CTA), there is always a chance to improve your conversions and add more to the interactive part of your website. Various sections including the Team, Testimonial section, etc. are included in the theme.', 'coupons-deals' ); ?><p><br>
						<ol>
							<li><?php esc_html_e( 'Start','coupons-deals'); ?> <a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e( 'Customizing','coupons-deals'); ?></a> <?php esc_html_e( 'your website.','coupons-deals'); ?> </li>
						</ol>
                    </div>
              	</div>
				<div class="col-md-5">
					<div class="pad-box">
              			<img class="logo" src="<?php echo esc_url(get_template_directory_uri() . '/inc/dashboard/media/screenshot.png'); ?>"/>
              		 </div> 
              	</div>
            </div>
			<div class="col-md-12 text-block">
					<h2 class="dashboard-install-title"><?php esc_html_e( '2.) Premium Theme Information.','coupons-deals'); ?></h2>
					<div class="row">
						<div class="col-md-7">
							<img src="<?php echo esc_url(get_template_directory_uri() . '/inc/dashboard/media/responsive.png'); ?>" alt="">
							<div class="pad-box">
								<h3><?php esc_html_e( 'Pro Theme Description','coupons-deals'); ?></h3>
	                    		<p class="pad-box-p"><?php esc_html_e( 'Deals WordPress Theme is an advanced coupon management solution that will enable you in creating a professional discount deals website. Your website may not only help your audience save money, but it can also produce a profit. Deals WordPress theme has several features that can assist your coupon website in becoming a success. This theme includes just about everything you need to get begin promoting discounts and coupons online. It not only has designs that are appropriate for this sort of website, but they also have all of the tools and functionality needed to organize and post coupons and deals.This theme is rich in features that you always wanted to have on your website. Deals WordPress theme has SEO-friendly content that will help you get better rankings on the search engines. It has all the customizable sections and full documentation of the theme so you don’t have to worry about the coding. It is built with safe and clean code and includes plugins, shortcodes, and other modification tools to help you to alter your website without writing a single line of code. With CTA(call to action) feature, it will be easier to resolve issues of the customers and with that, you can attract new users. It has a strong e-commerce feature which is great for developing an e-commerce website that also produces and distributes discount coupons.', 'coupons-deals' ); ?><p>
	                    	</div>
						</div>
						<div class="col-md-5 install-plugin-right">
							<div class="pad-box">								
								<h3><?php esc_html_e( 'Pro Theme Features','coupons-deals'); ?></h3>
								<div class="dashboard-install-benefit">
									<ul>
										<li><?php esc_html_e( 'Car listing Shortcode with category','coupons-deals'); ?></li>
										<li><?php esc_html_e( 'Car listing Shortcode','coupons-deals'); ?></li>
										<li><?php esc_html_e( 'Multiple image feature for each property with slider.','coupons-deals'); ?></li>
										<li><?php esc_html_e( 'Brand Listing Section','coupons-deals'); ?></li>
										<li><?php esc_html_e( 'Car Brand(categories) Option','coupons-deals'); ?></li>
										<li><?php esc_html_e( 'Car Tags(categories) Option','coupons-deals'); ?></li>
										<li><?php esc_html_e( 'Testimonial listing.','coupons-deals'); ?></li>
										<li><?php esc_html_e( 'Testimonial shortcode.','coupons-deals'); ?></li>
										<li><?php esc_html_e( 'Social icons widget.','coupons-deals'); ?></li>
										<li><?php esc_html_e( 'Latest post with the image widget.','coupons-deals'); ?></li>
										<li><?php esc_html_e( 'Live customize editor for the About US section.','coupons-deals'); ?></li>
										<li><?php esc_html_e( 'Font Awesome integrated.','coupons-deals'); ?></li>
										<li><?php esc_html_e( 'Advanced Color options and color pallets.','coupons-deals'); ?></li>
										<li><?php esc_html_e( '100+ Font Family Options.','coupons-deals'); ?></li>
										<li><?php esc_html_e( 'Enable-Disable options on All sections.','coupons-deals'); ?></li>
										<li><?php esc_html_e( 'Well sanitized as per WordPress standards.','coupons-deals'); ?></li>
										<li><?php esc_html_e( 'Allow to set site title, tagline, logo.','coupons-deals'); ?></li>
										<li><?php esc_html_e( 'Sticky post & Comment threads.','coupons-deals'); ?></li>
										<li><?php esc_html_e( 'Left and Right Sidebar.','coupons-deals'); ?></li>
										<li><?php esc_html_e( 'Customizable Home Page.','coupons-deals'); ?></li>
										<li><?php esc_html_e( 'Footer Widgets & Editor style','coupons-deals'); ?></li>
										<li><?php esc_html_e( 'Gallery & Banner functionality','coupons-deals'); ?></li>
										<li><?php esc_html_e( 'Multiple inner page templates','coupons-deals'); ?></li>
										<li><?php esc_html_e( 'Full-width Template','coupons-deals'); ?></li>
										<li><?php esc_html_e( 'Custom Menu, Colors Editor','coupons-deals'); ?></li>
									</ul>
								</div>
							</div>
						</div>
				</div>
			</div>
		</div>
		<div class="dashboard__blocks">
			<div class="row">
				<div class="col-md-3">
					<h3><?php esc_html_e( 'Get Support','coupons-deals'); ?></h3>
					<ol>
						<li><a target="_blank" href="<?php echo esc_url( COUPONS_DEALS_FREE_SUPPORT ); ?>"><?php esc_html_e( 'Free Theme Support','coupons-deals'); ?></a></li>
						<li><a target="_blank" href="<?php echo esc_url( COUPONS_DEALS_PRO_SUPPORT ); ?>"><?php esc_html_e( 'Premium Theme Support','coupons-deals'); ?></a></li>
					</ol>
				</div>

				<div class="col-md-3">
					<h3><?php esc_html_e( 'Getting Started','coupons-deals'); ?></h3>
					<ol>
						<li><?php esc_html_e( 'Start','coupons-deals'); ?> <a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e( 'Customizing','coupons-deals'); ?></a> <?php esc_html_e( 'your website.','coupons-deals'); ?> </li>
					</ol>
				</div>
				<div class="col-md-3">
					<h3><?php esc_html_e( 'Help Docs','coupons-deals'); ?></h3>
					<ol>
						<li><a target="_blank" href="<?php echo esc_url( COUPONS_DEALS_PRO_DOC ); ?>"><?php esc_html_e( 'Premium Theme Documentation','coupons-deals'); ?></a></li>
					</ol>
				</div>
				<div class="col-md-3">
					<h3><?php esc_html_e( 'Buy Premium','coupons-deals'); ?></h3>
					<ol>
						<a href="<?php echo esc_url( COUPONS_DEALS_BUY_PRO ); ?>" target="_blank"><?php esc_html_e('Buy Pro', 'coupons-deals'); ?></a>
					</ol>
				</div>
			</div>
		</div>
	</div>

<?php }?>
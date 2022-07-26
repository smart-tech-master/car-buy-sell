<?php 

add_action( 'wp_enqueue_scripts', 'superb_education_enqueue_styles' );
function superb_education_enqueue_styles() {
	wp_enqueue_style( 'superb-education-parent-style', get_template_directory_uri() . '/style.css' ); 
} 

function superb_education_google_fonts() {
	wp_enqueue_style( 'superb-education-google-fonts', '//fonts.googleapis.com/css2?family=PT+Sans:wght@400;700&display=swap', false ); 
}
add_action( 'wp_enqueue_scripts', 'superb_education_google_fonts' );


require_once( get_stylesheet_directory() . '/inc/custom-header.php' );

function superb_education_customize_register( $wp_customize ) {
	$wp_customize->add_section( 'postpage_settings', array(
		'title'      => __('Posts/Page Settings','superb-education'),
		'priority'   => 1,
		'capability' => 'edit_theme_options',
	) );

	$wp_customize->add_setting( 'postpage_bg_color', array(
		'default'           => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postpage_bg_color', array(
		'label'       => __( 'Background Color', 'superb-education' ),
		'section'     => 'postpage_settings',
		'priority'   => 1,
		'settings'    => 'postpage_bg_color',
	) ) );


	$wp_customize->add_setting( 'postpage_headline_color', array(
		'default'           => '#000',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postpage_headline_color', array(
		'label'       => __( 'Headline Color', 'superb-education' ),
		'section'     => 'postpage_settings',
		'priority'   => 1,
		'settings'    => 'postpage_headline_color',
	) ) );

	$wp_customize->add_setting( 'postpage_byline_color', array(
		'default'           => '#afafaf',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postpage_byline_color', array(
		'label'       => __( 'Byline Color', 'superb-education' ),
		'section'     => 'postpage_settings',
		'priority'   => 1,
		'settings'    => 'postpage_byline_color',
	) ) );

	$wp_customize->add_setting( 'postpage_text_color', array(
		'default'           => '#949494',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postpage_text_color', array(
		'label'       => __( 'Text Color', 'superb-education' ),
		'section'     => 'postpage_settings',
		'priority'   => 1,
		'settings'    => 'postpage_text_color',
	) ) );
	$wp_customize->add_setting( 'postpage_link_color', array(
		'default'           => '#000',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postpage_link_color', array(
		'label'       => __( 'Link Color', 'superb-education' ),
		'section'     => 'postpage_settings',
		'priority'   => 1,
		'settings'    => 'postpage_link_color',
	) ) );

	$wp_customize->add_setting( 'postpage_buttonbg_color', array(
		'default'           => '#000',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postpage_buttonbg_color', array(
		'label'       => __( 'Button Background Color', 'superb-education' ),
		'section'     => 'postpage_settings',
		'priority'   => 1,
		'settings'    => 'postpage_buttonbg_color',
	) ) );

	$wp_customize->add_setting( 'postpage_buttontext_color', array(
		'default'           => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postpage_buttontext_color', array(
		'label'       => __( 'Button Text Color', 'superb-education' ),
		'section'     => 'postpage_settings',
		'priority'   => 1,
		'settings'    => 'postpage_buttontext_color',
	) ) );

	$wp_customize->add_setting( 'postpage_border_color', array(
		'default'           => '#000',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'postpage_border_color', array(
		'label'       => __( 'Border Color', 'superb-education' ),
		'section'     => 'postpage_settings',
		'priority'   => 1,
		'settings'    => 'postpage_border_color',
	) ) );


}
add_action( 'customize_register', 'superb_education_customize_register', 999 );




if(! function_exists('superb_education_customizer_css_final_output' ) ):
	function superb_education_customizer_css_final_output(){
		?>

		<style type="text/css">
			a.read-story{ color: <?php echo esc_attr(get_theme_mod( 'blogfeed_readmorebutton')); ?>; }
			a.read-story{ border-color: <?php echo esc_attr(get_theme_mod( 'blogfeed_readmorebutton')); ?>; }
			body, .site, .swidgets-wrap h3, .post-data-text { background: <?php echo esc_attr(get_theme_mod( 'website_background_color')); ?>; }
			.site-title a, .site-description { color: <?php echo esc_attr(get_theme_mod( 'header_logo_color')); ?>; }
			.sheader { background-color: <?php echo esc_attr(get_theme_mod( 'header_background_color')); ?> !important; }
			.main-navigation ul li a, .main-navigation ul li .sub-arrow, .super-menu .toggle-mobile-menu,.toggle-mobile-menu:before, .mobile-menu-active .smenu-hide { color: <?php echo esc_attr(get_theme_mod( 'navigation_text_color')); ?>; }
			#smobile-menu.show .main-navigation ul ul.children.active, #smobile-menu.show .main-navigation ul ul.sub-menu.active, #smobile-menu.show .main-navigation ul li, .smenu-hide.toggle-mobile-menu.menu-toggle, #smobile-menu.show .main-navigation ul li, .primary-menu ul li ul.children li, .primary-menu ul li ul.sub-menu li, .primary-menu .pmenu, .super-menu { border-color: <?php echo esc_attr(get_theme_mod( 'navigation_border_color')); ?>; border-bottom-color: <?php echo esc_attr(get_theme_mod( 'navigation_border_color')); ?>; }
			#secondary .widget h3, #secondary .widget h3 a, #secondary .widget h4, #secondary .widget h1, #secondary .widget h2, #secondary .widget h5, #secondary .widget h6, #secondary .widget h4 a { color: <?php echo esc_attr(get_theme_mod( 'sidebar_headline_color')); ?>; }
			#secondary .widget-title:after{ background: <?php echo esc_attr(get_theme_mod( 'sidebar_headline_color')); ?>; }
			#secondary .widget a, #secondary a, #secondary .widget li a , #secondary span.sub-arrow{ color: <?php echo esc_attr(get_theme_mod( 'sidebar_link_color')); ?>; }
			#secondary, #secondary .widget, #secondary .widget p, #secondary .widget li, .widget time.rpwe-time.published { color: <?php echo esc_attr(get_theme_mod( 'sidebar_text_color')); ?>; }
			#secondary .swidgets-wrap, #secondary .widget ul li, .featured-sidebar .search-field { border-color: <?php echo esc_attr(get_theme_mod( 'sidebar_border_color')); ?>; }
			.site-info, .footer-column-three input.search-submit, .footer-column-three p, .footer-column-three li, .footer-column-three td, .footer-column-three th, .footer-column-three caption { color: <?php echo esc_attr(get_theme_mod( 'footer_text_color')); ?>; }
			.footer-column-three h3, .footer-column-three h4, .footer-column-three h5, .footer-column-three h6, .footer-column-three h1, .footer-column-three h2, .footer-column-three h4, .footer-column-three h3 a { color: <?php echo esc_attr(get_theme_mod( 'footer_headline_color')); ?>; }
			.footer-column-three a, .footer-column-three li a, .footer-column-three .widget a, .footer-column-three .sub-arrow { color: <?php echo esc_attr(get_theme_mod( 'footer_link_color')); ?>; }
			.footer-column-three h3:after { background: <?php echo esc_attr(get_theme_mod( 'footer_border_color_res')); ?>; }
			.site-info, .footer-column-three .widget ul li, .footer-column-three input.search-field, .footer-column-three input.search-submit { border-color: <?php echo esc_attr(get_theme_mod( 'footer_border_color_res')); ?>; }
			.site-footer { background-color: <?php echo esc_attr(get_theme_mod( 'footer_background_color')); ?>; }
			#goTop { background-color: <?php echo esc_attr(get_theme_mod( 'footer_go_to_top')); ?>; }
			#goTop:hover { background-color: <?php echo esc_attr(get_theme_mod( 'footer_go_to_top_hover')); ?>; }
			.content-wrapper h2.entry-title a, .content-wrapper h2.entry-title a:hover, .content-wrapper h2.entry-title a:active, .content-wrapper h2.entry-title a:focus, .archive .page-header h1, .blogposts-list h2 a, .blogposts-list h2 a:hover, .blogposts-list h2 a:active, .search-results h1.page-title { color: <?php echo esc_attr(get_theme_mod( 'blogfeed_headline_color')); ?>; }
			.blogposts-list .post-data-text, .blogposts-list .post-data-text a, .content-wrapper .post-data-text *{ color: <?php echo esc_attr(get_theme_mod( 'blogfeed_byline_color')); ?>; }
			.blogposts-list p { color: <?php echo esc_attr(get_theme_mod( 'blogfeed_text_color')); ?>; }
			.page-numbers li a, .blogposts-list .blogpost-button { background: <?php echo esc_attr(get_theme_mod( 'blogfeed_buttonbg_color')); ?>; }
			ul.page-numbers li span.current,  .page-numbers.next:hover{background: <?php echo esc_attr(get_theme_mod( 'blogfeed_pagination_active_color')); ?>; }
			.page-numbers li .page-numbers{background: <?php echo esc_attr(get_theme_mod( 'blogfeed_pagination_color')); ?>; }
			.page-numbers li a, .blogposts-list .blogpost-button, span.page-numbers.dots, .page-numbers.current, .page-numbers li a:hover { color: <?php echo esc_attr(get_theme_mod( 'blogfeed_buttontext_color')); ?>; }
			.archive .page-header h1, .search-results h1.page-title, .blogposts-list.fbox, span.page-numbers.dots, .page-numbers li a, .page-numbers.current { border-color: <?php echo esc_attr(get_theme_mod( 'blogfeed_border_color')); ?>; }
			.blogposts-list .post-data-divider { background: <?php echo esc_attr(get_theme_mod( 'blogfeed_border_color')); ?>; }
			.page .comments-area .comment-author, .page .comments-area .comment-author a, .page .comments-area .comments-title, .page .content-area h1, .page .content-area h2, .page .content-area h3, .page .content-area h4, .page .content-area h5, .page .content-area h6, .page .content-area th, .single  .comments-area .comment-author, .single .comments-area .comment-author a, .single .comments-area .comments-title, .single .content-area h1, .single .content-area h2, .single .content-area h3, .single .content-area h4, .single .content-area h5, .single .content-area h6, .single .content-area th, .search-no-results h1, .error404 h1 { color: <?php echo esc_attr(get_theme_mod( 'postpage_headline_color')); ?>; }
			.single .post-data-text, .page .post-data-text, .page .post-data-text a, .single .post-data-text a, .comments-area .comment-meta .comment-metadata a, .single .post-data-text * { color: <?php echo esc_attr(get_theme_mod( 'postpage_byline_color')); ?>; }
			.page .content-area p, .page article, .page .content-area table, .page .content-area dd, .page .content-area dt, .page .content-area address, .page .content-area .entry-content, .page .content-area li, .page .content-area ol, .single .content-area p, .single article, .single .content-area table, .single .content-area dd, .single .content-area dt, .single .content-area address, .single .entry-content, .single .content-area li, .single .content-area ol, .search-no-results .page-content p { color: <?php echo esc_attr(get_theme_mod( 'postpage_text_color')); ?>; }
			.single .entry-content a, .page .entry-content a, .comment-content a, .comments-area .reply a, .logged-in-as a, .comments-area .comment-respond a { color: <?php echo esc_attr(get_theme_mod( 'postpage_link_color')); ?>; }
			.comments-area p.form-submit input { background: <?php echo esc_attr(get_theme_mod( 'postpage_buttonbg_color')); ?>; }
			.error404 .page-content p, .error404 input.search-submit, .search-no-results input.search-submit { color: <?php echo esc_attr(get_theme_mod( 'postpage_text_color')); ?>; }
			.page .comments-area, .page article.fbox, .page article tr, .page .comments-area ol.comment-list ol.children li, .page .comments-area ol.comment-list .comment, .single .comments-area, .single article.fbox, .single article tr, .comments-area ol.comment-list ol.children li, .comments-area ol.comment-list .comment, .error404 main#main, .error404 .search-form label, .search-no-results .search-form label, .error404 input.search-submit, .search-no-results input.search-submit, .error404 main#main, .search-no-results section.fbox.no-results.not-found{ border-color: <?php echo esc_attr(get_theme_mod( 'postpage_border_color')); ?>; }
			.single .post-data-divider, .page .post-data-divider { background: <?php echo esc_attr(get_theme_mod( 'postpage_border_color')); ?>; }
			.single .comments-area p.form-submit input, .page .comments-area p.form-submit input { color: <?php echo esc_attr(get_theme_mod( 'postpage_buttontext_color')); ?>; }
			.bottom-header-wrapper { padding-top: <?php echo esc_attr(get_theme_mod( 'banner_img_top_padding')); ?>px; }
			.bottom-header-wrapper { padding-bottom: <?php echo esc_attr(get_theme_mod( 'banner_img_padding_bottom')); ?>px; }
			.bottom-header-wrapper { background: <?php echo esc_attr(get_theme_mod( 'imagebanner_background_color')); ?>; }
			.bottom-header-wrapper *{ color: <?php echo esc_attr(get_theme_mod( 'imagebanner_text_color')); ?>; }
			.header-widget a, .header-widget li a, .header-widget i.fa { color: <?php echo esc_attr(get_theme_mod( 'upperwidgets_link_color')); ?>; }
			.header-widget, .header-widget p, .header-widget li, .header-widget .textwidget { color: <?php echo esc_attr(get_theme_mod( 'upperwidgets_text_color')); ?>; }
			.header-widget .widget-title, .header-widget h1, .header-widget h3, .header-widget h2, .header-widget h4, .header-widget h5, .header-widget h6{ color: <?php echo esc_attr(get_theme_mod( 'upperwidgets_title_color')); ?>; }
			.header-widget.swidgets-wrap, .header-widget ul li, .header-widget .search-field { border-color: <?php echo esc_attr(get_theme_mod( 'upperwidgets_border_color')); ?>; }
			.bottom-header-title, .bottom-header-paragraph{ color: <?php echo esc_attr(get_theme_mod( 'header_img_textcolor')); ?>; }
			#secondary .widget-title-lines:after, #secondary .widget-title-lines:before { background: <?php echo esc_attr(get_theme_mod( 'sidebar_headline_color')); ?>; }
			.header-button-wrap a{ background: <?php echo esc_attr(get_theme_mod( 'header_img_button_bg_color')); ?>; }
			.header-button-wrap a{ color: <?php echo esc_attr(get_theme_mod( 'header_img_button_text_color')); ?>; }
			.header-widgets-wrapper .swidgets-wrap{ background: <?php echo esc_attr(get_theme_mod( 'upperwidgets_bg_color')); ?>; }
			.top-nav-wrapper, .primary-menu .pmenu, .super-menu, #smobile-menu, .primary-menu ul li ul.children, .primary-menu ul li ul.sub-menu { background-color: <?php echo esc_attr(get_theme_mod( 'navigation_background_color')); ?>; }
			#secondary .swidget { border-color: <?php echo esc_attr(get_theme_mod( 'sidebar_border_color')); ?>; }
			.archive article.fbox, .search-results article.fbox, .blog article.fbox { background: <?php echo esc_attr(get_theme_mod( 'blogfeed_bg_color')); ?>; }
			.comments-area, .single article.fbox, .page article.fbox { background: <?php echo esc_attr(get_theme_mod( 'postpage_bg_color')); ?>; }
		</style>
	<?php }
	add_action( 'wp_head', 'superb_education_customizer_css_final_output', 999 );
endif;


/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for child theme Superb Education for publication on WordPress.org
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 *
 * Depending on your implementation, you may want to change the include call:
 *
 * Parent Theme:
 * require_once get_template_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Child Theme:
 * require_once get_stylesheet_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Plugin:
 * require_once dirname( __FILE__ ) . '/path/to/class-tgm-plugin-activation.php';
 */
require_once get_stylesheet_directory() . '/inc/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'superb_education_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variables passed to the `tgmpa()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `tgmpa( $plugins );`.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function superb_education_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		array(
			'name'      => 'Tables',
			'slug'      => 'superb-tables',
			'required'  => false,
		),

		array(
			'name'      => 'Social Media Share and Follow Buttons',
			'slug'      => 'superb-social-share-and-follow-buttons',
			'required'  => false,
		),



	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'superb-education',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.

		/*
		'strings'      => array(
			'page_title'                      => __( 'Install Required Plugins', 'superb-education' ),
			'menu_title'                      => __( 'Install Plugins', 'superb-education' ),
			/* translators: %s: plugin name. * /
			'installing'                      => __( 'Installing Plugin: %s', 'superb-education' ),
			/* translators: %s: plugin name. * /
			'updating'                        => __( 'Updating Plugin: %s', 'superb-education' ),
			'oops'                            => __( 'Something went wrong with the plugin API.', 'superb-education' ),
			'notice_can_install_required'     => _n_noop(
				/* translators: 1: plugin name(s). * /
				'This theme requires the following plugin: %1$s.',
				'This theme requires the following plugins: %1$s.',
				'superb-education'
			),
			'notice_can_install_recommended'  => _n_noop(
				/* translators: 1: plugin name(s). * /
				'This theme recommends the following plugin: %1$s.',
				'This theme recommends the following plugins: %1$s.',
				'superb-education'
			),
			'notice_ask_to_update'            => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
				'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
				'superb-education'
			),
			'notice_ask_to_update_maybe'      => _n_noop(
				/* translators: 1: plugin name(s). * /
				'There is an update available for: %1$s.',
				'There are updates available for the following plugins: %1$s.',
				'superb-education'
			),
			'notice_can_activate_required'    => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following required plugin is currently inactive: %1$s.',
				'The following required plugins are currently inactive: %1$s.',
				'superb-education'
			),
			'notice_can_activate_recommended' => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following recommended plugin is currently inactive: %1$s.',
				'The following recommended plugins are currently inactive: %1$s.',
				'superb-education'
			),
			'install_link'                    => _n_noop(
				'Begin installing plugin',
				'Begin installing plugins',
				'superb-education'
			),
			'update_link' 					  => _n_noop(
				'Begin updating plugin',
				'Begin updating plugins',
				'superb-education'
			),
			'activate_link'                   => _n_noop(
				'Begin activating plugin',
				'Begin activating plugins',
				'superb-education'
			),
			'return'                          => __( 'Return to Required Plugins Installer', 'superb-education' ),
			'plugin_activated'                => __( 'Plugin activated successfully.', 'superb-education' ),
			'activated_successfully'          => __( 'The following plugin was activated successfully:', 'superb-education' ),
			/* translators: 1: plugin name. * /
			'plugin_already_active'           => __( 'No action taken. Plugin %1$s was already active.', 'superb-education' ),
			/* translators: 1: plugin name. * /
			'plugin_needs_higher_version'     => __( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'superb-education' ),
			/* translators: 1: dashboard link. * /
			'complete'                        => __( 'All plugins installed and activated successfully. %1$s', 'superb-education' ),
			'dismiss'                         => __( 'Dismiss this notice', 'superb-education' ),
			'notice_cannot_install_activate'  => __( 'There are one or more required or recommended plugins to install, update or activate.', 'superb-education' ),
			'contact_admin'                   => __( 'Please contact the administrator of this site for help.', 'superb-education' ),

			'nag_type'                        => '', // Determines admin notice type - can only be one of the typical WP notice classes, such as 'updated', 'update-nag', 'notice-warning', 'notice-info' or 'error'. Some of which may not work as expected in older WP versions.
		),
		*/
	);

tgmpa( $plugins, $config );
}

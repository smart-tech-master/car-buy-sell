<?php
/**
 * Feminine coach functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Feminine_Coach
 */

function feminine_coach_child_assets()
{
    $my_theme = wp_get_theme();
    $version  = $my_theme['Version'];

    wp_enqueue_style('feminine-business', get_template_directory_uri()  . '/style.css');
    wp_enqueue_style('feminine-coach', get_stylesheet_directory_uri() . '/style.css', array('feminine-business'), $version);

    wp_enqueue_script('feminine-business-custom-child', get_stylesheet_directory_uri() . '/js/custom-child.js', array('jquery'), $version, true);
}
add_action('wp_enqueue_scripts', 'feminine_coach_child_assets', 10);

function feminine_coach_remove_newsletter_hooks()
{
    remove_filter('bt_newsletter_widget_inner_wrap_display', 'feminine_business_add_inner_div');
    remove_action('bt_newsletter_widget_inner_wrap_start', 'feminine_business_start_inner_div');
    remove_action('bt_newsletter_widget_inner_wrap_close', 'feminine_business_end_inner_div');
    remove_filter('bt_newsletter_shortcode_inner_wrap_display', 'feminine_business_shortcode_add_inner_div');
    remove_action('bt_newsletter_shortcode_inner_wrap_start', 'feminine_business_shortcode_start_inner_div');
    remove_action('bt_newsletter_shortcode_inner_wrap_close', 'feminine_business_shortcode_end_inner_div');
}
add_action('init', 'feminine_coach_remove_newsletter_hooks');

function feminine_business_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(
		array(
			'name'      => __( 'BlossomThemes Email Newsletter', 'feminine-coach' ),
			'slug'      => 'blossomthemes-email-newsletter',
			'required'  => false,
		),
		array(
			'name'      => __( 'Smash Balloon Social Photo Feed', 'feminine-coach' ),
			'slug'      => 'instagram-feed',
			'required'  => false,
		),
		array(
			'name'      => __( 'Contact Form 7', 'feminine-coach' ),
			'slug'      => 'contact-form-7',
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
		'id'           => 'feminine-coach', // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.

		/*
		'strings'      => array(
			'page_title'                      => __( 'Install Required Plugins', 'feminine-business' ),
			'menu_title'                      => __( 'Install Plugins', 'feminine-business' ),
			/* translators: %s: plugin name. * /
			'installing'                      => __( 'Installing Plugin: %s', 'feminine-business' ),
			/* translators: %s: plugin name. * /
			'updating'                        => __( 'Updating Plugin: %s', 'feminine-business' ),
			'oops'                            => __( 'Something went wrong with the plugin API.', 'feminine-business' ),
			'notice_can_install_required'     => _n_noop(
				/* translators: 1: plugin name(s). * /
				'This theme requires the following plugin: %1$s.',
				'This theme requires the following plugins: %1$s.',
				'feminine-business'
			),
			'notice_can_install_recommended'  => _n_noop(
				/* translators: 1: plugin name(s). * /
				'This theme recommends the following plugin: %1$s.',
				'This theme recommends the following plugins: %1$s.',
				'feminine-business'
			),
			'notice_ask_to_update'            => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
				'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
				'feminine-business'
			),
			'notice_ask_to_update_maybe'      => _n_noop(
				/* translators: 1: plugin name(s). * /
				'There is an update available for: %1$s.',
				'There are updates available for the following plugins: %1$s.',
				'feminine-business'
			),
			'notice_can_activate_required'    => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following required plugin is currently inactive: %1$s.',
				'The following required plugins are currently inactive: %1$s.',
				'feminine-business'
			),
			'notice_can_activate_recommended' => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following recommended plugin is currently inactive: %1$s.',
				'The following recommended plugins are currently inactive: %1$s.',
				'feminine-business'
			),
			'install_link'                    => _n_noop(
				'Begin installing plugin',
				'Begin installing plugins',
				'feminine-business'
			),
			'update_link' 					  => _n_noop(
				'Begin updating plugin',
				'Begin updating plugins',
				'feminine-business'
			),
			'activate_link'                   => _n_noop(
				'Begin activating plugin',
				'Begin activating plugins',
				'feminine-business'
			),
			'return'                          => __( 'Return to Required Plugins Installer', 'feminine-business' ),
			'plugin_activated'                => __( 'Plugin activated successfully.', 'feminine-business' ),
			'activated_successfully'          => __( 'The following plugin was activated successfully:', 'feminine-business' ),
			/* translators: 1: plugin name. * /
			'plugin_already_active'           => __( 'No action taken. Plugin %1$s was already active.', 'feminine-business' ),
			/* translators: 1: plugin name. * /
			'plugin_needs_higher_version'     => __( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'feminine-business' ),
			/* translators: 1: dashboard link. * /
			'complete'                        => __( 'All plugins installed and activated successfully. %1$s', 'feminine-business' ),
			'dismiss'                         => __( 'Dismiss this notice', 'feminine-business' ),
			'notice_cannot_install_activate'  => __( 'There are one or more required or recommended plugins to install, update or activate.', 'feminine-business' ),
			'contact_admin'                   => __( 'Please contact the administrator of this site for help.', 'feminine-business' ),

			'nag_type'                        => '', // Determines admin notice type - can only be one of the typical WP notice classes, such as 'updated', 'update-nag', 'notice-warning', 'notice-info' or 'error'. Some of which may not work as expected in older WP versions.
		),
		*/
	);

	tgmpa( $plugins, $config );
}
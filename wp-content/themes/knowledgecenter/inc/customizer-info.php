<?php
/**
 * Theme Info Settings
 *
 * Register Theme Info Settings
 *
 * @package knowledgecenter
 */

/**
 * Adds all Theme Info settings to the Customizer
 *
 * @param object $wp_customize / Customizer Object.
 */
function knowledgecenter_customize_register_theme_info_settings( $wp_customize ) {

	// Add Section for Theme Info.
	$wp_customize->add_section( 'knowledgecenter_section_theme_info', array(
		'title'    => esc_html__( 'Theme Info', 'knowledgecenter' ),
		'priority' => 200,
		'panel'    => 'knowledgecenter_settings',
	) );

	// Add Theme Links control.
	$wp_customize->add_control( new knowledgecenter_Customize_Links_Control(
		$wp_customize, 'knowledgecenter_theme_options[theme_links]', array(
			'section'  => 'knowledgecenter_section_theme_info',
			'settings' => array(),
			'priority' => 10,
		)
	) );

	// Add Pro Version control.
	if ( ! class_exists( 'knowledgecenter_pro\\Wow_Plugin' ) ) {
		$wp_customize->add_control( new knowledgecenter_Customize_Upgrade_Control(
			$wp_customize, 'knowledgecenter_theme_options[pro_version]', array(
				'section'  => 'knowledgecenter_section_theme_info',
				'settings' => array(),
				'priority' => 20,
			)
		) );
	}

}
add_action( 'customize_register', 'knowledgecenter_customize_register_theme_info_settings' );


if ( class_exists( 'WP_Customize_Control' ) ) :

	/**
	 * Displays the theme links in the Customizer.
	 */
	class knowledgecenter_Customize_Links_Control extends WP_Customize_Control {
		/**
		 * Render Control
		 */
		public function render_content() {
			?>

			<div class="theme-links">

				<span class="customize-control-title"><?php esc_html_e( 'Theme Links', 'knowledgecenter' ); ?></span>

				<p>
					<a href="https://themes.wow-company.com/knowledgecenter-theme/"
					   target="_blank"><?php esc_html_e( 'Theme Page', 'knowledgecenter' ); ?></a>
				</p>

				<p>
					<a href="https://themes.wow-company.com/knowledgecenter/"
					   target="_blank"><?php esc_html_e( 'Theme Demo', 'knowledgecenter' ); ?></a>
				</p>

				<p>
					<a href="https://themes.wow-company.com/knowledgecenterpro/"
					   target="_blank"><?php esc_html_e( 'Theme Demo PRO version', 'knowledgecenter' ); ?></a>
				</p>

				<p>
					<a href="https://docs.wow-company.com/category/themes/knowledgecenter/" target="_blank">
						<?php esc_html_e( 'Theme Documentation', 'knowledgecenter' ); ?>
					</a>
				</p>

				<p>
					<a href="<?php echo esc_url( __( 'https://wordpress.org/support/theme/knowledgecenter/reviews/', 'knowledgecenter' ) ); ?>"
					   target="_blank"><?php esc_html_e( 'Rate this theme', 'knowledgecenter' ); ?></a>
				</p>

			</div>

			<?php
		}
	}

	class knowledgecenter_Customize_Upgrade_Control extends WP_Customize_Control {
		/**
		 * Render Control
		 */
		public function render_content() {
			?>

            <div class="upgrade-pro-version">

                <span class="customize-control-title"><?php esc_html_e( 'Pro Version Add-on', 'knowledgecenter' ); ?></span>

                <span class="textfield">
					<?php printf( esc_html__( 'Purchase the %s Pro Add-on to get additional features and advanced customization options.', 'knowledgecenter' ), 'knowledgecenter' ); ?>
				</span>

                <p>
                    <a href="https://wow-estore.com/item/knowledgecenter-pro/" target="_blank" class="button button-secondary">
						<?php printf( esc_html__( 'Learn more about %s Pro', 'knowledgecenter' ), 'KnowledgeCenter' ); ?>
                    </a>
                </p>

            </div>

			<?php
		}
	}

endif;
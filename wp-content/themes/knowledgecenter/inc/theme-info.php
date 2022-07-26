<?php
/**
 * Theme Info
 *
 * Adds a simple Theme Info page to the Appearance section of the WordPress Dashboard.
 *
 * @package knowledgecenter
 */

/**
 * Add Theme Info page to admin menu
 */
function knowledgecenter_theme_info_menu_link() {

	// Get theme details.
	$theme = wp_get_theme();

	add_theme_page(
		sprintf( esc_html__( 'Welcome to %1$s %2$s', 'knowledgecenter' ), $theme->display( 'Name' ), $theme->display( 'Version' ) ),
		esc_html__( 'Theme Info', 'knowledgecenter' ),
		'edit_theme_options',
		'knowledgecenter',
		'knowledgecenter_theme_info_page'
	);

}

add_action( 'admin_menu', 'knowledgecenter_theme_info_menu_link' );

/**
 * Display Theme Info page
 */
function knowledgecenter_theme_info_page() {

	// Get theme details.
	$theme = wp_get_theme();
	?>

    <div class="wrap theme-info-wrap">

        <h1><?php printf( esc_html__( 'Welcome to %1$s %2$s', 'knowledgecenter' ), $theme->display( 'Name' ), $theme->display( 'Version' ) ); ?></h1>

        <div class="theme-description"><?php echo esc_html( $theme->display( 'Description' ) ); ?></div>

        <hr>
        <div class="important-links clearfix">
            <p><strong><?php esc_html_e( 'Theme Links', 'knowledgecenter' ); ?>:</strong>
                <a href="https://themes.wow-company.com/knowledgecenter-theme/"
                   target="_blank"><?php esc_html_e( 'Theme Page', 'knowledgecenter' ); ?></a>
                <a href="https://themes.wow-company.com/knowledgecenter/"
                   target="_blank"><?php esc_html_e( 'Theme Demo', 'knowledgecenter' ); ?></a>
                <a href="https://themes.wow-company.com/knowledgecenterpro/"
                   target="_blank"><?php esc_html_e( 'Theme Demo PRO version', 'knowledgecenter' ); ?></a>
                <a href="https://docs.wow-company.com/category/themes/knowledgecenter/" target="_blank">
		            <?php esc_html_e( 'Theme Documentation', 'knowledgecenter' ); ?>
                </a>
                <a href="<?php echo esc_url( __( 'https://wordpress.org/support/theme/knowledgecenter/reviews/', 'knowledgecenter' ) ); ?>"
                   target="_blank"><?php esc_html_e( 'Rate this theme', 'knowledgecenter' ); ?></a>
            </p>
        </div>
        <hr>

        <div id="getting-started">

            <h3><?php printf( esc_html__( 'Getting Started with %s', 'knowledgecenter' ), $theme->display( 'Name' ) ); ?></h3>

            <div class="columns-wrapper clearfix">

                <div class="column column-half clearfix">

                    <div class="section">
                        <h4><?php esc_html_e( 'Theme Documentation', 'knowledgecenter' ); ?></h4>

                        <p class="about">
							<?php esc_html_e( 'You need help to setup and configure this theme? We got you covered with an extensive theme documentation on our website.', 'knowledgecenter' ); ?>
                        </p>
                        <p>
                            <a href="https://docs.wow-company.com/category/themes/knowledgecenter/"
                               target="_blank" class="button button-secondary">
								<?php printf( esc_html__( 'View %s Documentation', 'knowledgecenter' ), 'knowledgecenter' ); ?>
                            </a>
                        </p>
                    </div>

                    <div class="section">
                        <h4><?php esc_html_e( 'Theme Options', 'knowledgecenter' ); ?></h4>

                        <p class="about">
							<?php printf( esc_html__( '%s makes use of the Customizer for all theme settings. Click on "Customize Theme" to open the Customizer now.', 'knowledgecenter' ), $theme->display( 'Name' ) ); ?>
                        </p>
                        <p>
                            <a href="<?php echo wp_customize_url(); ?>"
                               class="button button-primary"><?php esc_html_e( 'Customize Theme', 'knowledgecenter' ); ?></a>
                        </p>
                    </div>

                </div>

                <div class="column column-half clearfix">

                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/screenshot.png"/>

                </div>

            </div>

        </div>

        <hr>

        <div id="more-features">

            <h3><?php esc_html_e( 'Get more features', 'knowledgecenter' ); ?></h3>

            <div class="columns-wrapper clearfix">

                <div class="column column-half clearfix">

                    <div class="section">
                        <h4><?php esc_html_e( 'Pro Version Add-on', 'knowledgecenter' ); ?></h4>

                        <p class="about">
							<?php printf( esc_html__( 'Purchase the %s Pro Add-on and get additional features and advanced customization options.', 'knowledgecenter' ), 'knowledgecenter' ); ?>
                        </p>
                        <p>
                            <a href=" https://wow-estore.com/item/knowledgecenter-pro/ "
                               target="_blank" class="button button-secondary">
								<?php printf( esc_html__( 'Learn more about %s Pro', 'knowledgecenter' ), 'KnowledgeCenter' ); ?>
                            </a>
                        </p>
                    </div>

                </div>


            </div>

        </div>

        <hr>

        <div id="theme-author">

            <p>
				<?php printf( esc_html__( '%1$s is proudly brought to you by %2$s. If you like this theme, %3$s :)', 'knowledgecenter' ),
					$theme->display( 'Name' ),
					'<a target="_blank" href="https://wow-company.com/" title="Wow-Company">Wow-Company</a>',
					'<a target="_blank" href="https://wordpress.org/support/theme/knowledgecenter/reviews/" title="' . esc_attr__( 'Review knowledgecenter', 'knowledgecenter' ) . '">' . esc_html__( 'rate it', 'knowledgecenter' ) . '</a>'
				); ?>
            </p>

        </div>

    </div>

	<?php
}

/**
 * Enqueues CSS for Theme Info page
 *
 * @param int $hook Hook suffix for the current admin page.
 */
function knowledgecenter_theme_info_page_css( $hook ) {

	// Load styles and scripts only on theme info page.
	if ( 'appearance_page_knowledgecenter' !== $hook ) {
		return;
	}

	// Embed theme info css style.
	wp_enqueue_style( 'knowledgecenter-theme-info-css', get_template_directory_uri() . '/assets/css/theme-info.css' );

}

add_action( 'admin_enqueue_scripts', 'knowledgecenter_theme_info_page_css' );

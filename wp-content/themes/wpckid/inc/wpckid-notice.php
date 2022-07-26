<?php
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'WPCkidNotice' ) ) {
	class WPCkidNotice {
		function __construct() {
			add_action( 'admin_notices', array( $this, 'admin_notice' ) );
			add_action( 'admin_init', array( $this, 'notice_ignore' ) );
			add_action( 'admin_enqueue_scripts', array( $this, 'notice_scripts' ) );
		}

		function notice_scripts() {
			wp_enqueue_style( 'wpckid-notice', esc_url( get_template_directory_uri() . '/assets/css/notice.css' ) );
		}

		function admin_notice() {
			global $current_user;
			$user_id = $current_user->ID;

			if ( ! get_user_meta( $user_id, 'wpckid_notice_ignore', true ) ) {
				add_thickbox();
				?>
              <div class="wpckid-notice notice">
                <div class="wpckid-notice-thumbnail">
                  <a href="https://wordpress.org/themes/wpckid/" target="_blank">
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/screenshot.png' ); ?>"
                         alt="WPCkid" />
                  </a>
                </div>
                <div class="wpckid-notice-text">
                  <h3>Warmly welcome to WPClever’s WPCkid theme</h3>
                  <p>
                    Thanks for being our users. We highly recommend
                    you install the 3 smart plugins: <a
                      href="<?php echo esc_url( admin_url( 'plugin-install.php?tab=plugin-information&plugin=woo-smart-quick-view&TB_iframe=true&width=800&height=550' ) ); ?>"
                      class="thickbox" title="Install WPC Smart Quick View">WPC Smart Quick View</a>,
                    <a
                      href="<?php echo esc_url( admin_url( 'plugin-install.php?tab=plugin-information&plugin=woo-smart-wishlist&TB_iframe=true&width=800&height=550' ) ); ?>"
                      class="thickbox" title="Install WPC Smart Wishlist">Smart Wishlist</a>, and <a
                      href="<?php echo esc_url( admin_url( 'plugin-install.php?tab=plugin-information&plugin=woo-smart-compare&TB_iframe=true&width=800&height=550' ) ); ?>"
                      class="thickbox" title="Install WPC Smart Compare">Smart Compare</a> to
                    fully assist the functionalities of our theme. Check out our profile for more cool plugins
                    for your business.
                  </p>
                  <ul class="wpckid-notice-ul">
                    <li>
                      <a href="http://wpclever.org/" target="_blank">
                        <span class="dashicons dashicons-admin-site"></span> Discover Free Plugins
                      </a>
                    </li>
                    <li>
                      <a href="https://wpclever.net/" target="_blank">
                        <span class="dashicons dashicons-cart"></span> Purchase Premium Plugins
                      </a>
                    </li>
                    <li>
						<?php
						if ( function_exists( 'wc_get_current_admin_url' ) ) {
							$ignore_url = add_query_arg( 'wpckid_notice_ignore', '1', wc_get_current_admin_url() );
						} else {
							$ignore_url = admin_url( '?wpckid_notice_ignore=1' );
						}
						?>
                      <a href="<?php echo esc_url( $ignore_url ); ?>"
                         class="dashicons-dismiss-icon">
                        <span class="dashicons dashicons-welcome-comments"></span> Hide Message
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
				<?php
			}
		}

		function notice_ignore() {
			global $current_user;
			$user_id = $current_user->ID;

			if ( isset( $_GET['wpckid_notice_ignore'] ) ) {
				if ( $_GET['wpckid_notice_ignore'] == '1' ) {
					update_user_meta( $user_id, 'wpckid_notice_ignore', 'true' );
				} else {
					delete_user_meta( $user_id, 'wpckid_notice_ignore' );
				}
			}
		}
	}

	new WPCkidNotice();
}

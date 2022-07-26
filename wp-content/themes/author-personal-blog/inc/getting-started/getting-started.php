<?php
/**
 * Getting Started Page.
 *
 * @package Author Personal Blog
 */


$author_personal_blog_theme = wp_get_theme();
$author_personal_blog_version = $author_personal_blog_theme->get('Version');
$author_personal_blog_name = $author_personal_blog_theme->get('Name');

define('AUTHOR_PERSONAL_BLOG_THEME_VERSION', $author_personal_blog_version);
define('AUTHOR_PERSONAL_BLOG_THEME_NAME', $author_personal_blog_name);

if( ! function_exists( 'author_personal_blog_getting_started_menu' ) ) :
/**
 * Adding Getting Started Page in admin menu
 */
function author_personal_blog_getting_started_menu(){
	add_theme_page(
		__( '[ Author Personal Blog ] Getting Started', 'author-personal-blog' ),
		__( '[ Author Personal Blog ] Getting Started', 'author-personal-blog' ),
		'manage_options',
		'author-personal-blog-getting-started',
		'author_personal_blog_getting_started_page', $position = 0
	);
}
endif;
add_action( 'admin_menu', 'author_personal_blog_getting_started_menu' );

if( ! function_exists( 'author_personal_blog_getting_started_admin_scripts' ) ) :
/**
 * Load Getting Started styles in the admin
 */
function author_personal_blog_getting_started_admin_scripts( $hook ){
    wp_enqueue_style( 'author-personal-blog-focus', get_template_directory_uri() . '/inc/getting-started/css/focus.css', false, AUTHOR_PERSONAL_BLOG_THEME_VERSION );
	// Load styles only on our page
	if( 'appearance_page_author-personal-blog-getting-started' != $hook ) return;

    wp_enqueue_style( 'author-personal-blog-getting-started', get_template_directory_uri() . '/inc/getting-started/css/getting-started.css', false, AUTHOR_PERSONAL_BLOG_THEME_VERSION );

    wp_enqueue_script( 'plugin-install' );
    wp_enqueue_script( 'updates' );
    wp_enqueue_script( 'author-personal-blog-getting-started', get_template_directory_uri() . '/inc/getting-started/js/getting-started.js', array( 'jquery' ), AUTHOR_PERSONAL_BLOG_THEME_VERSION, true );
    wp_enqueue_script( 'author-personal-blog-recommended-plugin-install', get_template_directory_uri() . '/inc/getting-started/js/recommended-plugin-install.js', array( 'jquery' ), AUTHOR_PERSONAL_BLOG_THEME_VERSION, true );
    wp_localize_script( 'author-personal-blog-recommended-plugin-install', 'author_personal_blog_start_page', array( 'activating' => __( 'Activating ', 'author-personal-blog' ) ) );
}
endif;
add_action( 'admin_enqueue_scripts', 'author_personal_blog_getting_started_admin_scripts' );

if( ! function_exists( 'author_personal_blog_call_plugin_api' ) ) :
/**
 * Plugin API
**/
function author_personal_blog_call_plugin_api( $plugin ) {
	include_once ABSPATH . 'wp-admin/includes/plugin-install.php';
	$call_api = plugins_api(
        'plugin_information',
            array(
    		'slug'   => $plugin,
    		'fields' => array(
    			'downloaded'        => false,
    			'rating'            => false,
    			'description'       => false,
    			'short_description' => true,
    			'donate_link'       => false,
    			'tags'              => false,
    			'sections'          => true,
    			'homepage'          => true,
    			'added'             => false,
    			'last_updated'      => false,
    			'compatibility'     => false,
    			'tested'            => false,
    			'requires'          => false,
    			'downloadlink'      => false,
    			'icons'             => true
    		)
    	)
    );
	return $call_api;
}
endif;

if( ! function_exists( 'author_personal_blog_check_for_icon' ) ) :
/**
 * Check For Icon
**/
function author_personal_blog_check_for_icon( $arr ) {
	if( ! empty( $arr['svg'] ) ){
		$plugin_icon_url = $arr['svg'];
	}elseif( ! empty( $arr['2x'] ) ){
		$plugin_icon_url = $arr['2x'];
	}elseif( ! empty( $arr['1x'] ) ){
		$plugin_icon_url = $arr['1x'];
	}else{
		$plugin_icon_url = $arr['default'];
	}
	return $plugin_icon_url;
}
endif;

if( ! function_exists( 'author_personal_blog_getting_started_page' ) ) :
/**
 * Callback function for admin page.
*/
function author_personal_blog_getting_started_page(){ ?>
	<div class="wrap getting-started">
		<h2 class="notices"></h2>
		<div class="intro-wrap">
			<div class="intro">
				<h3><?php printf( esc_html__( 'Getting started with %1$s v%2$s', 'author-personal-blog' ), AUTHOR_PERSONAL_BLOG_THEME_NAME, AUTHOR_PERSONAL_BLOG_THEME_VERSION ); ?></h3>
				<h4><?php printf( esc_html__( 'View our video walkthrough and setup guide below.', 'author-personal-blog' ), AUTHOR_PERSONAL_BLOG_THEME_NAME ); ?></h4>
                <p>

                    <a href="<?php echo esc_url( 'https://rswpthemes.com/author-personal-blog-pro-wordpress-theme/' ); ?>" class="button button-primary" style="text-decoration: none;" target="_blank"><?php esc_html_e( 'Upgrade to Pro', 'author-personal-blog' ); ?></a>

                </p>
			</div>
		</div>

		<div class="panels">
			<ul class="inline-list">
				<li class="current">
                    <a id="plugins" href="javascript:void(0);">
                       <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22 22">
                            <defs><style>.a{fill:#354052;}</style></defs>
                            <path class="a" d="M12,23H11V16.43A5.966,5.966,0,0,1,7,18a6.083,6.083,0,0,1-6-6V11H7.57A5.966,5.966,0,0,1,6,7a6.083,6.083,0,0,1,6-6h1V7.57A5.966,5.966,0,0,1,17,6a6.083,6.083,0,0,1,6,6v1H16.43A5.966,5.966,0,0,1,18,17,6.083,6.083,0,0,1,12,23Zm1-9.87v7.74a4,4,0,0,0,0-7.74ZM3.13,13A4.07,4.07,0,0,0,7,16a4.07,4.07,0,0,0,3.87-3Zm10-2h7.74a4,4,0,0,0-7.74,0ZM11,3.13A4.08,4.08,0,0,0,8,7a4.08,4.08,0,0,0,3,3.87Z" transform="translate(-1 -1)"/>
                        </svg>
                        <?php esc_html_e( 'Getting Started', 'author-personal-blog' ); ?>
                    </a>
                </li>

			</ul>
			<div id="panel" class="panel">
				<?php require get_template_directory() . '/inc/getting-started/tabs/started.php'; ?>
				<?php require get_template_directory() . '/inc/getting-started/tabs/link-panel.php'; ?>
			</div><!-- .panel -->
		</div><!-- .panels -->
	</div><!-- .getting-started -->
	<?php
}
endif;
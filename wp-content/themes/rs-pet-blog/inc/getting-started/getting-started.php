<?php
/**
 * Getting Started Page.
 *
 * @package Rs Pet Blog Pro
 */


$rs_pet_blog_theme = wp_get_theme();
$rs_pet_blog_version = $rs_pet_blog_theme->get('Version');
$rs_pet_blog_name = $rs_pet_blog_theme->get('Name');

define('RS_PET_BLOG_THEME_VERSION', $rs_pet_blog_version);
define('RS_PET_BLOG_THEME_NAME', $rs_pet_blog_name);

if( ! function_exists( 'rs_pet_blog_getting_started_menu' ) ) :
/**
 * Adding Getting Started Page in admin menu
 */
function rs_pet_blog_getting_started_menu(){
	add_theme_page(
		__( '[RS PET BLOG] Getting Started','rs-pet-blog' ),
		__( '[RS PET BLOG] Getting Started','rs-pet-blog' ),
		'manage_options',
		'rs-pet-blog-getting-started',
		'rs_pet_blog_getting_started_page', $position = 4
	);
}
endif;
add_action( 'admin_menu', 'rs_pet_blog_getting_started_menu' );

if( ! function_exists( 'rs_pet_blog_getting_started_admin_scripts' ) ) :
/**
 * Load Getting Started styles in the admin
 */
function rs_pet_blog_getting_started_admin_scripts( $hook ){
    wp_enqueue_style( 'rs-pet-blog-focus', get_template_directory_uri() . '/inc/getting-started/css/focus.css', false, RS_PET_BLOG_THEME_VERSION );
	// Load styles only on our page
	if( 'appearance_page_rs-pet-blog-getting-started' != $hook ) return;

    wp_enqueue_style( 'rs-pet-blog-getting-started', get_template_directory_uri() . '/inc/getting-started/css/getting-started.css', false, RS_PET_BLOG_THEME_VERSION );

    wp_enqueue_script( 'plugin-install' );
    wp_enqueue_script( 'updates' );
}
endif;
add_action( 'admin_enqueue_scripts', 'rs_pet_blog_getting_started_admin_scripts' );

if( ! function_exists( 'rs_pet_blog_getting_started_page' ) ) :
/**
 * Callback function for admin page.
*/
function rs_pet_blog_getting_started_page(){ ?>
	<div class="wrap getting-started">
		<h2 class="notices"></h2>
		<div class="intro-wrap">
			<div class="intro">
				<h3><?php printf( esc_html__( 'Getting started with %1$s v%2$s','rs-pet-blog' ), RS_PET_BLOG_THEME_NAME, RS_PET_BLOG_THEME_VERSION ); ?></h3>
				<h4><?php printf( esc_html__( 'View our video walkthrough and setup guide below.','rs-pet-blog' ), RS_PET_BLOG_THEME_NAME ); ?></h4>
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
                        <?php esc_html_e( 'Getting Started','rs-pet-blog' ); ?>
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
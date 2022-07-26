<?php
if ( function_exists('patricia_lite_require_file') ) {
    
	// Load Customizer Library scripts
    patricia_lite_require_file( PATRICIA_LITE_CORE_PATH . 'customizer/customizer-library/customizer-library.php' );
    patricia_lite_require_file( PATRICIA_LITE_CORE_PATH . 'customizer/customizer-options.php' );
    patricia_lite_require_file( PATRICIA_LITE_CORE_PATH . 'customizer/styles.php' );
	
    // Include Welcome page
	if ( is_admin() ) {
		patricia_lite_require_file( PATRICIA_LITE_CORE_PATH . 'welcome-screen/class-patricia-admin.php' );
	}
	
    // Load Functions
	patricia_lite_require_file( PATRICIA_LITE_CORE_FUNCTIONS . 'custom-header.php' );
    patricia_lite_require_file( PATRICIA_LITE_CORE_FUNCTIONS . 'template-tags.php' );
	patricia_lite_require_file( PATRICIA_LITE_CORE_FUNCTIONS . 'template-functions.php' );
    
    // Load Widgets
    patricia_lite_require_file( PATRICIA_LITE_CORE_WIDGETS . 'widget-init.php' );
    patricia_lite_require_file( PATRICIA_LITE_CORE_WIDGETS . 'vt-about-widget.php' );
    patricia_lite_require_file( PATRICIA_LITE_CORE_WIDGETS . 'vt-latest-posts-widget.php' );
}
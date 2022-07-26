<?php 
if ( ! function_exists( 'across_load_widgets' ) ) :

    /**
     * Load widgets.
     *
     * @since 1.0.0
     */
    function across_load_widgets() {

        // Slider  Posts Widget.
        register_widget( 'Across_Featured_Posts' );
    }

endif;
add_action( 'widgets_init', 'across_load_widgets' );
<?php
/**
 * Feminine Business Widget Areas
 * 
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 * @package Feminine_Business
 */

if( ! function_exists( 'feminine_business_widgets_init' ) ) :

    function feminine_business_widgets_init(){    
        $sidebars = array(
            'sidebar'   => array(
                'name'        => __( 'Sidebar', 'feminine-business' ),
                'id'          => 'sidebar', 
                'description' => __( 'Default Sidebar', 'feminine-business' ),
            ),
            'footer-one'=> array(
                'name'        => __( 'Footer One', 'feminine-business' ),
                'id'          => 'footer-one', 
                'description' => __( 'Add footer one widgets here.', 'feminine-business' ),
            ),
            'footer-two'=> array(
                'name'        => __( 'Footer Two', 'feminine-business' ),
                'id'          => 'footer-two', 
                'description' => __( 'Add footer two widgets here.', 'feminine-business' ),
            ),
            'footer-three'=> array(
                'name'        => __( 'Footer Three', 'feminine-business' ),
                'id'          => 'footer-three', 
                'description' => __( 'Add footer three widgets here.', 'feminine-business' ),
            ),
            'footer-four'=> array(
                'name'        => __( 'Footer Four', 'feminine-business' ),
                'id'          => 'footer-four', 
                'description' => __( 'Add footer four widgets here.', 'feminine-business' ),
            )
        );
        
        foreach( $sidebars as $sidebar ){
            register_sidebar( array(
                'name'          => esc_html( $sidebar['name'] ),
                'id'            => esc_attr( $sidebar['id'] ),
                'description'   => esc_html( $sidebar['description'] ),
                'before_widget' => '<section id="%1$s" class="widget %2$s">',
                'after_widget'  => '</section>',
                'before_title'  => '<h2 class="widget-title" itemprop="name">',
                'after_title'   => '</h2>',
            ) );
        }

    }
endif;
add_action( 'widgets_init', 'feminine_business_widgets_init' );
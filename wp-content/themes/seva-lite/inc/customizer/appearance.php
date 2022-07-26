<?php
/**
 * Appearance Settings
 *
 * @package Seva_Lite
 */

function seva_lite_customize_register_appearance( $wp_customize ) {
    
    $wp_customize->add_panel( 
        'appearance_settings', 
        array(
            'title'       => __( 'Appearance Settings', 'seva-lite' ),
            'priority'    => 25,
            'capability'  => 'edit_theme_options',
            'description' => __( 'Change color and body background.', 'seva-lite' ),
        ) 
    );

    /** Typography */
    $wp_customize->add_section(
        'typography_settings',
        array(
            'title'    => __( 'Typography', 'seva-lite' ),
            'priority' => 20,
            'panel'    => 'appearance_settings',
        )
    );
    
    /** Primary Font */
    $wp_customize->add_setting(
        'primary_font',
        array(
            'default'           => 'Nunito Sans',
            'sanitize_callback' => 'seva_lite_sanitize_select'
        )
    );

    $wp_customize->add_control(
        new Seva_Lite_Select_Control(
            $wp_customize,
            'primary_font',
            array(
                'label'       => __( 'Primary Font', 'seva-lite' ),
                'description' => __( 'Primary font of the site.', 'seva-lite' ),
                'section'     => 'typography_settings',
                'choices'     => seva_lite_get_all_fonts(), 
            )
        )
    );
    
    /** Secondary Font */
    $wp_customize->add_setting(
        'secondary_font',
        array(
            'default'           => 'DM Serif Display',
            'sanitize_callback' => 'seva_lite_sanitize_select'
        )
    );

    $wp_customize->add_control(
        new Seva_Lite_Select_Control(
            $wp_customize,
            'secondary_font',
            array(
                'label'       => __( 'Secondary Font', 'seva-lite' ),
                'description' => __( 'Secondary font of the site.', 'seva-lite' ),
                'section'     => 'typography_settings',
                'choices'     => seva_lite_get_all_fonts(), 
            )
        )
    );

    /** Font Size*/
    $wp_customize->add_setting( 
        'font_size', 
        array(
            'default'           => 18,
            'sanitize_callback' => 'seva_lite_sanitize_number_absint'
        ) 
    );
    
    $wp_customize->add_control(
        new Seva_Lite_Slider_Control( 
            $wp_customize,
            'font_size',
            array(
                'section'     => 'typography_settings',
                'label'       => __( 'Font Size', 'seva-lite' ),
                'description' => __( 'Change the font size of your site.', 'seva-lite' ),
                'choices'     => array(
                    'min'   => 10,
                    'max'   => 50,
                    'step'  => 1,
                )                 
            )
        )
    );

    $wp_customize->add_setting(
        'ed_localgoogle_fonts',
        array(
            'default'           => false,
            'sanitize_callback' => 'seva_lite_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        new Seva_Lite_Toggle_Control( 
            $wp_customize,
            'ed_localgoogle_fonts',
            array(
                'section'       => 'typography_settings',
                'label'         => __( 'Load Google Fonts Locally', 'seva-lite' ),
                'description'   => __( 'Enable to load google fonts from your own server instead from google\'s CDN. This solves privacy concerns with Google\'s CDN and their sometimes less-than-transparent policies.', 'seva-lite' )
            )
        )
    );   

    $wp_customize->add_setting(
        'ed_preload_local_fonts',
        array(
            'default'           => false,
            'sanitize_callback' => 'seva_lite_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        new Seva_Lite_Toggle_Control( 
            $wp_customize,
            'ed_preload_local_fonts',
            array(
                'section'       => 'typography_settings',
                'label'         => __( 'Preload Local Fonts', 'seva-lite' ),
                'description'   => __( 'Preloading Google fonts will speed up your website speed.', 'seva-lite' ),
                'active_callback' => 'seva_lite_ed_localgoogle_fonts'
            )
        )
    );   

    ob_start(); ?>
        
        <span style="margin-bottom: 5px;display: block;"><?php esc_html_e( 'Click the button to reset the local fonts cache', 'seva-lite' ); ?></span>
        
        <input type="button" class="button button-primary seva-lite-flush-local-fonts-button" name="seva-lite-flush-local-fonts-button" value="<?php esc_attr_e( 'Flush Local Font Files', 'seva-lite' ); ?>" />
    <?php
    $seva_lite_flush_button = ob_get_clean();

    $wp_customize->add_setting(
        'ed_flush_local_fonts',
        array(
            'sanitize_callback' => 'wp_kses_post',
        )
    );
    
    $wp_customize->add_control(
        'ed_flush_local_fonts',
        array(
            'label'         => __( 'Flush Local Fonts Cache', 'seva-lite' ),
            'section'       => 'typography_settings',
            'description'   => $seva_lite_flush_button,
            'type'          => 'hidden',
            'active_callback' => 'seva_lite_ed_localgoogle_fonts'
        )
    );
    
    /** Move Background Image section to appearance panel */
    $wp_customize->get_section( 'colors' )->panel              = 'appearance_settings';
    $wp_customize->get_section( 'colors' )->priority           = 10;
    $wp_customize->get_section( 'background_image' )->panel    = 'appearance_settings';
    $wp_customize->get_section( 'background_image' )->priority = 15;
  
}
add_action( 'customize_register', 'seva_lite_customize_register_appearance' );
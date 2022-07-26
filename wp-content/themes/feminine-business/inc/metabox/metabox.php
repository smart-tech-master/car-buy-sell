<?php 
/**
* Feminine Business Metabox for Sidebar Layout
*
* @package Feminine_Business
*
*/ 
if( ! function_exists( 'feminine_business_add_sidebar_layout_box' ) ) :

function feminine_business_add_sidebar_layout_box(){
    $postID         = isset( $_GET['post'] ) ? $_GET['post'] : '';
    $shop_id        = get_option( 'woocommerce_shop_page_id' );
    $template       = get_post_meta( $postID, '_wp_page_template', true );
    $page_templates = array( 'templates/contact.php' );

    /**
     * Remove sidebar metabox in specific page template.
    */
    if( ! in_array( $template, $page_templates ) && ( $shop_id != $postID ) ){
        add_meta_box( 
            'fbp_sidebar_layout',
            __( 'Sidebar Layout', 'feminine-business' ),
            'fbp_sidebar_layout_callback', 
            array( 'page','post'),
            'normal',
            'high'
        );
    }
}
endif;
add_action( 'add_meta_boxes', 'feminine_business_add_sidebar_layout_box' );

$fbp_sidebar_layout = array(    
    'default-sidebar'=> array(
    	 'value'     => 'default-sidebar',
    	 'label'     => __( 'Default Sidebar', 'feminine-business' ),
    	 'thumbnail' => get_template_directory_uri() . '/images/sidebar/general-default.jpg'
   	),
    'no-sidebar'     => array(
    	 'value'     => 'no-sidebar',
    	 'label'     => __( 'Full Width', 'feminine-business' ),
    	 'thumbnail' => get_template_directory_uri() . '/images/sidebar/general-full.jpg'
    ),
    'left-sidebar' => array(
         'value'     => 'left-sidebar',
    	 'label'     => __( 'Left Sidebar', 'feminine-business' ),
    	 'thumbnail' => get_template_directory_uri() . '/images/sidebar/general-left.jpg'         
    ),
    'right-sidebar' => array(
         'value'     => 'right-sidebar',
    	 'label'     => __( 'Right Sidebar', 'feminine-business' ),
    	 'thumbnail' => get_template_directory_uri() . '/images/sidebar/general-right.jpg'         
     )    
);

if( ! function_exists( 'fbp_sidebar_layout_callback' ) ) :

function fbp_sidebar_layout_callback(){
    global $post , $fbp_sidebar_layout;
    wp_nonce_field( basename( __FILE__ ), 'fbp_sidebar_nonce' );
    ?>     
    <table class="form-table">
        <tr>
            <td colspan="4"><em class="f13"><?php esc_html_e( 'Choose Sidebar Template', 'feminine-business' ); ?></em></td>
        </tr>    
        <tr>
            <td>
                <?php  
                    foreach( $fbp_sidebar_layout as $field ){  
                        $layout = get_post_meta( $post->ID, '_fbp_sidebar_layout', true ); ?>
                        <div class="hide-radio radio-image-wrapper" style="float:left; margin-right:30px;">
                            <input id="<?php echo esc_attr( $field['value'] ); ?>" type="radio" name="fbp_sidebar_layout" value="<?php echo esc_attr( $field['value'] ); ?>" <?php checked( $field['value'], $layout ); if( empty( $layout ) ){ checked( $field['value'], 'default-sidebar' ); }?>/>
                            <label class="description" for="<?php echo esc_attr( $field['value'] ); ?>">
                                <img src="<?php echo esc_url( $field['thumbnail'] ); ?>" alt="<?php echo esc_attr( $field['label'] ); ?>" />                               
                            </label>
                        </div>
                        <?php 
                    } // end foreach 
                ?>
                <div class="clear"></div>
            </td>
        </tr>
    </table>
 <?php 
}
endif; 

if( ! function_exists( 'feminine_business_save_sidebar_layout' ) ) :

function feminine_business_save_sidebar_layout( $post_id ){
    global $fbp_sidebar_layout;

    // Verify the nonce before proceeding.
    if( !isset( $_POST[ 'fbp_sidebar_nonce' ] ) || !wp_verify_nonce( $_POST[ 'fbp_sidebar_nonce' ], basename( __FILE__ ) ) )
        return;
    
    // Stop WP from clearing custom fields on autosave
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )  
        return;
    
    $layout = isset( $_POST['fbp_sidebar_layout'] ) ? sanitize_key( $_POST['fbp_sidebar_layout'] ) : 'default-sidebar';

    if( array_key_exists( $layout, $fbp_sidebar_layout ) ){
        update_post_meta( $post_id, '_fbp_sidebar_layout', $layout );
    }else{
        delete_post_meta( $post_id, '_fbp_sidebar_layout' );
    }
      
}
endif;
add_action( 'save_post' , 'feminine_business_save_sidebar_layout' );
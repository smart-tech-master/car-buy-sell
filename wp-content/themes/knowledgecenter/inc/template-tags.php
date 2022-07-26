<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package knowledgecenter
 */

// Customizer Navigation menu
function knowledgecenter_menu_nav_classes( $classes ) {

	$option = get_option( 'knowledgecenter_settings', '' );
	$space  = ! empty( $option['menu_space'] ) ? '' : ' is-spaced';
	$shadow = ! empty( $option['menu_shadow'] ) ? '' : ' has-shadow';
	$fixed  = ! empty( $option['menu_fixed'] ) ? ' is-fixed-top' : '';

	$classes .= $space . $shadow . $fixed;

	return $classes;
}

add_filter( 'knowledgecenter_menu_nav_classes', 'knowledgecenter_menu_nav_classes' );


// Insert custom field for menu item
function knowledgecenter_menu_item_custom_fields( $item_id, $item ) {
	wp_nonce_field( 'knowledgecenter_menu_meta_nonce', '_knowledgecenter_menu_meta_nonce' );
	$menu_meta            = get_post_meta( $item_id, '_knowledgecenter_menu_meta', true );
	$item_type            = isset( $menu_meta['item-type'] ) ? $menu_meta['item-type'] : '';
	$button_type          = isset( $menu_meta['button-type'] ) ? $menu_meta['button-type'] : '';
	$button_type_outlined = isset( $menu_meta['button-type-outlined'] ) ? $menu_meta['button-type-outlined'] : '';
	do_action( 'knowledgecenter_menu_item_fields_before', $item_id, $item );
	?>
	<p class="field-item-type description description-thin field-custom-extension-menu">
		<input type="hidden" class="nav-menu-id" value="<?php echo esc_attr( $item_id ); ?>"/>
		<label for="edit-menu-item-type-<?php echo esc_attr( $item_id ); ?>">
			<?php esc_attr_e( "Item Appearance", 'knowledgecenter' ); ?><br>
			<select name="knowledgecenter_menu_meta[<?php echo esc_attr( $item_id ); ?>][item-type]"
			        id="knowledgecenter-menu-meta-for-<?php echo esc_attr( $item_id ); ?>">
				<option value="link" <?php selected( $item_type, 'link' ); ?>><?php esc_html_e( "Default", 'knowledgecenter' ); ?></option>
				<option value="button" <?php selected( $item_type, 'button' ); ?>><?php esc_html_e( "Button", 'knowledgecenter' ); ?></option>
				<option value="divider" <?php selected( $item_type, 'divider' ); ?>><?php esc_html_e( "Divider", 'knowledgecenter' ); ?></option>
				<option value="dropdown" <?php selected( $item_type, 'dropdown' ); ?>><?php esc_html_e( "Dropdown right", 'knowledgecenter' ); ?></option>
			</select>
		</label>

	</p>

	<p class="field-item-type-button description description-thin field-custom-extension-menu" style="display: none;">
		<label for="edit-menu-item-type-button-<?php echo esc_attr( $item_id ); ?>">
			<?php esc_attr_e( "Button Color", 'knowledgecenter' ); ?><br>
			<select name="knowledgecenter_menu_meta[<?php echo esc_attr( $item_id ); ?>][button-type]"
			        id="knowledgecenter-menu-type-button-for-<?php echo esc_attr( $item_id ); ?>">
				<option value="" <?php selected( $button_type, '' ); ?>><?php esc_html_e( "Default", 'knowledgecenter' ); ?></option>
				<option value="is-primary" <?php selected( $button_type, 'is-primary' ); ?>><?php esc_html_e( "Primary", 'knowledgecenter' ); ?></option>
				<option value="is-info" <?php selected( $button_type, 'is-info' ); ?>><?php esc_html_e( "Blue", 'knowledgecenter' ); ?></option>
				<option value="is-success" <?php selected( $button_type, 'is-success' ); ?>><?php esc_html_e( "Green", 'knowledgecenter' ); ?></option>
				<option value="is-warning" <?php selected( $button_type, 'is-warning' ); ?>><?php esc_html_e( "Yellow", 'knowledgecenter' ); ?></option>
				<option value="is-danger" <?php selected( $button_type, 'is-danger' ); ?>><?php esc_html_e( "Red", 'knowledgecenter' ); ?></option>
				<option value="is-white" <?php selected( $button_type, 'is-white' ); ?>><?php esc_html_e( "White", 'knowledgecenter' ); ?></option>
				<option value="is-light" <?php selected( $button_type, 'is-light' ); ?>><?php esc_html_e( "Light", 'knowledgecenter' ); ?></option>
				<option value="is-dark" <?php selected( $button_type, 'is-dark' ); ?>><?php esc_html_e( "Dark", 'knowledgecenter' ); ?></option>
				<option value="is-black" <?php selected( $button_type, 'is-black' ); ?>><?php esc_html_e( "Black", 'knowledgecenter' ); ?></option>
			</select>
		</label>
	</p>

	<p class="field-item-type-button description field-custom-extension-menu" style="display: none;">
		<label for="edit-menu-item-type-button-outlined-<?php echo esc_attr( $item_id ); ?>">
			<input type="checkbox" id="edit-menu-item-type-button-outlined-<?php echo esc_attr( $item_id ); ?>"
			       value="1"
			       name="knowledgecenter_menu_meta[<?php echo esc_attr( $item_id ); ?>][button-type-outlined]"<?php checked( $button_type_outlined ); ?>>
			<?php esc_attr_e( "Outlined", 'knowledgecenter' ); ?>
		</label>
	</p>
	<?php
	do_action( 'knowledgecenter_menu_item_fields_after', $item_id, $item );
}

add_action( 'wp_nav_menu_item_custom_fields', 'knowledgecenter_menu_item_custom_fields', 10, 2 );


// Saved custom field for menu item
function knowledgecenter_menu_items_update( $menu_id, $menu_item_db_id ) {

	// Verify this came from our screen and with proper authorization.
	if ( ! isset( $_POST['_knowledgecenter_menu_meta_nonce'] ) || ! wp_verify_nonce( $_POST['_knowledgecenter_menu_meta_nonce'], 'knowledgecenter_menu_meta_nonce' ) ) {
		return $menu_id;
	}

	if ( isset( $_POST['knowledgecenter_menu_meta'][ $menu_item_db_id ] ) ) {
		$sanitized_data = map_deep( $_POST['knowledgecenter_menu_meta'][ $menu_item_db_id ], 'sanitize_text_field' );
		update_post_meta( $menu_item_db_id, '_knowledgecenter_menu_meta', $sanitized_data );
	} else {
		delete_post_meta( $menu_item_db_id, '_knowledgecenter_menu_meta' );
	}
}

add_action( 'wp_update_nav_menu_item', 'knowledgecenter_menu_items_update', 10, 2 );

// Filter for right dropdown in navigation menu
function knowledgecenter_menu_item_dropdown_right( $output, $item_id ) {
	$menu_meta = get_post_meta( $item_id, '_knowledgecenter_menu_meta', true );
	$item_type = isset( $menu_meta['item-type'] ) ? $menu_meta['item-type'] : '';
	if ( $item_type === 'dropdown' ) {
		$output .= ' is-right ';
	}

	return $output;

}

add_filter( 'knowledgecenter_menu_dropdown_right', 'knowledgecenter_menu_item_dropdown_right', 10, 2 );
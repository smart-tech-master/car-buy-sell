<?php


if (!class_exists('WP_Customize_Control')) {
    return null;
}




function vinyl_news_mag_sanitize_image($image, $setting)
{
    $type = [
        'jpg|jpeg|jpe' => 'image/jpeg',
        'gif' => 'image/gif',
        'png' => 'image/png',
        'bmp' => 'image/bmp',
        'tif|tiff' => 'image/tiff',
        'ico' => 'image/x-icon',
    ];
    $file = wp_check_filetype($image, $type);
    return $file['ext'] ? $image : $setting->default;
}

function vinyl_news_mag_sanitize_url($url)
{
    return esc_url_raw($url);
}
function vinyl_news_mag_sanitize_select($input, $setting)
{
    $input = sanitize_key($input);

    $choices = $setting->manager->get_control($setting->id)->choices;

    return array_key_exists($input, $choices) ? $input : $setting->default;
}




/**
 * Multiselect option for WP Customizer
 *
 * @param $wp_customize
 */

	class vinyl_news_mag_Customize_Control_Multiple_Select extends \WP_Customize_Control {

		/**
		 * The type of customize control being rendered.
		 */
		public $type = 'multiple-select';

		/**
		 * Displays the multiple select on the customize screen.
		 */
		public function render_content() {

			if ( empty( $this->choices ) ) {
				return;
			}
			?>
            <label>
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <select <?php $this->link(); ?> multiple="multiple" style="height: 100%;">
					<?php
					foreach ( $this->choices as $value => $label ) {
						$selected = ( in_array( $value, $this->value() ) ) ? selected( 1, 1, false ) : '';
						echo '<option value="' . esc_attr( $value ) . '"' . $selected . '>' . $label . '</option>';
					}
					?>
                </select>
            </label>
		<?php }
	}


/**
 * Get all categories
 * 
 * @return array
 */
function vinyl_news_mag_get_categories() {
	$cats    = array();
	$cats[0] = 'None';
	foreach ( get_categories() as $categories => $category ) {
		$cats[ $category->term_id ] = $category->name;
	}

	return $cats;
}

/**
 * Validate the options against the existing categories
 *
 * @param  string[] $input
 *
 * @return string
 */
function vinyl_news_mag_multiple_dropdown_sanitize( $input ) {
	$valid = vinyl_news_mag_get_categories();

	foreach ( $input as $value ) {
		if ( ! array_key_exists( $value, $valid ) ) {
			return [];
		}
	}

	return $input;
}

function vinyl_news_mag_sanitize_checkbox($input)
{
    if (true === $input) {
        return 1;
    } else {
        return 0;
    }
}

//radio box sanitization function
function vinyl_news_mag_sanitize_radio( $input, $setting ){

    //input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
    $input = sanitize_key($input);

    //get the list of possible radio box options
    $choices = $setting->manager->get_control( $setting->id )->choices;

    //return input if valid or return default option
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

}

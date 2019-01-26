<?php
/**
 * Storefront functions.
 *
 * @package fashe
 */

if ( ! function_exists( 'fashe_is_woocommerce_activated' ) ) {
    /**
     * Query WooCommerce activation
     */
    function fashe_is_woocommerce_activated() {
        return class_exists( 'WooCommerce' ) ? true : false;
    }
}

/**
 * Call a shortcode function by tag name.
 *
 * @since  1.4.6
 *
 * @param string $tag     The shortcode whose function to call.
 * @param array  $atts    The attributes to pass to the shortcode function. Optional.
 * @param array  $content The shortcode's content. Default is null (none).
 *
 * @return string|bool False on failure, the result of the shortcode on success.
 */
function fashe_do_shortcode( $tag, array $atts = array(), $content = null ) {
    global $shortcode_tags;

    if ( ! isset( $shortcode_tags[ $tag ] ) ) {
        return false;
    }

    return call_user_func( $shortcode_tags[ $tag ], $atts, $content, $tag );
}

/**
 * Apply inline style to the Storefront homepage content.
 *
 * @uses  get_the_post_thumbnail_url()
 * @since  2.2.0
 */
function fashe_homepage_content_styles() {
    $featured_image   = get_the_post_thumbnail_url( get_the_ID() );
    $background_image = '';

    if ( $featured_image ) {
        $background_image = 'url(' . esc_url( $featured_image ) . ')';
    }

    $styles = array();

    if ( '' !== $background_image ) {
        $styles['background-image'] = $background_image;
    }

    $styles = apply_filters( 'fashe_homepage_content_styles', $styles );

    foreach ( $styles as $style => $value ) {
        echo esc_attr( $style . ': ' . $value . '; ' );
    }
}

/**
 * Sanitizes choices (selects / radios)
 * Checks that the input matches one of the available choices
 *
 * @param array $input the available choices.
 * @param array $setting the setting object.
 * @since  1.3.0
 */
function fashe_sanitize_choices( $input, $setting ) {
    // Ensure input is a slug.
    $input = sanitize_key( $input );

    // Get list of choices from the control associated with the setting.
    $choices = $setting->manager->get_control( $setting->id )->choices;

    // If the input is a valid key, return it; otherwise, return the default.
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

/**
 * Checkbox sanitization callback.
 *
 * Sanitization callback for 'checkbox' type controls. This callback sanitizes `$checked`
 * as a boolean value, either TRUE or FALSE.
 *
 * @param bool $checked Whether the checkbox is checked.
 * @return bool Whether the checkbox is checked.
 * @since  1.5.0
 */
function fashe_sanitize_checkbox( $checked ) {
    return ( ( isset( $checked ) && true === $checked ) ? true : false );
}


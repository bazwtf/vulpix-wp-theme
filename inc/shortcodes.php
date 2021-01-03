<?php
defined( 'ABSPATH' ) or die( 'Vulpix, use Flamethrower!' );
/**
 * Theme shortcodes
 *
 * @package Vulpix
 * @since Vulpix 1.0.0
 */

/**
 * Button link shortcode
 *
 * This shortcode generates a link wrapped in `btn` classes so that it can be styled as a button
 *
 * @since 1.0.0
 * @param $atts
 * @return string
 */
function vpx_shortcode_button( $atts ) {

    // Get attributes
    $atts = shortcode_atts(
        [
            'url'   => '', // string | URL for the link to use
            'text'  => 'Submit', // string | Text label for the button link
            'echo'  => true, // boolean | choose whether to echo or not
            'type'  => 'link', // string | Future value to change object type
            'class' => '' // string | Option to pass in additional CSS Classes
        ],
        $atts
    );

    // If no is passed through or if the URL is invalid then return empty
    if ( ! $atts['url'] || false === filter_var( $atts['url'], FILTER_VALIDATE_URL ) ) {
        return '';
    }

    // Build HTML object
    $button = sprintf(
        '<div class="btn-container">
            <a class="%1$s" href="%2$s">%3$s</a>
        </div>',
        ( ! $atts['class'] ? 'btn' : 'btn ' . esc_attr ( $atts['class'] ) ),
        esc_url( $atts['url'] ),
        esc_html( __( $attr['text'], 'vulpix' ) )
    );

    return vpx_return_string_handler( $button, $atts['echo'] );
}
add_shortcode( 'button', 'vpx_shortcode_button' );

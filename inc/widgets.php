<?php
defined( 'ABSPATH' ) or die( 'Vulpix, use Flamethrower!' );
/**
 * Theme widgets
 *
 * @package Vulpix
 * @since Vulpix 1.0.0
 */

/**
 * Class vpx_panel_widget
 *
 * @since 1.0.0
 */
class vpx_panel_widget extends WP_Widget {

    /**
     * vpx_panel_widget constructor
     *
     * @since 1.0.0
     * @return void
     */
    function __construct() {
        parent::__construct(
            'vpx_panel_widget',
            __( 'Info panel', 'vulpix' ),
            [
                'description' => __( 'Simple panel component for displaying a call to action', 'vulpix' ),
            ]
        );
    }

    /**
     * vpx_panel_widget front-end
     *
     * @since 1.0.0
     * @param array $args
     * @param array $instance
     * @return void
     */
    public function widget( $args, $instance ) {

        echo $args['before_widget'];

        // Panel Title
        $title = __( $instance['vpx_widget_info_title'], 'vulpix' );
        if ( ! empty( $title ) ) {
            echo $args['before_title'] . $title . $args['after_title'];
        }

        // Panel Text
        $text = __( $instance['vpx_widget_info_text'], 'vulpix' );
        if ( ! empty( $text ) ) {
            $text = sprintf('<p class="widget--text panel--text">%s</p>', esc_html( $text ) );
            echo $text;
        }

        // Panel Button
        $button_label = __( $instance['vpx_widget_info_button_label'], 'vulpix' );
        if ( $button_label && false !== filter_var( $instance['vpx_widget_info_button_url'], FILTER_VALIDATE_URL ) ) {
            $button = do_shortcode( '[button text="' . esc_attr( $button_label ) . '" url="' . esc_url( $instance['vpx_widget_info_button_url'] ) . '"]' );
            echo $button;
        }

        echo $args['after_widget'];
    }

    /**
     * vpx_panel_widget backend
     *
     * @since 1.0.0
     * @param array $instance
     * @return string|void
     */
    public function form( $instance ) {

        /**
         * vpx_panel_widget admin form
         */

        /** Panel Title */
        // Set panel title value
        if ( isset( $instance[ 'vpx_widget_info_title' ] ) ) {
            $title = $instance[ 'vpx_widget_info_title' ];
        }
        else {
            $title = __( 'New title', 'vulpix' );
        }

        // Construct panel title form input
        printf(
            '<p>
                <label for="%1$s">%2$s</label>
                <input class="widefat" id="%1$s" name="%3$s" type="text" value="%4$s" />
            </p>',
            $this->get_field_id( 'vpx_widget_info_title' ),
            __( 'Panel Title: ', 'vulpix' ),
            $this->get_field_name( 'vpx_widget_info_title' ),
            esc_attr( $title )
        );

        /** Panel Text */
        // Set panel text value
        if ( isset( $instance[ 'vpx_widget_info_text' ] ) ) {
            $text = $instance[ 'vpx_widget_info_text' ];
        }
        else {
            $text = __( 'New paragraph', 'vulpix' );
        }

        // Construct panel text form input
        printf(
            '<p>
                <label for="%1$s">%2$s</label>
                <input class="widefat" id="%1$s" name="%3$s" type="text" value="%4$s" />
            </p>',
            $this->get_field_id( 'vpx_widget_info_text' ),
            __( 'Panel Text: ', 'vulpix' ),
            $this->get_field_name( 'vpx_widget_info_text' ),
            esc_attr( $text )
        );


        /** Panel Button */
        // Set panel button label value
        if ( isset( $instance[ 'vpx_widget_info_button_label' ] ) ) {
            $label = $instance[ 'vpx_widget_info_button_label' ];
        }
        else {
            $label = __( 'New button label', 'vulpix' );
        }

        // Construct panel button label input
        printf(
            '<p>
                <label for="%1$s">%2$s</label>
                <input class="widefat" id="%1$s" name="%3$s" type="text" value="%4$s" />
            </p>',
            $this->get_field_id( 'vpx_widget_info_button_label' ),
            __( 'Button Label: ', 'vulpix' ),
            $this->get_field_name( 'vpx_widget_info_button_label' ),
            esc_attr( $label )
        );

        // Set panel button URL value
        if ( isset( $instance[ 'vpx_widget_info_button_url' ] ) ) {
            $url = $instance[ 'vpx_widget_info_button_url' ];
        }
        else {
            $url = 'https://privacytools.io';
        }

        // Construct panel button URL input
        printf(
            '<p>
                <label for="%1$s">%2$s</label>
                <input class="widefat" id="%1$s" name="%3$s" type="url" value="%4$s" />
            </p>',
            $this->get_field_id( 'vpx_widget_info_button_url' ),
            __( 'Button URL: ', 'vulpix' ),
            $this->get_field_name( 'vpx_widget_info_button_url' ),
            esc_attr( $url )
        );
    }

    /**
     * Update vpx_panel_widget replacing old instances with new
     *
     * @since 1.0.0
     * @param array $new_instance
     * @param array $old_instance
     * @return array
     */
    public function update( $new_instance, $old_instance ) {
        $instance = [];
        $instance['vpx_widget_info_title'] = ( ! empty( $new_instance['vpx_widget_info_title'] ) ) ? strip_tags( $new_instance['vpx_widget_info_title'] ) : '';
        $instance['vpx_widget_info_text'] = ( ! empty( $new_instance['vpx_widget_info_text'] ) ) ? strip_tags( $new_instance['vpx_widget_info_text'] ) : '';
        $instance['vpx_widget_info_button_label'] = ( ! empty( $new_instance['vpx_widget_info_button_label'] ) ) ? strip_tags( $new_instance['vpx_widget_info_button_label'] ) : '';
        $instance['vpx_widget_info_button_url'] = ( ! empty( $new_instance['vpx_widget_info_button_url'] ) ) ? strip_tags( $new_instance['vpx_widget_info_button_url'] ) : '';
        return $instance;
    }
}

/**
 * Register and load the widgets
 *
 * @since 1.0.0
 * @return void
 */
function vpx_load_widgets() {
    register_widget( 'vpx_panel_widget' );
}
add_action( 'widgets_init', 'vpx_load_widgets' );

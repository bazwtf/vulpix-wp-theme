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
                'description' => __( 'Sample widget based on WPBeginner Tutorial', 'vulpix' ),
            ]
        );
    }

    /**
     * Widget front-end
     *
     * @since 1.0.0
     * @param array $args
     * @param array $instance
     * @return void
     */
    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['vpx_widget_info_title'] );

        echo $args['before_widget'];
        if ( ! empty( $title ) ) {
            echo $args['before_title'] . $title . $args['after_title'];
        }

        // Panel Text
        $text = apply_filters( 'widget_text', $instance['vpx_widget_info_text'] );

        echo $text;
        // Panel Button
        // TODO: Content for widget ouput
        echo __( 'Hello, World!', 'vulpix' );

        echo $args['after_widget'];
    }

    /**
     * Widget backend
     *
     * @since 1.0.0
     * @param array $instance
     * @return string|void
     */
    public function form( $instance ) {

        /**
         * Widget admin form
         */

        // Panel Title
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

        // Panel Text
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


        // Panel Button
    }

    /**
     * Update widget replacing old instances with new
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
        return $instance;
    }
}

/**
 * Register and load the widget
 *
 * @since 1.0.0
 * @return void
 */
function vpx_load_widget() {
    register_widget( 'vpx_panel_widget' );
}
add_action( 'widgets_init', 'vpx_load_widget' );
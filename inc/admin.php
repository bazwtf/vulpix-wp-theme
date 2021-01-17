<?php
defined( 'ABSPATH' ) or die( 'Vulpix, use Flamethrower!' );
/**
 * Admin
 *
 * @package Vulpix
 * @since Vulpix 1.0.0
 */

// TODO: Add method for adding images to WP_Options

/**
 * Sets up the theme options page.
 *
 * @since 1.0.0
 * @return void
 */
function vpx_theme_options_page() {
    ?>
    <div class="wrap custom-options">
        <header class="custom-options__header">
            <img alt="Vulpix theme screenshot" src="<?php echo esc_url( VULPIX_ROOT_URI ); ?>/screenshot.png" />
            <h1><?php echo __( 'Theme Options', 'vulpix' ); ?></h1>
        </header>
        <form method="post" action="options.php">
            <?php
            settings_fields( 'vpx-admin-options' );
            do_settings_sections( 'vpx-admin-options' );
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

/**
 * Adds the theme options page to the WP admin sidebar.
 *
 * @since 1.0.0
 * @return void
 */
function vpx_add_theme_options() {

    add_menu_page(
        'Vulpix Options',
        'Vulpix Options',
        'manage_options',
        'vpx-admin-options',
        'vpx_theme_options_page',
        'dashicons-layout',
        99
    );

    add_action( 'admin_init', 'vpx_admin_option_section' );
}
add_action( 'admin_menu', 'vpx_add_theme_options' );

/**
 * Registers the theme options.
 *
 * @since 1.0.0
 * @return void
 */
function vpx_admin_option_section() {

    /** Register options */
    register_setting( 'vpx-admin-options', 'vpx_disclaimer', 'esc_attr' );

    /** Newsletters > Default brand */
    add_settings_field(
        'vpx_disclaimer',
        'Text',
        'vpx_callback_textbox',
        'vpx-admin-options',
        'vpx_settings_sso',
        [ 'vpx_disclaimer' ]
    );


    /**
     * Other Options
     */

    add_settings_section(
        'vpx_settings_other',
        '<span class="dashicons dashicons-admin-generic"></span> Other Settings',
        '',
        'vpx-admin-options'
    );

}

/**
 * Displays a text field in the theme options form.
 *
 * @since 1.0.0
 * @param array $args The text field ID.
 * @return void
 */
function vpx_callback_textbox( $args ) {
    printf(
        '<input type="text" id="%1$s" name="%1$s" value="%2$s" />',
        esc_attr( $args[0] ),
        esc_attr( get_option( $args[0] ) )
    );
}

/**
 * Displays a number input field in the theme options form.
 *
 * @since 1.0.0
 * @param array $args The number field ID.
 * @return void
 */
function vpx_callback_number( $args ) {
    printf(
        '<input type="number" id="%1$s" name="%1$s" value="%2$s" step="1" min="1" max="20" />',
        esc_attr( $args[0] ),
        esc_attr( get_option( $args[0] ) )
    );
}

/**
 * Displays a checkbox field in the theme options form.
 *
 * @since 1.0.0
 * @param array $args The checkbox field ID.
 * @return void
 */
function vpx_callback_checkbox( $args ) {
    printf(
        '<input type="checkbox" id="%1$s" name="%1$s" value="1" %2$s />',
        esc_attr( $args[0] ),
        checked( 1, esc_attr( get_option( $args[0] ) ), false )
    );
}

/**
 * Displays a select field in the theme options form, with Prebid option handling.
 *
 * @since 1.0.0
 * @param array $args The select field options, and options ID.
 * @return void
 */
function vpx_callback_select( $args ) {

    // If options exist, and options ID/name is set
    if ( array_key_exists( 'options', $args ) && array_key_exists( 'options_id', $args ) ) {

        // Retrieves old setting
        $option_prev = get_option( $args['options_id'] );

        $options = '';

        // Loop through Options array
        foreach ( $args['options'] as $key => $val ) {

            $options .= sprintf(
                '<option value="%1$s" %2$s>%3$s</option>',
                esc_attr( $key ),
                selected( $key, $option_prev, false ),
                esc_html( $val )
            );
        }

        // Build <select> tag
        $select = sprintf(
            '<select id="%1$s" name="%1$s">%2$s</select>',
            esc_attr( $args['options_id'] ),
            $options
        );

        echo $select;
    }
}

<?php
defined( 'ABSPATH' ) or die( 'Vulpix, use Flamethrower!' );
/**
 * Plugin integrations
 *
 * @package Vulpix
 * @since Vulpix 1.0.0
 */

if ( ! function_exists( 'vpx_acf_message' ) ) {
	/**
	 * Check for Advanced Custom Fields plugin
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	function vpx_acf_message() {

		// If the current user cannot activate plugins then return
		if ( ! current_user_can( 'activate_plugins' ) ) {
			return;
		}

		// Check for Advanced Custom Fields (ACF)
		if ( ! vpx_is_plugin_active(VPX_ACF ) ) {

			// If ACF is not installed
			vpx_admin_msg( 'Plugin: Advanced Custom Fields Pro is not enabled. This plugin is required for this theme.', 'error', false );
		}
	}
	add_action( 'admin_notices', 'vpx_acf_message' );
}

// TODO: Write and a basket function for WooCommerece
function vpx_the_basket() {

    // Check to see if WooCommerce is active
    if ( ! vpx_is_plugin_active( VPX_WOO ) ) {


        return '';
    }

    return '';
}

<?php
defined( 'ABSPATH' ) or die( 'Vulpix, use Flamethrower!' );
/**
 * Plugin integrations
 *
 * @package Vulpix
 * @since Vulpix 1.0.0
 */


// TODO: Write and a basket function for WooCommerece
function vpx_the_basket() {

    // Check to see if WooCommerce is active
    if ( ! vpx_is_plugin_active( 'woocommerce/woocommerce.php' ) ) {
        return '';
    }

    return '';
}

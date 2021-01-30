<?php
defined( 'ABSPATH' ) or die( 'Vulpix, use Flamethrower!' );
/**
 * Hero block template
 *
 * @package Vulpix
 * @since Vulpix 1.0.0
 */
echo 'hello';
// Check to see if ACF is active
if ( ! vpx_is_plugin_active( 'advanced-custom-fields/acf.php' ) ) {
    return vpx_admin_msg( 'Plugin: "Advanced Custom Fields" is not active', 'warning' );
}

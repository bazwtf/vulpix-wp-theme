<?php
defined( 'ABSPATH' ) or die( 'Vulpix, use Flamethrower!' );
/**
 * Hero block template
 *
 * @package Vulpix
 * @since Vulpix 1.0.0
 */

// Check to see if ACF is active
if ( ! is_plugin_active( 'advanced-custom-fields/acf.php' ) ) {
    return '';
}
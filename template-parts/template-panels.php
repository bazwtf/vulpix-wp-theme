<?php
defined( 'ABSPATH' ) or die( 'Vulpix, use Flamethrower!' );
/**
 * Panels template part
 *
 * @package Vulpix
 * @since Vulpix 1.0.0
 */

echo '<div class="grid">';

vpx_sidebar( 'sidebar-footer-left', 'col-sm-4' );
vpx_sidebar( 'sidebar-footer-center', 'col-sm-4' );
vpx_sidebar( 'sidebar-footer-right', 'col-sm-4' );

echo '</div>';
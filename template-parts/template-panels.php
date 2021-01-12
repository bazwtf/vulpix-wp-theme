<?php
defined( 'ABSPATH' ) or die( 'Vulpix, use Flamethrower!' );
/**
 * Panels template part
 *
 * @package Vulpix
 * @since Vulpix 1.0.0
 */

echo '<div class="grid">';

// Get `sidebar-footer-left`
vpx_sidebar( 'sidebar-footer-left', 'col-sm-4' );

// Get `sidebar-footer-center`
vpx_sidebar( 'sidebar-footer-center', 'col-sm-4' );

// Get `sidebar-footer-right`
vpx_sidebar( 'sidebar-footer-right', 'col-sm-4' );

echo '</div>';
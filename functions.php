<?php
defined( 'ABSPATH' ) or die( 'You shall not pass!' );
/**
 * Vulpix functions and definitions
 *
 * @link https://codex.wordpress.org/Functions_File_Explained
 *
 */

/**
 * Constants
 */
define( 'VULPIX_VERSION', wp_get_theme( basename( __DIR__ ) )->get( 'Version' ) );
define( 'VULPIX_ROOT', get_template_directory() );
define( 'VULPIX_ROOT_URI', get_template_directory_uri() );

/**
 * Theme Setup
 */
function vulpix_theme_setup() {

	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', [ 'style', 'script' ] );
}
add_action( 'after_setup_theme', 'vulpix_theme_setup' );

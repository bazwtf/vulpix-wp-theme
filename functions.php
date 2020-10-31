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
 *
 * @since    1.0.0
 */
function vulpix_theme_setup() {

	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', [ 'style', 'script' ] );

	register_nav_menus(
		array(
			'main_menu'      => 'Main Menu',
			'footer_menu'    => 'Footer Menu',
			'shop_menu'      => 'Shop Menu',
		)
	);
}
add_action( 'after_setup_theme', 'vulpix_theme_setup' );


/**
 * Remove default widgets from WP.
 *
 * @since    1.0.0
 */
function vulpix_remove_default_widgets() {
	unregister_widget( 'WP_Widget_Pages' );
	unregister_widget( 'WP_Widget_Calendar' );
	unregister_widget( 'WP_Widget_Archives' );
	unregister_widget( 'WP_Widget_Links' );
	unregister_widget( 'WP_Widget_Meta' );
	unregister_widget( 'WP_Widget_Recent_Comments' );
	unregister_widget( 'WP_Widget_RSS' );
	unregister_widget( 'WP_Widget_Tag_Cloud' );
	unregister_widget( 'WP_Nav_Menu_Widget' );
	unregister_widget( 'WP_Widget_Media_Video' );
	unregister_widget( 'WP_Widget_Media_Audio' );
	unregister_widget( 'WP_Widget_Media_Gallery' );
	unregister_widget( 'WP_Widget_Custom_HTML' );
}
add_action( 'widgets_init', 'vulpix_remove_default_widgets', 11 );

/**
 * Enqueues style and script files.
 *
 * @since    1.0.0
 */
function vulpix_theme_scripts() {
	/* CSS*/

	/* Generic */
	wp_enqueue_style( 'vulpix-reset', VULPIX_ROOT_URI . '/assets/css/reset.css', null, VULPIX_VERSION );

}
add_action( 'wp_enqueue_scripts', 'vulpix_theme_scripts' );

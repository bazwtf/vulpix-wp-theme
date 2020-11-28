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

/**
 * Theme Setup
 *
 * @since    1.0.0
 */
function vulpix_theme_setup() {

	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', [ 'style', 'script' ] );

	register_nav_menus(
		[
			'main_menu'      => 'Main Menu',
			'footer_menu'    => 'Footer Menu',
			'shop_menu'      => 'Shop Menu',
		]
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
	wp_enqueue_style( 'reflex', get_theme_file_uri( '/assets/css/reflex.css' ), null, '2.0.4' );
	wp_enqueue_style( 'vulpix-reset', get_theme_file_uri( '/assets/css/reset.css' ), null, VULPIX_VERSION );
	wp_enqueue_style( 'vulpix-global', get_theme_file_uri( '/assets/css/global.css' ), null, VULPIX_VERSION );

	/* JS */
	wp_enqueue_script( 'html5shiv', get_theme_file_uri( '/assets/js/html5shiv.js' ), [ 'jquery' ], VULPIX_VERSION, true );
	wp_enqueue_script( 'vulpix-scripts', get_theme_file_uri( '/assets/js/scripts.js' ), [ 'jquery' ], VULPIX_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'vulpix_theme_scripts' );

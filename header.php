<?php
defined( 'ABSPATH' ) or die( 'You shall not pass!' );
/**
 * Header template
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @package Vulpix
 * @since Vulpix 1.0.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">

<?php get_template_part( 'template-parts/template', 'head' ); ?>

<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">
<?php do_action( 'body_open' ); ?>
<?php get_template_part( 'template-parts/template', 'site-header' ); ?>

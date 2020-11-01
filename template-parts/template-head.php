<?php
defined( 'ABSPATH' ) or die( 'You shall not pass!' );
/**
 * Head template
 *
 * @package Vulpix
 * @since Vulpix 1.0.0
 */
?>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<meta name="theme-color" content="#000000">

	<!--IE Edge -->
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<?php wp_head(); ?>
</head>

<?php
defined( 'ABSPATH' ) or die( 'Vulpix, use Flamethrower!' );
/**
 * Head template part
 *
 * @package Vulpix
 * @since Vulpix 1.0.0
 */
?>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<title><?php bloginfo( 'name' ); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<meta name="theme-color" content="#000000">

	<!--IE Edge -->
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<?php wp_head(); ?>
</head>

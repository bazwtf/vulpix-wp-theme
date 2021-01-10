<?php
defined( 'ABSPATH' ) or die( 'Vulpix, use Flamethrower!' );
/**
 * Site header template part
 *
 * @package Vulpix
 * @since Vulpix 1.0.0
 */
?>
<header id="site-header" role="banner" class="container">
    <div class="grid">
        <div class="col-md-3 col-sm-6"><?php vpx_the_logo(); ?></div>
        <div class="col-sm-3 offset-md-3"><?php vpx_the_basket(); ?></div>
        <div class="col-sm-3"><?php vpx_the_menu( 'main_menu' ); ?></div>
    </div>
</header>

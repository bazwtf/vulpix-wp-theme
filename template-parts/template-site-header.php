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
        <div class="col-md-3 col-sm-4"><?php vpx_the_logo(); ?></div>
        <div class="col-sm-2 offset-sm-4 col-md-1 offset-md-7"><?php vpx_the_basket(); ?></div>
        <div class="col-sm-2 col-md-1"><?php vpx_the_menu( 'main_menu', true ); ?></div>
    </div>
</header>

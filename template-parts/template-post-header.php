<?php
defined( 'ABSPATH' ) or die( 'Vulpix, use Flamethrower!' );
/**
 * Post header template
 *
 * @package Vulpix
 * @since Vulpix 1.0.0
 */
?>
<div class="col-10 offset-1">
    <?php
    vpx_the_category();
    vpx_the_title();
    vpx_the_post_meta();
    ?>
</div>
<div class="col-12">
    <?php vpx_the_featured_image(); ?>
</div>

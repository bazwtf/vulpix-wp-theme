<?php
defined( 'ABSPATH' ) or die( 'Vulpix, use Flamethrower!' );
/**
 * Post list template
 *
 * @package Vulpix
 * @since Vulpix 1.0.0
 */
?>
<article class="post-list col-10 offset-1">
    <div class="col-6 post-list--thumbnail">
        <?php vpx_the_post_thumbnail(); ?>
    </div>
    <div class="col-6 post-list--details">
        <?php
        the_category();
        vpx_the_post_thumbnail_title( 'h3' );
        vpx_the_post_meta();
        ?>
    </div>
</article>
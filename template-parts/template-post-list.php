<?php
defined( 'ABSPATH' ) or die( 'Vulpix, use Flamethrower!' );
/**
 * Post list template
 *
 * @package Vulpix
 * @since Vulpix 1.0.0
 */
?>
<article class="post-list container-full">
    <div class="col-6 post-list__thumbnail-container">
        <?php vpx_the_post_thumbnail(); ?>
    </div>
    <div class="col-6 post-list__details">
        <?php
        the_category();
        the_title();
        vpx_the_post_meta();
        ?>
    </div>
</article>
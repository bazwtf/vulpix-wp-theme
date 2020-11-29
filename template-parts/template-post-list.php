<?php
defined( 'ABSPATH' ) or die( 'Vulpix, use Flamethrower!' );
/**
 * Post list template
 *
 * @package Vulpix
 * @since Vulpix 1.0.0
 */
?>
<article class="col-12">
    <?php
    vpx_the_post_thumbnail();
    the_category();
    the_title();
    vpx_the_post_meta();
    ?>
</article>
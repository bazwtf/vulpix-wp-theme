<?php
defined( 'ABSPATH' ) or die( 'Vulpix, use Flamethrower!' );
/**
 * Site footer template part
 *
 * @package Vulpix
 * @since Vulpix 1.0.0
 */
?>
<footer class="site-footer container">
    <div class="grid">
        <div class="col-10 offset-1">
            <?php
            wp_nav_menu(
                [
                    'menu'   => 'footer_menu'
                ]
            );
            ?>
        </div>
        <div class="col-md-4 offset-md-4">
            <?php vpx_the_logo(); ?>
        </div>
        <div class="col-12">
            <a class="to-the-top" href="#site-header">
                <?php
                // Print the scroll to top link
                printf( __( 'To the top %s', 'vulpix' ), '<span class="arrow" aria-hidden="true">&uarr;</span>' );
                ?>
            </a>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>

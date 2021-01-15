<?php
defined( 'ABSPATH' ) or die( 'Vulpix, use Flamethrower!' );
/**
 * Archive template
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#common-wordpress-template-files
 * @package Vulpix
 * @since Vulpix 1.0.0
 */
get_header();
?>
<main role="main" class="container">
    <div class="grid">
        <?php
        // Archive title
        printf( __( '<h1 class="col-12 --center">%s</h1>', 'vulpix' ), single_cat_title( '', false ) );

        if ( have_posts() ) {
            while ( have_posts() ) {
                the_post();

                // Get post list template
                get_template_part( 'template-parts/template', 'post-list' );
            }
        }

        // Get pagination
        vpx_the_posts_navigation();
        ?>
    </div>
    <?php get_template_part( 'template-parts/template', 'archive-footer' ); ?>
</main>
<?php
get_footer();

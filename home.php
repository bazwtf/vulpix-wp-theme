<?php
defined( 'ABSPATH' ) or die();
/**
 * Home template
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#common-wordpress-template-files
 * @package Vulpix
 * @since Vulpix 1.0.0
 */

// TODO: Implement bespoke home page with options
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
                    get_template_part( 'template-parts/content/template', 'post-list' );
                }
            } else {

                // If no content
                get_template_part( 'template-parts/content/template', 'none' );
            }
            ?>
        </div>
        <?php get_template_part( 'template-parts/archive/template', 'archive-footer' ); ?>
    </main>
<?php
get_footer();

<?php
defined( 'ABSPATH' ) or die( 'Vulpix, use Flamethrower!' );
/**
 * Single template
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#common-wordpress-template-files
 * @package Vulpix
 * @since Vulpix 1.0.0
 */
get_header();
?>
<main role="main" class="container">
    <div class="grid">
        <article>
            <?php
            while ( have_posts() ) {
                the_post();
                get_template_part( 'template-parts/template', 'post-header' );
                ?>
                <div class="col-10 offset-1">
                    <?php the_content(); ?>
                </div>
                <?php
            }
            ?>
        </article>
        <?php get_template_part( 'template-parts/template', 'post-footer' ); ?>
	</div>
</main>
<?php
get_footer();

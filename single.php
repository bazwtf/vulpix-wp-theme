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
        <article class="col-sm-10 offset-1">
            <?php
            while ( have_posts() ) {
                the_post();
                get_template_part( 'template-parts/template', 'post-header' );
                the_content();
                get_template_part( 'template-parts/template', 'post-footer' );
            }
            ?>
        </article>
	</div>
</main>
<?php
get_footer();

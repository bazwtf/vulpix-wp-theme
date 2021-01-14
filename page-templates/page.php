<?php
defined( 'ABSPATH' ) or die();
/**
 * Page template
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#common-wordpress-template-files
 * @package Vulpix
 * @since Vulpix 1.0.0
 */

get_header();
?>
<main role="main" class="site-content">
	<div class="container">
		<div class="grid">
			<article class="col-10 offset-1">
				<div class="entry-content">
					<?php printf( '<h1 class="page-title --center">%s</h1>', __( get_the_title(), 'vulpix' ) ); ?>
					<?php the_content(); ?>
				</div>
			</article>
            <hr>
		</div>
        <?php get_template_part( 'template-parts/template', 'page-footer' ); ?>
	</div>
</main>
<?php
get_footer();

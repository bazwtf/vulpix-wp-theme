<?php
defined( 'ABSPATH' ) or die( 'Vulpix, use Flamethrower!' );
/**
 * 404 template
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
            <section class="error-404 not-found col-10 offset-1">
				<header class="page-header">
					<h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'vulpix' ); ?></h1>
				</header>
				<div class="page-content">
					<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'vulpix' ); ?></p>
					<?php get_search_form(); ?>
				</div>
			</section>
		</div>
        <?php get_template_part( 'template-parts/template', 'page-footer' ); ?>
	</div>
</main>
<?php
get_footer();
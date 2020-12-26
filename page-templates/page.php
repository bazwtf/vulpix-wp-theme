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
			<article class="col-10 offset-md-1">
				<div class="entry-content">
					<?php printf( __( '<h1 class="page-title">%s</h1>', 'vulpix' ), get_the_title() ); ?>
					<?php the_content(); ?>
				</div>
			</article>
            <hr>
		</div>
	</div>
</main>
<?php
get_footer();

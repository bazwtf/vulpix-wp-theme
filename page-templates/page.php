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
<main class="site-content">
	<div class="container">
		<div class="row">
			<article>
				<div class="entry-content">
					<?php the_content(); ?>
				</div>
			</article>
		</div>
	</div>
</main>
<?php
get_footer();

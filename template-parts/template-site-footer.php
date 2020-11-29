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
	<a class="to-the-top" href="#site-header">
		<?php
		// Print the scroll to top link
		printf( __( 'To the top %s', 'vulpix' ), '<span class="arrow" aria-hidden="true">&uarr;</span>' );
		?>
	</a>
</footer>
<?php wp_footer(); ?>
</body>
</html>

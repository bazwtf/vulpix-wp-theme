<?php
defined( 'ABSPATH' ) or die( 'You shall not pass!' );
/**
 * Footer template
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @package Vulpix
 * @since Vulpix 1.0.0
 */
?>
<footer>
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

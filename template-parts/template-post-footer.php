<?php
defined( 'ABSPATH' ) or die( 'Vulpix, use Flamethrower!' );
/**
 * Post footer template
 *
 * @package Vulpix
 * @since Vulpix 1.0.0
 */

// Get latest posts and exclude current post
$latest_posts = new WP_Query(
    [
        'posts_per_page' => 5,
        'post__not_in'   => [ get_the_ID() ],
    ]
);
update_post_thumbnail_cache( $latest_posts );

if ( $latest_posts->have_posts() ) {
    ?>
    <section class="col-12">
        <?php
        // Section title
        printf( '<h2 class="section-title">%s</h2>', __(  'Latest posts', 'vulpix' ) );

        while ( $latest_posts->have_posts() ) {
            $latest_posts->the_post();

            // Get post list template
            get_template_part( 'template-parts/template', 'post-list' );
        }
        wp_reset_postdata();
        ?>
        <hr>
    </section>
    <?php
}

// Get panels template
get_template_part( 'template-parts/template', 'panels' );

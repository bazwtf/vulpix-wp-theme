<?php
defined( 'ABSPATH' ) or die();
/**
 * Search template
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#common-wordpress-template-files
 * @package Vulpix
 * @since Vulpix 1.0.0
 */

get_header();
?>
    <main role="main" class="container">
        <div class="grid">
            <h1 class="col-12 --center">
                <?php
                printf(
                /* translators: %s: search term. */
                    esc_html__( 'Results for "%s"', 'vulpix' ),
                    '<span class="page-description search-term">' . esc_html( get_search_query() ) . '</span>'
                );
                ?>
            </h1>
            <div class="search-result-count default-max-width">
                <?php
                printf(
                    esc_html(
                    /* translators: %d: the number of search results. */
                        _n(
                            'We found %d result for your search.',
                            'We found %d results for your search.',
                            (int) $wp_query->found_posts,
                            'vulpix'
                        )
                    ),
                    (int) $wp_query->found_posts
                );
                ?>
            </div><!-- .search-result-count -->
            <?php

            if ( have_posts() ) {
                while ( have_posts() ) {
                    the_post();

                    // Get post list template
                    get_template_part( 'template-parts/template', 'post-list' );
                }
            }
            // TODO: Pagination
            // TODO: IF no results?
            ?>
        </div>
    </main>
<?php
get_footer();

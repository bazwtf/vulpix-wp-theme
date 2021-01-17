<?php
defined( 'ABSPATH' ) or die( 'Vulpix, use Flamethrower!' );
/**
 * No content template
 *
 * @package Vulpix
 * @since Vulpix 1.0.0
 */

?>

<section class="no-results not-found">
    <header class="page-header">
        <h2 class="page-title"><?php _e( 'Nothing Found', 'vulpix' ); ?></h2>
    </header>

    <div class="page-content">
        <?php
        // If is home and the user can publish posts serve a message and a link.
        if ( is_home() && current_user_can( 'publish_posts' ) ) {

            // Message with link to start writing a post.
            printf(
                '<p>' . wp_kses(
                    __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'vulpix' ),
                    [
                        'a' => [
                            'href' => [],
                        ],
                    ]
                ) . '</p>',
                esc_url( admin_url(  'post-new.php' ) )
            );
        } elseif ( is_search() ) {
            // If search page show message with no results.
            ?>
            <p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'vulpix' ); ?></p>
            <?php
            get_search_form();

        } else {
            // Show generic message about no content.
            ?>
            <p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'vulpix' ); ?></p>
            <?php
            get_search_form();
        }
        ?>
    </div>
</section>

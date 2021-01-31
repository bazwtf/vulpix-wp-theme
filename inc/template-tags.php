<?php
defined( 'ABSPATH' ) or die( 'Vulpix, use Flamethrower!' );
/**
 * Template tags
 *
 * @package Vulpix
 * @since Vulpix 1.0.0
 */

if ( ! function_exists( 'vpx_the_post_meta' ) ) {
    /**
     * The post meta data
     *
     * @since Vulpix 1.0.0
     *
     * @param boolean $echo default true
     *
     * @return string empty or post meta contents
     */
    function vpx_the_post_meta( $echo = true ) {

        // Set $post_meta with output
        $post_meta = sprintf(
            '<div class="post-meta">
                <span class="date">%1$s</span>
                <span class="time">%2$s</span>
            </div>',
            esc_html( get_the_date( 'd-m-Y' ) ),
            esc_html( get_the_time() )
        );

        return vpx_return_string_handler( $post_meta, $echo );
    }
}

if ( ! function_exists( 'vpx_the_post_thumbnail' ) ) {
    /**
     * The post thumbnail
     *
     * @since Vulpix 1.0.0
     *
     * @param string $size thumbnail size
     * @param boolean $echo default true
     *
     * @return string empty or post thumbnail contents
     */
    function vpx_the_post_thumbnail( $size = 'thumbnail', $echo = true ) {

        // If there is no post thumbnail return empty
        if ( ! has_post_thumbnail() ) {
            return '';
        }

        // Set $thumbnail with post thumbnail object
        $thumbnail = sprintf(
            '<a class="post-thumbnail-link" href="%1$s">
                %2$s
            </a>',
            esc_url( get_the_permalink() ),
            get_the_post_thumbnail( null, $size, [ 'class' => 'post-thumbnail--img' ] )
        );

        return vpx_return_string_handler( $thumbnail, $echo );
    }
}

if ( ! function_exists( 'vpx_the_post_thumbnail_title' ) ) {
    /**
     * The post thumbnail title
     *
     * @since Vulpix 1.0.0
     *
     * @param string $heading_size heading size
     * @param bool $echo default true
     *
     * @return string empty or post title content
     */
    function vpx_the_post_thumbnail_title( $heading_size = 'h2', $echo = true ) {

        // If there is no title return empty
        if ( true === empty( get_the_title() ) ) {
            return '';
        }

        // Set $title with post title object
        $title = sprintf(
            '<%1$s class="post-title"><a href="%2$s">%3$s</a></%1$s>',
            esc_attr( $heading_size ),
            esc_url( get_the_permalink() ),
            esc_html( __( get_the_title(), 'vulpix' ) )
        );

        return vpx_return_string_handler( $title, $echo );
    }
}

if ( ! function_exists( 'vpx_the_title' ) ) {
    /**
     * Post title
     *
     * @since Vulpix 1.0.0
     *
     * @param string $heading_size default h1
     * @param bool $echo default true
     *
     * @return string empty or title object
     */
    function vpx_the_title( $heading_size = 'h1', $echo = true ) {

        // Get the title
        $title = get_the_title();

        // If no title then return empty
        if ( ! $title ) {
            return '';
        }

        // Set title object
        $title = sprintf(
            '<%1$s class="post-title">%2$s</%1$s>',
            esc_attr( $heading_size ),
            esc_html( __( $title, 'vulpix' ) )
        );

        return vpx_return_string_handler( $title, $echo );
    }
}

if ( ! function_exists( 'vpx_the_featured_image' ) ) {
    /**
     * The featured image
     *
     * @since Vulpix 1.0.0
     *
     * @param bool $echo default true
     *
     * @return string empty or featured content
     */
    function vpx_the_featured_image( $echo = true ) {

        // If there is no featured image then return
        if ( ! has_post_thumbnail() ) {
            return '';
        }

        // Get caption
        $caption = vpx_the_image_caption( false );

        // Set $featured_content object
        $featured_content = sprintf(
        '<figure class="post-featured-content">
                %1$s
                %2$s
            </figure>',
            get_the_post_thumbnail( null, 'large', [ 'class' => 'featured-content--img' ] ),
            ( ! $caption ? '' : $caption )
        );

        return vpx_return_string_handler( $featured_content, $echo );
    }
}

if ( ! function_exists( 'vpx_get_the_image_caption' ) ) {
    /**
     * Get the image caption text
     *
     * @since Vulpix 1.0.0
     *
     * @return string empty or image caption text
     */
    function vpx_get_the_image_caption() {

        // Get the thumbnail caption and set it to $caption
        $caption = get_post( get_post_thumbnail_id() )->post_excerpt;

        return vpx_return_string_handler( $caption, false );
    }
}

if ( ! function_exists( 'vpx_the_image_caption' ) ) {
    /**
     * The image caption
     *
     * @since Vulpix 1.0.0
     *
     * @param bool $echo default true
     *
     * @return string empty or image caption object
     */
    function vpx_the_image_caption( $echo = true ) {

        // Get the thumbnail caption and set it to $caption
        $caption_text = vpx_get_the_image_caption();

        // If no $caption_text then return
        if ( ! $caption_text ) {
            return '';
        }

        // Set $caption object
        $caption = sprintf( '<figcaption class="caption">%s</figcaption>', esc_html( __( $caption_text, 'vulpix' ) ) );

        return vpx_return_string_handler( $caption, $echo );
    }
}

if ( ! function_exists( 'vpx_return_string_handler' ) ) {
    /**
     * Return handler for string
     *
     * @since Vulpix 1.0.0
     *
     * @param string $value string to feed into the handler
     * @param bool $echo default true
     *
     * @return string empty or handled string content
     */
    function vpx_return_string_handler( $value, $echo = true ) {

        // If no $value then return
        if ( ! $value ) {
            return '';
        }

        // If $echo is true then echo $value
        if ( true === $echo ) {
            echo $value;
            return '';
        }

        // If $echo is false then pass $value object string
        return $value;
    }
}

if ( ! function_exists( 'vpx_the_category' ) ) {
    /**
     * The category
     *
     * @since Vulpix 1.0.0
     *
     * @param bool $echo default true
     *
     * @return string empty or category object
     */
    function vpx_the_category( $echo = true ) {

        // Get the array of categories
        $category = get_the_category();

        // If error or there is no category
        if ( is_wp_error( $category ) || ! $category[0] ) {
            return '';
        }

        // Get category name
        $cat_name = $category[0]->cat_name;

        // Get category link
        $cat_link = get_category_link( $category[0]->cat_ID );

        // Set category object
        $category = sprintf(
            '<span class="category">
                <a href="%1$s">%2$s</a>
            </span>',
            esc_url( $cat_link ),
            __( $cat_name, 'vulpix' )
        );

        return vpx_return_string_handler( $category, $echo );
    }
}

if ( ! function_exists( 'vpx_sidebar' ) ) {
    /**
     * Sidebar
     *
     * @since Vulpix 1.0.0
     *
     * @param string $sidebar Sidebar location
     * @param string $class CSS Classes that can be passed in to add to sidebar wrapper
     *
     * @return string|void
     */
    function vpx_sidebar( $sidebar, $class = '' ) {

        // Check to see if named sidebar is active
        if ( true === empty( $sidebar ) || false === is_active_sidebar( $sidebar ) ) {
            return '';
        }
        ?>
        <section class="sidebar <?php echo ( ! $class ? '' : ' ' . esc_attr( $class ) ); ?>">
            <?php dynamic_sidebar( $sidebar ); ?>
        </section>
        <?php
    }
}

if ( ! function_exists( 'vpx_the_menu' ) ) {
    /**
     * Menu
     *
     * @since Vulpix 1.0.0
     *
     * @param string $location Name of menu location
     * @param bool $is_main is this the main navigation
     * @param bool $echo default true
     *
     * @return string
     */
    function vpx_the_menu( $location, $is_main = false, $echo = true ) {

        // Check for menu location and if it exists else return empty
        if ( ! $location || ! has_nav_menu( $location ) ) {
            return '';
        }

        $button = '';

        if ( true === $is_main ) {
            // Menu button
            $button = sprintf(
                '<button class="nav-menu--button" aria-expanded="false" aria-controls="%1$s">
                Menu
            </button>',
                esc_attr( $location )
            );
        }

        // Construct nav menu
        $nav = wp_nav_menu(
            [
                'echo' => false,
                'theme_location' => $location,
                'menu_class' => '--hide nav-menu nav-menu--' . $location,
                'container' => false,
            ]
        );

        // Construct full menu
        $menu = sprintf(
            '<nav class="nav">
                %1$s
                %2$s
            </nav>',
            ( $button ? $button : '' ),
            wp_kses( $nav, wp_kses_allowed_html( 'post' ) )
        );

        return vpx_return_string_handler( $menu, $echo );
    }
}

if ( ! function_exists( 'vpx_the_posts_navigation' ) ) {
    /**
     * Posts pagination
     *
     * @since Vulpix 1.0.0
     *
     * @return void
     */
    function vpx_the_posts_navigation() {
        the_posts_pagination(
            [
                'before_page_number' => esc_html__( 'Page', 'vulpix' ) . ' ',
                'mid_size' => 0,
                'prev_text' => sprintf(
                    '%s <span class="nav-prev-text">%s</span>',
                    is_rtl() ? '>>' : '<<',
                    wp_kses(
                        __( 'Newer <span class="nav-short">posts</span>', 'vulpix' ),
                        [
                            'span' => [
                                'class' => [],
                            ],
                        ]
                    )
                ),
                'next_text' => sprintf(
                    '<span class="nav-next-text">%s</span> %s',
                    wp_kses(
                        __( 'Older <span class="nav-short">posts</span>', 'vulpix' ),
                        [
                            'span' => [
                                'class' => [],
                            ],
                        ]
                    ),
                    is_rtl() ? '<<' : '>>'
                ),
            ]
        );
    }
}

if ( ! function_exists( 'vpx_is_plugin_active' ) ) {
	/**
	 * Check for active plugin
	 *
	 * @since Vulpix 1.0.0
     *
	 * @param string $plugin expects `plugin_dir/plugin.php`
	 *
	 * @return bool
	 */
	function vpx_is_plugin_active( $plugin = '' ) {

		// Check to see if a plugin has been provided as a parameter
		if ( empty( $plugin ) ) {
			return false;
		}

		// If function is not being called in admin area, include `plugin.php`
		if ( ! is_admin() ) {
			include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		}

		// Check whether $plugin is active
		if ( is_plugin_active( $plugin ) ) {
			return true;
		}

		return false;
	}
}

if ( ! function_exists( 'vpx_admin_msg' ) ) {
	/**
	 * Admin message
	 *
	 * @since Vulpix 1.0.0
     *
	 * @param string $message Text string with message about why you are seeing a notice
	 * @param string $type The type of message
	 * @param bool $echo echo or return as string
	 *
	 * @return string
	 *
	 */
	function vpx_admin_msg( $message = '', $type = 'warning', $echo = true ) {

		// If no message provided or user not allowed to see message then return empty
		if ( ! $message || ! current_user_can( 'activate_plugins' ) ) {
			return '';
		}

		// Check for what type of message is to be displayed
		switch ( $type ) {
			case 'notice':
				$symbol = 'ℹ️️';
				break;
			case 'warning':
				$symbol = '⚠️';
				break;
			case 'error':
				$symbol = '❌';
				break;
			case 'critical':
				$symbol = '🛑';
				break;
			default:
				$symbol = '⚠️';
		}

		// Construct admin message
		$response = sprintf(
			'<div class="container">
                <div class="grid">
                    <div class="col-4 offset-4 notice %1$s">
	                    <p>%2$s️ <strong>%3$s</strong> %4$s</p>
                    </div>
                </div>
	        </div>',
			esc_attr( $type ),
			esc_html( $symbol ),
			esc_html( ucfirst( $type ) ),
			esc_html( $message )
		);

		return vpx_return_string_handler( $response, $echo );
	}
}


function vpx_get_home_block() {

	get_template_part( 'template-parts/blocks/block', 'hero' );
	return;
}

if ( ! function_exists( 'vpx_the_logo' ) ) {
    // TODO: Write and add logo function
    function vpx_the_logo($echo = true) {
        echo 'Logo';
        return '';
    }
}

<?php
defined( 'ABSPATH' ) or die( 'Vulpix, use Flamethrower!' );
/**
 * Template tags
 *
 * @package Vulpix
 * @since Vulpix 1.0.0
 */

/**
 * The post meta data
 * 
 * @since Vulpix 1.0.0
 * @param boolean $echo default true
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

/**
 * The post thumbnail
 * 
 * @since Vulpix 1.0.0
 * @param string $size thumbnail size
 * @param boolean $echo default true
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

/**
 * The post thumbnail title
 *
 * @since Vulpix 1.0.0
 * @param string $heading_size heading size
 * @param bool $echo default true
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

/**
 * Post title
 *
 * @since Vulpix 1.0.0
 * @param string $heading_size default h1
 * @param bool $echo default true
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

/**
 * The featured image
 *
 * @since Vulpix 1.0.0
 * @param bool $echo default true
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

/**
 * Get the image caption text
 *
 * @since Vulpix 1.0.0
 * @return string empty or image caption text
 */
function vpx_get_the_image_caption() {

    // Get the thumbnail caption and set it to $caption
    $caption = get_post( get_post_thumbnail_id() )->post_excerpt;

    return vpx_return_string_handler( $caption, false );
}

/**
 * The image caption
 *
 * @since Vulpix 1.0.0
 * @param bool $echo default true
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

/**
 * Return handler for string
 *
 * @since Vulpix 1.0.0
 * @param string $value string to feed into the handler
 * @param bool $echo default true
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

/**
 * The category
 *
 * @since Vulpix 1.0.0
 * @param bool $echo default true
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

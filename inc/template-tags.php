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

    // If $echo is true then echo $post_meta
    if ( true === $echo ) {
        echo $post_meta;
        return '';
    }

    // If $echo is false then pass $post_meta as string
    return $post_meta;
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
        get_the_post_thumbnail( null, $size, [ 'class' => 'post-thumbnail-img' ] )
    );

    // If $echo is true then echo $thumbnail object
    if ( true === $echo ) {
        echo $thumbnail;
        return '';
    }

    // If $echo is false then pass $thumbnail object as a string
    return $thumbnail;
}
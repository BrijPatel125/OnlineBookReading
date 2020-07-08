<?php
/**
 * Jetpack Compatibility File
 * See: https://jetpack.me/
 *
 * Please browse readme.txt for credits and forking information
 * @package journalistic
 */

/**
 * Add theme support for Infinite Scroll.
 * See: https://jetpack.me/support/infinite-scroll/
 */
function journalistic_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'journalistic_infinite_scroll_render',
		'footer'    => 'page',
	) );
} // end function journalistic_jetpack_setup
add_action( 'after_setup_theme', 'journalistic_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function journalistic_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', get_post_format() );
	}
} // end function journalistic_infinite_scroll_render

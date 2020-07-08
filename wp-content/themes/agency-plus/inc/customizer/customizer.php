<?php
/**
 * Agency Plus Theme Customizer.
 *
 * @package Agency_Plus
 */

/**
 * Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function agency_plus_customize_register( $wp_customize ) {

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'            => '.site-title a',
			'container_inclusive' => false,
			'render_callback'     => 'agency_plus_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'            => '.site-description',
			'container_inclusive' => false,
			'render_callback'     => 'agency_plus_customize_partial_blogdescription',
		) );
	}

	// Sanitization.
	require_once trailingslashit( get_template_directory() ) . '/inc/customizer/sanitize.php';

	// Load options.
	require_once trailingslashit( get_template_directory() ) . '/inc/customizer/options/options.php';

}
add_action( 'customize_register', 'agency_plus_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @since 1.0.0
 *
 * @return void
 */
function agency_plus_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since 1.0.0
 *
 * @return void
 */
function agency_plus_customize_partial_blogdescription() {
	bloginfo( 'description' );
}


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function agency_plus_customize_preview_js() {
	wp_enqueue_script( 'agency-plus-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'agency_plus_customize_preview_js' );
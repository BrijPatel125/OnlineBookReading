<?php
/**
 * Helpers.
 *
 * @package Agency_Plus
 */

if ( ! function_exists( 'agency_plus_fonts_url' ) ) :

	/**
	 * Register Google fonts.
	 *
	 * @since 1.0.0
	 *
	 * @return string Google fonts URL for the theme.
	 */
	function agency_plus_fonts_url() {
		$fonts_url = '';
		$fonts     = array();
		$subsets   = 'latin,latin-ext';

		/* translators: If there are characters in your language that are not supported by Lora, translate this to 'off'. Do not translate into your own language. */
		if ( 'off' !== _x( 'on', 'Lora font: on or off', 'agency-plus' ) ) {
			$fonts[] = 'Lora:400,400i,700,700i';
		}

		/* translators: If there are characters in your language that are not supported by Playfair Display, translate this to 'off'. Do not translate into your own language. */
		if ( 'off' !== _x( 'on', 'Alegreya Sans font: on or off', 'agency-plus' ) ) {
			$fonts[] = 'Alegreya Sans:400,400i,500,500i,700';
		}

		if ( $fonts ) {
			$fonts_url = add_query_arg( array(
				'family' => urlencode( implode( '|', $fonts ) ),
				'subset' => urlencode( $subsets ),
			), 'https://fonts.googleapis.com/css' );
		}

		return $fonts_url;
	}

endif;

// Shortcode used in footer copyright
if ( ! function_exists( 'agency_plus_apply_theme_shortcode' ) ) :

	/**
	 * Apply theme shortcode.
	 *
	 * @since 1.0.0
	 *
	 * @param string $string Content.
	 * @return string Modified content.
	 */
	function agency_plus_apply_theme_shortcode( $string ) {

		if ( empty( $string ) ) {
			return $string;
		}

		$search = array( '[the-year]', '[the-site-title]' );

		$replace = array(
			date_i18n( esc_html_x( 'Y', 'year date format', 'agency-plus' ) ),
			esc_html( get_bloginfo( 'name', 'display' ) ),
		);

		$string = str_replace( $search, $replace, $string );

		return $string;

	}

endif;

// Add go to top
if ( ! function_exists( 'agency_plus_footer_goto_top' ) ) :

	/**
	 * Add Go to top.
	 *
	 * @since 1.0.0
	 */
	function agency_plus_footer_goto_top() {

		$goto_top = agency_plus_get_option( 'enable_goto_top' );

		if( 1 == $goto_top ){

			echo '<a href="#page" class="scrollup" id="btn-scrollup"></a>';

		}
	}
endif;

add_action( 'wp_footer', 'agency_plus_footer_goto_top' );
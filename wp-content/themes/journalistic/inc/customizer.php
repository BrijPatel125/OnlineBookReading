<?php
/**
 * journalistic Theme Customizer
 *
 * Please browse readme.txt for credits and forking information
 *
 * @package journalistic
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function journalistic_customize_register( $wp_customize ) {

	$color_scheme = journalistic_get_color_scheme();
	$current_color_scheme = journalistic_current_color_scheme_default_color();

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_section('header_image')->title = __( 'Front Page Header', 'journalistic' );
	$wp_customize->get_section('colors')->title = __( 'Background Color', 'journalistic' );
	$wp_customize->remove_control('header_textcolor');

	$wp_customize->add_control( 'display_header_text', array(
		'label'    => __( "Display Header Images?", 'journalistic' ),
		'section'  => 'header_section',
		'type'     => 'text',
		'priority' => 1,
		) );

	$wp_customize->add_setting( 'header_bg_color', array(
		'default'           => '#1b1b1b',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
		) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_bg_color', array(
		'label'       => __( 'Header Background Color', 'journalistic' ),
		'description' => __( 'Applied to header background.', 'journalistic' ),
		'section'     => 'header_image',
		'settings'    => 'header_bg_color',
		) ) );

	$wp_customize->add_section( 'site_identity' , array(
		'priority'   => 3,
		));

	$wp_customize->add_section( 'header_image' , array(
		'title'      => __('Front Page: Header', 'journalistic'),
		'priority'   => 4,
		));

	$wp_customize->add_setting( 'header_image_text_color', array(
		'default'           => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
		) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_image_text_color', array(
		'label'       => __( 'Header Image Headline Color', 'journalistic' ),
		'description' => __( 'Choose a color for the header image headline.', 'journalistic' ),
		'priority' 			=> 2,
		'section'     => 'header_image',
		'settings'    => 'header_image_text_color',
		) ) );

	$wp_customize->add_setting( 'header_image_tagline_color', array(
		'default'           => '#dcdcdc',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
		) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_image_tagline_color', array(
		'label'       => __( 'Header Image Tagline Color', 'journalistic' ),
		'description' => __( 'Choose a color for the header tagline headline.', 'journalistic' ),
		'section'     => 'header_image',
		'priority'   => 2,
		'settings'    => 'header_image_tagline_color',
		) ) );

    $wp_customize->add_setting( 'facebook_link', array(
        'type'              => 'theme_mod',
        'sanitize_callback' => 'esc_url_raw',
        'capability'        => 'edit_theme_options',
        ) );

    $wp_customize->add_control( 'facebook_link', array(
        'label'    => __( "Facebook Link (URL)", 'journalistic' ),
        'section'  => 'header_image',
        'type'     => 'text',
        'priority' => 2,
        ) );
    $wp_customize->add_setting( 'twitter_link', array(
        'type'              => 'theme_mod',
        'sanitize_callback' => 'esc_url_raw',
        'capability'        => 'edit_theme_options',
        ) );

    $wp_customize->add_control( 'twitter_link', array(
        'label'    => __( "Twitter Link (URL)", 'journalistic' ),
        'section'  => 'header_image',
        'type'     => 'text',
        'priority' => 2,
        ) );

	$wp_customize->add_section(
		'journalistic_rating',
		array(
			'title' => __('Rate Journalistic <3', 'journalistic'),
			'priority' => 995,
			'description' => __('We work hard & do our best to give you an awesome theme. If you like Journalistic then let the developer know, he gets so happy!', 'journalistic') . '<br> <br><a class="button button-primary" href="https://wordpress.org/support/theme/journalistic/reviews/?filter=5" target="_blank">Click here to rate Journalistic</a> ',
			)
		);  
	$wp_customize->add_setting('journalistic_rating_tabs_sec', array(
		'sanitize_callback' => 'unneeded',
		'type' => 'info_control',
		'capability' => 'edit_theme_options',
		)
	);
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'rating_tab', array(
		'section' => 'journalistic_rating',
		'settings' => 'journalistic_rating_tabs_sec',
		'type' => 'none',
		'priority' => 105
		) )
	);   

	$wp_customize->add_section(
		'journalistic_allfeatures_tab',
		array(
			'title' => __('Journalistic Premium Version', 'journalistic'),
			'priority' => 0,
			'description' => __(' ', 'journalistic') . '<a href="https://outstandingthemes.com/themes/journalistic/" target="_blank"><img src="' . get_template_directory_uri() . '/images/theme-image-1.png"></a>',
			)
		); 

	$wp_customize->add_setting('journalistic_allfeatures_tabs_sec', array(
		'sanitize_callback' => 'unneeded',
		'type' => 'info_control',
		'capability' => 'edit_theme_options',
		)
	);
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'allfeatures_tab', array(
		'section' => 'journalistic_allfeatures_tab',
		'settings' => 'journalistic_allfeatures_tabs_sec',
		'type' => 'none',
		'priority' => 109
		) )
	);   
    $wp_customize->add_setting( 'instagram_link', array(
        'type'              => 'theme_mod',
        'sanitize_callback' => 'esc_url_raw',
        'capability'        => 'edit_theme_options',
        ) );

    $wp_customize->add_control( 'instagram_link', array(
        'label'    => __( "Instagram Link (URL)", 'journalistic' ),
        'section'  => 'header_image',
        'type'     => 'text',
        'priority' => 2,
        ) );
    $wp_customize->add_setting( 'youtube_link', array(
        'type'              => 'theme_mod',
        'sanitize_callback' => 'esc_url_raw',
        'capability'        => 'edit_theme_options',
        ) );

    $wp_customize->add_control( 'youtube_link', array(
        'label'    => __( "Youtube Link (URL)", 'journalistic' ),
        'section'  => 'header_image',
        'type'     => 'text',
        'priority' => 2,
        ) );
    $wp_customize->add_setting( 'linkedin_link', array(
        'type'              => 'theme_mod',
        'sanitize_callback' => 'esc_url_raw',
        'capability'        => 'edit_theme_options',
        ) );

    $wp_customize->add_control( 'linkedin_link', array(
        'label'    => __( "LinkedIn Link (URL)", 'journalistic' ),
        'section'  => 'header_image',
        'type'     => 'text',
        'priority' => 2,
        ) );
    $wp_customize->add_setting( 'twitch_link', array(
        'type'              => 'theme_mod',
        'sanitize_callback' => 'esc_url_raw',
        'capability'        => 'edit_theme_options',
        ) );

    $wp_customize->add_control( 'twitch_link', array(
        'label'    => __( "Twitch Link (URL)", 'journalistic' ),
        'section'  => 'header_image',
        'type'     => 'text',
        'priority' => 2,
        ) );

    $wp_customize->add_setting( 'pinterest_link', array(
        'type'              => 'theme_mod',
        'sanitize_callback' => 'esc_url_raw',
        'capability'        => 'edit_theme_options',
        ) );

    $wp_customize->add_control( 'pinterest_link', array(
        'label'    => __( "Pinterest Link (URL)", 'journalistic' ),
        'section'  => 'header_image',
        'type'     => 'text',
        'priority' => 2,
        ) );

    $wp_customize->add_setting( 'soundcloud_link', array(
        'type'              => 'theme_mod',
        'sanitize_callback' => 'esc_url_raw',
        'capability'        => 'edit_theme_options',
        ) );

    $wp_customize->add_control( 'soundcloud_link', array(
        'label'    => __( "SoundCloud Link (URL)", 'journalistic' ),
        'section'  => 'header_image',
        'type'     => 'text',
        'priority' => 2,
        ) );


	$wp_customize->add_setting( 'social_media_link_color', array(
		'default'           => '#fab526',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
		) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'social_media_link_color', array(
		'label'       => __( 'Social Media Icons Color', 'journalistic' ),
		'description' => __( 'Choose a color for the header tagline headline.', 'journalistic' ),
		'section'     => 'header_image',
		'priority'   => 2,
		'settings'    => 'social_media_link_color',
		) ) );



	$wp_customize->add_setting( 'hero_image_title', array(
		'type'              => 'theme_mod',
		'sanitize_callback' => 'wp_kses_post',
		'capability'        => 'edit_theme_options',
		'default'  => '',
		) );

	$wp_customize->add_control( 'hero_image_title', array(
		'label'    => __( "Header Image Title", 'journalistic' ),
		'section'  => 'header_image',
		'type'     => 'text',
		'default'  => '',
		'priority' => 1,
		) );
	$wp_customize->add_setting( 'hero_image_subtitle', array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'wp_kses_post',
		'default'  => '',
		) );

	$wp_customize->add_control( 'hero_image_subtitle', array(
		'label'    => __( "Header Image Tagline", 'journalistic' ),
		'section'  => 'header_image',
		'default'  => '',
		'type'     => 'text',
		'priority' => 1,
		) );

	$wp_customize->add_setting( 'color_scheme', array(
		'default'           => 'default',
		'sanitize_callback' => 'journalistic_sanitize_color_scheme',
		'transport'         => 'postMessage',
		) );

	$wp_customize->add_control( 'color_scheme', array(
		'label'    => __( 'Theme Color Name', 'journalistic' ),
		'section'  => 'accent_color_option',
		'type'     => 'select',
		'choices'  => journalistic_get_color_scheme_choices(),
		'priority' => 3,
		) );

	$wp_customize->add_setting( 'accent_color', array(
		'default'           => $current_color_scheme[0],
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
		) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'accent_color', array(
		'label'       => __( 'Theme Color', 'journalistic' ),
		'description' => __( 'Applied to highlight elements.', 'journalistic' ),
		'section'     => 'accent_color_option',
		'settings'    => 'accent_color',
		) ) );

}
add_action( 'customize_register', 'journalistic_customize_register' );

/**
 * Register color schemes for journalistic.
 *
 * @return array An associative array of color scheme options.
 */
function journalistic_get_color_schemes() {
	return apply_filters( 'journalistic_color_schemes', array(
		'default' => array(
			'label'  => __( 'Default', 'journalistic' ),
			'colors' => array(
				'#fab526',			
				),
			),
		'pink'    => array(
			'label'  => __( 'Pink', 'journalistic' ),
			'colors' => array(
				'#FF4081',				
				),
			),
		'orange'  => array(
			'label'  => __( 'Orange', 'journalistic' ),
			'colors' => array(
				'#FF5722',
				),
			),
		'green'    => array(
			'label'  => __( 'Green', 'journalistic' ),
			'colors' => array(
				'#8BC34A',
				),
			),
		'red'    => array(
			'label'  => __( 'Red', 'journalistic' ),
			'colors' => array(
				'#FF5252',
				),
			),
		'yellow'    => array(
			'label'  => __( 'yellow', 'journalistic' ),
			'colors' => array(
				'#FFC107',
				),
			),
		'blue'   => array(
			'label'  => __( 'Blue', 'journalistic' ),
			'colors' => array(
				'#03A9F4',
				),
			),
		) );
}

if(!function_exists('journalistic_current_color_scheme_default_color')):
/**
 * Get the default hex color value for current color scheme
 *
 *
 * @return array An associative array of current color scheme hex values.
 */
function journalistic_current_color_scheme_default_color(){
	$color_scheme_option = get_theme_mod( 'color_scheme', 'default' );
	
	$color_schemes       = journalistic_get_color_schemes();

	if ( array_key_exists( $color_scheme_option, $color_schemes ) ) {
		return $color_schemes[ $color_scheme_option ]['colors'];
	}

	return $color_schemes['default']['colors'];
}
endif; //journalistic_current_color_scheme_default_color

if ( ! function_exists( 'journalistic_get_color_scheme' ) ) :
/**
 * Get the current journalistic color scheme.
 *
 *
 * @return array An associative array of currently set color hex values.
 */
function journalistic_get_color_scheme() {
	$color_scheme_option = get_theme_mod( 'color_scheme', 'default' );
	$accent_color = get_theme_mod('accent_color','#fab526');
	$color_schemes       = journalistic_get_color_schemes();

	if ( array_key_exists( $color_scheme_option, $color_schemes ) ) {
		$color_schemes[ $color_scheme_option ]['colors'] = array($accent_color);
		return $color_schemes[ $color_scheme_option ]['colors'];
	}

	return $color_schemes['default']['colors'];
}
endif; // journalistic_get_color_scheme

if ( ! function_exists( 'journalistic_get_color_scheme_choices' ) ) :
/**
 * Returns an array of color scheme choices registered for journalistic.
 *
 *
 * @return array Array of color schemes.
 */
function journalistic_get_color_scheme_choices() {
	$color_schemes                = journalistic_get_color_schemes();
	$color_scheme_control_options = array();

	foreach ( $color_schemes as $color_scheme => $value ) {
		$color_scheme_control_options[ $color_scheme ] = $value['label'];
	}

	return $color_scheme_control_options;
}
endif; // journalistic_get_color_scheme_choices

if ( ! function_exists( 'journalistic_sanitize_color_scheme' ) ) :
/**
 * Sanitization callback for color schemes.
 *
 *
 * @param string $value Color scheme name value.
 * @return string Color scheme name.
 */
function journalistic_sanitize_color_scheme( $value ) {
	$color_schemes = journalistic_get_color_scheme_choices();

	if ( ! array_key_exists( $value, $color_schemes ) ) {
		$value = 'default';
	}

	return $value;
}
endif; // journalistic_sanitize_color_scheme

if ( ! function_exists( 'journalistic_sanitize_post_display_option' ) ) :
/**
 * Sanitization callback for post display option.
 *
 *
 * @param string $value post display style.
 * @return string post display style.
 */

function journalistic_sanitize_post_display_option( $value ) {
	if ( ! in_array( $value, array( 'post-excerpt', 'full-post' ) ) )
		$value = 'post-excerpt';

	return $value;
}
endif; // journalistic_sanitize_post_display_option
/**
 * Enqueues front-end CSS for color scheme.
 *
 *
 * @see wp_add_inline_style()
 */
function journalistic_color_scheme_css() {
	$color_scheme_option = get_theme_mod( 'color_scheme', 'default' );
	
	$color_scheme = journalistic_get_color_scheme();

	$color = array(
		'accent_color'            => $color_scheme[0],
		);

	$color_scheme_css = journalistic_get_color_scheme_css( $color);

	wp_add_inline_style( 'journalistic-style', $color_scheme_css );
}
add_action( 'wp_enqueue_scripts', 'journalistic_color_scheme_css' );

/**
 * Returns CSS for the color schemes.
 *
 * @param array $colors Color scheme colors.
 * @return string Color scheme CSS.
 */
function journalistic_get_color_scheme_css( $colors ) {
	$colors = wp_parse_args( $colors, array(
		'accent_color'            => '',
		) );

	$css = <<<CSS
	/* Color Scheme */

	/* Accent Color */

	a:active,
	a:hover,
	a:focus {
		color: {$colors['accent_color']};
	}

	.navbar-default .navbar-nav > li > a:hover, .navbar-default .navbar-nav > li > a:focus {
		color: {$colors['accent_color']};
	}

	.navbar-default .navbar-toggle:hover, .navbar-default .navbar-toggle:focus {
		background-color: {$colors['accent_color']};
		background: {$colors['accent_color']};
		border-color:{$colors['accent_color']};
	}

	.navbar-default .navbar-nav > .active > a, .navbar-default .navbar-nav > .active > a:hover, .navbar-default .navbar-nav > .active > a:focus {
		color: {$colors['accent_color']} !important;			
	}

	.dropdown-menu > .active > a, .dropdown-menu > .active > a:hover, .dropdown-menu > .active > a:focus {	    
		background-color: {$colors['accent_color']} !important;
		color:#fff !important;
	}
	.btn, .btn-default:visited, .btn-default:active:hover, .btn-default.active:hover, .btn-default:active:focus, .btn-default.active:focus, .btn-default:active.focus, .btn-default.active.focus {
		background: {$colors['accent_color']};
	}

	.navbar-default .navbar-nav > .open > a, .navbar-default .navbar-nav > .open > a:hover, .navbar-default .navbar-nav > .open > a:focus {
		color: {$colors['accent_color']};
	}
	.cat-links a, .tags-links a {
		color: {$colors['accent_color']};
	}
	.navbar-default .navbar-nav > li > .dropdown-menu > li > a:hover,
	.navbar-default .navbar-nav > li > .dropdown-menu > li > a:focus {
		color: #fff;
		background-color: {$colors['accent_color']};
	}
	h5.entry-date a:hover {
		color: {$colors['accent_color']};
	}

	 #respond input#submit {
	background-color: {$colors['accent_color']};
	background: {$colors['accent_color']};
}


button:hover, button, button:active, button:focus {
	border: 1px solid {$colors['accent_color']};
	background-color:{$colors['accent_color']};
	background:{$colors['accent_color']};
}
.dropdown-menu .current-menu-item.current_page_item a, .dropdown-menu .current-menu-item.current_page_item a:hover, .dropdown-menu .current-menu-item.current_page_item a:active, .dropdown-menu .current-menu-item.current_page_item a:focus {
	background: {$colors['accent_color']} !important;
	color:#fff !important
}
@media (max-width: 767px) {
	.navbar-default .navbar-nav .open .dropdown-menu > li > a:hover {
		background-color: {$colors['accent_color']};
		color: #fff;
	}
}
blockquote {
	border-left: 5px solid {$colors['accent_color']};
}
.sticky-post{
	background: {$colors['accent_color']};
	color:white;
}

.entry-title a:hover,
.entry-title a:focus{
	color: {$colors['accent_color']};
}

.entry-header .entry-meta::after{
	background: {$colors['accent_color']};
}

.readmore-btn, .readmore-btn:visited, .readmore-btn:active, .readmore-btn:hover, .readmore-btn:focus {
	color: {$colors['accent_color']};
}

.post-password-form input[type="submit"], .post-password-form input[type="submit"]:hover, .post-password-form input[type="submit"]:focus, .post-password-form input[type="submit"]:active {
	background-color: {$colors['accent_color']};

}

.fa {
	color: {$colors['accent_color']};
}

.btn-default{
	border-bottom: 1px solid {$colors['accent_color']};
}

.btn-default:hover, .btn-default:focus{
	border-bottom: 1px solid {$colors['accent_color']};
	background-color: {$colors['accent_color']};
}

.nav-previous:hover, .nav-next:hover{
	border: 1px solid {$colors['accent_color']};
	background-color: {$colors['accent_color']};
}

.next-post a:hover,.prev-post a:hover{
	color: {$colors['accent_color']};
}

.posts-navigation .next-post a:hover .fa, .posts-navigation .prev-post a:hover .fa,
.image-attachment .entry-meta a, a, a:visited, .next-post a:visited, .prev-post a:visited, .next-post a, .prev-post a {
	color: {$colors['accent_color']};
}
.site-info a {
    color: #b7b7b7;
}
button:active,
button:focus,
html input[type=button]:active,
html input[type=button]:focus,
input[type=reset]:active,
input[type=reset]:focus,
input[type=submit]:active,
input[type=submit]:focus { 
	background: {$colors['accent_color']};
}

.cattegories a, .tags-links a {
	background: {$colors['accent_color']};
	color: #fff;
}

	#secondary .widget a:hover,
	#secondary .widget a:focus{
color: {$colors['accent_color']};
}

	#secondary .widget_calendar tbody a {
background-color: {$colors['accent_color']};
color: #fff;
padding: 0.2em;
}

	#secondary .widget_calendar tbody a:hover{
background-color: {$colors['accent_color']};
color: #fff;
padding: 0.2em;
}	
.footer-widgets a {
	color:rgba(255, 255, 255, .5);
}

CSS;

return $css;
}

if(! function_exists('journalistic_backendfunctions_getstyles' ) ):

function journalistic_backendfunctions_getstyles(){

	?>

	<style type="text/css">
	.site-header { background: <?php echo esc_attr(get_theme_mod( 'header_bg_color')); ?>; }
	.footer-widgets h3 { color: <?php echo esc_attr(get_theme_mod( 'footer_widget_title_colors')); ?>; }
	.site-footer { background: <?php echo esc_attr(get_theme_mod( 'footer_copyright_background_color')); ?>; }
	.footer-widget-wrapper { background: <?php echo esc_attr(get_theme_mod( 'footer_colors')); ?>; }
	.row.site-info { color: <?php echo esc_attr(get_theme_mod( 'footer_copyright_text_color')); ?>; }
	#secondary h3.widget-title, #secondary h4.widget-title { color: <?php echo esc_attr(get_theme_mod( 'sidebar_headline_colors')); ?>; }
	#secondary .widget a, #secondary .widget #recentcomments a, #secondary .widget .rsswidget, #secondary .widget .widget-title .rsswidget, #secondary .widget a { color: <?php echo esc_attr(get_theme_mod( 'sidebar_link_color')); ?>; }
	.navbar-default,.navbar-default li>.dropdown-menu, .navbar-default .navbar-nav .open .dropdown-menu > .active > a, .navbar-default .navbar-nav .open .dr { background-color: <?php echo esc_attr(get_theme_mod( 'navigation_background_color')); ?>; }
	.navbar-default .navbar-nav>li>a, .navbar-default li>.dropdown-menu>li>a { color: <?php echo esc_attr(get_theme_mod( 'navigation_text_color')); ?>; }
	.navbar-default .navbar-brand, .navbar-default .navbar-brand:hover, .navbar-default .navbar-brand:focus { color: <?php echo esc_attr(get_theme_mod( 'navigation_logo_color')); ?>; }
	h1.entry-title, .entry-header .entry-title a, #main h1, #main h2, #main h3, #main h4, #main h5, #main h6, .comments-title, .comment-reply-title, .comment-content h1, .comment-content h2, .comment-content h3, .comment-content h4, .comment-content h5, .comment-author.vcard, .comment-content h6, .next-prev-text, #main th, .comment th { color: <?php echo esc_attr(get_theme_mod( 'headline_color')); ?>; }
	.entry-content, .entry-summary, dd, .comment td, #main ul, #main ol, #main li, .comment li, .comment ul, .comment ol, .comment address, #main address, #main td, dt, .post-feed-wrapper p, .comment p, .comment-form-comment label { color: <?php echo esc_attr(get_theme_mod( 'post_content_color')); ?>; }
	h5.entry-date, h5.entry-date a, #main h5.entry-date, .comment-metadata time { color: <?php echo esc_attr(get_theme_mod( 'author_line_color')); ?>; }
	.top-widgets { background: <?php echo esc_attr(get_theme_mod( 'top_widget_background_color')); ?>; }
	.top-widgets h3 { color: <?php echo esc_attr(get_theme_mod( 'top_widget_title_color')); ?>; }
	.top-widgets, .top-widgets p { color: <?php echo esc_attr(get_theme_mod( 'top_widget_text_color')); ?>; }
	.bottom-widgets { background: <?php echo esc_attr(get_theme_mod( 'bottom_widget_background_color')); ?>; }
	.bottom-widgets h3 { color: <?php echo esc_attr(get_theme_mod( 'bottom_widget_title_color')); ?>; }
	.frontpage-site-title { color: <?php echo esc_attr(get_theme_mod( 'header_image_text_color')) ?>; }
	.frontpage-site-description { color: <?php echo esc_attr(get_theme_mod( 'header_image_tagline_color')) ?>; }
	.bottom-widgets, .bottom-widgets p { color: <?php echo esc_attr(get_theme_mod( 'bottom_widget_text_color')); ?>; }
	.footer-widgets, .footer-widgets p { color: <?php echo esc_attr(get_theme_mod( 'footer_widget_text_color')); ?>; }
	.home .lh-nav-bg-transform .navbar-nav>li>a { color: <?php echo esc_attr(get_theme_mod( 'navigation_frontpage_menu_color')); ?>; }
	.home .lh-nav-bg-transform.navbar-default .navbar-brand { color: <?php echo esc_attr(get_theme_mod( 'navigation_frontpage_logo_color')); ?>; }
	#secondary, #secondary p, #secondary ul, #secondary li, #secondary .widget table caption, #secondary td, #secondary th { color: <?php echo esc_attr(get_theme_mod( 'sidebar_text_color')); ?>; }
	#main .post-content, #main, .comments-area, .post-comments, .single-post-content, .post-comments .comments-area, .page .nav-links, .single-post .nav-links , .nav-next, .nav-previous, .next-post, .prev-post { background: <?php echo esc_attr(get_theme_mod( 'postpage_background')); ?>; }
	.footer-widgets a, .footer-widget-wrapper a, .footer-widgets a:visited, .footer-widgets a:hover, .footer-widgets a:active, .footer-widgets a:focus{ color: <?php echo esc_attr(get_theme_mod( 'footer_widget_link_colors')); ?>; }
	span.frontpage-site-description:before{ background: <?php echo esc_attr(get_theme_mod( 'header_image_tagline_color')) ?>; }
	.header-social-media-link .fa{ color: <?php echo esc_attr(get_theme_mod( 'social_media_link_color')) ?>; }
	a.header-social-media-link{ border-color: <?php echo esc_attr(get_theme_mod( 'social_media_link_color')) ?>; }
	.site-header { padding-top: <?php echo esc_attr(get_theme_mod( 'header_top_padding')) ?>px; }
	.site-header { padding-bottom: <?php echo esc_attr(get_theme_mod( 'header_bottom_padding')) ?>px; }
	@media (min-width:767px){	
		.lh-nav-bg-transform.navbar-default .navbar-brand {color: <?php echo esc_attr(get_theme_mod( 'navigation_logo_color')); ?>; }
	}
	@media (max-width:767px){			
		.lh-nav-bg-transform button.navbar-toggle, .navbar-toggle, .navbar-default .navbar-toggle:hover, .navbar-default .navbar-toggle:focus { background-color: <?php echo esc_attr(get_theme_mod( 'navigation_text_color')); ?>; }
		.home .lh-nav-bg-transform, .navbar-default .navbar-toggle .icon-bar, .navbar-default .navbar-toggle:focus .icon-bar, .navbar-default .navbar-toggle:hover .icon-bar { background-color: <?php echo esc_attr(get_theme_mod( 'navigation_background_color')); ?> !important; }
		.navbar-default .navbar-nav .open .dropdown-menu>li>a, .home .lh-nav-bg-transform .navbar-nav>li>a {color: <?php echo esc_attr(get_theme_mod( 'navigation_text_color')); ?>; }
		.home .lh-nav-bg-transform.navbar-default .navbar-brand { color: <?php echo esc_attr(get_theme_mod( 'navigation_logo_color')); ?>; }
	}
	</style>
	<?php }
	add_action( 'wp_head', 'journalistic_backendfunctions_getstyles' );
	endif;

/**
 * Binds JS listener to make Customizer color_scheme control.
 *
 * Passes color scheme data as colorScheme global.
 *
 */
function journalistic_customize_control_js() {
	wp_enqueue_script( 'journalistic-color-scheme-control', get_template_directory_uri() . '/js/color-scheme-control.js', array( 'customize-controls', 'iris', 'underscore', 'wp-util' ), '20141216', true );
	wp_localize_script( 'journalistic-color-scheme-control', 'colorScheme', journalistic_get_color_schemes() );
}
add_action( 'customize_controls_enqueue_scripts', 'journalistic_customize_control_js' );


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function journalistic_customize_preview_js() {
	wp_enqueue_script( 'journalistic_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'journalistic_customize_preview_js' );

/**
 * Output an Underscore template for generating CSS for the color scheme.
 *
 * The template generates the css dynamically for instant display in the Customizer
 * preview.
 *
 */
function journalistic_color_scheme_css_template() {
	$colors = array(
		'accent_color'            => '{{ data.accent_color }}',
		);
		?>
		<script type="text/html" id="tmpl-journalistic-color-scheme">
		<?php echo esc_html(journalistic_get_color_scheme_css( $colors )); ?>
		</script>
		<?php
	}
	add_action( 'customize_controls_print_footer_scripts', 'journalistic_color_scheme_css_template' );

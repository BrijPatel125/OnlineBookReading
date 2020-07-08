<?php
/**
 * Agency Plus functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Agency_Plus
 */

if ( ! function_exists( 'agency_plus_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function agency_plus_setup() {

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'agency-plus' ),
			'social' => esc_html__( 'Social', 'agency-plus' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'agency_plus_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		// Add woocommerce support, lightbox and thumbnail slider.
		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );

		$gallery_zoom = agency_plus_get_option( 'enable_gallery_zoom' );

		if( 1 == $gallery_zoom ){
			add_theme_support( 'wc-product-gallery-zoom' );
		}
	}
endif;
add_action( 'after_setup_theme', 'agency_plus_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function agency_plus_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'agency_plus_content_width', 800 );
}
add_action( 'after_setup_theme', 'agency_plus_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function agency_plus_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'agency-plus' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'agency-plus' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	for( $i = 1; $i <= 4; $i++ ) {
	    register_sidebar( array(
	        /* translators: 1: Widget number. */
	        'name'          => sprintf( esc_html__( 'Footer %d', 'agency-plus' ), $i ),
	        'id'            => 'footer-'.$i,
	        'before_widget' => '<div id="%1$s" class="widget footer-widgets %2$s">',
	        'after_widget'  => '</div>',
	        'before_title'  => '<h2 class="widget-title">',
	        'after_title'   => '</h2>',
	    ) );
	}
}
add_action( 'widgets_init', 'agency_plus_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function agency_plus_scripts() {

	wp_enqueue_style( 'agency-plus-fonts', agency_plus_fonts_url(), array(), null );

	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/third-party/font-awesome/css/font-awesome.min.css', '', '4.7.0' );

	wp_enqueue_style( 'jquery-meanmenu', get_template_directory_uri() . '/assets/third-party/meanmenu/meanmenu.min.css' );

	wp_enqueue_style( 'agency-plus-style', get_stylesheet_uri() );

	wp_enqueue_script( 'agency-plus-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'agency-plus-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'jquery-meanmenu', get_template_directory_uri() . '/assets/third-party/meanmenu/jquery.meanmenu.min.js', array('jquery'), '2.0.8', true );

	wp_enqueue_script( 'agency-plus-custom', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'), '1.0.2', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'agency_plus_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';

/**
 * Customizer core functions.
 */
require get_template_directory() . '/inc/customizer/core.php';

/**
 * Helper functions.
 */
require get_template_directory() . '/inc/helpers.php';

/**
 * TGM Plugin activation.
 */
require_once trailingslashit( get_template_directory() ) . '/inc/class-tgm-plugin-activation.php';

// Load woo-commerce overrides.
if( class_exists( 'WooCommerce' ) ){
	require get_template_directory() . '/inc/woo-overrides.php';
}

/**
 * Theme Info functions.
 */
require get_template_directory() . '/inc/theme-info.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
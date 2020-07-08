<?php
/**
 * journalistic functions and definitions
 * Please browse readme.txt for credits and forking information
 *
 * @package journalistic
 */


if ( ! function_exists( 'journalistic_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */


function journalistic_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on journalistic, use a find and replace
	 * to change 'journalistic' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'journalistic', get_template_directory() . '/languages' );

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
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 604, 270);
	add_image_size( 'journalistic-full-width', 1038, 576, true );
	
	

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'lighthouse_custom_background_args', array(
		'default-color' => 'eee',
		'default-image' => '',
		) ) );
	
	function journalistic_register_journalistic_menus() {
		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Top Primary Menu', 'journalistic' ),
			) );
	}

	add_action( 'init', 'journalistic_register_journalistic_menus' );
	
	
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
		) );



}


endif; // journalistic_setup
add_action( 'after_setup_theme', 'journalistic_setup' );

/**
 * Sets the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 *
 */
function journalistic_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'journalistic_content_width', 640 );
}
add_action( 'after_setup_theme', 'journalistic_content_width', 0 );


/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */

function journalistic_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'journalistic' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Widgets here will appear in your sidebar', 'journalistic' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
		) );
}
add_action( 'widgets_init', 'journalistic_widgets_init' );


/**
 * Insert the styles.
 */
function journalistic_backendfunctions_styles( $hook ) {
    if ( 'appearance_page_journalistic-infopage' !== $hook ) {
        return;
    }
    wp_enqueue_style( 'journalistic-infopagecss', get_template_directory_uri() . '/css/admin.css', false, '3.0' );
}
add_action( 'admin_enqueue_scripts', 'journalistic_backendfunctions_styles' );



/**
 * Enqueue scripts and styles.
 */
function journalistic_scripts ( $in_footer ) {
	wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/css/bootstrap.css',true );  

	wp_enqueue_style( 'journalistic-style', get_stylesheet_uri() );

	wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/font-awesome/css/font-awesome.min.css',true );   
	
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.js',array('jquery'),'',true);  

	wp_enqueue_script( 'journalistic-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array('jquery'), '20130115', true );

	wp_enqueue_script( 'html5shiv', get_template_directory_uri().'/js/html5shiv.js', array(),'3.7.3',false );
	wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'journalistic_scripts' );


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';


/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';


/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';


/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


/**
 * Load custom nav walker
 */
if(!class_exists('journalistic_wp_bootstrap_navwalker')){
require get_template_directory() . '/inc/navwalker.php';
}


function journalistic_google_fonts() {
	$query_args = array(

		'family' => 'Lato:400,400italic,600,600italic,700,700i,900'
		);
	wp_register_style( 'journalisticgooglefonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ), array(), null );
	wp_enqueue_style( 'journalisticgooglefonts');
}

add_action('wp_enqueue_scripts', 'journalistic_google_fonts');


function journalistic_new_excerpt_more( $more ) {
	if ( is_admin() ) {
		return $more;
	}

		$link = sprintf( '<p class="read-more"><a class="readmore-btn" href="'. esc_url(get_permalink( get_the_ID() )) . '' . '">' . __('Read More', 'journalistic') . '<span class="screen-reader-text"> '. __(' Read More', 'journalistic').'</span></a></p>',
		esc_url( get_permalink( get_the_ID() ) )
	);
	return '&hellip;' . $link;

}
add_filter( 'excerpt_more', 'journalistic_new_excerpt_more' );




/**
*
* Custom Logo in the top menu
*
**/

function journalistic_logo() {
	add_theme_support('custom-logo', array(
		'size' => 'journalistic-logo',
		'width'                  => 250,
		'height'                 => 50,
		'flex-height'            => true,
		));
}

add_action('after_setup_theme', 'journalistic_logo');


/**
*
* New Footer Widgets
*
**/

function journalistic_footer_widget_left_init() {

	register_sidebar( array(
		'name' => esc_html__('Footer Widget left', 'journalistic'),
		'id' => 'footer_widget_left',
		'description'   => esc_html__( 'Widgets here will appear in your footer', 'journalistic' ),
		'before_widget' => '<div class="footer-widgets">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
		) );
}
add_action( 'widgets_init', 'journalistic_footer_widget_left_init' );

function journalistic_footer_widget_middle_init() {

	register_sidebar( array(
		'name' => esc_html__('Footer Widget middle', 'journalistic'),
		'id' => 'footer_widget_middle',
		'description'   => esc_html__( 'Widgets here will appear in your footer', 'journalistic' ),
		'before_widget' => '<div class="footer-widgets">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
		) );
}
add_action( 'widgets_init', 'journalistic_footer_widget_middle_init' );

function journalistic_footer_widget_right_init() {

	register_sidebar( array(
		'name' => esc_html__('Footer Widget right', 'journalistic'),
		'id' => 'footer_widget_right',
		'before_widget' => '<div class="footer-widgets">',
		'description'   => esc_html__( 'Widgets here will appear in your footer', 'journalistic' ),
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
		) );
}
add_action( 'widgets_init', 'journalistic_footer_widget_right_init' );



<?php
/**
 * Jbyalexa functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Jbyalexa
 */

if ( ! function_exists( 'jbyalexa_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function jbyalexa_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Jbyalexa, use a find and replace
	 * to change 'jbyalexa' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'jbyalexa', get_template_directory() . '/languages' );


	if ( function_exists( 'add_theme_support' ) ) :
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
				set_post_thumbnail_size( 400, 260, true ); // default Post Thumbnail dimensions (cropped)
			  // additional image sizes
				add_image_size( 'post-big', 930, 593, true );
				add_image_size( 'post-h-thumbnails', 274, 269, true );
			  add_image_size( 'category-thumb', 300, 130, true );

				// This theme uses wp_nav_menu() in one location.
				register_nav_menus( array(
					'primary' => esc_html__( 'Menu principal', 'jbyalexa' ),
					'social' => esc_html__(' Menu social', 'jbyalexa'),
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

				/*
				 * Enable support for Post Formats.
				 * See https://developer.wordpress.org/themes/functionality/post-formats/
				 */
				add_theme_support( 'post-formats', array(
					'aside',
					'image',
					'video',
					'quote',
					'link',
				) );

				// Set up the WordPress core custom background feature.
				add_theme_support( 'custom-background', apply_filters( 'jbyalexa_custom_background_args', array(
					'default-color' => 'ffffff',
					'default-image' => '',
				) ) );
		endif;


}
endif;
add_action( 'after_setup_theme', 'jbyalexa_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function jbyalexa_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'jbyalexa' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'jbyalexa' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'jbyalexa_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function jbyalexa_scripts() {
//	wp_enqueue_style( 'jbyalexa-style', get_stylesheet_uri() );
	wp_enqueue_style( 'jbyalexa-font', 'https://fonts.googleapis.com/css?family=Raleway:400,800');
	wp_enqueue_style( 'jbyalexa-icons',  get_template_directory_uri() . '/stylesheets/iconsjby.css' );
	wp_enqueue_style( 'jbyalexa-style',  get_template_directory_uri() . '/stylesheets/styles.css' );
	wp_enqueue_script( 'jbyalexa-jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'jbyalexa-tether', 'https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'jbyalexa-bootstrap', get_template_directory_uri() . '/javascripts/bootstrap.min.js', array('jquery'), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'jbyalexa_scripts' );

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
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/bs4navwalker.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

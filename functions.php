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
				add_image_size( 'post-medium', 465, 297, true );
			  add_image_size( 'category-thumb', 269, 134, true );

				// This theme uses wp_nav_menu() in one location.
				register_nav_menus( array(
					'primary' => esc_html__( 'Main Menu', 'jbyalexa' ),
					'social' => esc_html__('Social Menu', 'jbyalexa'),
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
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );


	add_filter( 'wpiw_img_class', 'my_instagram_class' );

	function my_instagram_class( $classes ) {
	    $classes = "img-fluid";
	    return $classes;
	}
}
add_action( 'widgets_init', 'jbyalexa_widgets_init' );



function jbyalexa_comment($comment, $args, $depth) {

    if ( 'div' === $args['style'] ) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }
		$args['avatar_size'] = 64;

		if($comment->comment_author == 'jbyalexa'):

		$classAdmin = ' adminComment';
		else:

		$classAdmin = ' ';

		endif;
    ?>
    <<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '': 'parent' ) ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
    <div id="div-comment-<?php comment_ID() ?>" class="comment-body row <?php echo $classAdmin;?>">
    <?php endif; ?>
    <div class="comment-card-left col-md-4 col-lg-4">

        <?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
				<div class="comment-author vcard">
        <?php printf( __( '<cite class="fn">%s</cite>'), get_comment_author_link() ); ?>
			 	</div>
				<div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
						<?php
						/* translators: 1: date, 2: time */
						printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)' ), '  ', '' );
						?></a>
				</div>
    </div>
		<div class="comment-card-right col-md-8 col-lg-8">
		    <?php comment_text(); ?>

				<?php if ( $comment->comment_approved == '0' ) : ?>
						 <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.','jbyalexa' ); ?></em>
						 <br />
				<?php endif; ?>
				<div class="reply  clearfix">
						<?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
				</div>
		</div>



    <?php if ( 'div' != $args['style'] ) : ?>
    </div>
    <?php endif;

    }
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
 	wp_enqueue_script( 'jbyalexa-main', get_template_directory_uri() . '/javascripts/main.js', array('jquery'), '20151215', true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'jbyalexa_scripts' );


function jbyalexa_add_favicon(){ ?>
    <!-- Custom Favicons -->
		<link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri();?>/stylesheets/img/favicon-32x32.png" sizes="32x32" />
		<link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri();?>/stylesheets/img/favicon-16x16.png" sizes="16x16" />
		  <?php }
add_action('wp_head','jbyalexa_add_favicon');

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

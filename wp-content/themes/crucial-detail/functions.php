<?php
/**
 * Crucial Detail functions and definitions
 *
 * @package Crucial Detail
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'crucial_detail_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function crucial_detail_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Crucial Detail, use a find and replace
	 * to change 'crucial-detail' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'crucial-detail', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'crucial-detail' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'crucial_detail_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // crucial_detail_setup
add_action( 'after_setup_theme', 'crucial_detail_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function crucial_detail_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'crucial-detail' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'crucial_detail_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function crucial_detail_scripts() {
	wp_enqueue_style( 'crucial-detail-style', get_stylesheet_uri() );

	wp_enqueue_script( 'crucial-detail-navigation', get_template_directory_uri() . '/build/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'crucial-detail-skip-link-focus-fix', get_template_directory_uri() . '/build/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'crucial_detail_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

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
 * Quinn's Functions
 */

// ADD PRODUCT POST TYPE
add_action( 'init', 'create_post_type' );
function create_post_type() {
  register_post_type( 'product',
    array(
      'labels' => array(
        'name' 				 => __( 'Products' ),
        'singular_name' 	 => __( 'Product' ),
	    'edit_item'          => __( 'Edit Product' ),
	    'new_item'           => __( 'New Product' ),
	    'all_items'          => __( 'All Products' ),
	    'view_item'          => __( 'View Product' ),
	    'search_items'       => __( 'Search Products' ),
	    'not_found'          => __( 'No products found' ),
	    'not_found_in_trash' => __( 'No products found in the Trash' ), 
	    'parent_item_colon'  => '',
	    'menu_name'          => 'Products'
      ),
      'public' => true,
      'has_archive' => true,
      'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'custom-fields'),
      'taxonomies' => array( 'post_tag' )
	  // 'category'
    )
  );
}
add_filter('pre_get_posts', 'query_post_type');
function query_post_type($query) {
  if(is_category() || is_tag()) {
    $post_type = get_query_var('post_type');
	if($post_type)
	    $post_type = $post_type;
	else
	    $post_type = array('post','cpt'); // replace cpt to your custom post type
    $query->set('post_type',$post_type);
	return $query;
    }
}

// NO COMMENTS
// Removes from admin menu
add_action( 'admin_menu', 'my_remove_admin_menus' );
function my_remove_admin_menus() {
    remove_menu_page( 'edit-comments.php' );
}
// Removes from post and pages
add_action('init', 'remove_comment_support', 100);

function remove_comment_support() {
    remove_post_type_support( 'post', 'comments' );
    remove_post_type_support( 'page', 'comments' );
}
// Removes from admin bar
function mytheme_admin_bar_render() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
}
add_action( 'wp_before_admin_bar_render', 'mytheme_admin_bar_render' );

// SETTING FEATURE IMAGES
add_theme_support( 'post-thumbnails' );







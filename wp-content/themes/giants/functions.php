<?php
/**
 * Giants functions and definitions
 *
 * @package Giants
 */


function my_flush_rewrite_rules() {
    flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'my_flush_rewrite_rules' );


/**
 * Set the custom post types.
 */
require_once locate_template('/inc/widget_guide.php');					// Image Upload Widget
require_once locate_template('/inc/custom-post-types.php');				// Custom Post Types Setup
require_once locate_template('/inc/custom-post-type-slides.php');		// Custom Post Type Slides
require_once locate_template('/inc/custom-post-type-venues.php');		// Custom Post Type Venues
require_once locate_template('/inc/custom-post-type-events.php');		// Custom Post Type Events
require_once locate_template('/inc/custom-post-type-services.php');		// Custom Post Type Services
require_once locate_template('/inc/shortcodes.php');					// Custom Shortcodes
require_once locate_template('/inc/custom.php');						// Custom Functions

add_action( 'admin_menu', 'my_remove_menu_pages' );

function my_remove_menu_pages() {
    remove_menu_page('edit.php');
    remove_menu_page('edit-comments.php');  
}

/**
 * ACF Include on production
 */
global $devmode;
$host = $_SERVER['HTTP_HOST'];
if($host == "giantsent.wpengine.com" or $host == "giantsenterprises.com" or $host == "giants.brick.agency" or $host == "giantsent.staging.wpengine.com" ) {
	define( 'ACF_LITE' , true );
	include_once locate_template('/inc/advanced-custom-fields/acf.php' );
	include_once locate_template('/inc/acf-wordpress-wysiwyg-field/acf-wp_wysiwyg.php' );
	include_once locate_template('/inc/acf-repeater/acf-repeater.php' );
	include_once locate_template('/inc/advanced-custom-fields.php' );
	$devmode = false;
}else{
	$devmode = true;
}


add_filter( 'manage_event_posts_columns', 'set_custom_edit_book_columns' );
add_action( 'manage_event_posts_custom_column' , 'custom_book_column', 10, 2 );

function set_custom_edit_book_columns($columns) {
    unset( $columns['author'] );
    $columns['active'] = __( 'Is Active', 'your_text_domain' );
    //$columns['publisher'] = __( 'Publisher', 'your_text_domain' );

    return $columns;
}

function custom_book_column( $column, $post_id ) {
    switch ( $column ) {

        case 'active' :
            $event_active = get_field( 'event_active', $post_id );
            if ( $event_active )
                echo '<span style="color:green;">is active</span>';
            else
                echo '<span style="color:red;">expired</span>';
            break;


    }
}

add_action( 'restrict_manage_posts', 'wpse45436_admin_posts_filter_restrict_manage_posts' );
function wpse45436_admin_posts_filter_restrict_manage_posts(){
    $type = 'event';
    if (isset($_GET['post_type'])) {
        $type = $_GET['post_type'];
    }

    //only add filter to post type you want
    if ('event' == $type){
        //change this to the list of values you want to show
        //in 'label' => 'value' format
        $values = array(
            'active' => 'active',
            'expired' => 'expired'
        );
        ?>
        <select name="event_active">
        <option value=""><?php _e('Filter By ', 'wose45436'); ?></option>
        <?php
            $current_v = isset($_GET['event_active']) ? $_GET['event_active'] : 'all';
            foreach ($values as $label => $value) {
                printf
                    (
                        '<option value="%s"%s>%s</option>',
                        $value,
                        $value == $current_v ? ' selected="selected"' : '',
                        $label
                    );
                }
        ?>
        </select>
        <?php
    }
}


//add_filter( 'parse_query', 'wpse45436_posts_filter' );
/**
 * if submitted filter by post meta
 * 
 * make sure to change META_KEY to the actual meta key
 * and POST_TYPE to the name of your custom post type
 * @author Ohad Raz
 * @param  (wp_query object) $query
 * 
 * @return Void
 */
function wpse45436_posts_filter( $query ){
    global $pagenow;
    $type = 'event';
    if (isset($_GET['post_type'])) {
        $type = $_GET['post_type'];
    }


	if ( 'event' == $type && is_admin() && $pagenow=='edit.php' && isset($_GET['event_active']) && $_GET['event_active'] == 'active') {
    	$query->query_vars['meta_key'] = 'event_active';
    	$query->query_vars['meta_value'] = 1;
	}elseif( 'event' == $type && is_admin() && $pagenow=='edit.php' && isset($_GET['event_active']) && $_GET['event_active'] == 'expired'){
		$query->query_vars['meta_key'] = 'event_active';
    	$query->query_vars['meta_value'] = 1;
    	$query->query_vars['meta_compare'] = 'NOT EXISTS';
	}elseif ( 'event' == $type && is_admin() && $pagenow=='edit.php') {
    	$query->query_vars['meta_key'] = 'event_active';
    	$query->query_vars['meta_value'] = 1;
	}
    
    
}


/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'giants_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function giants_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Giants, use a find and replace
	 * to change 'giants' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'giants', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'giants' ),
	) );

	register_nav_menus( array(
		'footer' => __( 'Footer Menu', 'giants' ),
	) );
	
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link'
	) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'giants_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // giants_setup
add_action( 'after_setup_theme', 'giants_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function giants_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'giants' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Top', 'giants' ),
		'id'            => 'footer-top',
		'description'   => '',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Middle', 'giants' ),
		'id'            => 'footer-middle',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="block %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title">',
		'after_title'   => '</div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Bottom', 'giants' ),
		'id'            => 'footer-bottom',
		'description'   => '',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );

	register_sidebar( array(
		'name'          => __( 'Social Menu', 'giants' ),
		'id'            => 'social',
		'description'   => '',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );
	register_sidebar( array(
		'name'          => __( 'Center Content', 'giants' ),
		'id'            => 'center_content',
		'description'   => '',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );
}
add_action( 'widgets_init', 'giants_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function giants_scripts() {
	//wp_enqueue_style( 'giants-style', get_stylesheet_uri() );

	wp_enqueue_script( 'giants-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'giants-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'giants_scripts' );

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
 * Image sizes
 */
require get_template_directory() . '/inc/image-sizes.php';

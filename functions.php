<?php
/**
 * Wp Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Wp_Theme
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function wp_theme_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Wp Theme, use a find and replace
		* to change 'wp-theme' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'wp-theme', get_template_directory() . '/languages' );

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
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'wp-theme' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'wp_theme_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'wp_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wp_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'wp_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'wp_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wp_theme_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'wp-theme' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'wp-theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'wp_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function wp_theme_scripts() {
	wp_enqueue_style( 'wp-theme-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'wp-theme-style', 'rtl', 'replace' );

	wp_enqueue_script( 'wp-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'wp_theme_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

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
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Register Custom Post Type
 */

function portfolio() {

	$labels = array(
		'name'                  => _x( 'portfolio', 'Post Type General Name', 'wp-theme' ),
		'singular_name'         => _x( 'portfolio', 'Post Type Singular Name', 'wp-theme' ),
		'menu_name'             => __( 'Portfolio', 'wp-theme' ),
		'name_admin_bar'        => __( 'Portfolio', 'wp-theme' ),
		'archives'              => __( 'Item Archives', 'wp-theme' ),
		'attributes'            => __( 'Item Attributes', 'wp-theme' ),
		'parent_item_colon'     => __( 'Parent Item:', 'wp-theme' ),
		'all_items'             => __( 'All Items', 'wp-theme' ),
		'add_new_item'          => __( 'Add New Item', 'wp-theme' ),
		'add_new'               => __( 'Add New', 'wp-theme' ),
		'new_item'              => __( 'New Item', 'wp-theme' ),
		'edit_item'             => __( 'Edit Item', 'wp-theme' ),
		'update_item'           => __( 'Update Item', 'wp-theme' ),
		'view_item'             => __( 'View Item', 'wp-theme' ),
		'view_items'            => __( 'View Items', 'wp-theme' ),
		'search_items'          => __( 'Search Item', 'wp-theme' ),
		'not_found'             => __( 'Not found', 'wp-theme' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'wp-theme' ),
		'featured_image'        => __( 'Featured Image', 'wp-theme' ),
		'set_featured_image'    => __( 'Set featured image', 'wp-theme' ),
		'remove_featured_image' => __( 'Remove featured image', 'wp-theme' ),
		'use_featured_image'    => __( 'Use as featured image', 'wp-theme' ),
		'insert_into_item'      => __( 'Insert into item', 'wp-theme' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'wp-theme' ),
		'items_list'            => __( 'Items list', 'wp-theme' ),
		'items_list_navigation' => __( 'Items list navigation', 'wp-theme' ),
		'filter_items_list'     => __( 'Filter items list', 'wp-theme' ),
	);
	$args   = array(
		'label'               => __( 'portfolio', 'wp-theme' ),
		'description'         => __( 'Post Type Description', 'wp-theme' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail', 'comments' ),
		'taxonomies'          => array( 'portfolio_category' ),
		'hierarchical'        => true,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-format-gallery',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'portfolio', $args );

}
add_action( 'init', 'portfolio', 0 );

/**
 * Register Custom Taxonomy Category
 */
function custom_portfolio_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Portfolio Categories', 'Taxonomy General Name', 'wp-theme' ),
		'singular_name'              => _x( 'Portfolio Category', 'Taxonomy Singular Name', 'wp-theme' ),
		'menu_name'                  => __( 'Portfolio Category', 'wp-theme' ),
		'all_items'                  => __( 'All Items', 'wp-theme' ),
		'parent_item'                => __( 'Parent Item', 'wp-theme' ),
		'parent_item_colon'          => __( 'Parent Item:', 'wp-theme' ),
		'new_item_name'              => __( 'New Item Name', 'wp-theme' ),
		'add_new_item'               => __( 'Add New Item', 'wp-theme' ),
		'edit_item'                  => __( 'Edit Item', 'wp-theme' ),
		'update_item'                => __( 'Update Item', 'wp-theme' ),
		'view_item'                  => __( 'View Item', 'wp-theme' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'wp-theme' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'wp-theme' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'wp-theme' ),
		'popular_items'              => __( 'Popular Items', 'wp-theme' ),
		'search_items'               => __( 'Search Items', 'wp-theme' ),
		'not_found'                  => __( 'Not Found', 'wp-theme' ),
		'no_terms'                   => __( 'No items', 'wp-theme' ),
		'items_list'                 => __( 'Items list', 'wp-theme' ),
		'items_list_navigation'      => __( 'Items list navigation', 'wp-theme' ),
	);
	$args   = array(
		'labels'            => $labels,
		'hierarchical'      => true,
		'public'            => true,
		'show_ui'           => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud'     => true,
	);
	register_taxonomy( 'portfolio_category', array( 'portfolio' ), $args );

}
add_action( 'init', 'custom_portfolio_taxonomy', 0 );

/**
 * Register Custom Taxonomy Tag
 */
function custom_portfolio_taxonomy_tag() {

	$labels = array(
		'name'                       => _x( 'Portfolio Tags', 'Taxonomy General Name', 'wp-theme' ),
		'singular_name'              => _x( 'Portfolio tag', 'Taxonomy Singular Name', 'wp-theme' ),
		'menu_name'                  => __( 'Portfolio Tag', 'wp-theme' ),
		'all_items'                  => __( 'All Items', 'wp-theme' ),
		'parent_item'                => __( 'Parent Item', 'wp-theme' ),
		'parent_item_colon'          => __( 'Parent Item:', 'wp-theme' ),
		'new_item_name'              => __( 'New Item Name', 'wp-theme' ),
		'add_new_item'               => __( 'Add New Item', 'wp-theme' ),
		'edit_item'                  => __( 'Edit Item', 'wp-theme' ),
		'update_item'                => __( 'Update Item', 'wp-theme' ),
		'view_item'                  => __( 'View Item', 'wp-theme' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'wp-theme' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'wp-theme' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'wp-theme' ),
		'popular_items'              => __( 'Popular Items', 'wp-theme' ),
		'search_items'               => __( 'Search Items', 'wp-theme' ),
		'not_found'                  => __( 'Not Found', 'wp-theme' ),
		'no_terms'                   => __( 'No items', 'wp-theme' ),
		'items_list'                 => __( 'Items list', 'wp-theme' ),
		'items_list_navigation'      => __( 'Items list navigation', 'wp-theme' ),
	);
	$args   = array(
		'labels'            => $labels,
		'hierarchical'      => false,
		'public'            => true,
		'show_ui'           => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud'     => true,
	);
	register_taxonomy( 'portfolio_tag', array( 'portfolio' ), $args );

}
add_action( 'init', 'custom_portfolio_taxonomy_tag', 0 );


function themeslug_enqueue_script() {
	wp_enqueue_script( 'pagination-js', get_template_directory_uri() . '/portfolio-pagination.js', array(), 1.0, true );
}

add_action( 'wp_enqueue_scripts', 'themeslug_enqueue_script' );

  //  Custom post type pagination function 
	
  function cpt_pagination($pages = '', $range = 4)
  {
	  $showitems = ($range * 2)+1;
	  global $paged;
	  if(empty($paged)) $paged = 1;
	  if($pages == '')
	  {
		  global $wp_query;
		  $pages = $wp_query->max_num_pages;
		  if(!$pages)
		  {
			  $pages = 1;
		  }
	  }
	  if(1 != $pages)
	  {
		  echo "<nav aria-label='Page navigation example'>  <ul class='pagination'> <span>Page ".$paged." of ".$pages."</span>";
		  if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; First</a>";
		  if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a>";
		  for ($i=1; $i <= $pages; $i++)
		  {
			  if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
			  {
				  echo ($paged == $i)? "<li class=\"page-item active\"><a class='page-link'>".$i."</a></li>":"<li class='page-item'> <a href='".get_pagenum_link($i)."' class=\"page-link\">".$i."</a></li>";
			  }
		  }
		  if ($paged < $pages && $showitems < $pages) echo " <li class='page-item'><a class='page-link' href=\"".get_pagenum_link($paged + 1)."\">i class='flaticon flaticon-back'></i></a></li>";
		  if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo " <li class='page-item'><a class='page-link' href='".get_pagenum_link($pages)."'><i class='flaticon flaticon-arrow'></i></a></li>";
		  echo "</ul></nav>\n";
	  }
}

//add_action( 'init', 'cpt_pagination');



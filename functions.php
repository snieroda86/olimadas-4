<?php
/**
 * web14devsn functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package web14devsn
 */

define('PATH_SN' , get_bloginfo('template_url'));

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'web14devsn_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function web14devsn_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on web14devsn, use a find and replace
		 * to change 'web14devsn' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'web14devsn', get_template_directory() . '/languages' );

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
				'menu-primary' => esc_html__( 'Menu główne', 'web14devsn' ),
				// 'menu-footer-1' => esc_html__( 'Menu footer 1', 'web14devsn' ),
				// 'menu-footer-1' => esc_html__( 'Menu footer 1', 'web14devsn' ),
				
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
				'web14devsn_custom_background_args',
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
endif;
add_action( 'after_setup_theme', 'web14devsn_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function web14devsn_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'web14devsn_content_width', 640 );
}
add_action( 'after_setup_theme', 'web14devsn_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function web14devsn_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'web14devsn' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'web14devsn' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	// Footer custom sidebars

	// Widget 1
	register_sidebar(
		array(
			'name'          => esc_html__( 'Widget 1', 'web14devsn' ),
			'id'            => 'f-widget-1',
			'description'   => esc_html__( '', 'web14devsn' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	// Widget 2
	register_sidebar(
		array(
			'name'          => esc_html__( 'Widget 2', 'web14devsn' ),
			'id'            => 'f-widget-2',
			'description'   => esc_html__( '', 'web14devsn' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	// Widget 3
	register_sidebar(
		array(
			'name'          => esc_html__( 'Widget 3', 'web14devsn' ),
			'id'            => 'f-widget-3',
			'description'   => esc_html__( '', 'web14devsn' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	// Widget 4
	register_sidebar(
		array(
			'name'          => esc_html__( 'Widget 4', 'web14devsn' ),
			'id'            => 'f-widget-4',
			'description'   => esc_html__( '', 'web14devsn' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);



}
add_action( 'widgets_init', 'web14devsn_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function web14devsn_scripts() {
	wp_enqueue_style( 'nunito-sans-sn', 'https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;600;800;900&family=Nunito:wght@300;400;500;600;700&display=swap' );
  
	wp_enqueue_style( 'web14devsn-style-bootstrap', get_template_directory_uri().'/bootstrap/css/bootstrap.min.css', array(), _S_VERSION );

	wp_enqueue_style( 'web14devsn-style-slick',get_template_directory_uri().'/plugins/slick-slider/slick.css', array(), _S_VERSION );

	// Datatables
	wp_enqueue_style( 'web14devsn-datatables-css','//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css', array(), _S_VERSION );
	// Flags
	wp_enqueue_style( 'web14devsn-flags-css','https://jsuites.net/v4/jsuites.css', array(), _S_VERSION );

	// Datepicker
	wp_enqueue_style( 'web14devsn-datepicker-css','https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/css/bootstrap-datepicker.min.css', array(), _S_VERSION );

	// Autocomplete
	wp_enqueue_style( 'web14devsn-autocomplete-css','https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css', array(), _S_VERSION );

	wp_enqueue_style( 'web14devsn-style-css', get_template_directory_uri().'/dist/css/style.css', array(), _S_VERSION );


	// Add js scripts
	wp_enqueue_script( 'web14devsn-popper-js', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js', array("jquery"), _S_VERSION, true );
	wp_enqueue_script( 'web14devsn-bootstrap-js', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js', array("jquery"), _S_VERSION, true );

	// wp_enqueue_script( 'web14devsn-aos-js', 'https://unpkg.com/aos@next/dist/aos.js', array("jquery"), _S_VERSION, true );

	wp_enqueue_script( 'web14devsn-js-slick',get_template_directory_uri().'/plugins/slick-slider/slick.min.js', array("jquery"), _S_VERSION , true);

	wp_enqueue_script( 'web14devsn-datatables-js','//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js', array("jquery"), _S_VERSION , true);
	// Bootstrap select
	wp_enqueue_script( 'web14devsn-bootstrap-select-js','https://jsuites.net/v4/jsuites.js', array("jquery"), _S_VERSION , false);

	// Datepicker
	wp_enqueue_script( 'web14devsn-datepicker-js','https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/js/bootstrap-datepicker.min.js', array("jquery"), _S_VERSION , false);
	// Autocomplete
	wp_enqueue_script( 'web14devsn-autocomplete-js','https://code.jquery.com/ui/1.10.4/jquery-ui.js', array("jquery"), _S_VERSION , false);

	wp_enqueue_script( 'web14devsn-main-js', get_template_directory_uri() . '/dist/js/main.js', array("jquery"), _S_VERSION, true );

	
}
add_action( 'wp_enqueue_scripts', 'web14devsn_scripts' );

// Custom Query vars
function sn_custom_query_vars($vars) {
    $vars[] = 'user_action';
    return $vars;
}
add_filter('query_vars', 'sn_custom_query_vars');


/*
 * Login page style
 */
function my_login_stylesheet() {
    wp_enqueue_style( 'custom-login-sn', get_template_directory_uri().'/dist/css/style-login.css' );
}
add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );

/**
 * Customizer additions.
 */
// require get_template_directory() . '/inc/customizer.php';

/**
 * Custom posts
 */
require get_template_directory() . '/inc/custom-posts.php';

/**
 * Custom database tables
 */
require get_template_directory() . '/inc/custom-db_tables.php';

// Disable gutenberg editor
add_filter( 'use_block_editor_for_post', '__return_false' );

/**
 * Register Custom Navigation Walker
 */
function register_navwalker(){
	require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );

// Include ACF plugin
// Define path and URL to the ACF plugin.
define( 'MY_ACF_PATH', get_stylesheet_directory() . '/includes/acf/' );
define( 'MY_ACF_URL', get_stylesheet_directory_uri() . '/includes/acf/' );

// Include the ACF plugin.
include_once( MY_ACF_PATH . 'acf.php' );

// Customize the url setting to fix incorrect asset URLs.
add_filter('acf/settings/url', 'my_acf_settings_url');
function my_acf_settings_url( $url ) {
    return MY_ACF_URL;
}


// ACF local JSON
add_filter('acf/settings/save_json', 'my_acf_json_save_point');
 
function my_acf_json_save_point( $path ) {

    $path = get_stylesheet_directory() . '/acf-json';
    return $path;
    
}

// Open modal menu item
add_filter( 'wp_nav_menu_items', 'sn_add_open_modal_menu_item', 10, 2 );
function sn_add_open_modal_menu_item( $items, $args ) {
   
    if ($args->theme_location == 'menu-primary') {
        $items .= '<li class="menu-item nav-item"><a href="#" data-toggle="modal" data-target="#virtual-parents-modal" class="nav-link">Virtual parents</a></li>';
    }
    return $items;
}

// Actions
/**
 * 
 */
require get_template_directory() . '/inc/save-custom_post-actions.php';
require get_template_directory() . '/inc/custom-queries.php';
require get_template_directory() . '/inc/customize-login_page.php';

// Search result - redirect
require get_template_directory() . '/inc/search-result.php';


// Get owner nationality
add_action('wp_ajax_get_owner_nationality', 'get_owner_nationality');
add_action('wp_ajax_nopriv_get_owner_nationality', 'get_owner_nationality'); // Jeśli obsługuje żądania dla użytkowników niezalogowanych

function get_owner_nationality() {
    if (isset($_POST['name'])) {
        $name = sanitize_text_field($_POST['name']);
        
        $get_owner = get_page_by_title( $name , OBJECT , 'hodowcy_psow');
        if(!empty($get_owner)){
        	$owner_nationality = get_field('narodowosc' , $get_owner->ID );
        	echo $owner_nationality;

        }else{
        	echo '';
        }
        
        wp_die(); 
    }
}
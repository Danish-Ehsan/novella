<?php
/**
 * novella functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package novella
 */

if ( ! function_exists( 'novella_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function novella_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on novella, use a find and replace
		 * to change 'novella' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'novella', get_template_directory() . '/languages' );

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
			'main-menu' => esc_html__( 'Primary', 'novella' )
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
		add_theme_support( 'custom-background', apply_filters( 'novella_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

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
	}
endif;
add_action( 'after_setup_theme', 'novella_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function novella_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'novella_content_width', 640 );
}
add_action( 'after_setup_theme', 'novella_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function novella_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'novella' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'novella' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'novella_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function novella_scripts() {
	wp_enqueue_style( 'novella-style', get_stylesheet_uri() );
        
    wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css?family=Raleway:400,600,800,900&display=swap', false );

	wp_enqueue_script( 'novella-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'novella-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

        wp_enqueue_script( 'jquery' );
        
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
        
		//Enqueue video page script which gets data from wordpress
		if (is_post_type_archive('videos')) {
			wp_enqueue_script( 'videos-page-js', get_template_directory_uri() . '/js/videos-page.js', array(), false, true );
		}
		
        //Owl Carousel Files
        wp_enqueue_style( 'owl-carousel-main-css', get_template_directory_uri() . '/inc/owl-carousel/owl.carousel.css', array(), false, false );
        wp_enqueue_style( 'owl-carousel-theme-css', get_template_directory_uri() . '/inc/owl-carousel/owl.theme.default.css', array(), false, false );
        wp_enqueue_script( 'owl-carousel-js', get_template_directory_uri() . '/inc/owl-carousel/owl.carousel.min.js', array(), false, true );
		wp_enqueue_script( 'owl-carousel-home-js', get_template_directory_uri() . '/js/owl.carousel.home.js', array(), false, true );
		wp_enqueue_script( 'owl-carousel-post-js', get_template_directory_uri() . '/js/owl.carousel.post.js', array(), false, true );
		
		if (is_post_type_archive('videos')) {
			wp_enqueue_script( 'owl-carousel-videos-js', get_template_directory_uri() . '/js/owl.carousel.videos.js', array(), false, true );
		}
			
		//Isotope Masonry Layout
		wp_enqueue_script( 'isotope-js', get_template_directory_uri() . '/inc/isotope.pkgd.min.js', array(), false, false );
		wp_enqueue_script( 'images-loaded-js', get_template_directory_uri() . '/inc/imagesloaded.pkgd.min.js', array(), false, false );
		wp_enqueue_script( 'isotope-init-js', get_template_directory_uri() . '/js/isotope-init.js', array(), false, true );
		
		
}
add_action( 'wp_enqueue_scripts', 'novella_scripts' );

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



// Custom image size for Things We Love
add_image_size( 'medium-square', 450, 450, true );



// add dropdown arrows to menu items that have sub menu
function oenology_add_menu_parent_class( $items ) {
 
 $parents = array();
 foreach ( $items as $item ) {
	if ( $item->menu_item_parent && $item->menu_item_parent > 0 ) {
		$parents[] = $item->menu_item_parent;
	}
 }
 
 foreach ( $items as $item ) {
	if ( in_array( $item->ID, $parents ) ) {
		$item->title .= '<i class="fas fa-chevron-down menu-item-dropdown-icon"></i>';
	}
 }
 
	return $items;
}
add_filter( 'wp_nav_menu_objects', 'oenology_add_menu_parent_class' );



//Category search only returns results from 'The Radar'
function search_filter_radar($query) {
    if ( ! is_admin() && $query->is_main_query() ) {
        if ( $query->is_category ) {
            $query->set( 'tax_query', array(
				array(
					'taxonomy'	=> 'blog',
					'field'		=> 'slug',
					'terms'		=> 'the_radar'
				)
			) );
        }
    }
}
add_action( 'pre_get_posts', 'search_filter_radar' );



//Hotlist, Perks, and Events posts return more results per page
function search_filter_masonry($query) {
    if ( ! is_admin() && $query->is_main_query() ) {
        if ( $query->is_tax('blog', 'hot_list') || $query->is_post_type_archive('events') || $query->is_post_type_archive('perks')) {
            $query->set( 'posts_per_page', 9 );
        }
    }
}
add_action( 'pre_get_posts', 'search_filter_masonry' );



//Things We Love posts return more results per page
function search_filter_twl($query) {
    if ( ! is_admin() && $query->is_main_query() ) {
        if ( $query->is_post_type_archive('things_we_love') ) {
            $query->set( 'posts_per_page', 24 );
        }
    }
}
add_action( 'pre_get_posts', 'search_filter_twl' );



//Videos posts gets all posts
function search_filter_videos($query) {
    if ( ! is_admin() && $query->is_main_query() ) {
        if ( $query->is_post_type_archive('videos')) {
            $query->set( 'posts_per_page', -1 );
        }
    }
}
add_action( 'pre_get_posts', 'search_filter_videos' );
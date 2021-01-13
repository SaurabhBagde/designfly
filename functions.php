<?php
/**
 * DsignFly functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package DsignFly
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'dsign_fly_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function dsign_fly_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on DsignFly, use a find and replace
		 * to change 'dsign-fly' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'dsign-fly', get_template_directory() . '/languages' );

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
				'menu-1' => esc_html__( 'Primary', 'dsign-fly' ),
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
				'dsign_fly_custom_background_args',
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
add_action( 'after_setup_theme', 'dsign_fly_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function dsign_fly_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'dsign_fly_content_width', 640 );
}
add_action( 'after_setup_theme', 'dsign_fly_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function dsign_fly_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'dsign-fly' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'dsign-fly' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'dsign_fly_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function dsign_fly_scripts() {
	wp_enqueue_style( 'dsign-fly-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'dsign-fly-style', 'rtl', 'replace' );

	wp_enqueue_script( 'dsign-fly-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.js', array(), '3.5.0', true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array(), '4.0.0', true );
	wp_enqueue_script( 'foundation', get_template_directory_uri() . '/js/foundation.js', array(), '6.6.3', true );
	wp_enqueue_script( 'foundation-js-map', get_template_directory_uri() . '/js/foundation.js.map', array(), '3.0.0', true );
	wp_enqueue_script( 'vendor', get_template_directory_uri() . '/js/vendor.js', array(), '3.4.1', true );
	wp_enqueue_script( 'app', get_template_directory_uri() . '/js/app.js', array(), '1.0.0', true );
	wp_enqueue_style( 'foundation-css', get_template_directory_uri() . '/css/foundation.css', array(), '6.6.3' );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootsrap.css', array(), '6.6.3' );
	wp_enqueue_style( 'main', get_template_directory_uri() . '/css/main.css', array(), '1.0.0' );
	wp_enqueue_style( 'normalize', get_template_directory_uri() . '/css/normalize.css', array(), '8.0.1' );
	wp_enqueue_style( 'open-sans-bold', 'https://fonts.googleapis.com/css2?family=Open+Sans:wght@700&display=swap', array(), '1.0.0' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'dsign_fly_scripts' );



$dsignfly_dependencies = apply_filters(
	'dsignfly-dependencies',
	array(
		get_template_directory() . '/inc/*.php',
		get_template_directory() . '/admin/*.php',
	)
);
foreach ( $dsignfly_dependencies as $path ) {
	foreach ( glob( $path ) as $filename ) {
		require_once $filename;
	}
}

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


<?php

/**
 * easy-connect-widget functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package easy-connect-widget
 */

if (! defined('ECW_VERSION')) {
	// Replace the version number of the theme on each release.
	define('ECW_VERSION', '1.0.0');
}

define('CONTACT_EMAIL', '');

require get_template_directory() . '/inc/contact-form7-settings.php';

require get_template_directory() . '/inc/wocommerce-settings.php';

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function ecw_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on easy-connect-widget, use a find and replace
		* to change 'ecw' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('ecw', get_template_directory() . '/languages');

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support('title-tag');

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'main-menu' => esc_html__('Main Menu', 'ecw'),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');
}
add_action('after_setup_theme', 'ecw_setup');

/**
 * Enqueue scripts and styles.
 */
function ecw_scripts()
{
	wp_enqueue_style('ecw-style', get_stylesheet_uri(), array(), ECW_VERSION);
	// wp_enqueue_style(
	// 	'swiper-style',
	// 	'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css',
	// 	array(),
	// 	false
	// );

	wp_enqueue_script(
		'navigation',
		get_template_directory_uri() . '/assets/js/navigation/navigation.js',
		array(),
		ECW_VERSION,
		true
	);

	// wp_enqueue_script(
	// 	'swiper',
	// 	'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js',
	// 	array(),
	// 	false,
	// 	true
	// );

	// wp_enqueue_script(
	// 	'slider',
	// 	get_template_directory_uri() . '/assets/js/slider/slider.js',
	// 	array(),
	// 	ECW_VERSION,
	// 	true
	// );

	wp_enqueue_script(
		'scrollreveal',
		'https://unpkg.com/scrollreveal',
		array(),
		false,
		true
	);

	wp_enqueue_script(
		'faq',
		get_template_directory_uri() . '/assets/js/faq/faq.js',
		array(),
		false,
		true
	);

	// wp_enqueue_script(
	// 	'micromodal',
	// 	'https://unpkg.com/micromodal/dist/micromodal.min.js',
	// 	array(),
	// 	false,
	// 	true
	// );

  wp_enqueue_script(
    'bundle',
    get_template_directory_uri() . '/assets/js/bundle.js',
    array(),
    ECW_VERSION,
    true
  );
}
add_action('wp_enqueue_scripts', 'ecw_scripts');


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
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

// Регистрация кастомного типа записи "Часто задаваемые вопросы"
function register_faq_post_type() {
	$labels = array(
		'name'              =>
		__('FAQ', 'ecw'),
		'singular_name'     =>
		__('FAQ', 'ecw'),
		'add_new'           =>
		__('Add', 'ecw'),
		'add_new_item'      =>
		__('Add', 'ecw'),
		'edit_item'         =>
		__('Edit', 'ecw'),
		'new_item'          =>
		__('Add New', 'ecw'),
		'view_item'         =>
		__('View', 'ecw'),
		'parent_item_colon' => '',
		'menu_name'         => __('FAQ', 'ecw'),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => false,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'faq' ),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', ),
		'show_in_rest'       => true,
		'menu_icon'          => 'dashicons-screenoptions',
	);

	register_post_type( 'faq', $args );
}

add_action( 'init', 'register_faq_post_type' );

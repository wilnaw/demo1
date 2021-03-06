<?php
/**
 * Genesis Sample.
 *
 * This file adds functions to the Genesis Sample Theme.
 *
 * @package Genesis Sample
 * @author  StudioPress
 * @license GPL-2.0+
 * @link    http://www.studiopress.com/
 */

// Start the engine.
include_once( get_template_directory() . '/lib/init.php' );

// Setup Theme.
include_once( get_stylesheet_directory() . '/lib/theme-defaults.php' );

// Set Localization (do not remove).
add_action( 'after_setup_theme', 'genesis_sample_localization_setup' );

function genesis_sample_localization_setup(){
	load_child_theme_textdomain( 'genesis-sample', get_stylesheet_directory() . '/languages' );
}

// Add the helper functions.
include_once( get_stylesheet_directory() . '/lib/helper-functions.php' );

// Add Image upload and Color select to WordPress Theme Customizer.
require_once( get_stylesheet_directory() . '/lib/customize.php' );

//// Include Customizer CSS.
//include_once( get_stylesheet_directory() . '/lib/output.php' );
//
//// Add WooCommerce support.
//include_once( get_stylesheet_directory() . '/lib/woocommerce/woocommerce-setup.php' );
//
//// Add the required WooCommerce styles and Customizer CSS.
//include_once( get_stylesheet_directory() . '/lib/woocommerce/woocommerce-output.php' );
//
//// Add the Genesis Connect WooCommerce notice.
//include_once( get_stylesheet_directory() . '/lib/woocommerce/woocommerce-notice.php' );

// Child theme (do not remove).
define( 'CHILD_THEME_NAME', 'Tier 1' );
define( 'CHILD_THEME_URL', 'http://www.wilnaudesign.com/' );
define( 'CHILD_THEME_VERSION', '1.0' );

// Enqueue Scripts and Styles.
add_action( 'wp_enqueue_scripts', 'genesis_sample_enqueue_scripts_styles' );
function genesis_sample_enqueue_scripts_styles() {

	wp_enqueue_style( 'genesis-sample-fonts', '//fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700', array(), CHILD_THEME_VERSION );
	wp_enqueue_style( 'dashicons' );

	$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';
	wp_enqueue_script( 'genesis-sample-responsive-menu', get_stylesheet_directory_uri() . "/js/responsive-menus{$suffix}.js", array( 'jquery' ), CHILD_THEME_VERSION, true );
	wp_localize_script(
		'genesis-sample-responsive-menu',
		'genesis_responsive_menu',
		genesis_sample_responsive_menu_settings()
	);

}

// Define our responsive menu settings.
function genesis_sample_responsive_menu_settings() {

	$settings = array(
		'mainMenu'          => __( 'Menu', 'genesis-sample' ),
		'menuIconClass'     => 'dashicons-before dashicons-menu',
		'subMenu'           => __( 'Submenu', 'genesis-sample' ),
		'subMenuIconsClass' => 'dashicons-before dashicons-arrow-down-alt2',
		'menuClasses'       => array(
			'combine' => array(
				'.nav-primary',
				'.nav-header',
			),
			'others'  => array(),
		),
	);

	return $settings;

}

// Add HTML5 markup structure.
add_theme_support( 'html5', array( 'caption', 'comment-form', 'comment-list', 'gallery', 'search-form' ) );

// Add Accessibility support.
add_theme_support( 'genesis-accessibility', array( '404-page', 'drop-down-menu', 'headings', 'rems', 'search-form', 'skip-links' ) );

// Add viewport meta tag for mobile browsers.
add_theme_support( 'genesis-responsive-viewport' );

// Add support for custom header.
add_theme_support( 'custom-header', array(
	'width'           => 600,
	'height'          => 160,
	'header-selector' => '.site-title a',
	'header-text'     => false,
	'flex-height'     => true,
) );

// Add support for custom background.
add_theme_support( 'custom-background' );

// Add support for after entry widget.
add_theme_support( 'genesis-after-entry-widget-area' );

// Add support for 3-column footer widgets.
add_theme_support( 'genesis-footer-widgets', 3 );

// Add Image Sizes.
add_image_size( 'featured-image', 720, 400, TRUE );
add_image_size( 'smaller-thumb', 60, 60, TRUE );
add_image_size('grid-thumbnail', 100, 100, TRUE);

// Rename primary and secondary navigation menus.
add_theme_support( 'genesis-menus', array( 'primary' => __( 'After Header Menu', 'genesis-sample' ), 'secondary' => __( 'Footer Menu', 'genesis-sample' ) ) );

// Reposition the secondary navigation menu.
remove_action( 'genesis_after_header', 'genesis_do_subnav' );
add_action( 'genesis_footer', 'genesis_do_subnav', 5 );

// Reduce the secondary navigation menu to one level depth.
add_filter( 'wp_nav_menu_args', 'genesis_sample_secondary_menu_args' );
function genesis_sample_secondary_menu_args( $args ) {

	if ( 'secondary' != $args['theme_location'] ) {
		return $args;
	}

	$args['depth'] = 1;

	return $args;

}

// Modify size of the Gravatar in the author box.
add_filter( 'genesis_author_box_gravatar_size', 'genesis_sample_author_box_gravatar' );
function genesis_sample_author_box_gravatar( $size ) {
	return 90;
}

// Add support for custom background
add_theme_support( 'custom-background' );

// Modify size of the Gravatar in the entry comments.
add_filter( 'genesis_comment_list_args', 'genesis_sample_comments_gravatar' );
function genesis_sample_comments_gravatar( $args ) {

	$args['avatar_size'] = 60;

	return $args;

}

//* Add above the fold section below header on Home page
genesis_register_sidebar( array(
    'id'          => 'home_after_header',
    'name'        => __( 'Home After Header', 'domain' ),
    'description' => __( 'Add content above the fold on Home page', 'domain' ),
) );

add_action( 'genesis_after_header', 'home_after_header' );
function home_after_header() {
    if ( is_front_page() && is_active_sidebar('home_after_header') ) {
        genesis_widget_area( 'home_after_header', array(
            'before' => '<div class="home_after_header widget-area"><div class="wrap">',
            'after' => '</div></div>',
        ) );

    }

}

//* Add above the fold section below header on About page
genesis_register_sidebar( array(
    'id'          => 'about_after_header',
    'name'        => __( 'About After Header', 'domain' ),
    'description' => __( 'Add content above the fold on About page', 'domain' ),
) );

add_action( 'genesis_after_header', 'about_after_header' );
function about_after_header() {
    if ( is_page ('8') ) {
        genesis_widget_area( 'about_after_header', array(
            'before' => '<div class="about_after_header widget-area"><div class="wrap">',
            'after' => '</div></div>',
	    ) );

	}

}

//* Add above the fold section below header on Start Here page
genesis_register_sidebar( array(
    'id'          => 'start_after_header',
    'name'        => __( 'Start Here After Header', 'domain' ),
    'description' => __( 'Add content above the fold on Start Here page', 'domain' ),
) );

add_action( 'genesis_after_header', 'start_after_header' );
function start_after_header() {
    if ( is_page ('684') ) {
        genesis_widget_area( 'start_after_header', array(
            'before' => '<div class="start_after_header widget-area"><div class="wrap">',
            'after' => '</div></div>',
        ) );

    }

}

//* Add above the fold section below header on Blog page
genesis_register_sidebar( array(
    'id'          => 'blog_after_header',
    'name'        => __( 'Blog After Header', 'domain' ),
    'description' => __( 'Add content above the fold on Blog page', 'domain' ),
) );

add_action( 'genesis_after_header', 'blog_after_header' );
function blog_after_header() {
    if ( is_page ('12') ) {
        genesis_widget_area( 'blog_after_header', array(
            'before' => '<div class="blog_after_header widget-area"><div class="wrap">',
            'after' => '</div></div>',
        ) );

    }

}

//* Add above the fold section below header on Contact page
genesis_register_sidebar( array(
    'id'          => 'contact_after_header',
    'name'        => __( 'Contact After Header', 'domain' ),
    'description' => __( 'Add content above the fold on Contact page', 'domain' ),
) );

add_action( 'genesis_after_header', 'contact_after_header' );
function contact_after_header() {
    if ( is_page ('587') ) {
        genesis_widget_area( 'contact_after_header', array(
            'before' => '<div class="contact_after_header widget-area"><div class="wrap">',
            'after' => '</div></div>',
        ) );

    }

}

//* Add above the fold section below header on Services page
genesis_register_sidebar( array(
    'id'          => 'services_after_header',
    'name'        => __( 'Services After Header', 'domain' ),
    'description' => __( 'Add content above the fold on Services page', 'domain' ),
) );

add_action( 'genesis_after_header', 'services_after_header' );
function services_after_header() {
    if ( is_page ('637') ) {
        genesis_widget_area( 'services_after_header', array(
            'before' => '<div class="services_after_header widget-area"><div class="wrap">',
            'after' => '</div></div>',
        ) );

    }

}

//* Register widget on Home page for magazine layout post categories
genesis_register_sidebar( array(
    'id'          => 'home-top',
    'name'        => __( 'Home - Top', 'magazine' ),
    'description' => __( 'This is the top section of the homepage.', 'magazine' ),
) );
genesis_register_sidebar( array(
    'id'          => 'home-middle',
    'name'        => __( 'Home - Middle', 'magazine' ),
    'description' => __( 'This is the middle section of the homepage.', 'magazine' ),
) );
genesis_register_sidebar( array(
    'id'          => 'home-bottom',
    'name'        => __( 'Home - Bottom', 'magazine' ),
    'description' => __( 'This is the bottom section of the homepage.', 'magazine' ),
) );
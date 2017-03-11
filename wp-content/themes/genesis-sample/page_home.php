<?php
/**
 * Genesis Sample.
 *
 * This file adds the home page template to the Genesis Sample Theme.
 *
 * Template Name: Home
 *
 * @package Genesis Sample
 * @author  StudioPress
 * @license GPL-2.0+
 * @link    http://www.studiopress.com/
 */

//* Template Name: Home

// add custom theme class to the body
add_filter( 'body_class', 'greycore_add_body_class' );
function greycore_add_body_class( $classes ) {
	$classes[] = 'greycore-home';
	return $classes;
}

// remove page/post title
remove_action('genesis_entry_header', 'genesis_do_post_title');

// add category loops to home
add_action( 'genesis_entry_content', 'cml_homecat' );
function cml_homecat() {
	if ( is_active_sidebar( 'home-cat-lg-1' ) || is_active_sidebar( 'home-cat-lg-2' ) ) {
		if ( is_active_sidebar( 'home-cat-lg-1' ) && is_active_sidebar( 'home-cat-lg-2' ) ) {
			echo '<div class="home-categories item-half">';
		} else { echo '<div class="home-categories">'; }
		if ( is_active_sidebar( 'home-cat-lg-1' ) ) {
			genesis_widget_area( 'home-cat-lg-1', array(
				'before' => '<div class="hc-item hc-one">',
				'after' => '</div>',
			) );
		}
		if ( is_active_sidebar( 'home-cat-lg-2' ) ) {
			genesis_widget_area( 'home-cat-lg-2', array(
				'before' => '<div class="hc-item hc-two">',
				'after' => '</div>',
			) );
		}
		if ( is_active_sidebar( 'home-latest' ) ) {
			genesis_widget_area( 'home-latest', array(
				'before' => '<div class="hc-latest hc-full">',
				'after' => '</div>',
			) );
		}
		if ( is_active_sidebar( 'home-access' ) ) {
			genesis_widget_area( 'home-access', array(
				'before' => '<div class="home-access">',
				'after' => '</div>',
			) );
		}
		if ( is_active_sidebar( 'home-cat-sm-1' ) ) {
			echo '<div class="home-categories item-third">';
			genesis_widget_area( 'home-cat-sm-1', array(
				'before' => '<div class="hc-item hc-three">',
				'after' => '</div>',
			) );
			genesis_widget_area( 'home-cat-sm-2', array(
				'before' => '<div class="hc-item hc-four">',
				'after' => '</div>',
			) );
			genesis_widget_area( 'home-cat-sm-3', array(
				'before' => '<div class="hc-item hc-five">',
				'after' => '</div>',
			) );
		}
		echo '</div>';
		if ( is_active_sidebar( 'home-cat-tab-1' ) || is_active_sidebar( 'home-cat-tab-2' ) || is_active_sidebar( 'home-cat-tab-3' ) || is_active_sidebar( 'home-cat-tab-4' ) || is_active_sidebar( 'home-cat-tab-5' ) ) {
			echo '<div class="home-tabs clearfix"><div class="ht-item-holder clearfix">';
			if ( is_active_sidebar( 'home-cat-tab-1' ) ) {
				genesis_widget_area( 'home-cat-tab-1', array(
					'before' => '<div class="ht-item hti-one active">',
					'after' => '</div>',
				) );
			}
			if ( is_active_sidebar( 'home-cat-tab-2' ) ) {
				genesis_widget_area( 'home-cat-tab-2', array(
					'before' => '<div class="ht-item hti-two">',
					'after' => '</div>',
				) );
			}
			if ( is_active_sidebar( 'home-cat-tab-3' ) ) {
				genesis_widget_area( 'home-cat-tab-3', array(
					'before' => '<div class="ht-item hti-three">',
					'after' => '</div>',
				) );
			}
			if ( is_active_sidebar( 'home-cat-tab-4' ) ) {
				genesis_widget_area( 'home-cat-tab-4', array(
					'before' => '<div class="ht-item hti-four">',
					'after' => '</div>',
				) );
			}
			if ( is_active_sidebar( 'home-cat-tab-5' ) ) {
				genesis_widget_area( 'home-cat-tab-5', array(
					'before' => '<div class="ht-item hti-five">',
					'after' => '</div>',
				) );
			}
			echo '</div></div>';
		}
	}
}


//* Run the Genesis loop
genesis();

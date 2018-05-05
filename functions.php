<?php
namespace LearningCurve;

define( 'NS', 'LearningCurve' ); // Define constant to alias for namespace.
define( 'CHILD_TEXT_DOMAIN', 'beans-learning-curve');
define( 'CHILD_THEME_DIR', get_stylesheet_directory() );

// Include Beans. Do not remove the line below.
require_once( get_template_directory() . '/lib/init.php' );

add_action( 'beans_uikit_enqueue_scripts', NS . '\enqueue_styles' );
/**
 * Enqueue the child styles - has basic css for the widgets
 */
function enqueue_styles() {

	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css' );

}

add_action( 'widgets_init', NS . '\register_widget_areas' );
/**
 * Register the home page widget areas.
 *
 * @return void
 */
function register_widget_areas() {
	// Multidimensional array of parameters required to register widget using Beans API
	// https://www.getbeans.io/code-reference/functions/beans_register_widget_area/
	$widgets_areas = array(
		array(
			'name'        => __( 'Home Top', CHILD_TEXT_DOMAIN ),
			'id'          => 'home-top',
			'description' => __( 'This is the top widget area on the landing page.', CHILD_TEXT_DOMAIN )
		),
		array(
			'name'        => __( 'Home Middle', CHILD_TEXT_DOMAIN ),
			'id'          => 'home-middle',
			'description' => __( 'This is the middle widget area on the landing page.', CHILD_TEXT_DOMAIN )
		),
		array(
			'name'        => __( 'Home Bottom', CHILD_TEXT_DOMAIN ),
			'id'          => 'home-bottom',
			'description' => __( 'This is the bottom widget area on the landing page.', CHILD_TEXT_DOMAIN )
		),
	);
	// Register each of the widget areas specified in the $widget_areas array
	// https://www.getbeans.io/code-reference/functions/beans_register_widget_area/
	// https://secure.php.net/manual/en/function.array-map.php
	array_map( 'beans_register_widget_area', $widgets_areas  );
}






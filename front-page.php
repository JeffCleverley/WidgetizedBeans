<?php
namespace LearningCurve;

// Check to see if any of the front-page home widgets are active. If they are then do stuff
// https://developer.wordpress.org/reference/functions/is_active_sidebar/
if ( is_active_sidebar( 'home-top' ) || is_active_sidebar( 'home-middle' ) || is_active_sidebar( 'home-bottom' ) ) {
	// Use HTML API to remove the 3/4 width class from the primary content area and replace it with a full width class.
	// https://www.getbeans.io/code-reference/functions/beans_replace_attribute/
	beans_replace_attribute( 'beans_primary', 'class', 'uk-width-medium-3-4', 'uk-container-center' );
	// Use the modify action callback to replace the beans loop with our own callback that displays widgets and sets page layout
	// https://www.getbeans.io/documentation/using-actions/
	// https://www.getbeans.io/code-reference/functions/beans_modify_action_callback/
	beans_modify_action_callback( 'beans_loop_template', NS . '\beansdev_display_home_widget_layout' );

}
/**
 * Callback that only runs if home page widgets are active.
 * Set page layout to full width
 * Display active widgets.
 */
function beansdev_display_home_widget_layout() {
	// Add callback on beans layout hook - callback will set full width layout.
	add_filter( 'beans_layout', NS . '\set_full_width_layout' );
	// Array with the id of each widget created in functions.php
	$home_widgets = [ 'home-top', 'home-middle', 'home-bottom' ];
	// Use array map to apply render callback to each of the widgets in the array
	// https://secure.php.net/manual/en/function.array-map.php
	array_map( NS . '\render_home_page_widgets', $home_widgets );
}


/**
 * Callback to render the home widget
 *
 * @param string $home_widget	ID of the widget to be rendered.
 */
function render_home_page_widgets( string $home_widget ) {
	// Check if the widget area is active before doing anything.
	// https://developer.wordpress.org/reference/functions/is_active_sidebar/
	if ( is_active_sidebar( $home_widget ) ) {
		// If the widget is active then load the home page widget view.
		// Widget ID is passed to the view and used to generate the class for CSS
		include CHILD_THEME_DIR . '/views/home-widgets.php';
	}
}


/**
 * Set the full width layout
 * @return string	string required to set the page layout to full width.
 */
function set_full_width_layout() {
	// c is the string that tells beans to force a full width layout.
	// https://www.getbeans.io/code-snippets/force-a-layout
	return 'c';
}

beans_load_document();
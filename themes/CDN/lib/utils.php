<?php
/**
 * Utility functions
 */
function add_filters($tags, $function) {
  foreach($tags as $tag) {
    add_filter($tag, $function);
  }
}

function is_element_empty($element) {
  $element = trim($element);
  return empty($element) ? false : true;
}

function edit_admin_menus() {
	global $menu;
	global $submenu;
	
	remove_menu_page('edit-comments.php'); // Remove the Comments Menu
	remove_menu_page('edit.php'); // Remove the Posts Menu
	// remove_menu_page('themes.php'); // Remove the appearance Menu
	// remove_menu_page('plugins.php'); // Remove the Comments Menu
}
add_action( 'admin_menu', 'edit_admin_menus' );

<?php

/**
 * Class mpc_Navigation
 */

class mpc_Navigation extends Walker_Nav_Menu {

	/**
	 * Adds custom class to dropdown menu for menu dropdown script
	 */
	function start_lvl( &$output, $depth = 0, $args = array() ){
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<span class=\"open-submenu\" ></span><ul class=\"menu submenu\">\n";
	}

	/**
	 * Adds custom class to parent item with dropdown menu
	 */
	function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {
		$id_field = $this->db_fields['id'];
		if ( !empty( $children_elements[ $element->$id_field ] ) ) {
			$element->classes[] = 'has-dropdown';
		}
		parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
	}
}



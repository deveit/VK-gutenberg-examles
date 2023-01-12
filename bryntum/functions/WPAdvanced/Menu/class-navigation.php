<?php

/**
 * Class mpc_Navigation
 */

class mpc_Navigation extends Walker_Nav_Menu {

	// private $curItem;
	/**
	 * Adds custom class to dropdown menu for menu dropdown script
	 */
	// function start_lvl( &$output, $depth = 0, $args = array() ){
	// 	var_dump($this->curItem->ID );
	// 	$indent = str_repeat("\t", $depth);
	// 	$output .= "\n$indent<input class=\"open-submenu\"  type=\"checkbox\" id=\"burger-".$this->curItem->ID."\" ><label for=\"burger-".$this->curItem->ID."\"></label><ul class=\"menu submenu\">\n";

	// }

	  // store the curItem
	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
		// $this->curItem = $item;
		// var_dump($item->ID) ;
		$output .= "<li class='" .  implode(" ", $item->classes) . "'>";

		$output .= '<a href="' . $item->url . '" class="h6_style">';

		$output .= $item->title;

		$output .= '</a>';

		if ($args->walker->has_children) {
			$output .= '<input type="checkbox" class="open-submenu"  id="burger-'. $item->ID .'"><label class="open-submenu-label" for="burger-'. $item->ID .'"><svg viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M7.52734 9.67969C7.84375 9.99609 8.37109 9.99609 8.6875 9.67969L15.543 2.85938C15.8594 2.50781 15.8594 1.98047 15.543 1.66406L14.7344 0.855469C14.418 0.539062 13.8906 0.539062 13.5391 0.855469L8.125 6.26953L2.67578 0.855469C2.32422 0.539062 1.79688 0.539062 1.48047 0.855469L0.671875 1.66406C0.355469 1.98047 0.355469 2.50781 0.671875 2.85938L7.52734 9.67969Z" />
</svg></label>';
		}
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



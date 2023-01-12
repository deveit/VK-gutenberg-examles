<?php


function hyper_taxonomies_video_category() {
 $labels = array(
   'name'              => _x( 'Video category', 'taxonomy general name' ),
   'singular_name'     => _x( 'Video category', 'taxonomy singular name' ),
   'search_items'      => __( 'Search video category' ),
   'all_items'         => __( 'All video categories' ),
   'parent_item'       => __( 'Parent video category' ),
   'parent_item_colon' => __( 'Parent video category:' ),
   'edit_item'         => __( 'Edit video category' ),
   'update_item'       => __( 'Update video category' ),
   'add_new_item'      => __( 'Add New video category' ),
   'new_item_name'     => __( 'New video category' ),
   'menu_name'         => __( 'Video category' ),
 );
 $args = array(
   'labels' => $labels,
   'hierarchical' => true,
   'show_in_rest'      => true, // Needed for tax to appear in Gutenberg editor.
 );
 register_taxonomy( 'video-category', 'video', $args );
}
add_action( 'init', 'hyper_taxonomies_video_category', 0 );

<?php

// add_action(
// 	'init',
// 	function () {
//         if (file_exists(__DIR__ . '/post-types')) {
//             $di = new DirectoryIterator(__DIR__ . '/post-types');
//             foreach ($di as $file) {
//                 if (!$file->isDot() && !$file->isDir()) {
//                     include_once $file->getRealPath();
//                 }
//             }
//         }
//         require_once __DIR__ . '/post-types-per-page.php';

// 	}
// );




// Register Post Type videos
function hyper_post_type_videos() {
    $hyper_post_type_videos_labels = array(
        'name'               => _x( 'Videos', 'post type general name' ),
        'singular_name'      => _x( 'Video', 'post type singular name' ),
        'add_new'            => _x( 'Add New video', 'video' ),
        'add_new_item'       => __( 'Add New video' ),
        'edit_item'          => __( 'Edit' ),
        'new_item'           => __( 'New ' ),
        'all_items'          => __( 'All' ),
        'view_item'          => __( 'View' ),
        'search_items'       => __( 'Search for a videos' ),
        'not_found'          => __( 'No videos found' ),
        'not_found_in_trash' => __( 'No videos found in the Trash' ),
        'parent_item_colon'  => 'Parent video',
        'menu_name'          => 'Videos'
    );
    $hyper_post_type_videos_args   = array(
        'labels'        => $hyper_post_type_videos_labels,
        'description'   => 'Display videos',
        'public'        => true,
        'menu_icon'     => 'dashicons-format-video',
        'menu_position' => 20,
        // 'rewrite'        => array('slug' => 'services'),
        'show_in_rest'  => true,
        'supports'      => array(
            'title',
            'thumbnail',
            'page-attributes',
            'editor',
            'excerpt'
        ),
        'has_archive'   => false,
        'hierarchical'  => true,
        // 'taxonomies' => array('post_tag')
    );
    register_post_type( 'video', $hyper_post_type_videos_args );
}

add_action( 'init', 'hyper_post_type_videos' );




// Register Post Type positions
// function tp_post_type_positions() {
//     $tp_post_type_positions_labels = array(
//         'name'               => _x( 'Positions', 'post type general name' ),
//         'singular_name'      => _x( 'Positions', 'post type singular name' ),
//         'add_new'            => _x( 'Add New', 'positions' ),
//         'add_new_item'       => __( 'Add New' ),
//         'edit_item'          => __( 'Edit' ),
//         'new_item'           => __( 'New ' ),
//         'all_items'          => __( 'All' ),
//         'view_item'          => __( 'View' ),
//         'search_items'       => __( 'Search for a positions' ),
//         'not_found'          => __( 'No positions found' ),
//         'not_found_in_trash' => __( 'No positions found in the Trash' ),
//         'parent_item_colon'  => 'Parent positions',
//         'menu_name'          => 'Positions'
//     );
//     $tp_post_type_positions_args   = array(
//         'labels'        => $tp_post_type_positions_labels,
//         'description'   => 'Display positions',
//         'public'        => true,
//         'menu_icon'     => 'dashicons-id',
//         'menu_position' => 20,
//         // 'rewrite'        => array('slug' => 'positions'),
//         'show_in_rest'  => true,
//         'supports'      => array(
//             'title',
//             'thumbnail',
//             'page-attributes',
//             'editor',
//             'excerpt'
//         ),
//         'has_archive'   => false,
//         'hierarchical'  => true,
//         // 'taxonomies' => array('post_tag')
//     );
//     register_post_type( 'positions', $tp_post_type_positions_args );
// }

// add_action( 'init', 'tp_post_type_positions' );

<?php

remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'wp_head', 'wp_resource_hints', 2);
remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10);
remove_action('template_redirect', 'rest_output_link_header', 11, 0);
remove_action('wp_head', 'rest_output_link_wp_head', 10);

//add_filter( 'show_admin_bar', '__return_false' );

add_action( 'wp_footer', function(){
    wp_dequeue_script( 'wp-embed' );
});

add_action( 'admin_menu', function(){
    remove_menu_page('edit-comments.php');
});
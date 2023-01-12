<?php

function fn_vk_posts_per_page( $query ) {
    if ( $query->is_archive() && is_post_type_archive('experts')) {
        set_query_var('posts_per_page', 12);
    }
}
add_action( 'pre_get_posts', 'fn_vk_posts_per_page' );
<?php

add_action('acf/init',  function(){
    if (function_exists('acf_register_block')) {
        acf_register_block(array(
            'name'              => 'video-list-section',
            'title'             => __('Video list'),
            'description'       => __('Block with video list'),
            'render_callback'   => 'my_acf_block_render_callback',
            'mode'              => 'edit',
            'supports'          => array( 'mode' => false, 'align' => false ),
            'category'          => 'nugget',
            'icon'              => 'playlist-video',
            'keywords'          => array( 'video', 'list', 'filter' ),
        ));
    }
});

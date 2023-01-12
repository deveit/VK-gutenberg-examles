<?php

add_action('acf/init',  function(){
    if (function_exists('acf_register_block')) {
        acf_register_block(array(
             'name'             => 'text-section',
            'title'             => __('Text section'),
            'description'       => __('Block with title, text and button'),
            'render_callback'   => 'my_acf_block_render_callback',
            'mode'              => 'edit',
            'supports'          => array( 'mode' => false, 'align' => false ),
            'category'          => 'nugget',
            'icon'              => 'text-page',
            'keywords'          => array( 'text','title','button'),
        ));
    }
});

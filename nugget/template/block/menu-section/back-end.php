<?php

add_action('acf/init',  function(){
    if (function_exists('acf_register_block')) {
        acf_register_block(array(
             'name'             => 'menu-section',
            'title'             => __('Menu section'),
            'description'       => __('Block with menu list'),
            'render_callback'   => 'my_acf_block_render_callback',
            'mode'              => 'edit',
            'supports'          => array( 'mode' => false, 'align' => false ),
            'category'          => 'nugget',
            'icon'              => 'menu-alt3',
            'keywords'          => array( 'menu'),
        ));
    }
});

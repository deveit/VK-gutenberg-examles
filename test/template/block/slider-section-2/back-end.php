<?php

add_action('acf/init',  function(){
    if (function_exists('acf_register_block')) {
        acf_register_block(array(
             'name'             => 'slider-section-2',
            'title'             => __('Slider section 2'),
            'description'       => __('Block with title text and slider'),
            'render_callback'   => 'my_acf_block_render_callback',
            // 'mode'              => 'edit',
            // 'supports'          => array( 'mode' => true, 'align' => false ),
            'category'          => 'vk',
            'icon'              => 'slides',
            'keywords'          => array( 'title','text','slider','carousel'),
        ));
    }
});

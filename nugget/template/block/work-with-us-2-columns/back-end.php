<?php

add_action('acf/init',  function(){
    if (function_exists('acf_register_block')) {
        acf_register_block(array(
             'name'             => 'work-with-us-2-columns',
            'title'             => __('Work with us - 2 columns'),
            'description'       => __('Block with 2 column'),
            'render_callback'   => 'my_acf_block_render_callback',
            'mode'              => 'edit',
            'supports'          => array( 'mode' => false, 'align' => false ),
            'category'          => 'nugget',
            'icon'              => 'columns',
            'keywords'          => array( 'columns','2','work','with','us'),
        ));
    }
});

<?php

add_action('acf/init',  function(){
    if (function_exists('acf_register_block')) {
        acf_register_block(array(
             'name'             => 'top-section-data-management',
            'title'             => __('Top section - data management'),
            'description'       => __('Block with title and image'),
            'render_callback'   => 'my_acf_block_render_callback',
            'mode'              => 'edit',
            'supports'          => array( 'mode' => false, 'align' => false ),
            'category'          => 'nugget',
            'icon'              => 'cover-image',
            'keywords'          => array( 'top','data','management'),
        ));
    }
});
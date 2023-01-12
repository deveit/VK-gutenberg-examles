<?php

add_action('acf/init',  function(){
    if (function_exists('acf_register_block')) {
        acf_register_block(array(
           'name'             => 'text-section-columns',
           'title'             => __('Text section - columns'),
           'description'       => __('Block with icon, title, and text'),
           'render_callback'   => 'my_acf_block_render_callback',
           'mode'              => 'edit',
           'supports'          => array( 'mode' => false, 'align' => false ),
           'category'          => 'nugget',
           'icon'              => 'columns',
           'keywords'          => array( 'text','4','3','columns'),
       ));
    }
});

<?php

add_action('acf/init',  function(){
    if (function_exists('acf_register_block')) {
        acf_register_block(array(
             'name'             => 'typeform-section',
            'title'             => __('Typeform section'),
            'description'       => __('Block with typeform'),
            'render_callback'   => 'my_acf_block_render_callback',
            'mode'              => 'edit',
            'supports'          => array( 'mode' => false, 'align' => false ),
            'category'          => 'nugget',
            'icon'              => 'editor-table',
            'keywords'          => array( 'typeform','form'),
        ));
    }
});

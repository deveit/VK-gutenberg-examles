<?php

add_action('acf/init',  function(){
    if (function_exists('acf_register_block')) {
        acf_register_block(array(
             'name'             => 'heading-section',
            'title'             => __('Heading section'),
            'description'       => __('Block with heading'),
            'render_callback'   => 'my_acf_block_render_callback',
            'mode'              => 'edit',
            'supports'          => array( 'mode' => false, 'align' => false ),
            'category'          => 'nugget',
            'icon'              => 'heading',
            'keywords'          => array( 'heading','title'),
        ));
    }
});

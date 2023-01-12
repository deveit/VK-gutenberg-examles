<?php

add_action('acf/init',  function(){
    if (function_exists('acf_register_block')) {
        acf_register_block(array(
             'name'             => 'contact-form-section',
            'title'             => __('Contact form section'),
            'description'       => __('Block with contact form'),
            'render_callback'   => 'my_acf_block_render_callback',
            'mode'              => 'edit',
            'supports'          => array( 'mode' => false, 'align' => false ),
            'category'          => 'nugget',
            'icon'              => 'format-chat',
            'keywords'          => array( 'contact','form'),
        ));
    }
});

<?php

add_action('acf/init',  function(){
	if (function_exists('acf_register_block')) {
		acf_register_block(array(
			'name'             => 'button-section',
			'title'             => __('Button section'),
			'description'       => __('Block with button'),
			'render_callback'   => 'my_acf_block_render_callback',
			'mode'              => 'edit',
			'supports'          => array( 'mode' => false, 'align' => false ),
			'category'          => 'nugget',
			'icon'              => 'button',
			'keywords'          => array( 'button'),
		));
	}
});

<?php

add_action('acf/init',  function(){
	if (function_exists('acf_register_block')) {
		acf_register_block(array(
			'name'             => 'hero-section',
			'title'             => __('Hero section'),
			'description'       => __('Block with hero section: image and title'),
			'render_callback'   => 'my_acf_block_render_callback',
			'mode'              => 'edit',
			'supports'          => array( 'mode' => false, 'align' => false ),
			'category'          => 'nugget',
			'icon'              => 'cover-image',
			'keywords'          => array( 'image','title','hero','section'),
			
		));
	}
});

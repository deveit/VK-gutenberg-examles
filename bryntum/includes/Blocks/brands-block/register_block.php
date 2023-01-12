<?php

$name = 'brands-block';
acf_register_block(
  array(
    'name' => $name,
    'title' => __('Brands block', 'mpc_lang'),
    'description' => __('Brands block', 'mpc_lang'),
    'render_template' => dirname(__FILE__).'/block.php',
    'category' => 'wpp_block_categories',
    'icon' => 'wordpress',
    'keywords' => array('Block', 'brands'),
    'mode' => 'edit',
    'example' => array(
      'attributes' => array(
        'mode' => 'preview',
        'data' => array(
          'preview_image_help' => get_template_directory_uri()."/includes/blocks/".$name."/img.png",
        )
      )
    )
  )
);


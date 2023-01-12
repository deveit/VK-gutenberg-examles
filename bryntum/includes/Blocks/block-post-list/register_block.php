<?php

$name = 'block-post-list';
acf_register_block_type(
  array(
    'name' => $name,
    'title' => __('Block - Post list', 'lang'),
    'description' => __('Block with 3 columns of post list', 'lang'),
    'render_template' => dirname(__FILE__).'/block.php',
    'category' => 'wpp_block_categories',
    'icon' => 'columns',
    'keywords' => array('block', 'post', 'list', 'columns', '3'),
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


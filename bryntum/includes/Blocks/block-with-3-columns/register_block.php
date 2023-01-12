<?php

$name = 'block-with-3-columns';
acf_register_block_type(
  array(
    'name' => $name,
    'title' => __('Block with 3 columns', 'lang'),
    'description' => __('Block with 3 columns: Icon, Title, Text', 'lang'),
    'render_template' => dirname(__FILE__).'/block.php',
    'category' => 'wpp_block_categories',
    'icon' => 'columns',
    'keywords' => array('block', 'title', 'text', 'columns', '3'),
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


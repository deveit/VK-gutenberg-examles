<?php

add_filter('use_block_editor_for_post_type', 'activate_gutenberg_products', 10, 2);
add_filter('block_categories', 'block_category', 10, 2);
//add_filter('register_taxonomy_args', 'activate_gutenberg_products_cat', 10, 2);
//add_action('acf/init', 'acf_blocks_init');

if (file_exists(get_theme_file_path('/includes/Blocks'))) {
  $di = new DirectoryIterator(get_theme_file_path('/includes/Blocks'));
  foreach ($di as $file) {
    if (!$file->isDot() && $file->isDir()) {
      $backEnd = $file->getPathname().'/register_block.php';
      if (file_exists($backEnd)) {
        include $backEnd;
      }
    }
  }
}

function block_category($categories, $post)
{
  if ($post->post_type == 'page' || $post->post_type == 'post' || $post->post_type == 'product') {
    $welcoop_blocks = array_merge(
      $categories,
      array(
        array(
          'slug' => 'mpc_block_categories',
          'title' => __('MPC Blocks', 'mpc_lang'),
        )
      )
    );
  } else {
    return $categories;
  }
  return $welcoop_blocks;
}

function activate_gutenberg_products($can_edit, $post_type)
{
  if ($post_type == 'product') {
    $can_edit = true;
  }

  return $can_edit;
}

//function activate_gutenberg_products_cat($args, $taxonomy_name)
//{
//  if ('product_tag' === $taxonomy_name || 'product_cat' === $taxonomy_name) {
//    $args['show_in_rest'] = true;
//  }
//
//  return $args;
//}

function mpc_register_block_type($name, $args = [])
{
  $path_to_file = "/includes/Blocks/${name}";
  $path_block = get_template_directory().$path_to_file;
  $path_preview = get_template_directory_uri().$path_to_file;

  $args = [
    'name' => $name,
    'title' => $args['title'] ?? $name,
    'description' => $args['description'] ?? $args['title'],
    'category' => 'mpc_block_categories',
    'icon' => $args['icon'] ?? 'admin-comments',
    'keywords' => $args['keywords'] ?? '',
    'mode' => 'edit',
    'render_template' => "${path_block}/block.php",
    'example' => [
      'attributes' => [
        'mode' => 'preview',
        'data' => [
          'preview_image_help' => "${path_preview}/img.png",
        ]
      ]
    ]
  ];

  acf_register_block_type($args);
}

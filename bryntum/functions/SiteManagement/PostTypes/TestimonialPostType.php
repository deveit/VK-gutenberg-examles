<?php

namespace SiteManagement\PostTypes;

use WPAdvanced\PostTypes\PostType;

class TestimonialPostType
{
  private $name = 'testimonial';
  private $args = [];


  public function __construct()
  {
    $this->setArgs();

    new PostType($this->name, $this->args);
  }

  private function setArgs()
  {
    $labels = array(
      'name' => _x('Testimonials', 'mpc_lang'),
      'singular_name' => _x('Testimonial', 'mpc_lang'),
      'menu_name' => __('Testimonials', 'mpc_lang'),
      'parent_item_colon' => __('Parent', 'mpc_lang'),
      'all_items' => __('All', 'mpc_lang'),
      'view_item' => __('View', 'mpc_lang'),
      'add_new_item' => __('Add ', 'mpc_lang'),
      'add_new' => __('Add', 'mpc_lang'),
      'edit_item' => __('Edit', 'mpc_lang'),
      'update_item' => __('Update', 'mpc_lang'),
      'search_items' => __('Search', 'mpc_lang'),
      'not_found' => __('Not Found', 'mpc_lang'),
      'not_found_in_trash' => __('Not found in Trash', 'mpc_lang'),
    );

    $this->args = array(
      'label' => __('Testimonial', 'mpc_lang'),
      'description' => __('Testimonials', 'mpc_lang'),
      'labels' => $labels,
      'supports' => array('title', 'custom-fields'),
      'taxonomies' => array(),
      'hierarchical' => false,
      'public' => true,
      'show_ui' => true,
      'show_in_menu' => true,
      'show_in_nav_menus' => true,
      'show_in_admin_bar' => true,
      'menu_position' => 5,
      'can_export' => true,
      'has_archive' => true,
      'exclude_from_search' => false,
      'publicly_queryable' => true,
      'capability_type' => 'post',
      'show_in_rest' => true,
    );
  }
}

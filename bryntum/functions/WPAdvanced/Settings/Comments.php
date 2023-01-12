<?php


namespace WPAdvanced\Settings;


class Comments
{
  private $settings;

  public function __construct( $settings )
  {
    $this->settings = $settings;

    if ($this->settings['disabled']) {
      $this->disabledComments();
    }
  }

  public function disabledComments() : void
  {
    add_action('admin_init', [$this, 'removeComments']);
    add_filter('comments_open', '__return_false', 20, 2);
    add_filter('pings_open', '__return_false', 20, 2);
    add_filter('comments_array', '__return_empty_array', 10, 2);
    add_action('admin_menu', [$this, 'removeCommentsInMenu']);
    add_action('init', [$this, 'removeCommentsInAdminBar']);
  }

  

  public function removeComments() : void
  {
    global $pagenow;

    if ($pagenow === 'edit-comments.php') {
      wp_redirect(admin_url());
      exit;
    }

    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');

    foreach (get_post_types() as $post_type) {
      if (post_type_supports($post_type, 'comments')) {
        remove_post_type_support($post_type, 'comments');
        remove_post_type_support($post_type, 'trackbacks');
      }
    }
  }

  public function removeCommentsInMenu() : void
  {
    remove_menu_page('edit-comments.php');
  }

  public function removeCommentsInAdminBar() : void
  {
    if (is_admin_bar_showing()) {
      remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
    }
  }
}
<?php


namespace WPAdvanced\Settings;


class JS
{
  private $settings;

  public function __construct( $settings )
  {
    $this->settings = $settings;

    add_action('wp_enqueue_scripts', [$this, 'loadFrontendJs']);
  }

  public function loadFrontendJs() : void
  {
    foreach ($this->settings['path'] as $path) {
      $this->registerScript($path);
    }
  }

  /**
   * @param $path
   */
  public function loadAdminJs($path) : void
  {
    foreach (apply_filters('wpf_loader_js_admin', []) as $path) {
      $this->registerScript($path);
    }
  }

  /**
   * @param $source
   */
  private function registerScript($source) : void
  {
    $handle = md5($source);

    if (strpos($source, 'http') !== false) {
      $url = $source;
      $parts = explode('?ver=', $url);
      $ver = (count($parts) > 1) ? $parts[1] : '';
    } else {
      $url = get_template_directory_uri().'/'.trim($source, '/');
      $path = get_template_directory().'/'.trim($source, '/');
      $ver = file_exists($path) ? filemtime($path) : time();
    }

    wp_register_script($handle, $url, [], $ver, true);
    wp_enqueue_script($handle);
  }
}
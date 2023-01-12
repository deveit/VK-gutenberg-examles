<?php

namespace WPAdvanced\Menu;

class _Core
{
  private $core;

  private $settings = [
    'menu' => [
      'top_nav' => 'Header menu',
      // 'footer_nav' => 'Footer menu',
    ]
  ];

  public function __construct($core)
  {
    $this->core = $core;
    $this->addingMenu = new Adding($core, $this->settings['menu']);
    $this->manageMenu = new Manage($core);
  }
}

<?php

namespace WPAdvanced;

class WPAdvanced
{
  public function __construct()
  {
    define('WPA_PATH', get_template_directory());

    new Admin\_Core();
    new Helpers\_Core($this);
    new Menu\_Core($this);
    new Settings\_Core();
    new Translate\_Core($this);
  }
}

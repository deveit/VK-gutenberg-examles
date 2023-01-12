<?php
namespace WPAdvanced\Translate;

class _Core
{
  private $core;

  public function __construct($core)
  {
    $this->core = $core;

    $this->theme = new Theme();
  }
}
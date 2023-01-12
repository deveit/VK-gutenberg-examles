<?php
namespace WPAdvanced\Helpers;

class _Core
{
  private $core;

  public function __construct($core)
  {
    $this->core = $core;

    $this->truncate = new Truncate($core);
  }
}
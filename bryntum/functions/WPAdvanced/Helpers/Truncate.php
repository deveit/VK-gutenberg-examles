<?php

namespace WPAdvanced\Helpers;

class Truncate
{

  public function __construct()
  {
    add_filter('wpa_cute_text', [$this, 'cuteText'], 10, 3);
  }

//  public function cuteText($text, $length, $suffix = '&hellip;', $isHTML = true)
//  {
//    $i = 0;
//    $simpleTags = array('br' => false, 'hr' => false, 'input' => false, 'image' => false, 'link' => false, 'meta' => false);
//    $tags = array();
//    if ($isHTML) {
//      preg_match_all('/<[^>]+>([^<]*)/', $text, $m, PREG_OFFSET_CAPTURE | PREG_SET_ORDER);
//      foreach ($m as $o) {
//        if ($o[0][1] - $i >= $length)
//          break;
//        $t = substr(strtok($o[0][0], " \t\n\r\0\x0B>"), 1);
//        if ($t[0] != '/' && (!isset($simpleTags[$t])))
//          $tags[] = $t;
//        elseif (end($tags) == substr($t, 1))
//          array_pop($tags);
//        $i += $o[1][1] - $o[0][1];
//      }
//    }
//
//    $output = substr($text, 0, $length = min(strlen($text), $length + $i));
//    $output2 = (count($tags = array_reverse($tags)) ? '</'.implode('></', $tags).'>' : '');
//
//    $pos = @(int) end(end(preg_split('/<.*>| /', $output, - 1, PREG_SPLIT_OFFSET_CAPTURE)));
//    $output .= $output2;
//
//    $one = substr($output, 0, $pos);
//    $two = substr($output, $pos, (strlen($output) - $pos));
//    preg_match_all('/<(.*?)>/s', $two, $tags);
//    if (strlen($text) > $length) {
//      $one .= $suffix;
//    }
//    $output = $one.implode($tags[0]);
//
//    $output = str_replace('</!-->', '', $output);
//
//    return $output;
//  }

  public function cuteText($text, $length = 150, $suffix = '&hellip;'): string
  {
    $text = trim(strip_tags($text));

    if (strlen($text) > $length) {
      $text = substr($text,0, $length) . $suffix;
    }

    return $text;
  }

}

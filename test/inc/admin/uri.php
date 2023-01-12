<?php

/**
 * @param string $url
 * @return string
 */

function uri($url = false) {
    if(!$url) return false;
    $homeDir = explode("/wp-content", get_template_directory());
    $uri = str_replace(home_url(), $homeDir[0], $url);
    return  $uri;
}
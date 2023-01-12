<?php

add_filter('clean_url', 'so_handle_038', 99, 3);
function so_handle_038($url, $original_url, $_context) {
    if (strstr($url, "googleapis.com") !== false) {
        $url = str_replace("&#038;", "&", $url); // or $url = $original_url
    }

    return $url;
}
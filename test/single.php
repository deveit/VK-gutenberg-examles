<?php
if ($object = get_queried_object()) {
    $dirFile = __DIR__ . '/template/single/' . $object->post_type . '.php';
    if (file_exists($dirFile)) {
        require_once $dirFile;
    } else {
        require_once __DIR__ . '/template/single/base.php';
    }
}
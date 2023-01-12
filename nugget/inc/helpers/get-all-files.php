<?php
//
//function getAllFiles($dir = false){
//    if (!$dir) return false;
//
//    $di = new DirectoryIterator($dir);
//
//    foreach ($di as $file) {
//        if (!$file->isDot() && !$file->isDir()) {
//            $files[] = $file->getRealPath();
//        } else if (!$file->isDot()) {
//            return getAllFiles($dir . '/' . $file->getFilename());
//        }
//    }
//
//    return $files;
//}
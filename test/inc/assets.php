<?php

// if (!defined('vCache')) { define('vCache', '1.0.0'); }




add_action(
    'wp_enqueue_scripts',
    function () {
        wp_enqueue_style( 'style', get_template_directory_uri() . '/css/style.min.css', [], date("Y.m.d.h.i.s") );
    }
);

add_action(
    'wp_enqueue_scripts',
    function () {
        wp_enqueue_script( 'jquery' );
        wp_enqueue_script( 'slick', get_template_directory_uri() . '/js/plugins/slick.min.js', null, null, true  );
        wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/scripts.min.js', [], date("Y.m.d.h.i.s") ) ;
    }
);


add_action(
    'admin_head',
    function () {
        wp_enqueue_style( 'style-admin', get_template_directory_uri() . '/css/style-admin.min.css', [], date("Y.m.d.h.i.s"));
    }
);
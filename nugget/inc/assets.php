<?php


add_action(
	'wp_enqueue_scripts',
	function () {
       // wp_dequeue_style( 'wp-block-library' );
        // wp_enqueue_style( 'slick', get_template_directory_uri() . '/css/plugins/slick.css', null, '1.6.0' );
        wp_enqueue_style( 'style', get_template_directory_uri() . '/css/style.min.css', null, '1.1' );
        wp_enqueue_style( 'fancybox', get_template_directory_uri() . '/css/plugins/jquery.fancybox.min.css', array(), 'all' );
//        wp_enqueue_style( 'style2', get_template_directory_uri() . '/css/style2.min.css', array(), 'all' );
	}
);

add_action(
    'wp_enqueue_scripts',
    function () {
      wp_dequeue_style('cookie-notice-front');
    }, 20
);


add_action(
	'wp_enqueue_scripts',
	function () {
       /* $keyMap = get_field("option-cmc__google-map-key", "option");
        wp_enqueue_script('map-google', 'https://maps.googleapis.com/maps/api/js?key=' . $keyMap . '&v=3.exp&libraries=geometry,places', array('jquery'), null, true);
        wp_enqueue_script('map-acf', get_template_directory_uri() . '/js/acf-map.min.js', array('jquery'), vCache, true);*/
        wp_enqueue_script( 'jquery' );
        wp_enqueue_script( 'fancybox', get_template_directory_uri() . '/js/plugins/jquery.fancybox.min.js', null, null, true  );
        wp_enqueue_script( 'jquery.selectric', get_template_directory_uri() . '/js/plugins/jquery.selectric.js', null, null, true  );
        // wp_enqueue_script( 'slick', get_template_directory_uri() . '/js/plugins/slick.min.js', null, null, true  );
        // wp_enqueue_script( 'jquery.cookie', get_template_directory_uri() . '/js/plugins/jquery.cookie.js', array('jquery'), vCache, true );
        wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/scripts.min.js', null, null, true );

        wp_localize_script( 'scripts', 'the_ajax_script', array( 'ajaxurl' => admin_url('admin-ajax.php')) );
    }
);


add_action(
	'admin_head',
	function () {
		wp_enqueue_style( 'style-admin', get_template_directory_uri() . '/css/style-admin.min.css', array(), '1', 'all');
        // wp_enqueue_script( 'slick', get_template_directory_uri() . '/js/plugins/slick.min.js', null, null, true  );
        // wp_enqueue_script( 'masonry', get_template_directory_uri() . '/js/plugins/masonry.pkgd.min.js', array('jquery'), vCache, true );
        // wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/scripts.min.js', array('jquery'), vCache, true );
		
        // wp_enqueue_script( 'scripts-admin', get_template_directory_uri() . '/js/scripts-admin.min.js', array('jquery'), vCache, true );

        // $php_array = array( 'admin_ajax' => admin_url( 'admin-ajax.php' ) );
        // wp_localize_script( 'scripts-admin', 'php_array', $php_array );
        // wp_localize_script( 'scripts', 'php_array', $php_array );

	}
);
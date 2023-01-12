<?php
/******************************************************************************
 * Global Functions
 ******************************************************************************/

// By adding theme support, we declare that this theme does not use a
// hard-coded <title> tag in the document head, and expect WordPress to
// provide it for us.
add_theme_support( 'title-tag' );

//  Add widget support shortcodes
add_filter( 'widget_text', 'do_shortcode' );

// Support for Featured Images
add_theme_support( 'post-thumbnails' );

// Custom Background
add_theme_support( 'custom-background', array( 'default-color' => 'fff' ) );

// Custom Header
add_theme_support( 'custom-header', array(
    'default-image' => get_template_directory_uri() . '/img/logo.png',
    'height'        => '200',
    'flex-height'   => true,
    'uploads'       => true,
    'header-text'   => false
) );

// Custom Logo
add_theme_support( 'custom-logo', array(
    'height'      => '150',
    'flex-height' => true,
    'flex-width'  => true,
) );

function show_custom_logo() {
    if ( $custom_logo_id = get_theme_mod( 'custom_logo' ) ) {
        $attachment_array = wp_get_attachment_image_src( $custom_logo_id, 'max_767' );
        $logo_url         = $attachment_array[0];
    } else {
        $logo_url = get_stylesheet_directory_uri() . '/img/logo.png';
    }
    $logo_image = '<img src="' . $logo_url . '" class="custom-logo" itemprop="siteLogo" alt="' . get_bloginfo( 'name' ) . '">';
    $html       = sprintf( '<a href="%1$s" class="custom-logo-link" rel="home" title="%2$s" itemscope>%3$s</a>', esc_url( home_url( '/' ) ), get_bloginfo( 'name' ), $logo_image );
    echo apply_filters( 'get_custom_logo', $html );
}

// Add HTML5 elements
add_theme_support( 'html5', array(
    'comment-list',
    'search-form',
    'comment-form',
) );

// Add excerpt to pages
add_post_type_support('page','excerpt');



// Stick Admin Bar To The Top
if ( ! is_admin() ) {
    add_action( 'get_header', 'my_filter_head' );

    function my_filter_head() {
        remove_action( 'wp_head', '_admin_bar_bump_cb' );
    }

    function stick_admin_bar() {
        echo "
            <style type='text/css'>
                body.admin-bar {margin-top:32px !important}
                @media screen and (max-width: 782px) {
                    body.admin-bar { margin-top:46px !important }
                }
            </style>
            ";
    }

    add_action( 'admin_head', 'stick_admin_bar' );
    add_action( 'wp_head', 'stick_admin_bar' );
}

// Customize Login Screen
function wordpress_login_styling() {
    if ( $custom_logo_id = get_theme_mod( 'custom_logo' ) ) {
        $custom_logo_img = wp_get_attachment_image_src( $custom_logo_id, 'medium' );
        $custom_logo_src = $custom_logo_img[0];
    } else {
        $custom_logo_src = 'wp-admin/images/wordpress-logo.svg?ver=20131107';
    }
    ?>
    <style type="text/css">
        .login #login h1 a {
            background-image: url('<?php echo $custom_logo_src; ?>');
            background-size:  contain;
            background-position: 50% 50%;
            width: auto;
            height: 120px;
            padding: 25px 0 ;
            margin: 0 0 0 0 ;
        }
        .login #login form {
            margin: 0 0 0 0 ;
        }

        body.login {
            background-color: #fff;
            <?php if ($bg_image = get_background_image()) {?>
            background-image: url('<?php echo $bg_image; ?>') !important;
            <?php } ?>
            background-repeat: repeat;
            background-position: center center;
        }
    </style>
<?php }

add_action( 'login_enqueue_scripts', 'wordpress_login_styling' );

function admin_logo_custom_url() {
    $site_url = get_bloginfo( 'url' );
    return ( $site_url );
}

add_filter( 'login_headerurl', 'admin_logo_custom_url' );

function get_attached_img_url( $id = 0, $size = "medium_large" ) {
    $img = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), $size );
    return $img[0];
}


define( 'IMAGE_PLACEHOLDER', get_stylesheet_directory_uri() . '/img/placeholder.jpg' );


add_image_size( 'full_hd', 1920, 1080, array('center', 'center'));
add_image_size( 'full_hd_auto', 1920, 9999, array('center', 'center'));
add_image_size( 'max_50', 50);
add_image_size( 'max_200', 200);
add_image_size( 'max_400', 400);
add_image_size( 'max_525', 525);
add_image_size( 'max_767', 767);
add_image_size( 'max_1024', 1024);


// add_image_size( 'max_200_120', 200, 120);
// add_image_size( 'max_400_120', 400, 120);
// add_image_size( 'max_767_120', 767, 120);
// add_image_size( 'max_1024_120', 1024, 120);
// add_image_size( 'full_hd_120', 1920, 120);


add_image_size( 'max_200_center', 200,9999, array('center', 'center'));
add_image_size( 'max_400_center', 400,9999, array('center', 'center'));
add_image_size( 'max_767_center', 767,9999, array('center', 'center'));
add_image_size( 'max_1024_center', 1024,9999, array('center', 'center'));
add_image_size( 'max_1400_center', 1400,9999, array('center', 'center'));


function bg( $img, $size = '' ) {
    if ( $img && is_array( $img ) ) {
        $url = $size ? $img['sizes'][ $size ] : $img['url'];
        echo 'style="background-image: url(' . $url . ')"';
    } elseif ( $img ) {
        echo 'style="background-image: url(' . $img . ')"';
    }
}
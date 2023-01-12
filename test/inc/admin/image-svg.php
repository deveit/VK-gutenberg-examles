<?php

if ( ! defined( 'ABSPATH' ) ) { exit; }

define( 'ALLOW_UNFILTERED_UPLOADS', true );

function support_for_upload_svg_files( $mimes = array() ) {
    $mimes['svg']  = 'image/svg+xml';
    $mimes['svgz'] = 'image/svg+xml';

    return $mimes;
}
add_filter( 'upload_mimes', 'support_for_upload_svg_files' );

function display_svg_thumbs() {

    ob_start();

    add_action( 'shutdown', 'svgs_thumbs_filter', 0 );
    function svgs_thumbs_filter() {

        $final     = '';
        $ob_levels =  ob_get_level();

        for ( $i = 0; $i < $ob_levels; $i ++ ) {

            $final .= ob_get_clean();

        }

        echo apply_filters( 'final_output', $final );

    }

    add_filter( 'final_output', 'svgs_final_output' );
    function svgs_final_output( $content ) {

        $content = str_replace( '<# } else if ( \'image\' === data.type && data.sizes && data.sizes.full ) { #>', '<# } else if ( \'svg+xml\' === data.subtype ) { #>
                <img class="details-image" src="{{ data.url }}" draggable="false" />
            <# } else if ( \'image\' === data.type && data.sizes && data.sizes.full ) { #>',

            $content );

        $content = str_replace( '<# } else if ( \'image\' === data.type && data.sizes ) { #>', '<# } else if ( \'svg+xml\' === data.subtype ) { #>
                <div class="centered">
                    <img src="{{ data.url }}" class="thumbnail" draggable="false" />
                </div>
            <# } else if ( \'image\' === data.type && data.sizes ) { #>',

            $content );

        return $content;

    }
}

add_action( 'admin_init', 'display_svg_thumbs' );

function additional_img_class( $html ) {
    if ( strpos( $html, '.svg' ) !== false ) {
        $html = preg_replace( '|class="(.+?)"|', 'class="$1 attachment-svg"', $html );
        $html = str_replace( 'width="1"', '', $html );
        $html = str_replace( 'height="1"', '', $html );
    }

    return $html;
}

add_filter( 'get_image_tag', 'additional_img_class' );

function svgPath($url, $width = false) {
    $iconSVG = file_get_contents(uri($url));
    $iconSVG = ($width) ? str_replace('64px', $width . 'px', $iconSVG) : $iconSVG;
    return $iconSVG;
}

function loadImgOrSvg($image) {
    return ($image["mime_type"] == 'image/svg+xml') ? svgPath($image['url']) : '<img src="' . $image['url'] . '" alt="">';
}
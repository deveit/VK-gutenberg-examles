<?php

add_action( 'block_start', 'fn_block_start', 10, 2);
function fn_block_start($blockID = '', $class = '', $data = '') {
    require get_template_directory() . '/template/block/start.php';
}

add_action( 'block_end', 'fn_block_end', 10, 2);
function fn_block_end($dir = '', $data = '') {
    require get_template_directory() . '/template/block/end.php';
}

if (file_exists(get_theme_file_path('/template/block'))) {
    $di = new DirectoryIterator(get_theme_file_path('/template/block'));
    foreach ($di as $file) {
        if (!$file->isDot() && $file->isDir()) {
            $backEnd = $file->getPathname() . '/back-end.php';
            if (file_exists($backEnd)) {
                include $backEnd;
            }
        }
    }
}

add_filter('block_categories', 'my_acf_category', 10, 2);
function my_acf_category($categories, $post) {
    return array_merge(
        $categories,
        array(
            array(
                'slug' => 'vk',
                'title' => __('Test blocks', 'acf-custom-blocks'),
                'icon' => 'welcome-widgets-menus'

            ),
        )
    );
}

function my_acf_block_render_callback( $block ) {

    // convert name ("acf/testimonial") into path friendly slug ("testimonial")
    $slug = str_replace('acf/', '', $block['name']);

    // include a template part from within the "template-parts/block" folder
    if( file_exists( get_theme_file_path("/template/block/{$slug}/front-end.php") ) ) {
        include( get_theme_file_path("/template/block/{$slug}/front-end.php") );
    }
}

//REMOVE DEFAULT

function remove_default_blocks($allowed_blocks){
    // Get widget blocks and registered by plugins blocks
    $registered_blocks = WP_Block_Type_Registry::get_instance()->get_all_registered();

    // Disable Widgets Blocks
    // unset($registered_blocks['core/heading']);
    // unset($registered_blocks['core/cover']);
    // unset($registered_blocks['core/list']);
    // unset($registered_blocks['core/quote']);
    // unset($registered_blocks['core/code']);
    // unset($registered_blocks['core/freeform']);
    // unset($registered_blocks['core/preformatted']);
    // unset($registered_blocks['core/pullquote']);
    // unset($registered_blocks['core/table']);
    // unset($registered_blocks['core/verse']);
    // unset($registered_blocks['core/image']);
    // unset($registered_blocks['core/gallery']);
    // unset($registered_blocks['core/media-text']);
    // unset($registered_blocks['core/button']);
    // unset($registered_blocks['core/file']);
    // unset($registered_blocks['core/video']);
    // unset($registered_blocks['core/audio']);
    // unset($registered_blocks['core/buttons']);
    // unset($registered_blocks['core/columns']);
    // unset($registered_blocks['core/group']);
    // unset($registered_blocks['core/more']);
    // unset($registered_blocks['core/nextpage']);
    // unset($registered_blocks['core/separator']);
    // unset($registered_blocks['core/spacer']);
    // unset($registered_blocks['core/embed']);
    // unset($registered_blocks['core/archives']);
    // unset($registered_blocks['core/calendar']);
    // unset($registered_blocks['core/rss']);
    // unset($registered_blocks['core/search']);
    // unset($registered_blocks['core/tag-cloud']);
    // unset($registered_blocks['core/categories']);
    // unset($registered_blocks['core/latest-posts']);
    // unset($registered_blocks['core/latest-comments']);
    // unset($registered_blocks['core/social-links']);
    // unset($registered_blocks['core/html']);


    // Disable WooCommerce Blocks
    // unset($registered_blocks['woocommerce/handpicked-products']);
    // unset($registered_blocks['woocommerce/product-best-sellers']);
    // unset($registered_blocks['woocommerce/product-category']);
    // unset($registered_blocks['woocommerce/product-new']);
    // unset($registered_blocks['woocommerce/product-on-sale']);
    // unset($registered_blocks['woocommerce/product-top-rated']);
    // unset($registered_blocks['woocommerce/products-by-attribute']);
    // unset($registered_blocks['woocommerce/featured-product']);

    // Now $registered_blocks contains only blocks registered by plugins, but we need keys only
    $registered_blocks = array_keys($registered_blocks);

    // Merge allowed core blocks with plugins blocks
    return array_merge(array(

    ), $registered_blocks);
}

add_filter('allowed_block_types', 'remove_default_blocks');


add_filter( 'render_block', 'wrap_gutenberg_block', 10, 2 );
function wrap_gutenberg_block( $block_content, $block ) {
    if (strpos($block['blockName'],'acf/') === false) {
        if ( $block['blockName'] ) {
            $block_content = '<div class="row column default-GB clearfix ">' . $block_content . '</div>';
        }
    }
    return $block_content;
}
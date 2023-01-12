<?php
add_action('wp_ajax_ajax_lang', 'fn_mpc_ajax_lang' );
add_action('wp_ajax_nopriv_ajax_lang', 'fn_mpc_ajax_lang');
function fn_mpc_ajax_lang()
{
    if (!empty($_POST['lang'])) {
        header('Content-Type: application/json');
        global $sitepress;
        $getSlugLang = (!empty($sitepress)) ? $sitepress->get_default_language() : 'pl';
        $strings = [];
        if ($_POST['lang'] != $getSlugLang) {
            $options = get_option('woo_amc_options');
            $strings['.woo_amc_head .woo_amc_head_title'] = __($options['cart_header_title'], 'ajax-lang');
            $strings['.woo_amc_footer_total .woo_amc_label'] = __($options['cart_footer_total_label'], 'ajax-lang');
            $strings['.woo_amc_footer_link'] = __($options['cart_footer_link_text'], 'ajax-lang');
        }

        echo json_encode($strings);
    }
    die();
}
?>

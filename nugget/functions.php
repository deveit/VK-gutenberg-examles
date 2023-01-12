<?php

require_once 'inc/settings.php';

require_once 'inc/assets.php';

require_once 'inc/blocks.php';

// =======================
// # ADMIN
// =======================

//require_once 'inc/admin/acf-google-map.php';
require_once 'inc/admin/acf-options-page.php';
require_once 'inc/admin/custom-post-types-slug.php';
require_once 'inc/admin/image-svg.php';
require_once 'inc/admin/menus.php';
require_once 'inc/admin/post-types-per-page.php';
require_once 'inc/admin/post-types.php';
require_once 'inc/admin/taxonomies.php';
require_once 'inc/admin/uri.php';


// =======================
// # FRONT
// =======================
// require_once 'inc/front/actions-and-filters.php';
require_once 'inc/front/class-navigation.php';
require_once 'inc/front/ajax-lang.php';

// =======================
// # HELPERS
// =======================
require_once 'inc/helpers/prepare-phone.php';
// require_once 'inc/helpers/file-size.php';
// require_once 'inc/helpers/google-maps.php';
// require_once 'inc/helpers/sections.php';
// require_once 'inc/helpers/the-section.php';
// require_once 'inc/helpers/shortcode-home-url.php';
require_once 'inc/helpers/trim.php';

// =======================
// # WOOCOMMERCE
// =======================
// require_once 'inc/woocommerce/woocommerce-functions.php';

// =======================
// # AJAX
// =======================
require_once 'inc/ajax/filter-by-video-category.php';
// require_once 'inc/ajax/load-more.php';
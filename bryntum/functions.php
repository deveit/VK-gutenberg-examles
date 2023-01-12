<?php

/* ---
  Name: WordPress Framework
  Author: Karol Piekarski
  WEB: https://massivepixel.io/
  License: All rights reserved
--- */

require_once 'vendor/autoload.php';

$WPAdvanced = new WPAdvanced\WPAdvanced();
$management = new SiteManagement\SiteManagement();

require get_template_directory().'/includes/Blocks/register.php';
require get_template_directory().'/functions/WPAdvanced/Admin/svg-support.php';
require get_template_directory().'/functions/WPAdvanced/Admin/theme-support.php';
require get_template_directory().'/functions/WPAdvanced/Admin/cleanup.php';
require get_template_directory().'/functions/WPAdvanced/Menu/class-navigation.php';


add_action('wp_footer', 'testimonial_script');

function testimonial_script()
{
  global $post;
  $blocks = parse_blocks($post->post_content);
  $include_script = false;

  foreach ($blocks as $block) {
    if ($block['blockName'] === "acf/block-testimonials" && $block['attrs']['data']['is_active']) {
      $include_script = true;
    }
  }

  if ($include_script) :
    ?>
    <script>
      document.querySelectorAll('.carousel a').forEach(item => {
        item.addEventListener('click', (e) => {
          var pos = document.body.scrollTop || document.documentElement.scrollTop;

          setTimeout(function () {
            window.scrollTo(0, pos);
          }, 1);
        })
      });
    </script>
  <?php
  endif;
}

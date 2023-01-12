<?php
get_header();

  if (get_post_type() == 'post') {
    get_template_part('templates/archive', 'post');
  }

get_footer();

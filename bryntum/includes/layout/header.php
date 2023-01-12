<?php
// $header = get_field('header', 'option');
// $menu = apply_filters('wpa_get_menu', [], 'top_nav');
?>
<header class="header" data-header>
  <div class="container">
    <div class="header__row">
      <?php if($logo = get_field('logo','options')): ?>
        <a href="<?php echo bloginfo('url') ?>">
          <picture>
            <source media="(min-width: 480px)" srcset="<?php echo $logo['desktop']['sizes']['medium_large'] ?>">
            <source media="(max-width: 479px)" srcset="<?php echo $logo['mobile']['sizes']['medium_large'] ?>">

            <img src="<?php echo $logo['desktop']['sizes']['medium_large'] ?>"
                 class="header__logo"
                 alt="<?php echo __('Logo - Bryntum', 'mpc_lang') ?>"
                 width="<?php echo $logo['desktop']['sizes']['medium_large-width'] ?>"
                 height="<?php echo $logo['desktop']['sizes']['medium_large-height'] ?>">
          </picture>
        </a>
      <?php endif; ?>
      <input type="checkbox" id="burger" class="header__input">
      <label class="header__burger"  for="burger">
        <div class="header__burger-icon">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
        </div>
      </label>
      <?php if (has_nav_menu('top_nav')) {
        wp_nav_menu(array('theme_location' => 'top_nav',
          'menu_class' => 'menu header-menu dropdown ',
          'items_wrap' => '<ul id="%1$s" class="%2$s" >%3$s</ul>',
          'walker' => new mpc_Navigation()));
      }
      ?>
    </div>
  </div>
</header>

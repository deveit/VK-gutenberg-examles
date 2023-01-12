<?php
$social_links = get_field('social_links', 'option');
$footer_columns = get_field('footer_columns', 'option');
$footer_contact_info_column_1 = get_field('footer_contact_info_column_1', 'option');
$footer_contact_info_column_2 = get_field('footer_contact_info_column_2', 'option');
$footer_newsletter_title = get_field('footer_newsletter_title', 'option');
$footer_contact_info_title = get_field('footer_contact_info_title', 'option');
?>

<footer class="footer">
  <div class="container">
    <div class="footer__main-section">
      <div class="footer__main-section-row">
        <div class="footer__column footer__column--1" id="newsletter">
          <?php if ($footer_newsletter_title): ?>
            <span class="h6_style footer__title"><?php echo $footer_newsletter_title ?></span>
          <?php endif ?>
          <form class="footer__form af-form-wrapper newsletter-form" accept-charset="UTF-8" action="https://www.aweber.com/scripts/addlead.pl" method="post">
            <div style="display: none;">
              <p>
                <input name="meta_web_form_id" type="hidden" value="490222526">
              </p>
              <p>
                <input name="meta_split_id" type="hidden" value="">
                <input name="listname" type="hidden" value="bryntum-news">
                <input id="redirect_4963af82b55aeef09dde16e6b753d956" name="redirect" type="hidden" value="<?php echo WP_SITEURL ?>/?news=1#newsletter">
                <input name="meta_adtracking" type="hidden" value="Newsletter_form">
                <input name="meta_message" type="hidden" value="1001">
                <input name="meta_required" type="hidden" value="email">
              </p>
            </div>
            <div class="footer__form-group">
              <input id="awf_field-97784995" class="newsletter-email footer__form-input" tabindex="500" name="email" type="email" value="" placeholder="Enter your mail">
              <input id="af-submit-image-490222526" class="newsletter-submit buttonsnew footer__form-button btn btn__accent btn__accent--h100" alt="Submit Form" name="submit2" type="submit" value="Submit">
            </div>

            <?php if (isset($_GET['news'])) : ?>
              <div class="footer__form-message">
                <?php echo __('Thanks for signing up (you can unregister any time).', 'mpc_lang') ?>
              </div>
            <?php endif; ?>
          </form>
        </div>
        <?php if ($footer_contact_info_column_1 || $footer_contact_info_column_2): ?>
          <div class="footer__column footer__column--2">
            <?php if ($footer_contact_info_title): ?>
              <span class="h6_style footer__title"><?php echo $footer_contact_info_title ?></span>
            <?php endif ?>
            <div class="footer__contact-info">
						<span>
							<?php echo $footer_contact_info_column_1 ?>
						</span>
              <span>
							<?php echo $footer_contact_info_column_2 ?>
						</span>
            </div>
          </div>
        <?php endif ?>
        <?php if ($footer_columns): ?>
          <?php $i = 3 ?>
          <?php foreach ($footer_columns as $column): ?>
            <div class="footer__column footer__column--<?php echo $i ?>">
              <?php $column_title = $column['column_title'] ?>
              <?php $menus = $column['menu'] ?>
              <?php if ($column_title): ?>
                <span class="h6_style footer__title" ><?php echo $column_title ?></span>
              <?php endif ?>
              <?php if ($menus): ?>
                <ul class="footer__menu" >
                  <?php foreach ($menus as $menu): ?>
                    <?php $link = $menu['link'] ?>
                    <li class="footer__menu-item" ><a class="label label--3" href="<?php echo $link['url'] ?>" <?php echo $link['target'] ? 'target="'.$link['target'].'"' :'' ?> rel="nofollow"><?php echo $link['title'] ?></a></li>
                  <?php endforeach ?>
                </ul>
              <?php endif ?>
            </div>
            <?php $i++ ?>
          <?php endforeach ?>
        <?php endif ?>

      </div>
    </div>
  </div>


	<div class="footer__section">
    <div class="container">
      <div class="footer__row">
        <p class="footer__copy label label--3">&copy; 2021 Bryntum. All rights reserved.</p>
        <?php if ($social_links): ?>
          <ul class="social-icons">
            <?php foreach ($social_links as $links): ?>
              <?php
              $icon = $links['icon'];
              $link = $links['link'];

              if($icon['mime_type'] === 'image/svg+xml') {
                $svg = file_get_contents(wp_get_original_image_path($icon['ID']));

                $icon = str_replace('<svg', '<svg class="social-icons__item-image"', $svg);
              } else {
                $icon = '<img class="social-icons__item-image" src="'. $icon['sizes']['thumbnail'] .'" alt="'. $icon['alt'] .'">';
              }
              ?>
              <?php if ($link): ?>
                <li class="social-icons__item" >
                  <a href="<?php echo $link['url'] ?>" <?php echo $link['target'] ? 'target="'.$link['target'].'"' :'' ?> rel="nofollow">
                    <?php echo $icon; ?>
                  </a>
                </li>
              <?php endif ?>
            <?php endforeach ?>
          </ul>
        <?php endif ?>
      </div>
    </div>
	</div>
</footer>

<?php
$attributes = isset($block) ? get_fields() : $args;

/**
 * Variables available:
 * - @var $is_active - required;
 * - @var $text - required;
 */

extract($attributes);

$id = $block['id'] ?? $args['id'];
$align = $block['align'] ? ' align'.$block['align'] : ' align'.$args['align'];

if (isset($block['data']['preview_image_help'])) : ?>
  <img src="<?php echo $block['data']['preview_image_help'] ?>"
       style="width: 100%; height: auto;"
       alt="<?php echo $block['description'] ?>">
<?php elseif ($is_active) : ?>
  <section class="section text<?php echo $align; ?>" id="<?php echo $id; ?>">
    <div class="container container--small">
      <div class="text__content">
        <?php echo $text; ?>
      </div>
      <?php if (isset($link['link'])) : ?>
        <div class="text__link">
          <a href="<?php echo $link['link'] ?>"
             class="link"
             target="<?php echo $link['target'] ?? '_self' ?>">
            <?php echo $link['title'] ?>

            <svg viewBox="0 0 8 13" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M0.294998 1.70517L4.875 6.29517L0.294998 10.8852L1.705 12.2952L7.705 6.29517L1.705 0.295166L0.294998 1.70517Z"
                    fill="#333333"/>
            </svg>
          </a>
        </div>
      <?php endif; ?>
    </div>
  </section>
<?php endif;

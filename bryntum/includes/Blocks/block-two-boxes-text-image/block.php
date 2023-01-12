<?php
$attributes = isset($block) ? get_fields() : $args;

/**
 * Variables available:
 * @var $is_active - required;
 * @var $boxes - required;
 */

extract($attributes);

$id = $block['id'] ?? $args['id'];
$align = $block['align'] ? ' align'.$block['align'] : ' align'.$args['align'];

if (isset($block['data']['preview_image_help'])) : ?>
  <img src="<?php echo $block['data']['preview_image_help'] ?>"
       style="width: 100%; height: auto;"
       alt="<?php echo $block['description'] ?>">
<?php elseif ($is_active) : ?>
  <section class="section two-boxes-text-image<?php echo $align; ?>" id="<?php echo $id; ?>">
    <div class="container">
      <div class="two-boxes-text-image__wrapper">
        <?php foreach ($boxes as $box) : ?>
          <div class="two-boxes-text-image__item">
            <div class="two-boxes-text-image__image">
              <picture>
                <source media="(min-width: 768px)" srcset="<?php echo $box['image_desktop']['sizes']['medium_large'] ?>">
                <source media="(max-width: 768px)" srcset="<?php echo $box['image_mobile']['sizes']['medium_large'] ?>">

                <img src="<?php echo $box['image_desktop']['sizes']['medium_large'] ?>"
                     alt="<?php echo $box['image_desktop']['title'] ?>"
                     width="<?php echo $box['image_desktop']['sizes']['medium_large-width'] ?>"
                     height="<?php echo $box['image_desktop']['sizes']['medium_large-height'] ?>">
              </picture>
            </div>
            <div class="two-boxes-text-image__content">
              <div class="two-boxes-text-image__text">
                <?php echo $box['text']; ?>
              </div>

              <?php if ($box['button']) : ?>
                <div class="two-boxes-text-image__button">
                  <?php
                  echo get_template_part(
                    'includes/Components/Buttons',
                    null,
                    [
                      "centered_buttons" => $box['centered_buttons'],
                      "buttons" => $box['button']
                    ]
                  );
                  ?>
                </div>
              <?php endif; ?>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
<?php endif;

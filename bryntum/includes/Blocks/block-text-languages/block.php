<?php

$attributes = isset($block) ? get_fields() : $args;

/**
 * Variables available:
 * @var $is_active - required;
 * @var $text - required;
 * @var $boxes - required
 */

extract($attributes);

$id = $block['id'] ?? $args['id'];
$align = $block['align'] ? ' align'.$block['align'] : ' align'.$args['align'];

if (isset($block['data']['preview_image_help'])) : ?>
  <img src="<?php echo $block['data']['preview_image_help'] ?>"
       style="width: 100%; height: auto;"
       alt="<?php echo $block['description'] ?>">
<?php elseif ($is_active) : ?>
  <section class="section text-languages <?php echo $align; ?>" id="<?php echo $id; ?>">
    <div class="text-languages__bg">
      <div class="text-languages__bg--center"></div>
    </div>
    <div class="container">
      <div class="text-languages__wrapper">
        <div class="text-languages__title">
          <?php echo $text; ?>
        </div>

        <div class="text-languages__items">
          <?php foreach ($boxes as $box) : ?>
            <div class="text-languages__item">
              <div class="text-languages__box">
                <div class="text-languages__box-image">
                  <img src="<?php echo $box['image']['sizes']['medium'] ?>"
                       alt="<?php echo $box['image']['title'] ?>"
                       width="55"
                       height="55">
                </div>
                <div class="text-languages__box-text">
                  <?php echo $box['text'] ?>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </section>
<?php endif;

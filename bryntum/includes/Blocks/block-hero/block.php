<?php

$attributes = isset($block) ? get_fields() : $args;

/**
 * Variables available:
 * @var $is_active - required;
 * @var $text - required;
 * @var $image_desktop - required;
 * @var $image_mobile - required;
 * @var $centered_buttons - required;
 * @var $button - required;
 */

extract($attributes);

$id = $block['id'] ?? $args['id'];
$align = $block['align'] ? ' align'.$block['align'] : ' align'.$args['align'];


if (isset($block['data']['preview_image_help'])) : ?>
  <img src="<?php echo $block['data']['preview_image_help'] ?>"
       style="width: 100%; height: auto;"
       alt="<?php echo $block['description'] ?>">
<?php elseif ($is_active) : ?>
	<section class="section hero <?php echo $align; ?>" id="<?php echo $id; ?>">
    <div class="container container--small">
      <div class="hero__wrapper">
        <div class="hero__bg">
          <div class="hero__bg--center"></div>
        </div>
        <div class="hero__text">
          <?php echo $text ?>
        </div>
        <?php if ($button) : ?>
          <div class="hero__buttons">
            <?php
            echo get_template_part(
              'includes/Components/Buttons',
              null,
              [
                "centered_buttons" => $centered_buttons,
                "buttons" => $button,
              ]
            );
            ?>
          </div>
        <?php endif; ?>
        <div class="hero__image">
          <picture>
            <source type="image/webp" media="(min-width: 768px)" srcset="<?php echo $image_mobile['sizes']['medium_large'] ?>">
            <source type="image/webp" media="(min-width: 768px)" srcset="<?php echo $image_desktop['sizes']['medium_large'] ?>">

            <img src="<?php echo $image_desktop['sizes']['medium_large'] ?>"
                 alt="<?php echo $image_desktop['title'] ?>"
                 width="<?php echo $image_desktop['sizes']['medium_large-width'] ?>"
                 height="<?php echo $image_desktop['sizes']['medium_large-height'] ?>">
          </picture>

        </div>
      </div>
    </div>
	</section>
<?php endif;

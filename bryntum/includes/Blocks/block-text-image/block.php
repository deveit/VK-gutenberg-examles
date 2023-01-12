<?php
$attributes = isset($block) ? get_fields() : $args;

/**
 * Variables available:
 * @var $is_active - required;
 * @var $is_reverse - required;
 * @var $text - required;
 * @var $image_desktop - required;
 * @var $image_mobile - required;
 * @var $centered_buttons - required;
 * @var $btn - required;
 * @var $gradient - required;
 */

extract($attributes);

$id = $block['id'] ?? $args['id'];
$align = $block['align'] ? ' align'.$block['align'] : ' align'.$args['align'];

if (isset($block['data']['preview_image_help'])) : ?>
  <img src="<?php echo $block['data']['preview_image_help'] ?>"
       style="width: 100%; height: auto;"
       alt="<?php echo $block['description'] ?>">
<?php elseif ($is_active) : ?>
  <section class="section text-image <?php echo $align; ?> <?php echo $is_reverse ? "reverse" : "" ?>" id="<?php echo $id; ?>">
    <?php if ($gradient == 'big_small') : ?>
      <div class="text-image__bg big_small">
        <div class="text-image__bg--big"></div>
        <div class="text-image__bg--small"></div>
      </div>
    <?php elseif ($gradient == 'big') : ?>
      <div class="text-image__bg">
        <div class="text-image__bg--big"></div>
      </div>
    <?php elseif ($gradient == 'small') : ?>
      <div class="text-image__bg ">
        <div class="text-image__bg--small"></div>
      </div>
    <?php endif ?>

    <div class="container">
      <div class="text-image__wrapper ">
        <div class="text-image__text-wrapper">
          <div class="text-image__text">
            <?php echo $text; ?>
          </div>
          <?php if ($btn) : ?>
            <div class="text-image__link">
              <?php
              echo get_template_part(
                'includes/Components/SingleButton',
                null,
                [
                  'url' => $btn['link']['url'],
                  'classes' => $btn['style'],
                  'target' => $btn['link']['target'],
                  'title' => $btn['link']['title'],
                ]
              );
              ?>
            </div>
          <?php endif; ?>
        </div>
        <div class="text-image__image-wrapper">
          <picture>
            <source media="(min-width: 768px)" srcset="<?php echo $image_desktop['sizes']['medium_large'] ?>">
            <source media="(max-width: 768px)" srcset="<?php echo $image_mobile['sizes']['medium_large'] ?>">

            <img src="<?php echo $image_desktop['sizes']['medium_large'] ?>"
                 alt="<?php echo $image_desktop['title'] ?>"
                 width="<?php echo $image_mobile['sizes']['medium_large-width'] ?>"
                 height="<?php echo $image_mobile['sizes']['medium_large-height'] ?>">
          </picture>
        </div>
      </div>
    </div>
  </section>
<?php endif;

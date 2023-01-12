<?php
$attributes = isset($block) ? get_fields() : $args;

/**
 * Variables available:
 * - @var $is_active - required;
 * - @var $text - required;
 * - @var $centered_buttons - required;
 * - @var $button - required;
 */

extract($attributes);

$id = $block['id'] ?? $args['id'];
$align = $block['align'] ? ' align'.$block['align'] : ' align'.$args['align'];

if (isset($block['data']['preview_image_help'])) : ?>
  <img src="<?php echo $block['data']['preview_image_help'] ?>"
       style="width:100%; height:auto;"
       alt="<?php echo $block['description'] ?>">
<?php elseif ($is_active) : ?>
  <section class="section text-button <?php echo $align; ?>" id="<?php echo $id; ?>">
    <div class="text-button__bg">
      <div class="text-button__bg--center"></div>
    </div>
    <div class="container">
      <div class="text-button__wrapper">
        <div class="text-button__text">
          <?php echo $text; ?>
        </div>
        <?php if ($button) : ?>
          <div class="text-button__button">
            <?php
            echo get_template_part(
              'includes/Components/Buttons',
              null,
              [
                "centered_buttons" => $centered_buttons,
                "buttons" => $button
              ]
            );
            ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </section>
<?php endif;

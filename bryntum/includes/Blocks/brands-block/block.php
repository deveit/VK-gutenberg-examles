<?php

$attributes = isset($block) ? get_fields() : $args;

/**
 * Variables available:
 * @var $is_active - required;
 * @var $text - required;
 * @var $logos - required;
 */

extract($attributes);

$id = $block['id'] ?? $args['id'];
$align = $block['align'] ? ' align'.$block['align'] : ' align'.$args['align'];

if (isset($block['data']['preview_image_help'])) :
	echo '<img src="'.$block['data']['preview_image_help'].'" style="width:100%; height:auto;">';
elseif ($is_active) : ?>
	<section class="section brands <?php echo $align; ?>" id="<?php echo $id; ?>">
    <div class="brands__bg">
      <div class="brands__bg--center"></div>
    </div>
    <div class="container">
      <div class="brands__content">
        <?php if ($text): ?>
          <div class="brands__text">
            <?php echo $text; ?>
          </div>
        <?php endif ?>
        <?php if ($logos): ?>
          <div class="brands__logos">
            <?php foreach ($logos as $logo): ?>
              <?php if ($logo['logo']): ?>
                <img class="brands__logos-image" src="<?php echo $logo['logo']['sizes']['thumbnail'] ?>"
                     alt="<?php echo $logo['logo']['title'] ?>"
                     width="<?php echo $logo['logo']['sizes']['thumbnail-width'] ?>"
                     height="<?php echo $logo['logo']['sizes']['thumbnail-height'] ?>">
              <?php endif ?>
            <?php endforeach ?>
          </div>
        <?php endif ?>
      </div>
    </div>
	</section>
<?php endif;

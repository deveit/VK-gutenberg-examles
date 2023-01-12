<?php

$attributes = isset($block) ? get_fields() : $args;

/**
 * Variables available:
 * @var $is_active - required;
 * @var $columns - required;
 * @var $block_title - required;
 */

extract($attributes);

$id = $block['id'] ?? $args['id'];
$align = $block['align'] ? ' align'.$block['align'] : ' align'.$args['align'];

if (isset($block['data']['preview_image_help'])) :
	echo '<img src="'.$block['data']['preview_image_help'].'" style="width:100%; height:auto;">';
elseif ($is_active) : ?>
	<section class="section section-columns <?php echo $align; ?>" id="<?php echo $id; ?>">
    <div class="section-columns__bg">
      <div class="section-columns__bg--center"></div>
    </div>
    <div class="container">
      <?php if ($block_title): ?>
        <div class="section-columns__title">
          <?php echo $block_title ?>
        </div>
      <?php endif ?>

      <?php if ($columns): ?>
        <div class="section-columns__row">
          <?php foreach ($columns as $column): ?>
            <div class="section-columns__item">
              <div class="section-columns__item-content">
                <?php $image = $column['icon']; ?>
                <?php $text = $column['text']; ?>
                <?php if ($image): ?>
                  <div class="section-columns__item-image">
                    <img class="" src="<?php echo $image['sizes']['thumbnail'] ?>"
                         alt="<?php echo $image['alt']; ?>"
                         width="<?php echo $image['sizes']['thumbnail'] ?>"
                         height="<?php echo $image['sizes']['thumbnail'] ?>">
                  </div>
                <?php endif ?>
                <div class="section-columns__item-text">
                  <?php echo $text ?>
                </div>
              </div>
            </div>
          <?php endforeach ?>
        </div>
      <?php endif ?>
    </div>

	</section>
<?php endif;

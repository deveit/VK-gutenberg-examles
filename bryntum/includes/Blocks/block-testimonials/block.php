<?php

$attributes = isset($block) ? get_fields() : $args;

/**
 * Variables available:
 * - @var $is_active - required;
 * - @var $text - required;
 * - @var $limit - required;
 * - @var $centered_buttons - required;
 * - @var $button - required;
 */

extract($attributes);

$args = [
  'post_type' => 'testimonial',
  'posts_per_page' => - 1
];

if ($limit) {
  $args['post__in'] = $limit;
}

$posts = (new WP_Query($args))->get_posts();
$slide_id = uniqid('slide_');
$count_posts = count($posts);

$id = $block['id'] ?? $args['id'];
$align = $block['align'] ? ' align'.$block['align'] : ' align'.$args['align'];

if (isset($block['data']['preview_image_help'])) : ?>
  <img src="<?php echo $block['data']['preview_image_help'] ?>"
       style="width: 100%; height: auto;"
       alt="<?php echo $block['description'] ?>">
<?php elseif ($is_active) : ?>
  <section class="section testimonial <?php echo $align; ?>" id="<?php echo $id; ?>">
    <div class="container">
      <div class="testimonial__wrapper">
        <div class="testimonial__text">
          <?php echo $text; ?>
        </div>

        <div class="testimonial__slider">
          <div class="carousel" aria-label="Gallery">
            <ol class="carousel__viewport">
              <?php foreach ($posts as $key => $post) : ?>
                <?php
                $testimonial = get_field('testimonial', $post->ID);
                $prev_key = $key == 0 ? ($count_posts - 1) : $key - 1;
                $next_key = $key == ($count_posts - 1) ? 0 : $key + 1;
                ?>
                <li id="<?php echo $slide_id."-".$key ?>" tabindex="0" class="carousel__slide">
                  <div class="testimonial__slider-item-inner">
                    <div class="testimonial__slider-item-img">

                      <img src="<?php echo $testimonial['image']['sizes']['medium'] ?>"
                           alt="<?php echo $testimonial['image']['title'] ?>"
                           width="<?php echo $testimonial['image']['sizes']['medium-width'] ?>"
                           height="<?php echo $testimonial['image']['sizes']['medium-height'] ?>">
                    </div>
                    <div class="testimonial__slider-item-text">
                      <blockquote class="testimonial__slider-item-text-quote">
                        <?php echo $testimonial['text'] ?>
                      </blockquote>
                      <div class="testimonial__slider-item-text-position">
                        <?php echo $testimonial['name_position'] ?>
                      </div>
                    </div>
                  </div>

                  <div class="carousel__snapper">
                    <a href="#<?php echo $slide_id."-".$prev_key ?>"
                       class="carousel__prev">
                      <?php echo __('Go to prev slide', 'mpc_lang') ?>
                    </a>
                    <a href="#<?php echo $slide_id."-".$next_key ?>"
                       class="carousel__next">
                      <?php echo __('Go to next slide', 'mpc_lang') ?>
                    </a>
                  </div>
                </li>
              <?php endforeach; ?>
            </ol>

            <aside class="carousel__navigation">
              <ol class="carousel__navigation-list">
                <?php foreach ($posts as $key => $post) : ?>
                  <li class="carousel__navigation-item">
                    <a href="#<?php echo $slide_id."-".$key ?>"
                       class="carousel__navigation-button">
                      <?php echo sprintf(__('Go to slide %d', 'mpc_lang'), $key + 1) ?>
                    </a>
                  </li>
                <?php endforeach; ?>
              </ol>
            </aside>
          </div>
        </div>

        <?php if ($button) : ?>
          <div class="testimonial__button">
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
      </div>
    </div>
  </section>
<?php endif;

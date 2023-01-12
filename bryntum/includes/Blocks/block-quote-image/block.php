<?php

$attributes = isset($block) ? get_fields() : $args;

/**
 * Variables available:
 * @var $is_active - required;
 * @var $text - required;
 * @var $image_desktop - required;
 * @var $image_mobile - required;
 */

extract($attributes);

$id = $block['id'] ?? $args['id'];
$align = $block['align'] ? ' align'.$block['align'] : ' align'.$args['align'];

if (isset($block['data']['preview_image_help'])) : ?>
  <img src="<?php echo $block['data']['preview_image_help'] ?>"
       style="width: 100%; height: auto;"
       alt="<?php echo $block['description'] ?>">
<?php elseif ($is_active) : ?>
	<section class="section quote-image <?php echo $align; ?>" id="<?php echo $id; ?>">
    <div class="quote-image__bg">
      <div class="quote-image__bg--center"></div>
    </div>
    <div class="container">
      <div class="quote-image__wrapper">
        <div class="quote-image__quote">
          <svg xmlns="http://www.w3.org/2000/svg" width="36" height="24" viewBox="0 0 36 24" fill="none">
            <path d="M27.4778 8.47037C27.9141 5.86776 28.7596 3.35042 29.9828 1.01157C30.0537 0.881914 30.0807 0.732783 30.0597 0.586514C30.0387 0.440245 29.9708 0.304715 29.8662 0.200228C29.7616 0.0957403 29.626 0.027923 29.4796 0.00693304C29.3331 -0.014057 29.1839 0.0129109 29.0541 0.0837982C22.0892 4.1489 19.0344 10.0573 18.6556 14.7328C18.4802 16.799 19.0628 18.8583 20.2948 20.5271C21.5268 22.1959 23.324 23.3602 25.3517 23.803C26.3839 23.9883 27.443 23.9632 28.4654 23.7294C29.4877 23.4955 30.4521 23.0576 31.3008 22.4421C32.1495 21.8265 32.865 21.0459 33.4042 20.1472C33.9434 19.2485 34.2952 18.2502 34.4385 17.2123C34.5819 16.1743 34.5138 15.1182 34.2384 14.1072C33.963 13.0962 33.4859 12.1512 32.8357 11.329C32.1856 10.5068 31.3759 9.82438 30.4552 9.32265C29.5344 8.82092 28.5217 8.51027 27.4778 8.40933V8.47037Z" fill="#262948"/>
            <path d="M10.1019 8.47037C10.5247 5.87259 11.3491 3.35628 12.5457 1.01157C12.6167 0.881914 12.6437 0.732783 12.6227 0.586514C12.6017 0.440245 12.5338 0.304715 12.4292 0.200228C12.3246 0.0957403 12.1889 0.0279231 12.0425 0.00693304C11.8961 -0.014057 11.7468 0.0129109 11.6171 0.0837982C4.66438 4.1489 1.60959 10.0573 1.2308 14.7328C1.05542 16.799 1.638 18.8583 2.86997 20.5271C4.10195 22.1959 5.89924 23.3602 7.92689 23.803C8.96046 23.9904 10.0213 23.9669 11.0455 23.7338C12.0697 23.5007 13.0361 23.0629 13.8865 22.4468C14.7368 21.8307 15.4536 21.049 15.9935 20.1488C16.5334 19.2485 16.8854 18.2485 17.0282 17.2088C17.1709 16.169 17.1016 15.1112 16.8243 14.099C16.547 13.0868 16.0675 12.1411 15.4146 11.3189C14.7617 10.4968 13.9491 9.81514 13.0255 9.3151C12.102 8.81505 11.0867 8.50695 10.0408 8.40933L10.1019 8.47037Z" fill="#262948"/>
          </svg>
          <div class="quote-image__text">
            <?php echo $text; ?>
          </div>
        </div>
        <div class="quote-image__image">
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

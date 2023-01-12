<?php
/**
 * Block Name: text section
 *
 * This is the template that displays the text
 */
$blockID = $block['id'];
$className = $block['className'];

$bg = get_field('section_background');

$myClassName = 'slider-section slider-section--' . $bg ;

$class = $myClassName .' '. $className ;
do_action( 'block_start', $blockID,  $class  );
?>

<div class="row column">
	<?php get_template_part( 'template-parts/heading' ); ?>
	<?php get_template_part( 'template-parts/paragraph' ); ?>
	<?php if ($slider_sub_heading = get_field('slider_sub_heading')): ?>
		<h3 class="sub-title heading heading--h3 align-center" ><?php echo $slider_sub_heading ?></h3>
	<?php endif ?>
	<?php if( have_rows('slider') ): ?>
		<div class="slider">
			<a class="slider__arrow slider__arrow--prev" href="#"><?php icon('icon-prev') ?></a>
			<a class="slider__arrow slider__arrow--next" href="#"><?php icon('icon-next') ?></a>
			<?php while ( have_rows('slider') ) : the_row();?>
				<div class="slider__item">
					<?php if ($slide_title = get_sub_field('slide_title')): ?>
						<h3 class="slider__title" ><?php echo $slide_title ?></h3>
					<?php endif ?>
					<?php if ($slide_text = get_sub_field('slide_text')): ?>
						<p class="slider__text" ><?php echo $slide_text ?></p>
					<?php endif ?>
					<?php if ($slide_icon = get_sub_field('slide_icon')): ?>
						<div class="slider__icon">
							<?php echo loadImgOrSvg($slide_icon) ?>
						</div>
					<?php endif ?>
				</div>
			<?php endwhile;?>
		</div>
	<?php endif; ?>
</div>


<?php do_action( 'block_end', __DIR__); ?>

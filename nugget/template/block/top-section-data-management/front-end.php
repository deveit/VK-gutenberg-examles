<?php
/**
 * Block Name: Top section - data management
 *
 * This is the template that displays the title, and image
 */

$frame = get_field('select_frame') ;
if ($frame == 'orange') {
	$frame_class = 'main-bold-frame orange' ;
} elseif ($frame == 'red') {
	$frame_class = 'main-bold-frame red' ;
} elseif ($frame == 'green') {
	$frame_class = 'main-bold-frame green' ;
} else {
	$frame_class = 'no-frame' ;
}

$blockID = $block['id'];
$className = $block['className'];
$myClassName = 'top-section-data-management hero-section height-100vh '. $frame_class ;
$class = $myClassName .' '. $className ;
do_action( 'block_start', $blockID,  $class  );
?>

<?php $rotate = str_replace(".", "-", get_field('rotate')); ?>
<div class="light-frame transform-rotate-<?php echo $rotate ?>">
		
	<div class="row">
		<div class="transform-rotate--1">
			<?php get_template_part( 'template-parts/heading' ); ?>
		</div>

		<?php $image = get_field('image_desktop') ?>
		<?php $image_for_small = get_field('image_mobile') ?>
		<?php if($image || $image_for_small): ?>
			<picture class="hero-image hero-video" >
				<?php if ($image_for_small) { ?>
					<source media='(max-width: 400px)'
					srcset='<?php echo $image_for_small['sizes']['max_400'] ?>'/>
					<source media='(max-width: 767px)'
					srcset='<?php echo $image_for_small['sizes']['max_767'] ?>'/>
				<?php } else { ?>
					<source media='(max-width: 400px)'
					srcset='<?php echo $image['sizes']['max_400'] ?>'/>
					<source media='(max-width: 767px)'
					srcset='<?php echo $image['sizes']['max_767'] ?>'/>
				<?php } ?>
				<source media='(max-width: 1024px)'
				srcset='<?php echo $image['sizes']['max_1024'] ?>'/>
				<img src='<?php echo $image['sizes']['full_hd'] ?>'/>
			</picture>
		<?php endif; ?>
	</div>
</div>
<?php do_action( 'block_end', __DIR__); ?>

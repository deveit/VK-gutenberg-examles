<?php
/**
 * Block Name: Text section with text border
 *
 * This is the template that displays the text section with text border
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
$myClassName = 'text-section-with-text-border '. $frame_class ;
$class = $myClassName .' '. $className ;
do_action( 'block_start', $blockID,  $class  );
?>

<?php $rotate = str_replace(".", "-", get_field('rotate')); ?>
<div class="light-frame transform-rotate-<?php echo $rotate ?>">
	<div class="transform-rotate--1">
		<?php get_template_part( 'template-parts/heading' ); ?>
	</div>
	<div class="row">
		<?php if($text = get_field('text')): ?>
			<div class="text-section-text">
				<?php if($sub_title = get_field('sub_title')): ?>
					<span class="sub-title text-center" >
						<?php if($sub_title_icon = get_field('sub_title_icon')): ?>
							<img src="<?php echo $sub_title_icon['sizes']['max_50'] ?>" alt="">
						<?php endif; ?>
						<?php echo $sub_title ?>
					</span>
				<?php endif; ?>
				<div class="text-container">
					<?php echo $text ?>
				</div>
			</div>
		<?php endif; ?>
		<?php get_template_part( 'template-parts/buttons' ); ?>
	</div>
</div>
<?php do_action( 'block_end', __DIR__); ?>

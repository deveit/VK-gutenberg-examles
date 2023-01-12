<?php
/**
 * Block Name: Text section
 *
 * This is the template that displays the title, text and button
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
$myClassName = 'text-section '. $frame_class ;
$class = $myClassName .' '. $className ;
do_action( 'block_start', $blockID,  $class  );
?>

<?php $rotate = str_replace(".", "-", get_field('rotate')); ?>
<div class="light-frame transform-rotate-<?php echo $rotate ?>">
	<div class="row">
		<?php get_template_part( 'template-parts/heading' ); ?>
		<?php if($form_code = get_field('form_code')): ?>
			<div class="text-section-text">
				<?php echo $form_code ?>
			</div>
		<?php endif; ?>
		<?php get_template_part( 'template-parts/buttons' ); ?>
	</div>
</div>
<?php do_action( 'block_end', __DIR__); ?>

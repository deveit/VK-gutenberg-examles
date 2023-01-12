<?php
/**
 * Block Name: Contact form section
 *
 * This is the template that displays the contact form
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
$myClassName = 'contact-form-section '. $frame_class ;
$class = $myClassName .' '. $className ;
do_action( 'block_start', $blockID,  $class  );
?>

<?php $rotate = str_replace(".", "-", get_field('rotate')); ?>
<div class="light-frame transform-rotate-<?php echo $rotate ?>">
	<div class="transform-rotate--1">
		<?php get_template_part( 'template-parts/heading' ); ?>
	</div>
	<?php if($contact_form_shortcode = get_field('contact_form_shortcode')): ?>
		<div class="row">
			<div class="contact-form ">
				<?php echo do_shortcode($contact_form_shortcode); ?>
			</div>
		</div>
	<?php endif; ?>
</div>
<?php do_action( 'block_end', __DIR__); ?>



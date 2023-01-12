<?php
/**
 * Block Name: heading section
 *
 * This is the template that displays the heading
 */
$blockID = $block['id'];
$className = $block['className'];
$myClassName = 'heading-section ';
$class = $myClassName .' '. $className ;
do_action( 'block_start', $blockID,  $class  );
?>

<?php if($heading_text = get_field('heading_text')): ?>
	<div class="row column <?php echo $text_center ? 'text-center' : '' ?>">
		<?php get_template_part( 'template-parts/heading' ); ?>
	</div>
<?php endif; ?>
<?php do_action( 'block_end', __DIR__); ?>

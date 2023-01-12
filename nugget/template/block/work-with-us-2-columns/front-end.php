<?php
/**
 * Block Name: Section - Work with us - 2 columns 
 *
 * This is the template that displays 2 columns
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
$myClassName = 'work-with-us-2-columns '. $frame_class ;
$class = $myClassName .' '. $className ;
do_action( 'block_start', $blockID,  $class  );
?>

<?php $rotate = str_replace(".", "-", get_field('rotate')); ?>
<?php $hide_decoration_image = get_field('hide_decoration_image') ?>
<div class="light-frame transform-rotate-<?php echo $rotate ?> <?php echo $hide_decoration_image ? '' : 'has-decoration' ?>">
	<?php get_template_part( 'template-parts/heading' ); ?>
	<div class="row">
		<?php 
		$left_column_image = get_field('left_column_image') ;
		$left_column_title = get_field('left_column_title') ;
		$left_column_text = get_field('left_column_text') ;
		$link_left = get_field('left_column_button') ;
		?>
		<?php if($left_column_image || $left_column_title || $left_column_text || $link_left): ?>
			<div class="left-column column text-center">
				<?php if($left_column_image): ?>
					<div class="column-image">
						<img src="<?php echo $left_column_image['sizes']['max_767'] ?>" alt="">
					</div>
				<?php endif; ?>
				<div class="work-with-us-column-content">
					<?php if($left_column_title): ?>
						<h3><?php echo $left_column_title ?></h3>
					<?php endif; ?>
					<?php if($left_column_text): ?>
						<div class="column-text"><?php echo $left_column_text ?></div>
					<?php endif; ?>
					<?php if($link_left): ?>
						<a class="custom-button dark" href="<?php echo $link_left['url'] ?>" <?php echo $link_left['target'] ? 'target="'.$link_left['target'].'"' :'' ?>><?php echo $link_left['title'] ?></a>
					<?php endif; ?>
				</div>
			</div>
		<?php endif; ?>

		<?php 
		$right_column_image = get_field('right_column_image') ;
		$right_column_title = get_field('right_column_title') ;
		$right_column_text = get_field('right_column_text') ;
		$link = get_field('right_column_button') ;
		?>
		<?php if($right_column_image || $right_column_title || $right_column_text || $link): ?>
			<div class="right-column column text-center">
				<?php if($right_column_image): ?>
					<div class="column-image">
						<img src="<?php echo $right_column_image['sizes']['max_767'] ?>" alt="">
					</div>
				<?php endif; ?>
				<div class="work-with-us-column-content">
					<?php if($right_column_title): ?>
						<h3><?php echo $right_column_title ?></h3>
					<?php endif; ?>
					<?php if($right_column_text): ?>
						<div class="column-text"><?php echo $right_column_text ?></div>
					<?php endif; ?>
					<?php if($link): ?>
						<a class="custom-button dark" href="<?php echo $link['url'] ?>" <?php echo $link['target'] ? 'target="'.$link['target'].'"' :'' ?>><?php echo $link['title'] ?></a>
					<?php endif; ?>
				</div>
			</div>
		<?php endif; ?>
	</div>
</div>
<?php do_action( 'block_end', __DIR__); ?>

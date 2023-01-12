<?php
/**
 * Block Name: Menu section
 *
 * This is the template that displays the menu
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
$myClassName = 'menu-section '. $frame_class ;
$class = $myClassName .' '. $className ;
do_action( 'block_start', $blockID,  $class  );
?>

<?php $rotate = str_replace(".", "-", get_field('rotate')); ?>
<div class="light-frame transform-rotate-<?php echo $rotate ?>">
	<div class="row">
		<?php get_template_part( 'template-parts/heading' ); ?>
		<?php if($text = get_field('text')): ?>
			<div class="text-section-text">
				<?php echo $text ?>
			</div>
		<?php endif; ?>
		<?php if( have_rows('menu_list') ): ?>
			<?php $i = 1 ?>
			<div class="menu-section-list" >
				<?php while ( have_rows('menu_list') ) : the_row();?>
					<div class="menu-list-item <?php echo $i == 1 ? 'active' : '' ?>" data-id="<?php echo $i ?>">
						<?php the_sub_field('sub_field_name'); ?>
						<?php if($title = get_sub_field('title')): ?>
							<span class="list-item-title" >
								<?php echo $title ?>
							</span>
						<?php endif; ?>
						<?php if($icon = get_sub_field('icon')): ?>
							<span class="list-item-icon" >
								<?php echo loadImgOrSvg($icon) ?>
							</span>
						<?php endif; ?>
					</div>
					<?php $i++ ?>
				<?php endwhile;?>
			</div>
		<?php endif; ?>
		<?php if( have_rows('menu_list') ): ?>
			<?php $i = 1 ?>
			<div class="menu-section-list">
				<?php while ( have_rows('menu_list') ) : the_row();?>
					<?php if($text = get_sub_field('text')): ?>
						<div class="list-item-text <?php echo $i == 1 ? 'active' : '' ?>" id="list-item-text-id-<?php echo $i ?>">
							<?php echo $text ?>
						</div>
					<?php endif; ?>
					<?php $i++ ?>
				<?php endwhile;?>
			</div>
		<?php endif; ?>
		<?php get_template_part( 'template-parts/buttons' ); ?>
	</div>
</div>
<?php do_action( 'block_end', __DIR__); ?>

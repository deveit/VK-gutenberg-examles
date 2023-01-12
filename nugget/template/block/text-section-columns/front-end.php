<?php
/**
 * Block Name: Text section - columns
 *
 * This is the template that displays the icon, title, and text
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
$myClassName = 'text-section-columns '. $frame_class ;
$class = $myClassName .' '. $className ;
do_action( 'block_start', $blockID,  $class  );
?>

<?php $rotate = str_replace(".", "-", get_field('rotate')); ?>
<?php $hide_decoration_image = get_field('hide_decoration_image') ?>
<div class="light-frame transform-rotate-<?php echo $rotate ?> <?php echo $hide_decoration_image ? '' : 'has-decoration' ?>">
	<div class="row">
		<?php get_template_part( 'template-parts/heading' ); ?>
		<?php if( have_rows('columns') ): ?>
			<div class="columns-list text-center">
				<?php while ( have_rows('columns') ) : the_row();?>
					<div class="columns-list-column">
						<?php if($icon = get_sub_field('icon')): ?>
							<div class="columns-list-image">
								<img src="<?php echo $icon['sizes']['max_400'] ?>" alt="">
							</div>
						<?php endif; ?>
						<?php if($title = get_sub_field('title')): ?>
							<h3><?php echo $title ?></h3>
						<?php endif; ?>
						<?php if($text = get_sub_field('text')): ?>
							<div class="text-section-text">
								<?php echo $text ?>
							</div>
						<?php endif; ?>
					</div>
				<?php endwhile;?>
			</div>
		<?php endif; ?>
		
	</div>
</div>
<?php do_action( 'block_end', __DIR__); ?>

<?php
/**
 * Block Name: button section
 *
 * This is the template that displays the button
 */
$blockID = $block['id'];
$className = $block['className'];
$myClassName = 'button-section ';
$class = $myClassName .' '. $className ;
do_action( 'block_start', $blockID,  $class  ); ?>

<?php if( have_rows('button') ): ?>
	<div class="row column ">
		<?php get_template_part( 'template-parts/buttons' ); ?>
	</div>
<?php endif; ?>
<?php do_action( 'block_end', __DIR__); ?>

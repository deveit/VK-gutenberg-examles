<?php
/**
 * Block Name: Hero section
 *
 * This is the template that displays the hero section
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
$myClassName = 'hero-section height-100vh '. $frame_class ;
$class = $myClassName .' '. $className ;
do_action( 'block_start', $blockID,  $class  );
?>

<span class="section-decore decore-1" ></span>
<span class="section-decore decore-2" ></span>
<div class=" light-frame">
	<div class="row">
		
		<?php $video_id_desktop = get_field('video_id_desktop') ?>
		<?php $video_id_mobile = get_field('video_id_mobile') ?>
		<?php if($video_id_desktop || $video_id_mobile): ?>
			<div class="video-container transform-rotate--0-5 hide-for-small">
				<iframe src="https://player.vimeo.com/video/<?php echo $video_id_desktop ?>?autoplay=1&loop=1&autopause=0&muted=1&controls=0&background=1&dnt=1" class="hero-video" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
			</div>
			<div class="video-container transform-rotate--3 show-for-small">
				<iframe src="https://player.vimeo.com/video/<?php echo $video_id_mobile ?>?autoplay=1&loop=1&autopause=0&muted=1&controls=0&background=1&dnt=1" class="hero-video" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
			</div>
		<?php endif; ?>
		
		<div class="hero-heading-row transform-rotate--1">
			<?php get_template_part( 'template-parts/heading' ); ?>
		</div>
	</div>
</div>

<?php do_action( 'block_end', __DIR__); ?>

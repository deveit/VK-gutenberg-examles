<?php
/**
 * Block Name: Video section
 *
 * This is the template that displays the video list
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
$myClassName = 'video-list-section '. $frame_class ;
$class = $myClassName .' '. $className ;
do_action( 'block_start', $blockID,  $class  );
?>

<div class="light-frame">
	<div class="row">
		<?php get_template_part( 'template-parts/heading' ); ?>
	</div>

	<?php if(!$hide_filter = get_field('hide_filter')): ?>
		<div class="row ">
			<?php 
			$args = array(
				'taxonomy'               => 'video-category',
				'orderby'                => 'name',
				'order'                  => 'ASC',
				'hide_empty'             => false,
				'number'                 => 0,
			);
			?>
			<?php $the_query = new WP_Term_Query($args); ?>
			<?php if ($the_query): ?>
				<div class="video-category-filter-list" >
					<?php
					$terms = $the_query->get_terms();

					foreach($terms as $term){ ?>
						<button class="video-filter" data-video-category-slug="<?php echo $term->slug ?>">
							<span class="list-item-title" >
								<?php echo $term->name ?>
							</span>
							<?php $icon = get_field('icon', $term->taxonomy . '_' . $term->term_id) ?>

							<span class="list-item-icon hide-for-small" >
								<?php if($icon): ?>
									<?php echo loadImgOrSvg($icon) ?>
								<?php endif; ?>
							</span>
						</button>
					<?php } ?>
				</div>
			<?php endif ; wp_reset_query() ;?>
		</div>
	<?php endif; ?>


	<?php $show_videos_automaticaly = get_field('show_videos_automaticaly') ?>
	<?php $show_all_post = get_field('show_all_videos') ?>

	<?php if ($show_videos_automaticaly || $show_all_post){ ?>
		<?php $count_of_posts = get_field('count_of_videos_to_show_automatically') ?>
		<?php if ($show_all_post): ?>
			<?php $count_of_posts = -1  ?>
		<?php endif ?>
		<?php $arg = array(
			'post_type'	      => 'video', 
			'order'		      => 'DESC',
			'orderby'	      => 'menu_order',
			'posts_per_page'  => $count_of_posts
		);
		$the_query = new WP_Query( $arg ); ?>
		<?php if ( $the_query->have_posts() ) : ?>
			<div class="ajax-reload-videos">
				<div class="row">
					<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
						<article class="video-list-item">
							<a href="<?php the_permalink() ?>" class="video-list-item-content ">
								<?php $video_play_on_hover = get_field('video_play_on_hover',get_the_ID()) ?>
								<?php $customer_name = get_field('customer_name',get_the_ID()) ?>
								<h3 class="video-list-title" ><?php the_title() ?><span class="video-category-name" ><?php echo $customer_name ?></span></h3>
								<div class="video-list-image">
									<img src="<?php echo get_attached_img_url(get_the_ID(),'max_767') ?>" alt="video image: <?php the_title() ?>">
									<video data-width="768" data-height="540" class="mobile-hover-video" muted="muted" loop="" playsinline="" poster="<?php echo get_attached_img_url(get_the_ID(), 'max_767' ) ?>" width="100%">
										<source src="<?php echo $video_play_on_hover['url'] ?>" type="video/mp4;codecs=hevc,mp4a.40.2">
											<source src="<?php echo $video_play_on_hover['url'] ?>" type="video/mp4;codecs=avc1.4d401e,mp4a.40.2">
											</video>
										</div>
									</a>
								</article>
							<?php endwhile; ?>
						</div>
					</div>
				<?php endif; wp_reset_query(); ?>
			<?php } else { ?>
				<?php $featured_posts = get_field('videos_list'); ?>
				<?php if( $featured_posts ): ?>
					<div class="ajax-reload-videos">
						<div class="row">
							<?php foreach( $featured_posts as $featured_post ): ?>
								<article class="video-list-item">
									<a href="<?php echo get_permalink($featured_post->ID) ?>" class="video-list-item-content">
										<?php $terms = get_the_terms( $featured_post->ID, 'video-category' ); ?>
										<?php $customer_name = get_field('customer_name',$featured_post->ID) ?>
										<?php $video_play_on_hover = get_field('video_play_on_hover',$featured_post->ID) ?>
										<h3 class="video-list-title" ><?php echo get_the_title($featured_post->ID) ?><span class="video-category-name" ><?php echo $customer_name ?></span></h3>
										<div class="video-list-image">
											<img src="<?php echo get_attached_img_url($featured_post->ID, get_the_ID(),'max_767') ?>" alt="video image: <?php echo get_the_title($featured_post->ID) ?>">
											<video data-width="768" data-height="540" class="mobile-hover-video" muted="muted" loop="" playsinline="" poster="<?php echo get_attached_img_url(get_the_ID(), 'max_767' ) ?>" width="100%">
												<source src="<?php echo $video_play_on_hover['url'] ?>" type="video/mp4;codecs=hevc,mp4a.40.2">
													<source src="<?php echo $video_play_on_hover['url'] ?>" type="video/mp4;codecs=avc1.4d401e,mp4a.40.2">
													</video>
												</div>
											</a>
										</article>
									<?php endforeach; ?>
								</div>
							<?php endif; ?>

						<?php } ?>
					</div>

					<?php if(!$hide_filter = get_field('hide_filter')): ?>
						<div class="video-category-filter-list-sticky main-bold-frame orange">
							<div class="light-frame">
								<?php
								$args = array(
									'taxonomy'               => 'video-category',
									'orderby'                => 'name',
									'order'                  => 'ASC',
									'hide_empty'             => false,
									'number'                 => 0,
								);
								?>
								<?php $the_query = new WP_Term_Query($args); ?> 
								<?php if ($the_query): ?>
									<ul class="video-category-filter-list" >
										<?php
										$terms = $the_query->get_terms();

										foreach($terms as $term){ ?>
											<li ><button class="video-filter" data-video-category-slug="<?php echo $term->slug ?>"><?php echo $term->name ?></button></li>
										<?php } ?>
									</ul>
								<?php endif ; wp_reset_query() ;?>
							</div>
						</div>
						<button class="video-category-filter-list-sticky-toggle" type="button"><?php _e('Filters', 'nugget'); ?></button>
					<?php endif; ?>


					<?php do_action( 'block_end', __DIR__); ?>

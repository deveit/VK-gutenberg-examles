<?php 

function filter_by_video_category() {

	if(isset($_POST['video']) && !empty($_POST['video'])) {

		$arg = array(
			'post_type'     => 'video',
			'order'         => 'DESC',
			'posts_per_page'    => 9,
			'tax_query' => array(
				'relation' => 'OR'
			),
		);
		if(isset($_POST['video']) && !empty($_POST['video'])){
			$arg['tax_query'][] = array(
				'taxonomy' => 'video-category',
				'field' => 'slug',
				'terms' => $_POST['video'],
			);
		}
		
	} else {
		$arg = array(
			'post_type'     => 'video',
			'order'         => 'DESC',
			'orderby'	    => 'menu_order',
			'posts_per_page'    => 9,
		);
	}

	$the_query = new WP_Query( $arg ); ?>
	<div class="row">
		<?php if ( $the_query->have_posts() ) : ?>
			<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
				<article class="video-list-item">
					<a href="<?php the_permalink() ?>" class="video-list-item-content">
						<?php $customer_name = get_field('customer_name',get_the_ID()) ?>
						<?php $video_play_on_hover = get_field('video_play_on_hover',get_the_ID()) ?>
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
					<?php else : ; wp_reset_query(); ?>
						<?php if($video_not_found_text = get_field('video_not_found_text','options')){ ?>
							<span class="h3 text-center custom-heading no-videos-found" ><?php echo $video_not_found_text ?></span>
						<?php } else { ?>
							<span class="h3 text-center custom-heading no-videos-found" ><?php echo __('Video not found', 'nugget') ?></span>
						<?php } ?>
					<?php endif ?>
				</div>
				<?php

				die();
			}
			add_action('wp_ajax_nopriv_filter_by_video_category', 'filter_by_video_category');
			add_action('wp_ajax_filter_by_video_category', 'filter_by_video_category');
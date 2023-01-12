<?php
/**
 * Single
 *
 * Loop container for single post content
 */
get_header('video'); ?>



<?php $video_id = get_field('video_id') ?>
<main class="video-page-content">
	<button class="pos-a play player-button "></button>

	<img class="video-cover-image hide-for-small" src="<?php echo get_attached_img_url(get_the_ID(), 'full_hd' ) ?>" alt="">

	<div class="video-title-row video-row column show-on-move">
		<h1 class="single-video-title text-center custom-heading" >
			<a class="back-link" href="<?php echo bloginfo('url') ?>">
				<svg width="28" height="32" viewBox="0 0 28 32" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M27.0669 31.73L0.606934 19.958V12.02L27.0669 0.248047V8.94205L7.73493 15.962L27.0669 22.982V31.73Z" fill="white"/>
				</svg>
			</a>
			<?php the_title() ?>
		</h1>
		<?php $customer_name = get_field('customer_name') ?>
		<span class="video-category-name text-center" ><?php echo $customer_name ?></span>
	</div>
	<div class="video-cover show-for-small">
		<a href="https://vimeo.com/<?php echo $video_id ?>" data-fancybox class="play-for-mobile " ></a>
		<?php $video_play_on_hover = get_field('video_play_on_hover') ?>
		<video data-width="768" data-height="540" class="mobile-cover-video" muted="muted" autoplay="autoplay" loop="" playsinline="" poster="<?php echo get_attached_img_url(get_the_ID(), 'max_767' ) ?>" width="100%">
			<source src="<?php echo $video_play_on_hover['url'] ?>" type="video/mp4;codecs=hevc,mp4a.40.2">
				<source src="<?php echo $video_play_on_hover['url'] ?>" type="video/mp4;codecs=avc1.4d401e,mp4a.40.2">
				</video>
			</div>
			<div class="video-info show-on-move">
				<div class="mobile-buttons show-for-small column">
					<button class="custom-button mobile-show-video-info " ><?php echo __('Nutrition info', 'nugget') ?></button>
					<button class="custom-button mobile-show-related-video " ><?php echo __('Related  projects', 'nugget') ?></button>
				</div>
				<div class=" video-row column  text-center ">
					<div class="video-text">
						<?php if($budget = get_field('budget')): ?>
							<div class="video-info-budget video-info-column">
								<div class="video-info-column-title"><?php echo __('Budget','nugget') ?></div>
								<span class="video-info-column-text"><?php echo $budget ?></span>
							</div>
						<?php endif; ?>
						<?php if($production_days = get_field('production_days')): ?>
							<div class="video-info-production-days video-info-column">
								<div class="video-info-column-title"><?php echo __('Production days','nugget') ?></div>
								<span class="video-info-column-text"><?php echo $production_days ?></span>
							</div>
						<?php endif; ?>
						<?php if($team_size = get_field('team_size')): ?>
							<div class="video-info-team-size video-info-column">
								<div class="video-info-column-title"><?php echo __('Team size','nugget') ?></div>
								<span class="video-info-column-text"><?php echo $team_size ?></span>
							</div>
						<?php endif; ?>
						<?php if($excerpt = get_the_excerpt()): ?>
							<div class="video-info-team-size video-info-column">
								<div class="video-info-column-title"><?php echo __('Info','nugget') ?></div>
								<span class="video-info-column-excerpt"><p><?php echo $excerpt ?></p></span>
							</div>
						<?php endif; ?>
						<button class="mobile-hide-video-info show-for-small buton-close-icon"></button>
					</div>
					<?php $terms = get_the_terms( get_the_ID(), 'video-category' ); ?>
					<?php 
					$items = array();
					foreach($terms as $term) {
						$items[] = $term->slug;
					}

					$arg = array(
						'post_type'     => 'video',
						'order'         => 'DESC',
						'posts_per_page'    => 4,
						'tax_query' => array(
							'relation' => 'OR'
						),
					);
					$arg['tax_query'][] = array(
						'taxonomy' => 'video-category',
						'field' => 'slug',
						'relation' => 'OR',
						'terms' => $items,
					);

					$the_query = new WP_Query( $arg ); ?>
					<?php if ( $the_query->have_posts() ) : ?>
						<div class="related-video ">
							<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
								<a href="<?php the_permalink() ?>" class="video-list-item">
									<span class="video-list-title text-center" ><?php the_title() ?></span>
									<div class="video-list-image">
										<img src="<?php echo get_attached_img_url(get_the_ID(),'max_200') ?>" alt="video image: <?php the_title() ?>">
									</div>
								</a>
							<?php endwhile; ?>
							<div class="clearfix show-for-small"></div>
							<button class="mobile-hide-related-video show-for-small buton-close-icon"></button>
						</div>
					<?php endif ?>
					<?php wp_reset_query(); ?>
					<?php if ($items): ?>
						<button class="custom-button show-related-video hide-for-small" data-text-1="<?php echo __('Nutrition info','nugget') ?>" data-text-2="<?php echo __('Related projects', 'nugget') ?>" ><?php echo __('Related projects', 'nugget') ?></button>
					<?php endif ; ?>
				</div>
			</div>

			<?php if($video_id): ?>

				<div id="videoAdjustments" class="video-control-block videoAdjustments show-on-move hide-for-small" >
					<div class="video-row column">
						<div class="video-time-proggress  ">
							<input type="range" id="setTime" class="time" min="0" value="0" step="0.01">
							<progress class="currentPlay" min="0" value="0"></progress>
						</div>
					</div>
					<div class="video-controls video-row  ">
						<div class="video-controls-column column">
							<div class="ply">
								<button class="play player-button"></button>
								<button class="pause player-button"></button>
							</div>
							<div class="speaker">
								<span class="icon-volume-medium sound">
								</span><span class="icon-volume-mute mute"></span>
								<button class="show-volume"></button>
								<div class="vol">
									<input type="range" id="volume" class="volume" min=0.0 value=0 max=1 step=0.1>
									<progress class="volumeProg" min="0" max="1" value="0"></progress>
								</div>
							</div>
						</div>
						<div class="video-controls-time column">
							<span class="status"></span>
							<span class="total-time"></span>
						</div>
					</div>
				</div>
			<?php endif; ?>


		</main>


		<?php if($video_id): ?>
			<div id="vimeo" class="vimeo-video hide-for-small" data-vimeo-id="<?php echo $video_id ?>"></div>
		<?php endif; ?>


		<?php get_footer('video'); ?>




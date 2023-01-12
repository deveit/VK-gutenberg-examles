<?php
/**
 * Single
 *
 * Loop container for single post content
 */
get_header(); ?>


<main class="main-content">
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
			<article <?php post_class(); ?>>
				<?php the_content('',true); ?>
			</article>
		<?php endwhile; ?>
	<?php endif; ?>


	<?php $term_obj_list = get_the_terms( $post->ID, 'position-category' ); ?>
	<?php $items = array();
	foreach($term_obj_list as $term_obj) {
		$items[] = $term_obj->slug;
	} ?>

	<?php $current_post_id = get_the_ID() ?>
	<?php //var_dump($current_post_id) ?>

	<?php $arg = array(
		'post_type'	    => 'positions', 
		'order'		    => 'DESC',
		'post__not_in'  => array($current_post_id), 
				// 'orderby'	    => 'menu_order',
		'posts_per_page'    => -1,
		'tax_query' => array(
			'relation' => 'OR',
			array(
				'taxonomy' => 'position-category',
				'field' => 'slug',
				'terms' =>  $items
			)
		),
	);
	$the_query = new WP_Query( $arg ); ?>
	<?php if ( $the_query->have_posts() ) : ?>
		<?php if($you_may_also_like = get_field('you_may_also_like','options')): ?>
			<div class="row column">
				<h2 class="you-may-also-like-title h1" ><?php echo $you_may_also_like ?></h2>
			</div>
		<?php endif; ?>
		<section class="position-list-section">
			<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
				<article class="position-list-article">
					<div class="position-list-section-row row column ">
						<div class="position-list-item ">
							<div class="position-list-item-content">
								<?php $terms = get_the_terms( $post->ID, 'position-category' ); ?>
								<span class="position-category-name" ><?php echo $terms[0]->name ?></span>
								<h3 class="position-list-title" ><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
								<a class="position-list-image hide-for-medium" data-position-category-name="<?php echo $terms[0]->name ?>" href="<?php the_permalink() ?>"><img src="<?php echo get_attached_img_url(get_the_ID(),'max_767') ?>" alt=""></a>
								<div class="position-list-content">
									<div class="position-excerpt"><?php the_excerpt()  ?></div>
									<?php if($read_more_button_text = get_field('read_more','options')): ?>
										<a class="custom-button position-read-more" href="<?php the_permalink() ?>"><?php echo $read_more_button_text  ?></a>
									<?php endif; ?>
								</div>
							</div>
							<div class="position-list-item-image">
								<a class="position-list-image hide-for-small"  href="<?php the_permalink() ?>"><img src="<?php echo get_attached_img_url(get_the_ID(),'max_767') ?>" alt=""></a>
							</div>
						</div>
					</div>
				</article>
			<?php endwhile; ?>
		</section>
	<?php endif; wp_reset_query(); ?>
</main>



<?php get_footer(); ?>

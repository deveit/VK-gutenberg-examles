<?php
/**
 * The template for displaying 404 pages (Not Found)
 */

get_header(); ?>
<!-- BEGIN of 404 page -->
<?php if($page_404_text = get_field('page_404_text','options')): ?>
	<section class="page-404-section">
		<div class="row column text-center not-found">
			<?php echo $page_404_text ?>    
		</div>
	</section>
<?php endif; ?>
<!-- END of 404 page -->
<?php get_footer(); ?>
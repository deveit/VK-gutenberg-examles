<?php if( have_rows('button') ): ?>
	<?php $centered_buttons = get_field('centered_buttons') ?>
	<div class="buttons-container <?php echo $centered_buttons ? 'text-center' : '' ?>">
		<?php while ( have_rows('button') ) : the_row();?>
			<?php if($link = get_sub_field('link')): ?>
				<?php $button_color_type = get_sub_field('button_color_type') ?>
				<a class="custom-button <?php echo $button_color_type=='dark' ? 'dark' : '' ?>" href="<?php echo $link['url'] ?>" <?php echo $link['target'] ? 'target="'.$link['target'].'"' :'' ?>><?php echo $link['title'] ?></a>
			<?php endif; ?>
		<?php endwhile;?>
	</div>
<?php endif; ?>

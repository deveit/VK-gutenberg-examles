<?php if($heading_text = get_field('heading_text')): ?>
	<?php $heading_type = get_field('heading_type') ?>
	<?php $heading_size = get_field('heading_size') ?>
	<?php $text_center = get_field('text_center') ?>
	<<?php echo $heading_type ?> class="custom-heading <?php echo $text_center ? 'text-center' : '' ?> <?php echo $heading_size ?>" ><?php echo $heading_text ?></<?php echo $heading_type ?>>
	<?php endif; ?>
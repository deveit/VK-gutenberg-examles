<?php 

$heading_text = get_field('heading_text') ;
$heading_tag = get_field('heading_tag') ;
$heading_size = get_field('heading_style_size') ;
$text_align = get_field('text_align') ;

if($heading_text) {
	echo '<'. $heading_tag . ' class="heading heading--' . $heading_size . ' align-' . $text_align .'">' . $heading_text . '</'. $heading_tag . '>' ;
} 
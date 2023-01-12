<?php 

$paragraph_text = get_field('paragraph_text') ;
$paragraph_size = get_field('paragraph_style_size') ;
$text_align = get_field('text_align') ;

if($paragraph_text) {
	echo '<p class="paragraph paragraph--' . $paragraph_size . ' align-' . $text_align .'">' . $paragraph_text . '</p>' ;
} 
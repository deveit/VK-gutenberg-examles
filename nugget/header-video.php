<?php
/**
 * Header
 */
?>
<!DOCTYPE html>
<!--[if !(IE)]><!-->
	<html ontouchmove <?php language_attributes(); ?>> <!--<![endif]-->
<!--[if IE 8]>
	<html class="no-js lt-ie9 ie8" lang="en"><![endif]-->
		<!--[if gt IE 8]><!-->
			<html ontouchmove class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<!--[if gte IE 9]>
<style type="text/css">
    .gradient {
        filter: none;
    }
</style>
<![endif]-->

	<head>
		<!-- Set up Meta -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
		<meta charset="<?php bloginfo('charset'); ?>">
		<!-- Set the viewport width to device width for mobile -->
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
		<meta name="theme-color" content="#F59D19">
		<?php wp_head(); ?>
		 <script src="https://player.vimeo.com/api/player.js"></script>
	</head>

	<body <?php body_class(); ?>>



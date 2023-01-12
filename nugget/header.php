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
	</head>

	<body <?php body_class(); ?>>

		<!-- BEGIN of header -->
		<?php if(is_front_page() && $preloader_animation_image = get_field('preloader_animation_image','options')): ?>
			<div class="preloader">
				<div class="main-bold-frame orange height-100vh">
					<div class="light-frame text-center">
						<img class="preloader-image" src="<?php echo $preloader_animation_image['sizes']['full_hd']  . '?t=' . time(); ?>" alt="">
					</div>
				</div>
			</div>
			<script>
				(function(){
					if(sessionStorage.getItem('preloader-seen')){ <?php // if once seen, then remove preloader ?>
						var p = document.getElementsByClassName("preloader");
						if(p.length) p[0].remove();
					} else { <?php // disable scrolling while preloader is showing ?>
						sessionStorage.setItem('preloader-seen', true);
						document.body.style.overflow = 'hidden';
						window.addEventListener('load', function(){setTimeout(function(){
							document.body.style.removeProperty('overflow');
						}, 1500);});
					}
				})();
			</script>
		<?php endif; ?>
		<header class="header ">
			<div class="row header-row">
				<div class=" header-logo-column">
					<div class="logo ">
						<?php show_custom_logo(); ?>
					</div>
				</div>
				<div class=" header-buttons-column ">
					<div class="header-buttons-column-container show-for-small">
						<div id="nav-icon2">
							<span></span>
							<span></span>
							<span></span>
							<span></span>
							<span></span>
							<span></span>
						</div>
					</div>
				</div>
				<div class=" header-menu-column">
					<nav class="top-bar " id="main-menu">
						<?php
						if (has_nav_menu('header-menu')) {
							wp_nav_menu(array('theme_location' => 'header-menu',
								'menu_class' => 'menu header-menu dropdown ',
								'items_wrap' => '<ul id="%1$s" class="%2$s" data-responsive-menu="accordion medium-dropdown" data-close-on-click-inside="false">%3$s</ul>',
								'walker' => new mpc_Navigation()));
						}
						?>
						<?php if($headerCB = get_field('header_custom_button','options')): ?>
							<a class="header-custom-link" href="<?php echo $headerCB['url'] ?>" <?php echo $headerCB['target'] ? 'target="'.$headerCB['target'].'"' :'' ?>><?php echo $headerCB['title'] ?></a>
						<?php endif; ?>
					</nav>
				</div>

				
			</div>
		</header>
		<!-- END of header -->



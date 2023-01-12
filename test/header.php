<?php
/**
 * Header
 */
?>
<!DOCTYPE html>
<!--[if !(IE)]><!-->
<html <?php language_attributes(); ?>> <!--<![endif]-->
<!--[if IE 8]>
	<html class="no-js lt-ie9 ie8" lang="en"><![endif]-->
	<!--[if gt IE 8]><!-->
	<html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
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
	<meta name="theme-color" content="#215398">
	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
	<div class="preloader">
		<div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
	</div>
	<!-- BEGIN of header -->
	<header class="header ">
		<div class="row header-row">
			<div class="columns header-logo-column">
				<div class="logo ">
					<?php show_custom_logo(); ?>
				</div>
			</div>
		</div>
	</header>
    <!-- END of header -->
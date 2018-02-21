<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Littlpool
 */
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<title>Small Pond | <?php echo get_the_title();  ?></title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/dev/styles/style.css" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>








	<div id="rehearse-header">
			<nav id="rehearse-nav" class="navbar is-fixed-top" role="navigation">
				<div class="navbar-brand">
					<a class="navbar-item" href="<?php echo get_home_url(); ?>">
						<img src="/media/logo.png">
					</a>

				<div class="navbar-burger burger" data-target="navbarExampleTransparentExample"><span></span><span></span><span></span></div>
				</div>
				<div class="navbar-menu" id="navbarExampleTransparentExample">

				<?php shop_navigation(); ?>
				<div class="navbar-end">
					<div class="navbar-item">
						<?php social_navigation(); ?>
					</div>
				<div>
			</nav>



</div>
<div class="navbar-spacer"></div>

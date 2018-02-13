<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bulmapress
 */
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<title>Small Pond | Welcome</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/dev/styles/style.css" />

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

		<h1>hello world</h1>
    <div class="container" id="landing-header"><img src="media/logo_line.png">
        <ul class="social-right">
            <li><a class="social-link" href="#"><span class="icon"><i class="icon-facebook"></i></span></a></li>
            <li><a class="social-link" href="#"><span class="icon"><i class="icon-twitter"></i></span></a></li>
            <li><a class="social-link" href="#"><span class="icon"><i class="icon-instagram"></i></span></a></li>
            <li><a class="social-link" href="#"><span class="icon"><i class="icon-soundcloud"></i></span></a></li>
            <li><a class="social-link" href="#"><span class="icon"><i class="icon-spotify"></i></span></a></li>
        </ul>
        <hr>
    </div>

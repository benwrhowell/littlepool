<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Bulmapress
 */

get_header(); ?>


		<?php while ( have_posts() ) : the_post(); ?>
			<section>
			<div class="container module">
				<div class="columns">
					<div class="column">
				<div class="content">
			 <?php the_content(); ?>
		 	</div>
			</div>
			</div>
		 </div>
	 </section>
		<?php endwhile; ?>



<?php get_footer(); ?>

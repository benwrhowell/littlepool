<?php
/*
Template Name: Standard Page Landing
*/


get_header('landing'); ?>


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



<?php get_footer('landing'); ?>

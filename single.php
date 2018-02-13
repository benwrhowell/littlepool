<?php
/*
 * Template Name: Simple post (Rehearse/Record)
 * Template Post Type: post
 */

get_header(); ?>


		<?php while ( have_posts() ) : the_post(); ?>


				<section>
				<div class="container module post">


					<div class="columns is-multiline">
						<?php bulma_breadcrumbs(); ?>
						<div class="column is-12">
							<div class="content">
								 <p class="title is-3"><?php the_title(); ?></p>
								 <p class="subtitle is-7"><?php the_date(); ?></p>
								 	<hr>
							<figure class="image feat-image">
							<?php the_post_thumbnail( 'full' ); ?>
						</figure>





				 <?php the_content(); ?>
				</div>
				</div>
				</div>
				</div>
				</section>
						<?php endwhile; ?>


<?php get_footer(); ?>

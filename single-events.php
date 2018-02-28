<?php
/*
 * Template Name: Simple post (Rehearse/Record)
 * Template Post Type: post
 */

get_header('label'); ?>


		<?php while ( have_posts() ) : the_post(); ?>



				<div class="container main-wrap post event">


					<div class="columns is-multiline is-mobile">
						<?php bulma_breadcrumbs(); ?>
						<div class="column is-4-desktop is-5-tablet is-12-mobile">

								<figure class="image"><img src="<?php the_field('event_image', $post); ?>" alt="Placeholder image" /></figure>
						</div>
						<div class="column is-8-desktop is-7-tablet is-12-mobile">
							<div class="content">


								 <p class="main title is-1"><?php the_field('main_artist', $post); ?></p>
								 <p class="main subtitle is-4">+ <?php the_field('support_artist', $post); ?></p>

								 <p class="subtitle"><strong><?php the_field('meta_info', $post); ?></strong></p>
								 	<hr>
								 <a href="<?php the_field('ticket_link ', $post); ?>" class="button is-small"> <span class="icon"><i class="icon-info"></i></span><span>Buy tickets</span></a>
								  <a href="<?php the_field('ticket_link ', $post); ?>" class="button is-small is-link"> <span class="icon"><i class="icon-facebook"></i></span><span>FB event</span></a>

									<a href="<?php the_field('ticket_link ', $post); ?>" class="button is-small is-success"> <span class="icon"><i class="icon-spotify"></i></span><span>Stream</span></a>
								 <hr>
								 <?php the_content(); ?>
							<figure class="image feat-image">
							<?php the_post_thumbnail( 'full' ); ?>
						</figure>






				</div>
				</div>
				</div>
				</div>

						<?php endwhile; ?>


<?php get_footer(); ?>

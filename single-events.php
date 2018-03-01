<?php

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
									<div class="buttons">
									<?php

									$ticketLink = get_field('ticket_link', $post);
									$fbLink = get_field('fb_link', $post);
									$streamLink = get_field('stream_link', $post);

									  if ($ticketLink != '') {
			                echo '<a class="button is-small" href="'.$ticketLink.'" target="_blank"><span class="icon"><i class="icon-info"></i></span><span>Buy Tickets</span></a>';
			              }
										if ($fbLink != '') {
			                echo '<a class="button is-small is-info" href="'.$fbLink.'" target="_blank"><span class="icon"><i class="icon-facebook"></i></span><span>FB event</span></a>';
			              }
										if ($streamLink != '') {
			                echo '<a class="button is-small is-success" href="'.$streamLink.'" target="_blank"><span class="icon"><i class="icon-spotify"></i></span><span>Stream</span></a>';
			              }


										 ?>
									 </div>
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

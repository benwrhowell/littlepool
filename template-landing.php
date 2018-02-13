<?php
/*
Template Name: Landing page
*/
?>

<?php get_header('landing'); ?>


<div class="container">
		<div id="slogan-text">
				<p class="title is-5">Welcome To Small Pond</p>
				<p class="subtitle is-6">How can we help you? </p>
		</div>
		<div class="columns is-mobile is-multiline">
				<div class="column is-12-mobile is-5-desktop is-4-tablet is-offset-1-desktop is-offset-2-tablet">
						<div class="landing-card-wrap">
								<div class="card landing-card" id="rehearse-landing-card" style="background-image: url('<?php the_field('landing_option_1_image'); ?>'); )  ">
										<div class="card-content green">
												<div class="media">
														<div class="media-left">
																<figure class="image is-64x64"><img src="/media/icons/synth.png" alt="Placeholder image"></figure>
														</div>
														<div class="media-content"><a class="title landing-card-title" href="<?php the_field('landing_option_1_link'); ?>"><?php the_field('landing_option_1'); ?></a></div>
												</div>
										</div>
								</div>
						</div>
				</div>
				<div class="column is-5-desktop is-4-tablet">
						<div class="landing-card-wrap">
								<div class="card landing-card" id="label-landing-card" tyle="background-image: url('<?php the_field('landing_option_2_image'); ?>'); )  ">
										<div class="card-content orange">
												<div class="media">
														<div class="media-left">
																<figure class="image is-64x64"><img src="/media/icons/vin.png" alt="Placeholder image"></figure>
														</div>
														<div class="media-content"><a class="title landing-card-title" href="<?php the_field('landing_option_2_link'); ?>"><?php the_field('landing_option_2'); ?></a></div>
												</div>
										</div>
								</div>
						</div>
				</div>
		</div>
</div>


<?php get_footer('landing'); ?>

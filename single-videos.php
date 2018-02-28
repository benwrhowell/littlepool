<?php

get_header('label'); ?>


		<?php while ( have_posts() ) : the_post(); ?>


				<section>
				<div class="container module post">
					<div class="columns is-multiline">
							<?php bulma_breadcrumbs(); ?>
						<div class="column is-12">
							<div class="content">
								 <p class="title is-3"><?php the_title(); ?></p>


									<div data-type="youtube" data-plyr='{"volume": 0 }'  data-video-id="<?=the_field('youtube_url', $post);?>"></div>
					 			<?php the_content(); ?>
							</div>
						</div>
						<div class="column is-12">
					      <hr>
					      <p class="title">Recent</p>
					  </div>

					         <?php
					            $args = array(
					              'post_type' => 'video',
					              'orderby' => 'id',
					              'hide_empty'=> 0,
					              'child_of' => 32, //Child From Boxes Category
					          );
					          $categories = get_categories($args);
					          foreach ($categories as $cat) {

					                $category_link = get_category_link( $cat->cat_ID );

					                echo '<div class="column is-4 video-post-thumb">';
					                echo '<p class="title is-4"><a href="'.$category_link.'">'.$cat->name.'</a></p>';

					                //echo '<br />';
					                $args2= array('post_type' => 'videos', "orderby"=>'date','posts_per_page' => 1, "category" => $cat->cat_ID);

					                 // Get Post from each Sub-Category
					                $posts_in_category = get_posts($args2);
					                foreach($posts_in_category as $current_post) {
					                    echo '<div class="posts">';
					                    ?>
					                    <div class="columns is-multiline">
					                      <div class="column is-12">
					                      <div class="video-card box">

					                          <p class="title is-6"><a href="<?=$current_post->guid;?>"><?=' '.$current_post->post_title; ?></a></p>
					                          <div data-type="youtube" data-plyr='{"volume": 0 }'  data-video-id="<?=the_field('youtube_url', $current_post);?>">
					                          </div>
					                          <span class="video-meta">
					                          <a target="_blank" class="is-size-7" href="<?=the_field('youtube_url', $post);?>"><span class="icon"><i class="icon-youtube"></i></span><span>Watch on Youtube</a></span>

					                      </div>
					                    </div>
					                    </div>

					                    <?php

					                    echo '</div>';

					                }
					                echo '<p class="is-size-7 see-all-action"><a class="button is-small" href="'.$category_link.'">See All</a></p>';
					                echo '</div>';
					            }
					        ?>

				</div>
			</div>
				</section>
						<?php endwhile; ?>

<script>plyr.setup();</script>
<?php get_footer(); ?>

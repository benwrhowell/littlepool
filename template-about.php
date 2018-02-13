<?php
/*
Template Name: About template
*/
?>

<?php get_header(); ?>


  <div class="container main-wrap">
      <div class="columns is-multiline">
          <div class="column is-12">
              <p class="title is-1 page-title">
                <?php
                $str = get_the_title();
                $str = strtoupper($str);
                echo $str; 
                ?>
              </p>
              <hr>
          </div>
          <div class="column is-4">
              <div class="content">
                <?php the_field('main_content'); ?>
              </div>
          </div>
          <div class="column is-8">
              <p class="title accent purple">MEET THE TEAM</p>
              <div class="columns is-multiline is-mobile">

                    <?php

                    $posts = get_posts(array(
                    	'posts_per_page'	=> -1,
                    	'post_type'			=> 'team'
                    ));

                    if( $posts ): ?>

                    	<?php foreach( $posts as $post ): setup_postdata( $post ); ?>

                    		<div class="column is-3-tablet is-3-desktop is-6-mobile">
                            <div class="card compact-card">
                                <div class="card-image">
                                    <figure class="image"><img src="<?php the_field('team_picture'); ?>" alt="Placeholder image" /></figure>
                                </div>
                                <div class="card-content">
                                    <div class="content">
                                        <p class="title is-4"><?php the_field('name'); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                  	<?php endforeach; ?>
                  	<?php wp_reset_postdata(); ?>
                    <?php endif; ?>
              </div>
          </div>
      </div>
  </div>

<?php get_footer(); ?>

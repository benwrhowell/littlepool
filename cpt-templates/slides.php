<?php

$moduleCat = get_field('slide_cat');


$posts = get_posts(array(
  'posts_per_page'	=> -1,
  'post_type'			  => 'slides',
  'category_name' 	=> $moduleCat
));

if( $posts ): ?>

  <?php foreach( $posts as $post ): setup_postdata( $post ); ?>

      <div class="slide-box alt" style="background-image: url('<?php the_field('background_image') ?>');">
          <div class="slide-wash" style="background: rgba(0,0,0,<?php the_field('bg_opacity') ?>);"></div>
          <div class="slide-cover-wrap"></div>
          <div class="slide-content">
              <div class="slide-content-wrap">
                  <p class="title is-1 <?php the_field('slide_title_colour') ?>"> <?php the_field('main_title') ?></p>
                  <p class="subtitle"><?php the_field('main_subtitle') ?></p>
                  <div class="buttons">
                    <?php

                      $moreLink = get_field('more_check');
                      $moreURL = get_field('more_link');
                      $spotifyLink = get_field('spotify_check');
                      $spotifyURL = get_field('spotify_link');
                      $youtubeLink = get_field('youtube_check');
                      $youtubeURL = get_field('youtube_link');

                    if ($moreLink == 'enabled') {
                      echo '<a class="button" href="'.$moreURL.'" target="_blank"><span class="icon"><i class="icon-info"></i></span><span>More</span></a>';
                    }

                    if ($spotifyLink == 'enabled') {
                      echo '<a class="button is-success" href="'.$spotifyURL.'" target="_blank"><span class="icon"><i class="icon-spotify"></i></span><span>Stream</span></a>';
                    }

                    if ($youtubeLink == 'enabled') {
                      echo '<a class="button is-danger" href="'.$youtubeURL.'" target="_blank"><span class="icon"><i class="icon-youtube-alt"></i></span><span>Watch</span></a>';
                    }
                  ?>
                  </div>
              </div>
          </div>
      </div>


  <?php endforeach; ?>
<?php wp_reset_postdata(); ?>
<?php endif; ?>

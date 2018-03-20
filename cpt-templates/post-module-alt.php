<?php

  $moduleCheck = get_field('module_check_2');
  $moduleCat = get_field('module_check_2_cat');
  $colWidth = get_field('col_width_2');
  $numToShow = get_field('item_number_2');
  $orderBy = get_field('order_by');
  $sectionTitle = get_field('module_title_2');
  $catNo = get_field('cat_no');

    $posts = get_posts(array(
      'posts_per_page'	=> $numToShow,
      'post_type'			=> $moduleCheck,
      'category_name' =>  $moduleCat,
      'orderby' => $orderBy,
      'order' => 'ASC'
    ));



    if( $posts && $moduleCheck == 'releases'): ?>

    <?php if ($sectionTitle != null): ?>
        <div class="column is-12">
            <p class="title is-4"><?php the_field('module_title_2')?></p>
        </div>
    <?php endif; ?>

        <?php foreach( $posts as $post ): setup_postdata( $post ); ?>
        <div class="column is-<?php echo $colWidth; ?>-tablet is-<?php echo $colWidth; ?>-desktop is-6-mobile">
            <div class="card compact-card overlay">
                <div class="card-image">
                    <figure class="image"><img src="<?php the_field('album_artwork')?>" alt="<?php the_field('artist')?> - <?php the_field('title')?>" /></figure>
                </div>
                <div class="card-content">
                    <div class="content"><a class="title is-5"><?php the_field('artist')?></a><a class="subtitle is-6"><?php the_field('title')?>


                        <span class="cat_no"><?php the_field('cat_no')?></span>



                    </a>
                        <div class="buttons meta"><a class="button" target="_blank" href="<?php the_field('more_info_link')?>"><span class="icon"><i class="icon-info"> </i></span></a><a target="_blank" class="button" href"<?php the_field('spotify_link')?>"><span class="icon"><i class="icon-spotify"></i></span></a></div>
                    </div>
                </div>
            </div>
        </div>

    <?php endforeach; ?>
    <?php wp_reset_postdata(); ?>
    <?php endif; ?>

    <?php
    if( $posts && $moduleCheck == 'events' ): ?>

    <?php if ($sectionTitle != null): ?>
        <div class="column is-12">
            <p class="title is-4"><?php the_field('module_title_2')?></p>
        </div>
    <?php endif; ?>

        <?php foreach( $posts as $post ): setup_postdata( $post ); ?>

          <div class="column is-<?php echo $colWidth; ?>-tablet is-<?php echo $colWidth; ?>-desktop is-6-mobile">
              <div class="card compact-card event">
                  <div class="card-image">
                      <figure class="image"><img src="<?php the_field('event_image'); ?>" alt="Placeholder image" /></figure>
                  </div>
                  <div class="card-content">
                      <div class="content">
                          <a href="<?=$post->guid;?>" class="title is-5 is-block"><?php the_field('main_artist'); ?></a>
                          <?php $supportArtist = get_field('support_artist');?>
                          <?php if ($supportArtist != ''): ?>
                              <p class="subtitle is-7 support">+ <?php the_field('support_artist'); ?></p>
                          <?php endif; ?>

                          <p class="subtitle is-7"><strong><?php the_field('meta_info'); ?></strong></p>
                          <a href="<?php the_field('ticket_link '); ?>" class="button is-small"> <span class="icon"><i class="icon-info"></i></span><span>Buy tickets</span></a>
                      </div>
                  </div>
              </div>
          </div>

    <?php endforeach; ?>
    <?php wp_reset_postdata(); ?>
    <?php endif; ?>

        <?php
        if( $posts && $moduleCheck == 'band' ): ?>

        <?php if ($sectionTitle != null): ?>
            <div class="column is-12">
                <p class="title is-4"><?php the_field('module_title_2')?></p>
            </div>
        <?php endif; ?>

            <?php foreach( $posts as $post ): setup_postdata( $post ); ?>

              <div class="column is-6-mobile is-?php echo $colWidth; ?>-tablet">
                  <div class="card compact-card">
                      <div class="card-image">
                          <figure class="image"><img src="<?php the_field('image'); ?>" alt="Placeholder image" /></figure>
                      </div>
                      <div class="card-content">
                          <div class="content"><p class="title is-5"><?php the_field('name'); ?></p>
                              <div class="buttons meta"><a class="button" href="<?php the_field('more_info_link'); ?>"><span class="icon"><i class="icon-info"> </i></span></a><a class="button" href="<?php the_field('spotify_link'); ?>"><span class="icon"><i class="icon-spotify"> </i></span></a></div>
                          </div>
                      </div>
                  </div>
              </div>



        <?php endforeach; ?>
        <?php wp_reset_postdata(); ?>
        <?php endif; ?>

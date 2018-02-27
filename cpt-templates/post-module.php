<?php

  $moduleCheck = get_field('module_check');
  $moduleCat = get_field('module_check_cat');
  $colWidth = get_field('col_width');
  $numToShow = get_field('item_number');
  $sectionTitle = get_field('module_title');
  $orderBy = get_field('order');
  $catNo = get_field('cat_no');

    $posts = get_posts(array(
      'posts_per_page'	=> $numToShow,
      'post_type'			=> $moduleCheck,
      'category_name' =>  $moduleCat,
      'orderby' => $orderBy,
      'order' => 'ASC'
    ));

    if( $posts && $moduleCheck == 'releases' ): ?>

    <?php if ($sectionTitle != null): ?>
        <div class="column is-12">
            <p class="title is-4"><?php the_field('module_title')?></p>
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
                        <div class="buttons meta"><a class="button"><span class="icon"><i class="icon-info"> </i></span></a><a class="button" href"<?php the_field('spotify_link')?>"><span class="icon"><i class="icon-spotify"></i></span></a></div>
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
              <p class="title is-4"><?php the_field('module_title')?></p>
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
                          <p class="title is-5"><?php the_field('main_artist'); ?></p>
                          <p class="subtitle is-7">+ <?php the_field('support_artist'); ?></p>

                          <p class="subtitle is-7"><strong><?php the_field('meta_info'); ?></strong></p>
                          <a href="<?php the_field('ticket_link '); ?>" class="button is-small"> <span class="icon"><i class="icon-info"></i></span><span>Buy tickets</span></a>
                      </div>
                  </div>
              </div>
          </div>

    <?php endforeach; ?>
    <?php wp_reset_postdata(); ?>
    <?php endif; ?>

  <?php if( $posts && $moduleCheck == 'rooms' ): ?>

    <?php if ($sectionTitle != null): ?>
        <div class="column is-12">
            <p class="title is-4"><?php the_field('module_title')?></p>
        </div>
    <?php endif; ?>

        <?php foreach( $posts as $post ): setup_postdata( $post ); ?>

          	<div class="column is-6-mobile is-<?php echo $colWidth; ?>-desktop is-<?php echo $colWidth; ?>-tablet">
                <div class="card compact-card hoverable">
                    <div class="card-image">
                        <figure class="image is-4by3"><img src="<?php the_field('room_image'); ?>" alt="Placeholder image" /></figure>
                    </div>
                    <div class="card-content">
                        <div class="content">
                            <p class="title margin is-5"><?php the_field('room_title');?></p>
                            <p class="subtitle is-6"><?php the_field('room_size');?></p><a class="button is-small modal-button"><span class="icon"><i class="icon-info"></i></span><span>More</span></a>
                            <div class="modal">
                                <div class="modal-background"></div>
                                <div class="modal-content">
                                    <p class="image is-4by3"><img src="<?php the_field('room_image'); ?>" alt="" /></p>
                                </div><button class="modal-close is-large" aria-label="close"></button></div>
                        </div>
                    </div>
                </div>
            </div>


    <?php endforeach; ?>
    <?php wp_reset_postdata(); ?>
    <?php endif; ?>



      <?php
      if( $posts && $moduleCheck == 'bands' ): ?>

      <?php if ($sectionTitle != null): ?>
          <div class="column is-12">
              <p class="title is-4"><?php the_field('module_title')?></p>
          </div>
      <?php endif; ?>

          <?php foreach( $posts as $post ): setup_postdata( $post ); ?>

            <div class="column is-6-mobile is-<?php echo $colWidth; ?>-tablet">
                <div class="card compact-card">
                    <div class="card-image">
                        <figure class="image is-square"><img src="<?php the_field('image'); ?>" alt="Placeholder image" /></figure>
                    </div>
                    <div class="card-content">
                        <div class="content"><p class="title is-5"><?php the_field('name'); ?></p>
                            <div class="buttons meta">
                              <a class="button" href="<?php the_field('more_info_link'); ?>"><span class="icon"><i class="icon-info"> </i></span></a>
                              <a class="button" href="<?php the_field('spotify_link'); ?>"><span class="icon"><i class="icon-spotify"> </i></span></a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>



      <?php endforeach; ?>
      <?php wp_reset_postdata(); ?>
      <?php endif; ?>

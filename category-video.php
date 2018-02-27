

<?php get_header('label'); ?>


<?php
// Check if there are any posts to display
if ( have_posts() ) : ?>

<div class="container main-wrap">
    <div class="columns is-multiline">
  <?php bulma_breadcrumbs(); ?>

  <div class="column is-12">
  <p class="title"> All
<?php
echo single_term_title();
?>s
</p>
</div>

    <?php

    // The Loop
    while ( have_posts() ) : the_post(); ?>
    <div class="column is-4 video-post-thumb">
      <div class="video-card box">

    <p class="title is-5"><a href="<?=$post->guid;?>"><?php the_title(); ?></a></p>
    <div data-type="youtube" data-plyr='{"volume": 0 }'  data-video-id="<?=the_field('youtube_url', $post);?>">
    </div>
      <span class="video-meta">
      <a target="_blank" class="is-size-7" href="<?=the_field('youtube_url', $post);?>"><span class="icon"><i class="icon-youtube"></i></span><span>Watch on Youtube</a></span>
  </div>
  </div>

    <?php endwhile; // End Loop

    else: ?>

    <p>Sorry, no posts matched your criteria.</p>
    <?php endif; ?>
  </div>
</div>
<script>plyr.setup();</script>
<?php get_footer(); ?>

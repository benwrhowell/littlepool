

<?php get_header('label'); ?>


<?php
// Check if there are any posts to display
if ( have_posts() ) : ?>

<div class="container main-wrap">
    <div class="columns is-multiline">
  <?php bulma_breadcrumbs(); ?>



    <?php

    // The Loop
    while ( have_posts() ) : the_post(); ?>
    <div class="column is-4">
    <p class="title is-5"><a><?php the_title(); ?></a></p>
    <div data-type="youtube" data-plyr='{"volume": 0 }'  data-video-id="<?=the_field('youtube_url', $post);?>">
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

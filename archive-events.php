

<?php get_header('label'); ?>


<?php
// Check if there are any posts to display
if ( have_posts() ) : ?>

<div class="container main-wrap">
    <div class="columns is-multiline is-mobile">
  <?php bulma_breadcrumbs(); ?>

  <div class="column is-12">
  <p class="title"> All
<?php
echo the_archive_title();
?>
</p>

</div>

    <?php

    // The Loop
    while ( have_posts() ) : the_post(); ?>
    <div class="column is-3-desktop is-4-tablet is-6-mobile">
        <div class="card compact-card event">
            <div class="card-image">
                <figure class="image"><img src="<?php the_field('event_image', $post); ?>" alt="Placeholder image" /></figure>
            </div>
            <div class="card-content">
                <div class="content">
                    <a href="<?=$post->guid;?>" class="title is-5"><?php the_field('main_artist', $post); ?></a>
                    <p class="subtitle is-7">+ <?php the_field('support_artist', $post); ?></p>

                    <p class="subtitle is-7"><strong><?php the_field('meta_info', $post); ?></strong></p>
                    <a href="<?php the_field('ticket_link ', $post); ?>" class="button is-small"> <span class="icon"><i class="icon-info"></i></span><span>Buy tickets</span></a>
                </div>
            </div>
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

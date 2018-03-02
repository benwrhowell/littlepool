

<?php get_header(); ?>


<?php
// Check if there are any posts to display
if ( have_posts() ) : ?>

<div class="container main-wrap">
    <div class="columns is-multiline is-mobile">
  <?php bulma_breadcrumbs(); ?>
<?php include get_template_directory() . '/cpt-templates/banner-module.php'; ?>
  <div class="column is-12">
  <p class="title"> All
<?php
echo the_archive_title();
?>
</p>


</div>

</div>
  <div class="columns is-multiline is-mobile">
    <?php

    // The Loop
    while ( have_posts() ) : the_post(); ?>
    <div class="column is-6-mobile is-3-desktop is-4-tablet">
        <div class="card compact-card">
            <div class="card-image">
                <figure class="image is-square"><img src="<?php the_field('image', $post); ?>" alt="Placeholder image" /></figure>
            </div>
            <div class="card-content">
                <div class="content"><p class="title is-5"><?php the_field('name', $post); ?></p>
                    <div class="buttons meta"><a class="button" href="<?php the_field('more_info_link', $post); ?>"><span class="icon"><i class="icon-info"> </i></span></a><a class="button" href="<?php the_field('spotify_link', $post); ?>"><span class="icon"><i class="icon-spotify"> </i></span></a></div>
                </div>
            </div>
        </div>
    </div>


    <?php endwhile; // End Loop

    else: ?>

    <p>Sorry, no posts matched your criteria.</p>
    <?php endif; ?>
    <?php
    global $wp_query;

    $big = 999999999; // need an unlikely integer
  echo '<div class="column is-12">';
    echo '<div class="paginate-links">';
      echo paginate_links( array(
      'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
      'format' => '?paged=%#%',
      'prev_text' => __('<<'),
      'next_text' => __('>>'),
      'current' => max( 1, get_query_var('paged') ),
      'total' => $wp_query->max_num_pages
      ) );
    echo '</div>';
    echo '</div>';
  ?>
  </div>
</div>
<script>plyr.setup();</script>
<?php get_footer(); ?>

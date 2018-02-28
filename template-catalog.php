<?php
/*
Template Name: Catalog template main
*/
?>

<?php get_header(); ?>

  <div class="container main-wrap has-newsfeed-alt">
      <div class="columns is-multiline">

          <?php bulma_breadcrumbs(); ?>

          <?php include get_template_directory() . '/cpt-templates/banner-module.php'; ?>

          <?php $buttons = get_field('buttons'); ?>

          <?php if ($buttons != null): ?>
            <div class="column is-12">

                <div class="content">
                  <div class="buttons">
                    <?php the_field('buttons'); ?>
                  </div>


                </div>
            </div>
          <?php endif; ?>

      </div>
      <div class="columns is-multiline is-mobile">


        <?php include get_template_directory() . '/cpt-templates/post-module.php'; ?>



      </div>

      <div class="columns is-multiline is-mobile">

        <?php include get_template_directory() . '/cpt-templates/post-module-alt.php'; ?>


      </div>
  </div>


<?php get_footer(); ?>

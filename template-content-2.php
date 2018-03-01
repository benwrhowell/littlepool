<?php
/*
Template Name: Main Content #2
*/
?>

<?php get_header(); ?>

<div class="container main-wrap">
    <div class="columns is-multiline">
        <div class="column is-12">
            <p class="title is-1 with-icon page-title"><?php the_field('main_title');?></p>
            <div class="content">
                <p class="is-size-5"><?php the_field('main_description');?>
            </div>
            <hr>
        </div>
        <div class="column is-4">
            <div class="box">
              <div class="content">
                <?php the_field('box_1_content');?>
                  </div>
            </div>

            <div class="box txt-center">
                <div class="content">

                <?php the_field('box_2_content');?>

              </div>
            </div>
        </div>
        <div class="column is-8">
            <div class="main-slide box">

                <?php include get_template_directory() . '/cpt-templates/slides.php'; ?>

            </div>


        </div>
        <div class="column is-12">
            <div class="content">
              <?php the_field('content_area_1'); ?>
            </div>
        </div>
    </div>
</div>

<script>plyr.setup();</script>
<?php get_footer(); ?>

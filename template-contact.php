<?php
/*
Template Name: Contact template
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
          <div class="column is-6">
              <div class="box txt-center">
                  <div class="content">
                      <?php the_field('contact_info'); ?>
                  </div>
              </div>
          </div>
          <div class="column is-6">
              <div class="box full-height map"><iframe width="100%" height="100%" frameborder="0" style="border:0;" src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJ99gioxKFdUgRwSldZeUkjQQ&amp;key=AIzaSyBqSIfcQ42OZ1HMWXh0dzFG9JsnG4_hu8k" allowfullscreen=""></iframe></div>
          </div>
      </div>
  </div>

<?php get_footer(); ?>

<?php
/*
Template Name: Home video template
*/
?>

<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
<div class="container main-wrap news-headline">
    <div class="columns is-multiline">

            <?php include get_template_directory() . '/cpt-templates/banner-module.php'; ?>
    </div>
  <div class="columns is-multiline">
        <div class="column is-7">
            <div class="banner-video box">
              <div data-type="youtube" data-plyr='{"volume": 1, "autoplay": true }' data-video-id="h-zvCGTbl90"></div>

            </div>
        </div>

<div class="column is-5">
    <div class="content">
      <?php the_content(); ?>

    </div>
</div>
  <div class="column is-12">
      <hr>
      <p class="title">Recent videos</p>
  </div>

         <?php
            $args = array(
              'post_type' => 'video',
              'orderby' => 'id',
              'hide_empty'=> 0,
              'child_of' => 32, //Child From Boxes Category
          );
          $categories = get_categories($args);
          foreach ($categories as $cat) {

                $category_link = get_category_link( $cat->cat_ID );

                echo '<div class="column is-4 video-post-thumb">';
                echo '<p class="title is-4"><a href="'.$category_link.'">'.$cat->name.'</a></p>';

                //echo '<br />';
                $args2= array('post_type' => 'videos', "orderby"=>'date','posts_per_page' => 1, "category" => $cat->cat_ID);

                 // Get Post from each Sub-Category
                $posts_in_category = get_posts($args2);
                foreach($posts_in_category as $current_post) {
                    echo '<div class="posts">';
                    ?>
                    <div class="columns is-multiline">
                      <div class="column is-12">
                      <div class="video-card box">

                          <p class="title is-6"><a href="<?=$current_post->guid;?>"><?=' '.$current_post->post_title; ?></a></p>
                          <div data-type="youtube" data-plyr='{"volume": 0 }'  data-video-id="<?=the_field('youtube_url', $current_post);?>">
                          </div>
                          <span class="video-meta">
                          <a target="_blank" class="is-size-7" href="<?=the_field('youtube_url', $post);?>"><span class="icon"><i class="icon-youtube"></i></span><span>Watch on Youtube</a></span>

                      </div>
                    </div>
                    </div>

                    <?php

                    echo '</div>';

                }
                echo '<p class="is-size-7 see-all-action"><a class="button is-small" href="'.$category_link.'">See All</a></p>';
                echo '</div>';
            }
        ?>


    </div>
</div>


<script>plyr.setup();</script>
	<?php endwhile; ?>
<?php get_footer(); ?>

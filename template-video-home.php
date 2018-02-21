<?php
/*
Template Name: Home video template
*/
?>

<?php get_header('label'); ?>

<?php while ( have_posts() ) : the_post(); ?>
<div class="container main-wrap news-headline">
    <div class="columns is-multiline">
      <div class="column is-12">
          <div class="content">
            <p class="title is-1 page-title"><?php the_title(); ?></p>

          </div>
      </div>
          <div class="column is-12">
              <div class="content">
                <?php the_content(); ?>

              </div>
          </div>
        <div class="column is-12">
            <div class="banner-video box">
              <div data-type="youtube" data-plyr='{"volume": 1 }' data-video-id="h-zvCGTbl90"></div>

            </div>
        </div>




         <?php
            $args = array(
              'post_type' => 'videos',
              'orderby' => 'id',
              'hide_empty'=> 0,
              'child_of' => 31, //Child From Boxes Category
          );
          $categories = get_categories($args);
          foreach ($categories as $cat) {

                $category_link = get_category_link( $cat->cat_ID );

                echo '<div class="column is-6">';
                echo '<p class="title"><a href="'.$category_link.'">'.$cat->name.'</a></p>';

                //echo '<br />';
                $args2= array('post_type' => 'videos', "orderby"=>'name','posts_per_page' => 1, "category" => $cat->cat_ID);

                 // Get Post from each Sub-Category
                $posts_in_category = get_posts($args2);
                foreach($posts_in_category as $current_post) {
                    echo '<div class="posts">';
                    ?>
                    <div class="columns is-multiline">
                      <div class="column is-12">
                        <div class="content">
                          <a href="<?=$current_post->guid;?>"><?=' '.$current_post->post_title; ?></a>
                          <div data-type="youtube" data-plyr='{"volume": 0 }'  data-video-id="<?=the_field('youtube_url', $current_post);?>">
                          </div>
                        </div>
                      </div>
                    </div>

                    <?php

                    echo '</div>';

                }
                echo '<p><a href="'.$category_link.'">See All</a></p>';
                echo '</div>';
            }
        ?>


    </div>
</div>


<script>plyr.setup();</script>
	<?php endwhile; ?>
<?php get_footer(); ?>

<?php
/*
Template Name: Front Page #2
*/
?>

<?php get_header(); ?>


<div class="container main-wrap news-headline">
    <div class="columns is-multiline is-mobile">
        <div class="column is-12">
            <div class="main-slide box">

                <?php include get_template_directory() . '/cpt-templates/slides.php'; ?>

            </div>
        </div>
        <div class="column is-12">


        <div class="columns is-multiline" id="instafeed"></div><a class="button" id="load-more">Load more...</a></div>

        <div class="column is-12">
            <hr>

        </div>

        <?php include get_template_directory() . '/cpt-templates/post-module.php'; ?>




    </div>
</div>
<script>

jQuery(document).ready(function( $ ) {

  $(function(){
    if($('.main-wrap').is('.news-headline')){

      var instaCount = <?php the_field('insta_count'); ?>;
      var loadButton = document.getElementById('load-more');
      var feed = new Instafeed({
             get: 'user',
             userId: '2761388262',
             clientId: '3252262729',
             accessToken: '3252262729.3a81a9f.ecb70f2795de4637bf7ccdacbf8f535d',
             limit: instaCount,
             resolution: 'standard_resolution',
             template: '<div class="post-item column is-6"><div class="box social-headline"><article class="media"><div class="media-left"><figure class="image is-128x128"><img src="{{image}}" alt="Image"></figure></div><div class="media-content"><div class="content"> <p class="social-caption-headline">{{caption}}</p></div><nav class="level is-mobile"><div class="level-left"><a class="level-item" href="{{link}}" target="_blank"><span>Read more...</span></a></div></nav></div></article></div></div>',
             after: function() {
                // disable button if no more results to load
                if (!this.hasNext()) {
                  loadButton.setAttribute('disabled', 'disabled');
                }
              },
         });
         loadButton.addEventListener('click', function() {

            feed.next();

          });
         feed.run();
    }
  });

});





</script>

<?php get_footer(); ?>

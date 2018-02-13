<?php
/*
Template Name: Home Template #1
*/
?>

<?php get_header(); ?>


  <div class="container main-wrap has-newsfeed">

			<div class="columns is-multiline">
					<div class="column is-12">
							<div class="main-slide box">

                  <?php include get_template_directory() . '/cpt-templates/slides.php'; ?>

              </div>
					</div>
					<div class="column is-12 is-hidden-mobile">
							<hr>
					</div>
					<div class="column">
							<div class="box txt-center">

                  <p class="title is-3"> <span class="icon"><i class="icon-clock"></i></span><span> <?php the_field('home_box_title_1');?></span></p>
									<?php the_field('home_box_content_1');?>
							</div><a class="button is-success is-fullwidth is-large" href="contact.php"><span class="icon"><i class="icon-location"> </i></span><span>Find Us</span></a></div>
					<div class="column">
							<div class="box txt-center">
									<?php the_field('content_area_2');?>
									<p> <span class="icon"><i class="icon-phone"></i></span><?php the_field('contact_phone');?></p>
									<p> <span class="icon"><i class="icon-mail"></i></span><?php the_field('contact_email');?></p>
							</div>
					</div>
					<div class="column is-12">
							<hr>
					</div>
			</div>
			<div class="social-grid" id="instafeed"></div><a class="button" id="load-more">Load more...  </a></div>




<script>

jQuery(document).ready(function( $ ) {

  $(function(){
    if($('.main-wrap').is('.has-newsfeed')){

      var instaCount = <?php the_field('insta_count'); ?>;

      if (instaCount >= 5) {
          var templateVar = '<div class="item post-item"><div class="card social"><div class="card-image"><figure class="image"><img src="{{image}}"/></figure></div><div class="card-content"><div class="content"><span class="caption"><p class="social-caption">{{caption}}</p></span><a class="read-more" href="{{link}}">Read more...</a></div></div></div></div>';
      } else {
            var templateVar = '<div class="item post-item fix"><div class="card social"><div class="card-image"><figure class="image"><img src="{{image}}"/></figure></div><div class="card-content"><div class="content"><span class="caption"><p class="social-caption">{{caption}}</p></span><a class="read-more" href="{{link}}" target="_blank">Read more...</a></div></div></div></div>';
      }

      var loadButton = document.getElementById('load-more');
      var feed = new Instafeed({
             get: 'user',
             userId: '2761388262',
             clientId: '3252262729',
             accessToken: '3252262729.3a81a9f.ecb70f2795de4637bf7ccdacbf8f535d',
             limit: instaCount,
             resolution: 'standard_resolution',
             template: templateVar,

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

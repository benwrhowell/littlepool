jQuery(document).ready(function( $ ) {

 $('.main-slide').slick({
   arrows: true,
   fade: true
 });


});



jQuery(document).ready(function( $ ) {
  // Find link of landing card for whole hover/click
  $('.landing-card-wrap').click(function(){
    var link = $(this).find('.landing-card-title').attr("href");

    window.location = link;

  });

});
jQuery(document).ready(function( $ ) {
$(window).scroll(function() {
  if ($(document).scrollTop() > 108) {
    $(".navbar").addClass("scrolled");
    $("#nav-spacer").addClass("scrolled");
    $(".solid-nav-spacer").addClass("scrolled");
  } else {
    $(".navbar").removeClass("scrolled");
    $("#nav-spacer").removeClass("scrolled");
    $(".solid-nav-spacer").removeClass("scrolled");
  }
});
});
/*
$(function(){

  if($(".modal").not("is-active")){

    $('.card.compact-card.hoverable').click(function () {
    $(this).children('.card-content').find('.content .modal').toggleClass('is-active');
    $('html').toggleClass('is-clipped');
    });
  }
});
*/
jQuery(document).ready(function( $ ) {
$('.modal-button').click(function () {
  $(this).next('.modal').toggleClass('is-active')
  $('html').toggleClass('is-clipped');
});
});
jQuery(document).ready(function( $ ) {
$('.modal-close').click(function () {
  $(this).parent().toggleClass('is-active');
  $('html').toggleClass('is-clipped');
});
});





jQuery(document).ready(function( $ ) {
$(function(){
  if($('.main-wrap').is('.news-min')){
    var feed = new Instafeed({
           get: 'user',
           userId: '2761388262',
           clientId: '3252262729',
           accessToken: '3252262729.3a81a9f.ecb70f2795de4637bf7ccdacbf8f535d',
           limit: 3,
           resolution: 'standard_resolution',
           template: '<div class="column"><div class="card social"><div class="card-image"><figure class="image"><img src="{{image}}"/></figure></div></div></div>'
       });
       feed.run();
  }
});
});

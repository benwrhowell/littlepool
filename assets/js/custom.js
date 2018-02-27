


jQuery(document).ready(function( $ ) {


  if ( $(window).width() > 1024) {
  tippy('.navbar-item.is-disabled', {
     placement: 'right',
     arrow: true,
     arrowType: 'round',
     theme: 'warning',
  });
} else {
  tippy('.navbar-item.is-disabled', {
      theme: 'warning',
     placement: 'left',
     arrow: true,
     arrowType: 'round',
     size: 'small',
     offset: '0, -200'

  });
}
  if ( $(window).width() > 1024) {
  tippy('.landing-card-wrap.disabled', {
     placement: 'top',
     arrow: true,
     arrowType: 'round',
     theme: 'warning',

  });
} else {
  tippy('.landing-card-wrap.disabled', {
      theme: 'warning',
     placement: 'top-start',
     arrow: true,
     arrowType: 'round',
     size: 'small',


  });
}


  });
jQuery(window).resize(function($){

    if ( $(window).width() > 1024) {
    tippy('.navbar-item.is-disabled', {
       placement: 'right',
       arrow: true,
       arrowType: 'round',
       theme: 'warning',
    });
  } else {
    tippy('.navbar-item.is-disabled', {
        theme: 'warning',
       placement: 'left',
       arrow: true,
       arrowType: 'round',
       size: 'small',
       offset: '0, -200'

    });
  }
    if ( $(window).width() > 1024) {
    tippy('.landing-card-wrap.disabled', {
       placement: 'bottom',
       arrow: true,
       arrowType: 'round',
       theme: 'warning',

    });
  } else {
    tippy('.landing-card-wrap.disabled', {
        theme: 'warning',
       placement: 'top-start',
       arrow: true,
       arrowType: 'round',
       size: 'small',


    });
  }

});



jQuery(document).ready(function( $ ) {

  $('.main-slide').slick({
   arrows: true,
   fade: true,
   autoplay: true
  });

  // Find link of landing card for whole hover/click
  $('.landing-card-wrap').click(function(){
    var link = $(this).find('.landing-card-title').attr("href");

    window.location = link;

  });

});





jQuery(document).ready(function( $ ) {





$(window).scroll(function() {
  if ($(document).scrollTop() > 108 & $(window).width() > 1024) {
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

if ( $(window).width() < 1024) {
    $('.navbar-item.has-dropdown').on('click',function (e) {
     e.preventDefault();
     $(this).children('.navbar-dropdown.is-boxed').toggleClass('is-active');

    });

    $('.navbar-dropdown.is-boxed .navbar-item').click(function () {

        var linky = $(this).attr("href");
        window.location = linky;
    })

    $('.navbar-dropdown.is-boxed .navbar-item.is-active').parent('.navbar-dropdown').addClass('is-active');
}






});

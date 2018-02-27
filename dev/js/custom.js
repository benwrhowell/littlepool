




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

// Sets all columns equal height of tallest column
// Sets navbar-spacer to same height as navbar
jQuery(document).ready(function( $ ) {
var heights = $(".navbar").map(function() {
    return $(this).height();
}).get(),
maxHeight = Math.max.apply(null, heights);
$(".navbar-spacer").height(maxHeight);
});

$(window).resize(function(){
    var heights = $(".navbar").map(function() {
        return $(this).height();
    }).get(),
    maxHeight = Math.max.apply(null, heights);
    $(".navbar-spacer").height(maxHeight);
});


/*!
 * jQuery.ellipsis
 * http://github.com/jjenzz/jquery.ellipsis
 * --------------------------------------------------------------------------
 * Copyright (c) 2013 J. Smith (@jjenzz)
 * Dual licensed under the MIT and GPL licenses:
 * http://www.opensource.org/licenses/mit-license.php
 * http://www.gnu.org/licenses/gpl.html
 *
 * adds a class to the last 'allowed' line of text so you can apply
 * text-overflow: ellipsis;
 */
jQuery(document).ready(function( $ ) {
(function(factory) {
  'use strict';

  if (typeof define === 'function' && define.amd) {
    // AMD. register as an anonymous module
    define(['jquery'], factory);
  } else {
    // browser globals
    factory(jQuery);
  }
}(function($) {
  'use strict';

  var namespace = 'ellipsis',
      span = '<span style="white-space: nowrap;">',
      defaults = {
        lines: 'auto',
        ellipClass: 'ellip',
        responsive: false
      };

  /**
   * Ellipsis()
   * --------------------------------------------------------------------------
   * @param {Node} el
   * @param {Object} opts
   */
  function Ellipsis(el, opts) {
    var base = this,
        currLine = 0,
        lines = [],
        setStartEllipAt,
        startEllipAt,
        resizeTimer,
        currOffset,
        lineHeight,
        contHeight,
        words,
        htmlEntities;

    // List of HTML entities for escaping.
    htmlEntities = {
      '&': '&amp;',
      '<': '&lt;',
      '>': '&gt;',
      '"': '&quot;',
      "'": '&#x27;',
      '`': '&#x60;'
    };

    base.$cont = $(el);
    base.opts = $.extend({}, defaults, opts);

    /**
     * create() happens once when
     * instance is created
     */
    function create() {
      base.text = base.$cont.text();
      base.opts.ellipLineClass = base.opts.ellipClass + '-line';

      base.$el = $('<span class="' + base.opts.ellipClass + '" />');
      base.$el.text(base.text);

      base.$cont.empty().append(base.$el);

      init();
    }

    /**
     * init()
     */
    function init() {

      // if they only want one line just add
      // the class and do nothing else
      if (typeof base.opts.lines === 'number' && base.opts.lines < 2) {
        base.$el.addClass(base.opts.ellipLineClass);
        return;
      }

      contHeight = base.$cont.height();

      // if they only want to ellipsis the overflow
      // then do nothing if there is no overflow
      if (base.opts.lines === 'auto' && base.$el.prop('scrollHeight') <= contHeight) {
        return;
      }

      if (!setStartEllipAt) {
        return;
      }

      // create an array of words from our string
      words = $.trim(escapeText(base.text)).split(/\s+/);

      // wrap each word in a span and temporarily append to the DOM
      base.$el.html(span + words.join('</span> ' + span) + '</span>');

      // loop through words to determine which word the
      // ellipsis container should start from (need to
      // re-query spans from DOM so we can get their offset)
      base.$el.find('span').each(setStartEllipAt);

      // startEllipAt could be 0 so make sure we're
      // checking undefined instead of falsey
      if (startEllipAt != null) {
        updateText(startEllipAt);
      }
    }

    /**
     * updateText() updates the text in the DOM
     * with a span around the line that needs
     * to be truncated
     *
     * @param {Number} i
     */
    function updateText(nth) {
      // add a span that wraps from nth
      // word to the end of the string
      words[nth] = '<span class="' + base.opts.ellipLineClass + '">' + words[nth];
      words.push('</span>');

      // update the DOM with
      // our new string/markup
      base.$el.html(words.join(' '));
    }

    function escapeText(text){
      return String(text).replace(/[&<>"'\/]/g, function (s) {
        return htmlEntities[s];
      });
    }

    // only define the method if it's required
    if (base.opts.lines === 'auto') {

      /**
       * setStartEllipByHeight() sets the start
       * position to the first word in the last
       * line of the element that doesn't overflow
       *
       * @param {Number} i
       * @param {Node} word
       */
      var setStartEllipByHeight = function(i, word) {
        var $word = $(word),
            top = $word.position().top;

        lineHeight = lineHeight || $word.height();

        if (top === currOffset) {
          // if it's top matches currOffset
          // then it's on the same line
          // as the previous word
          lines[currLine].push($word);
        } else {
          // otherwise we're
          // on a new line
          currOffset = top;
          currLine += 1;
          lines[currLine] = [$word];
        }

        // if the bottom of the word is outside
        // the element (overflowing) then
        // stop looping and set startEllipAt to
        // the first word in the previous line
        if (top + lineHeight > contHeight) {
          startEllipAt = i - lines[currLine - 1].length;
          return false;
        }
      };

      setStartEllipAt = setStartEllipByHeight;
    }

    // only define the method if it's required
    if (typeof base.opts.lines === 'number' && base.opts.lines > 1) {

        /**
         * setStartEllipByLine() sets the start
         * position to the first word in the line
         * that was passed to opts. This forces
         * the ellipsis on a specific line
         * regardless of overflow
         *
         * @param {Number} i
         * @param {Node} word
         */
        var setStartEllipByLine = function(i, word) {
          var $word = $(word),
              top = $word.position().top;

          // if top isn't currOfset
          // then we're on a new line
          if (top !== currOffset) {
            currOffset = top;
            currLine += 1;
          }

          // if the word's currLine is equal
          // to the line limit passed via options
          // then start ellip from this
          // word and stop looping
          if (currLine === base.opts.lines) {
            startEllipAt = i;
            return false;
          }
      };

      setStartEllipAt = setStartEllipByLine;
    }

    // only bind to window resize if required
    if (base.opts.responsive) {

      /**
       * resize() resets necessary vars
       * and content and then re-initialises
       * the Ellipsis script
       */
      var resize = function() {
        lines = [];
        currLine = 0;
        currOffset = null;
        startEllipAt = null;
        base.$el.html(escapeText(base.text));

        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(init, 100);
      };

      $(window).on('resize.' + namespace, resize);
    }

    // start 'er up
    create();
  }

  $.fn[namespace] = function(opts) {
    return this.each(function() {
      try {
        $(this).data(namespace, (new Ellipsis(this, opts)));
      } catch (err) {
        if (window.console) {
          console.error(namespace + ': ' + err);
        }
      }
    });
  };

}));
    });

//Main nav add classes to fix top top of window on scroll past


// Navbar burger/collapse
document.addEventListener('DOMContentLoaded', function () {

  // Get all "navbar-burger" elements
  var $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

  // Check if there are any navbar burgers
  if ($navbarBurgers.length > 0) {

    // Add a click event on each of them
    $navbarBurgers.forEach(function ($el) {
      $el.addEventListener('click', function () {

        // Get the target from the "data-target" attribute
        var target = $el.dataset.target;
        var $target = document.getElementById(target);

        // Toggle the class on both the "navbar-burger" and the "navbar-menu"
        $el.classList.toggle('is-active');
        $target.classList.toggle('is-active');

      });
    });
  }

});



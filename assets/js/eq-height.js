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

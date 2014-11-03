// JavaScript Document
function slideSwitch() {
    var $active = $('#slideshow .slide.active');
    if ( $active.length == 0 ) $active = $('#slideshow .slide:last');
    var $next =  $active.next().length ? $active.next()
     : $('#slideshow .slide:first');
       $active.addClass('last-active');
     $next.css({opacity: 0.0})
        .addClass('active')
        .animate({opacity: 1.0}, 1500, function() {
            $active.removeClass('active last-active');
     });
}
$(function() {
    setInterval( "slideSwitch()", 9000 );
});
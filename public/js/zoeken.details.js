$(function() {
  var moveLeft = 20,
      moveDown = 10,
      currentDiv;

  $(".content").on({
    mouseenter: function (e) {
      currentDiv = $(this).parent().find('div.details')
      currentDiv.show();
    },
    mouseleave: function (e) {
      currentDiv.hide();
    },
    mousemove: function(e) {
      currentDiv
      .css('top', e.pageY + moveDown)
      .css('left', e.pageX + moveLeft);
    }
  }, "a");
});

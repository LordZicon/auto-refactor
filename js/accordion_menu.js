$(document).ready(function () {
$("#menu dd").hide();
$("#menu dt").click(function(){
         $(this).addClass('activesub');
      var $menuItem = $(this),
      isAccordion = $menuItem.find(">:first-child").hasClass("accordeon"),
      accordionIsVisible = $menuItem.next().is(":visible")
 
  if(!(isAccordion && accordionIsVisible)){
    $(this).removeClass('activesub');
    $("#menu dd:visible").slideUp("slow");
    $menuItem.next().slideDown("slow");
  }
});
});
    



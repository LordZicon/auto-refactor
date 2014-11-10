<link rel="stylesheet" type="text/css" href="css/cssSite.css" media="screen">

<div class="sidebar">
  <?php include_once "templates/search.php"; ?>
</div>

<div class="content">
  <?php include_once "templates/zoek_resultaten.php"; ?>
</div>

<script type="text/javascript" src="js/jPages.min.js"></script>
<script type="text/javascript" src="js/paginate.js"></script> 
<script type="text/javascript" src="js/zoeken.details.js"></script>
<script type="text/javascript">
$(function() {
    $("#search_form").on('submit',function(e) {
      e.preventDefault();

      var data = $(this).serialize();

      $.ajax({
        url:'modules/search_results.php',
        async: true,
        cache: false,
        data: data,
        type:'GET',
        success:function(data){
          $(".content").html(data);
          paginate();
        }
      });
    });
});
</script>
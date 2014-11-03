<?php
$pagina_id = 2; 
require_once "includes/config.php";
$merk              = filter_input(INPUT_GET, 'merk', FILTER_SANITIZE_NUMBER_INT);
$model             = filter_input(INPUT_GET, 'model', FILTER_SANITIZE_NUMBER_INT);
$prijs             = filter_input(INPUT_GET, 'prijs', FILTER_SANITIZE_NUMBER_INT);
$bouwjaar          = filter_input(INPUT_GET, 'bouwjaar', FILTER_SANITIZE_NUMBER_INT);
$transmissie       = filter_input(INPUT_GET, 'transmissie', FILTER_SANITIZE_NUMBER_INT); 
$brandstof         = filter_input(INPUT_GET, 'brandstof', FILTER_SANITIZE_NUMBER_INT);
$kilometers        = filter_input(INPUT_GET, 'kilometers', FILTER_SANITIZE_NUMBER_INT);
$kleur             = filter_input(INPUT_GET, 'kleur', FILTER_SANITIZE_NUMBER_INT); 

$zoek_resultaten = $basis->get_zoek_resultaten($merk,$model,$prijs,$bouwjaar,$transmissie,$brandstof,
    $kilometers,$kleur); 
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="language" content="nl">
<meta name="description" content="<?php echo $content['meta_description']; ?>">
<meta name="keywords" content="<?php echo $content['meta_keywords']; ?>">
<title><?php echo $content['meta_title']; ?></title>
<meta name="robots" content="index, follow">
<link rel="stylesheet" type="text/css" href="css/cssReset.css" media="screen">
<link rel="stylesheet" type="text/css" href="css/cssSite.css" media="screen">
<link rel="stylesheet" type="text/css" href="css/jPages.css" media="screen">
</head>
<body id="zoeken">
<div id="wrapper">
    <?php include_once "modules/header.php"; ?>
    <div class="tr">
      <main id="main">
        <section id="content"> 
          <div class="sidebar">
            <?php include_once "modules/search.php"; ?>
          </div>
          <div class="content">
            <?php include_once "modules/zoek_resultaten.php"; ?>
          </div>
        </section>
      </main>
    </div>
    <?php include_once "modules/footer.php"; ?>    
</div>
<?php include_once "modules/random_background.php"; ?>
<script src="js/jquery-1.11.1.min.js" type="text/javascript"></script>
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
          // setTimeout(paginate, 500);
            }
        });
    });
});
</script>

</body>
</html>
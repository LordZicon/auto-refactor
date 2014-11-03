<?php 
require_once "includes/config.php"; 
$pagina_id = 2;

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="css/cssReset.css" media="screen">
<link rel="stylesheet" type="text/css" href="css/cssSite.css" media="screen">
</head>
<body id="zoeken">
<div id="wrapper">
    <?php include_once "modules/header.php"; ?>
    <div class="tr">
      <main id="main">
        <section id="content"> 
          <?php include_once "modules/sidebar.php"; ?>       
          <?php include_once "modules/content.php"; ?>
        </section>
      </main>
    </div>
    <?php include_once "modules/footer.php"; ?>    
</div>
<?php include_once "modules/random_background.php"; ?>
<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
<script type="text/javascript">
$(function() {
$("#search_form").bind('submit',function() {
                var merk          = $("#merk").val(),
                    model         = $("#model").val(),
                                prijs         = $("#prijs").val(),
                                bouwjaar      = $("#bouwjaar").val(),
                                transmissie   = $("#transmissie").val(),
                                brandstof     = $("#brandstof").val(),
                                kilometers    = $("#kilometers").val(),
                                kleur         = $("#kleur").val(),
                    data = 'merk=' + merk + '&model=' + model + '&prijs=' + prijs + '&bouwjaar=' + bouwjaar + '&transmissie=' + transmissie + '&brandstof=' + brandstof + '&kilometers=' + kilometers + '&kleur=' + kleur;  
                                        
                $.ajax({
                       url:'modules/zoek_resultaten.php',
        async: true,
        cache: false,
                                data: {data: data},
                                type:'GET',
                                success:function(data){
            $(".content").html(data);
                                }               
                });
                return false;
});
});
</script>

</body>
</html>
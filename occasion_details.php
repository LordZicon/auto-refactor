<?php 
$pagina_id = 8;
require_once "includes/config.php"; 

$occasion_id      = filter_input(INPUT_GET, 'occasion_id', FILTER_SANITIZE_NUMBER_INT);
$occasion_details = $basis->get_occasion_details($occasion_id);
$occasion_photos  = $basis->get_occasion_photos($occasion_id);
$update_status    = $basis->update_gezien_status($occasion_id);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Auto Passon | <?php echo $occasion_details['merk']; ?>&nbsp;<?php echo $occasion_details['uitvoering'];?></title>

<link rel="stylesheet" type="text/css" href="css/cssReset.css" media="screen">
<link rel="stylesheet" type="text/css" href="css/cssSite.css" media="screen">
<link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css" media="screen">
</head>
<body>
<div id="wrapper">
    <?php include_once "modules/header.php"; ?>
    <div class="tr">
      <main id="main">
        <section id="content"> 
          <?php include_once "modules/sidebar.php"; ?>       
          <?php include_once "modules/occasion_details.php"; ?>
        </section>
      </main>
    </div>
    <?php include_once "modules/footer.php"; ?>    
</div>
<?php include_once "modules/random_background.php"; ?>
<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/jquery.fancybox.js"></script>
<script type="text/javascript" src="js/jquery.fancybox-media.js"></script>
<script type="text/javascript" src="js/fancybox.js"></script>
</body>
</html>
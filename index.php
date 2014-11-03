<?php

$pagina_id = 1; 
require_once "includes/config.php"; 
$featured_autos   = $basis->get_featured_autos();

?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title><?php echo $content['meta_title']; ?></title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="language" content="nl">
  <meta name="description" content="<?php echo $content['meta_description']; ?>">
  <meta name="keywords" content="<?php echo $content['meta_keywords']; ?>">
  <meta name="robots" content="index, follow">
  
  <link rel="stylesheet" type="text/css" href="css/cssReset.css" media="screen">
  <link rel="stylesheet" type="text/css" href="css/cssIndex.css" media="screen">
</head>
<body id="home">
  <div id="wrapper">

    <?php include_once "modules/header.php"; ?>

    <div class="tr">
      <main id="main">

        <section id="content">

          <?php include_once "modules/caption.html"; ?>

          <section class="search">

            <?php include_once "modules/search.php"; ?>

          </section>

          <?php include_once "modules/featured.php"; ?>

        </section>

      </main>
    </div>

    <?php include_once "modules/footer.php"; ?>

  </div>

  <?php include_once "modules/random_background.php"; ?>

  <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
  <script type="text/javascript" src="js/slideshow.js"></script>
  <script type="text/javascript" src="js/featured.details.js"></script>
</body>
</html>
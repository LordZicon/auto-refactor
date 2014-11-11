<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title><?php echo $meta['meta_title']; ?></title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="language" content="nl">
  <meta name="description" content="<?php echo $meta['meta_description']; ?>">
  <meta name="keywords" content="<?php echo $meta['meta_keywords']; ?>">
  <meta name="robots" content="index, follow">
  
  <link rel="stylesheet" type="text/css" href="css/cssReset.css" media="screen">
  <link rel="stylesheet" type="text/css" href="css/cssIndex.css" media="screen">

  <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>

  <style>
    body { background-image: url('images/background_photos/<?php echo rand(1,13);?>.jpg'); }
  </style>
</head>
<body id="home">
  <div id="wrapper">

    <header id="header">
      <section class="logo"><a href="index.php"><img src="images/logo.png"></a></section>
      <nav class="nav">
        <?php foreach ($header_menu as $menu): ?>
        <li><a href="<?php echo $menu['pagina_url']; ?>" title="<?php echo $menu['pagina_titel']; ?>" class="<?php echo $menu['pagina_class']; ?>"><?php echo $menu['pagina_naam']; ?></a></li>
        <?php endforeach; ?>
      </nav>
    </header>

    <div class="tr">
      <main id="main">
        <section id="content">

          <?php echo $content ?>

        </section>
      </main>
    </div>

    <footer id="footer">
      <nav class="fmenu fl">
        <?php foreach ($footer_menu as $menu): ?>
        <li><a href="<?php echo $menu['pagina_url']; ?>" title="<?php echo $menu['pagina_titel']; ?>" class="<?php echo $menu['pagina_class']; ?>"><?php echo $menu['pagina_naam']; ?></a></li>
        <?php endforeach; ?>
      </nav>
      <p class="copyright fr">Copyright &copy; <?php echo date("Y") ?> Auto Passon. All rights reserved</p>
    </footer>

  </div>
  
  <script type="text/javascript" src="js/slideshow.js"></script>
  <script type="text/javascript" src="js/featured.details.js"></script>
</body>
</html>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title><?php echo ($title) ? : 'Admin | AutoPasson' ?></title>
  
  <link rel="stylesheet" type="text/css" href="../css/cssReset.css" media="screen">
  <link rel="stylesheet" type="text/css" href="../css/cssAdmin.css" media="screen">

  <script type="text/javascript" src="../js/jquery-1.11.1.min.js"></script>
</head>
<body>
    <div id="sidebar">
      <div id="sidebar_header"><a href="index.php">Passon Admin</a></div>
      <dl id="menu">
        <dt><a href="index.php" class="accordeon">Dashboard</a></dt>
        <dt class="mt"><a href="javascript:void(0)" class="accordeon">Pagina's</a></dt>
        <dd>
          <ul>
            <?php foreach ($content_menu as $value): ?>
            <li><a href="pagina_content.php"><?php echo $value['pagina_naam']; ?></a></li>      
            <?php endforeach; ?>   
          </ul>
        </dd>
      <dt class="mt"><a href="javascript:void(0)" class="accordeon">Occasions</a></dt>
        <dd>
          <ul>
            <li><a href="occasion_toevoegen.php" tabindex="1" title="Occasion toevoegen">Occasion toevoegen</a></li>
            <li><a href="occasion_bewerken.php" tabindex="2" title="Occasion bewerken">Occasion bewerken</a></li>
            <li><a href="occasion_verwijderen.php" tabindex="3" title="Occasion verwijderen">Occasion verwijderen</a></li>
          </ul>    
        </dd>
      <dt class="mt"><a href="" class="accordeon">Links</a></dt>
      <dt class="mt"><a href="" class="accordeon">Naar website</a></dt>
      <dt class="mt"><a href="logout.php" class="accordeon">Logout</a></dt>   
      </dl>
    </div>
    <?php echo $content ?>
    <script type="text/javascript" src="../js/accordion_menu.js"></script>
</body>
</html>
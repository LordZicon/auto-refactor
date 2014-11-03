<header id="header">
    <section class="logo"><a href="index.php"><img src="img/logo.png"></a></section>
    <nav class="nav">
      <?php foreach ($header_menu as $menu): ?>
      <li><a href="<?php echo $menu['pagina_url']; ?>" title="<?php echo $menu['pagina_titel']; ?>" class="<?php echo $menu['pagina_class']; ?>"><?php echo $menu['pagina_naam']; ?></a></li>
      <?php endforeach; ?>

    </nav>
</header>
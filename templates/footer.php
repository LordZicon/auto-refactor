<footer id="footer">
  <nav class="fmenu fl">
      <?php foreach ($footer_menu as $menu): ?>
      <li><a href="<?php echo $menu['pagina_url']; ?>" title="<?php echo $menu['pagina_titel']; ?>" class="<?php echo $menu['pagina_class']; ?>"><?php echo $menu['pagina_naam']; ?></a></li>
      <?php endforeach; ?>    
  </nav>
  <p class="copyright fr">Copyright &copy; <?php echo date("Y") ?> Auto Passon. All rights reserved</p>
</footer>
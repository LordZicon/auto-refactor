<div class="caption">
    <h1><span>Auto Passon</span><span>Passon Performance</span></h1>
</div>

<section class="search">

    <?php include_once "templates/search.php"; ?>

</section>

<section class="featured">
  <h2>Meest bekeken</h2>
  <ul class="featured_listing" id="featured_listing">
    <?php foreach ($featured_autos as $featured): ?>
    <li>
      <a href="occasion_details.php?occasion_id=<?php echo $featured['occasion_id']; ?>">
        <img src="occasion_photos/<?php echo $featured['photo']; ?>" width="80" height="60">
      </a>
      <h3>
        <a href="occasion_details.php?occasion_id=<?php echo $featured['occasion_id']; ?>">
          <?php echo $featured['merk']; ?>&nbsp;<?php echo $featured['uitvoering']; ?>
        </a>
      </h3>
      <p><span>Vervaldatum:</span><?php echo $featured['vervaldatum']; ?></p>
      <p>
        <span>Bouwjaar:</span><?php echo $featured['bouwjaar']; ?>
        <span class="ml">Prijs:</span><?php echo number_format($featured['prijs'],2); ?>
      </p>
      <div class="details">
        <p><span>Model:</span><?php echo $featured['model']; ?></p>
        <p><span>Transmisie:</span><?php echo $featured['transmissie']; ?></p>
        <p><span>Brandstof:</span><?php echo $featured['brandstof_type']; ?></p>
        <p><span>Kilometers:</span><?php echo number_format($featured['kilometerstand']); ?>&nbsp;km</p>
      </div>
    </li>
    <?php endforeach; ?> 
  </ul>
</section>
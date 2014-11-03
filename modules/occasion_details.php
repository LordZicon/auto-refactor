<div class="content">
  <h2 class="detailheading"><?php echo $occasion_details['merk']; ?>&nbsp;<?php echo $occasion_details['uitvoering']; ?></h2>
  <ul class="gallery" id="aspect">
    <?php foreach($occasion_photos as $photo): ?>
    <li><a class='fancybox' data-fancybox-group='gallery' href="occasion_photos/<?php echo $photo['photo']; ?>"><img src="occasion_photos/<?php echo $photo['photo']; ?>" alt="" width="80" height="60" /></a></li>
    <?php endforeach; ?>
  </ul>
  <ul class="occasion_details">
    <h3>Specificaties</h3>
    <li><span>Verkoop prijs:</span><span>&#8364; &nbsp;  <?php echo number_format($occasion_details['prijs'],2); ?></span></li>
    <li><span>A.p.k. vervaldatum:</span><span><?php echo $occasion_details['vervaldatum']; ?></span></li>
    <li><span>Model:</span><span><?php echo $occasion_details['model']; ?></span></li>
    <li><span>Aantal deuren:</span><span><?php echo $occasion_details['deuren']; ?> - deurs</span></li>
    <li><span>Kilometerstand:</span><span><?php echo number_format($occasion_details['kilometerstand']); ?>&nbsp;km</span></li>
    <li><span>Bouwjaar:</span><span><?php echo $occasion_details['bouwjaar']; ?></span></li>
    <li><span>Vermogen:</span><span><?php echo $occasion_details['vermogen']; ?></span></li>
   
  </ul>
  <ul class="occasion_details">
    <h3>Overige specificaties:</h3>
    <li><span>Cilinderinhoud:</span><span><?php echo $occasion_details['cilinderinhoud']; ?>&nbsp;cc</span></li>
    <li><span>Cilinders:</span><span><?php echo $occasion_details['cilinders']; ?></span></li>
    <li><span>Transmissie:</span><span><?php echo $occasion_details['transmissie']; ?></span></li> 
    <li><span>Brandstof:</span><span><?php echo $occasion_details['brandstof_type']; ?></span></li>
    <li><span>Brandstofverbruik:</span><span><?php echo $occasion_details['verbruik']; ?>&nbsp;km/1liter</span></li> 
    <li><span>Gewicht:</span><span><?php echo $occasion_details['gewicht']; ?>&nbsp;kg</span></li>
    <li><span>Kleur:</span><span><?php echo $occasion_details['kleur']; ?></span></li>
  </ul>
  <ul class="occasion_details">
    <h3>Opties &amp; extra's:</h3>
    <p><?php echo $occasion_details['details']; ?></p>
  </ul>
</div>




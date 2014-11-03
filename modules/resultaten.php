<?php 
$pagina_id = 2;
require_once "../includes/config.php"; 
$merk              = filter_input(INPUT_GET, 'merk', FILTER_SANITIZE_NUMBER_INT);
$model             = filter_input(INPUT_GET, 'model', FILTER_SANITIZE_NUMBER_INT);
$prijs             = filter_input(INPUT_GET, 'prijs', FILTER_SANITIZE_NUMBER_INT);
$bouwjaar          = filter_input(INPUT_GET, 'bouwjaar', FILTER_SANITIZE_NUMBER_INT);
$transmissie       = filter_input(INPUT_GET, 'transmissie', FILTER_SANITIZE_NUMBER_INT); 
$brandstof         = filter_input(INPUT_GET, 'brandstof', FILTER_SANITIZE_NUMBER_INT);
$kilometers        = filter_input(INPUT_GET, 'kilometers', FILTER_SANITIZE_NUMBER_INT);
$kleur             = filter_input(INPUT_GET, 'kleur', FILTER_SANITIZE_NUMBER_INT); 

$zoek_resultaten = $basis->get_zoek_resultaten($merk,$model,$prijs,$bouwjaar,$transmissie,$brandstof,$kilometers,$kleur);
?>
<h2>Zoek resultaten</h2>
<ul class="resultaat_listing" id="resultaat_listing">
  <?php foreach ($zoek_resultaten as $resultaten): ?>
  <li>
    <a href="occasion_details.php?occasion_id=<?php echo $resultaten['occasion_id']; ?>"><img src="occasion_photos/<?php echo $resultaten['photo']; ?>" width="80" height="60"></a>
    <h3><a href="occasion_details.php?occasion_id=<?php echo $resultaten['occasion_id']; ?>"><?php echo $resultaten['merk']; ?>&nbsp;<?php echo $resultaten['uitvoering']; ?></a></h3>
    <p><span>Vervaldatum:</span><?php echo $resultaten['vervaldatum']; ?></p>
    <p><span>Bouwjaar:</span><?php echo $resultaten['bouwjaar']; ?><span class="ml">Prijs:</span>&#8364; &nbsp;<?php echo number_format($resultaten['prijs'],2); ?></p>
    <div class="details">
        <p><span>Model:</span><?php echo $resultaten['model']; ?></p>
        <p><span>Transmisie:</span><?php echo $resultaten['transmissie']; ?></p>
        <p><span>Brandstof:</span><?php echo $resultaten['brandstof_type']; ?></p>
        <p><span>Kilometers:</span><?php echo number_format($resultaten['kilometerstand']); ?>&nbsp;km</p>
    </div>
  </li>
  <?php endforeach; ?>
</ul>
<div class="holder"></div>





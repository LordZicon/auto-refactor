<h2>Snel Zoeken</h2>
<form action="zoeken.php" method="get" name="search_form" class="search_form" id="search_form" dir="ltr" lang="nl">
  <div class="form_wrapper">

    <fieldset class="fl">
      <label class="fl">Merk</label>
      <select name="merk" id="merk" class="search_select fl">
        <option value="0">Alle merken</option>
        <?php foreach ($merken as $merk): ?>
        <option value="<?php echo $merk['merk_id']; ?>"><?php echo $merk['merk']; ?></option>
        <?php endforeach; ?>    
      </select>
    </fieldset>

    <fieldset class="fr">
      <label class="fr">Model</label>
      <select name="model" id="model" class="search_select fl">
        <option value="">Alle modellen</option>
        <?php foreach ($modellen as $model): ?>
        <option value="<?php echo $model['model_id']; ?> "><?php echo $model['model']; ?></option>
        <?php endforeach; ?>    
      </select>
    </fieldset>

  </div>
  <div class="form_wrapper">
    
    <fieldset class="fl">
      <label class="sml fl">Prijs</label> <label class="sml fr">Bouwjaar</label>
      <select name="prijs" id="prijs" class="small_select fl">
        <option value="">Tot</option>
        <?php foreach ($prijzen as $value): ?>
        <option value="<?php echo $value['prijs_value']; ?>" ><?php echo $value['prijs']; ?></option>
        <?php endforeach; ?>
      </select>
      <select name="bouwjaar" id="bouwjaar" class="small_select fr">
        <option value="">Van</option>
        <?php foreach ($years as $value): ?>
        <option value="<?php echo $value ?>" ><?php echo $value ?></option> 
        <?php endforeach; ?>
      </select>
    </fieldset>

    <fieldset class="fr">
      <label class="sml fl">Transmissie</label> <label class="sml fr">Brandstof</label>
      <select name="transmissie" id="transmissie" class="small_select fl">
        <option value="">Alle</option>
        <?php foreach ($transmissies as $transmissie): ?>
        <option value="<?php echo $transmissie['transmissie_id']; ?>" ><?php echo $transmissie['transmissie']; ?></option> 
        <?php endforeach; ?>
      </select>
      <select name="brandstof" id="brandstof" class="small_select fr">
        <option value="">Alle</option>
        <?php foreach ($brandstoffen as $brandstof): ?>
        <option value="<?php echo $brandstof['brandstof_type_id']; ?>" ><?php echo $brandstof['brandstof_type']; ?></option> 
        <?php endforeach; ?>
      </select>
    </fieldset>

  </div>
  <div class="form_wrapper">
    
    <fieldset class="fl">
      <label class="sml fl">Kilometers tot</label> <label class="sml fr">Kleur</label>
      <select name="kilometers" id="kilometers" class="small_select fl">
        <option value="">Alle</option>
        <option value="2500">2.500</option>
        <option value="5000">5.000</option>
        <option value="10000">10.000</option>
      </select>
      <select name="kleur" id="kleur" class="small_select fr">
        <option value="">Alle</option>
        <?php foreach ($kleuren as $kleur): ?>
        <option value="<?php echo $kleur['kleur_id']; ?>" ><?php echo $kleur['kleur']; ?></option> 
        <?php endforeach; ?>
      </select>
    </fieldset>

  </div>
  <input name="search_button" type="submit" class="search-button" value="Zoeken"> 
</form>
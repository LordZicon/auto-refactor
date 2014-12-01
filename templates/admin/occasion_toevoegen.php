<div id="content">
  <header id="header">
    <h2>Welkom <?php echo $naam; ?></h2>
  </header>
  <?php if ($errors): ?>
  <div id="error">
    <?php foreach ($errors as $error): ?>
    <p><?php echo $error ?></p>
    <?php endforeach; ?>
  </div>
  <?php endif; ?>
  <section id="contentbox">
    <h2>Occasion toevoegen<span>Note: Alle velden met een <b>(*)</b> zijn verplicht! Merk en uitvoering vormen samen de titel van de advertentie.</span></h2>
    <form action="occasion_besparen.php" method="post" enctype="multipart/form-data" name="occasion_form" class="occasion_form" id="occasion_form">
      <div class="form_wrapper cl">
      <fieldset class="fl">
        <label for="merk" class="fl">Merk <span>*</span></label><label for="uitvoering" class="fr">Uitvoering <span>*</span></label>
        <select name="merk" class="select fl" tabindex="1">
          <option value="0">Maak een keus</option>
          <?php foreach ($merken as $value): ?>
          <option value="<?php echo $value['merk_id']; ?>"><?php echo $value['merk']; ?></option>
          <?php endforeach; ?>
        </select>
        <input name="uitvoering" type="text" class="textfield fr" tabindex="2" autocomplete="on" placeholder="B.v. Xsara Picasso 1.8i-16V">    
      </fieldset>
      <fieldset class="fr">
        <label for="model" class="fl">Model <span>*</span></label><label for="deuren" class="fr">Aantal deuren</label>
        <select name="model" class="select fl" tabindex="3">
          <option value="0">Maak een keus</option>
          <?php foreach ($modellen as $value): ?>
          <option value="<?php echo $value['model_id']; ?>"><?php echo $value['model']; ?></option>
          <?php endforeach; ?>
        </select>
        <input name="deuren" type="text" class="textfield fr" tabindex="4" maxlength="1" onkeypress="return isNumber(event)">   
      </fieldset>
      </div>
      <div class="form_wrapper cl">
      <fieldset class="fl">
        <label for="transmissie" class="fl">Transmissie <span>*</span></label><label for="vermogen" class="fr">Vermogen</label>
        <select name="transmissie" class="select fl" tabindex="5">
         <option value="">Maak een keuze</option>
           <?php foreach ($transmissies as $value): ?>
           <option value="<?php echo $value['transmissie_id']; ?>" ><?php echo $value['transmissie']; ?></option> 
           <?php endforeach; ?>
        </select>
        <input name="vermogen" type="text" class="textfield fr" tabindex="6">
      </fieldset>
      <fieldset class="fr">
        <label for="cilinderinhoud" class="fl">Cilinderinhoud</label><label for="cilinders" class="fr">Aantal cilinders</label>
          <input name="cilinderinhoud" type="text" class="textfield fl" tabindex="7" maxlength="4" onkeypress="return isNumber(event)">
          <input name="cilinders" type="text" class="textfield fr" tabindex="8" maxlength="1" onkeypress="return isNumber(event)">
      </fieldset>
      </div>
      <div class="form_wrapper cl">
        <fieldset class="fl">
          <label for="brandstof" class="fl">Brandstof <span>*</span></label><label for="verbruik" class="fr">Brandstof verbruik</label>
        <select name="brandstof" class="select fl" tabindex="9">
         <option value="">Maak een keuze</option>
           <?php foreach ($brandstoffen as $value): ?>
           <option value="<?php echo $value['brandstof_type_id']; ?>" ><?php echo $value['brandstof_type']; ?></option> 
           <?php endforeach; ?>
        </select>
        <input name="verbruik" type="text" class="textfield fr" tabindex="10" maxlength="5">        
        </fieldset>
        <fieldset class="fr">
          <label for="gewicht" class="fl">Gewicht</label><label for="kleur" class="fr">Kleur <span>*</span></label>
          <input name="gewicht" type="text" class="textfield fl" tabindex="11" maxlength="4" onkeypress="return isNumber(event)">
        <select name="kleur" class="select fr" tabindex="12">
         <option value="">Maak een keuze</option>
           <?php foreach ($kleuren as $value): ?>
           <option value="<?php echo $value['kleur_id']; ?>"><?php echo $value['kleur']; ?></option> 
           <?php endforeach; ?>
        </select>          
        </fieldset>    
      </div>
      <div class="form_wrapper cl">
        <fieldset class="fl">
        <label for="bouwjaar" class="fl">Bouwjaar <span>*</span></label><label for="kilometerstand" class="fr">Kilometerstand <span>*</span></label>
        <select name="maand" class="select_small fl" tabindex="13">
          <option value="0">maand</option>
          <?php foreach ($maanden as $value): ?>  
          <option value="<?php echo $value['waarde']; ?>"><?php echo $value['maand']; ?></option>
          <?php endforeach; ?>
        </select>
        <select name="jaar" class="select_medium fl" tabindex="13">
          <option value="0">jaar</option>
          <?php foreach ($jaren as $value): ?>
          <option value="<?php echo $value ?>" ><?php echo $value ?></option> 
          <?php endforeach; ?>
        </select>
        <input name="kilometerstand" type="text" class="textfield fr" tabindex="14" maxlength="7" onkeypress="return isNumber(event)">
        </fieldset>
        <fieldset class="fr">
          <label for="vervaldatum" class="fl">Apk vervaldatum <span>*</span></label><label for="prijs" class="fr">Prijs <span>*</span></label>
          <input name="vervaldatum" id="vervaldatum" type="date" class="datefield fl" tabindex="15">
          <input name="prijs" type="text" class="textfield fr" tabindex="16" maxlength="7" onkeypress="return isNumber(event)">
        </fieldset>
      </div>
      <div class="form_wrapper cl">
      <fieldset class="fl">
        <label for="details" class="fl">Opties en extra's</label>
        <textarea name="details" class="textarea" id="details" tabindex="17"></textarea>
      </fieldset>       
      <fieldset class="fr">
        <label for="omschrijving" class="fl">Omschrijving</label>
        <textarea name="omschrijving" class="textarea" id="omschrijving" tabindex="18"></textarea>
      </fieldset>      
      </div>
      <div class="form_wrapper cl">
        <fieldset class="fw" style="width: 100%;">
          <label for="fotos" class="fl cl">Foto's</label>
          <p>Ten minste 1 foto is verplicht. Alleen JPEG, PNG en JPG afbeeldingen zijn toegestaan. De foto's mogen niet groter zijn dan 300KB.</p>
          <div id="filediv"><input name="file[]" type="file" class="file" multiple/></div><input type="button" id="add_more" class="upload" value="Meer toevoegen"/>       
        </fieldset>
      </div>
      <div class="form_wrapper cl">
        <input type="submit" value="Upload occasion" name="submit" id="insert" class="insert"/>
      </div>
    </form>
  </section>
</div>

<script type="text/javascript" src="/js/script.js"></script>
<script type="text/javascript" src="/js/jquery.maskedinput.min.js"></script>
<script type="text/javascript" src="/js/numbers.js"></script>
<script>
  jQuery(function($){
    $.mask.definitions['-']='[+-]';
    $("#bouwjaar").mask("99/9999",{placeholder:"mm/yyyy"});
  });
</script>
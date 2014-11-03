<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once "connect.php";
    $j = 0;      
    $target_path = "../occasion_photos/";

    $merk           = filter_input(INPUT_POST, 'merk', FILTER_SANITIZE_NUMBER_INT);
    $uitvoering     = filter_input(INPUT_POST, 'uitvoering', FILTER_SANITIZE_STRING);
    $model          = filter_input(INPUT_POST, 'model', FILTER_SANITIZE_NUMBER_INT);
    $deuren         = filter_input(INPUT_POST, 'deuren', FILTER_SANITIZE_STRING);
    $transmissie    = filter_input(INPUT_POST, 'transmissie', FILTER_SANITIZE_NUMBER_INT);
    $vermogen       = filter_input(INPUT_POST, 'vermogen', FILTER_SANITIZE_STRING);
    $cilinderinhoud = filter_input(INPUT_POST, 'cilinderinhoud', FILTER_SANITIZE_NUMBER_INT);
    $cilinders      = filter_input(INPUT_POST, 'cilinders', FILTER_SANITIZE_NUMBER_INT);
    $brandstof      = filter_input(INPUT_POST, 'brandstof', FILTER_SANITIZE_NUMBER_INT);
    $verbruik       = filter_input(INPUT_POST, 'verbruik', FILTER_SANITIZE_STRING);
    $gewicht        = filter_input(INPUT_POST, 'gewicht', FILTER_SANITIZE_NUMBER_INT);
    $kleur          = filter_input(INPUT_POST, 'brandstof', FILTER_SANITIZE_NUMBER_INT);
    $dag            = "01";
    $maand          = filter_input(INPUT_POST, 'maand', FILTER_SANITIZE_STRING);
    $jaar           = filter_input(INPUT_POST, 'jaar', FILTER_SANITIZE_STRING);
    $bouwjaar       = $jaar."-".$maand."-".$dag;
    $kilometerstand = filter_input(INPUT_POST, 'kilometerstand', FILTER_SANITIZE_NUMBER_INT);    
    $vervaldatum    = filter_input(INPUT_POST, 'vervaldatum', FILTER_SANITIZE_STRING);
    $prijs         = filter_input(INPUT_POST, 'prijs', FILTER_SANITIZE_NUMBER_INT);
    $details       = filter_input(INPUT_POST, 'details', FILTER_SANITIZE_STRING);
    $omschrijving  = filter_input(INPUT_POST, 'omschrijving', FILTER_SANITIZE_STRING);

    if ($merk && $uitvoering && $model && $transmissie && $brandstof && $kleur && $maand && $jaar && $kilometerstand && $vervaldatum && $prijs) {
        

        $occasion_id = $basis->add_occasion($merk,$uitvoering,$model,$deuren,$transmissie,$vermogen,$cilinderinhoud
        ,$cilinders,$brandstof,$verbruik,$gewicht,$kleur,$bouwjaar,$kilometerstand,$vervaldatum,$prijs,$details,$omschrijving);
                     
        for ($i = 0; $i < count($_FILES['file']['name']); $i++) {
            $validextensions = array("jpeg", "jpg", "png");
            $original_name   = $_FILES['file']['name'][$i];
            $ext             = explode('.', basename($original_name));
            $file_extension  = strtolower(end($ext));         
            $new_name        = md5(uniqid()) . "." . $file_extension;
            $new_path        = $target_path . $new_name;
            
            if ($_FILES["file"]["size"][$i] > 300000) {
                echo "<span id=\"error\">***{$original_name}: Invalid file Size***</span><br/><br/>";
                continue;
            }

            if (!in_array($file_extension, $validextensions)) {
                echo "<span id=\"error\">***{$original_name}: Invalid file Type***</span><br/><br/>";
                continue;
            }
                
            if (move_uploaded_file($_FILES['file']['tmp_name'][$i], $new_path)) {
                $basis->add_occasion_photo($occasion_id, $new_name);
            } else {
                echo "<span id=\"error\">There was a problem trying to upload {$original_name} please try again!.</span><br/><br/>";
            }
        }
    } else {
        echo "<span id=\"error\">Some required fields are missing</span><br/><br/>";
    }
}
?>
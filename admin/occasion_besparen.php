<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    require_once "../includes/config-admin.php";

    $target_path = "../occasion_photos/";
    $errors      = array();

    $args = array(
        'merk'           => FILTER_SANITIZE_NUMBER_INT,
        'uitvoering'     => FILTER_SANITIZE_STRING,
        'model'          => FILTER_SANITIZE_NUMBER_INT,
        'deuren'         => FILTER_SANITIZE_STRING,
        'transmissie'    => FILTER_SANITIZE_NUMBER_INT,
        'vermogen'       => FILTER_SANITIZE_STRING,
        'cilinderinhoud' => FILTER_SANITIZE_NUMBER_INT,
        'cilinders'      => FILTER_SANITIZE_NUMBER_INT,
        'brandstof'      => FILTER_SANITIZE_NUMBER_INT,
        'verbruik'       => FILTER_SANITIZE_STRING,
        'gewicht'        => FILTER_SANITIZE_NUMBER_INT,
        'kleur'          => FILTER_SANITIZE_NUMBER_INT,
        'maand'          => FILTER_SANITIZE_STRING,
        'jaar'           => FILTER_SANITIZE_STRING,
        'kilometerstand' => FILTER_SANITIZE_NUMBER_INT,
        'vervaldatum'    => FILTER_SANITIZE_STRING,
        'prijs'          => FILTER_SANITIZE_NUMBER_INT,
        'details'        => FILTER_SANITIZE_STRING,
        'omschrijving'   => FILTER_SANITIZE_STRING,
    );

    $values = filter_input_array(INPUT_POST, $args);

    $dag = "01";
    $values['bouwjaar'] = $values['jaar'].'-'.$values['maand'].'-'.$dag;

    if ($values['merk'] && $values['uitvoering'] && $values['model'] && $values['transmissie'] 
        && $values['brandstof'] && $values['kleur'] && $values['maand'] && $values['jaar'] 
        && $values['kilometerstand'] && $values['vervaldatum'] && $values['prijs']) {
        

        $occasion_id = $occasion->add_occasion($values);
                     
        for ($i = 0; $i < count($_FILES['file']['name']); $i++) {
            $validextensions = array("jpeg", "jpg", "png");
            $original_name   = $_FILES['file']['name'][$i];
            $ext             = explode('.', basename($original_name));
            $file_extension  = strtolower(end($ext));         
            $new_name        = md5(uniqid()) . "." . $file_extension;
            $new_path        = $target_path . $new_name;
            
            if ($_FILES["file"]["size"][$i] > 300000) {
                $errors[] = "{$original_name}: Invalid file Size";
                continue;
            }

            if (!in_array($file_extension, $validextensions)) {
                $errors[] = "{$original_name}: Invalid file Type";
                continue;
            }
                
            if (move_uploaded_file($_FILES['file']['tmp_name'][$i], $new_path)) {
                $occasion->add_photo($occasion_id, $new_name);
            } else {
                $errors[] = "There was a problem trying to upload {$original_name} please try again!";
            }
        }
    } else {
        $errors[] = "Some required fields are missing";
    }

    $session->set('errors', $errors);
}

$login->redirect('occasion_toevoegen.php');
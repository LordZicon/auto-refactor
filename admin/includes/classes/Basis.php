<?php

class Basis extends Conn {


    function get_content_menu() {
        $sql = "SELECT pagina_naam
                 FROM  paginas";

        $results = $this->pdo->query($sql);

        return $results->fetchAll();        
    }

    function get_pagina_content($pagina_id) {
        $sql = "SELECT meta_title
                     , meta_description
                     , meta_keywords
                     , title
                     , content
                  FROM pagina_content
                 WHERE pagina_id = ?";
                 
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($pagina_id));
        
        return $stmt->fetch();
    }   
    
    function update_last_login() {
        $sql = "UPDATE admins
                   SET last_online = CURRENT_TIMESTAMP
                 WHERE admin_id = ?
                 LIMIT 1";
                 
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($_SESSION['admin']));                         
    }
    
    function add_occasion($merk,$uitvoering,$model,$deuren,$transmissie,$vermogen,$cilinderinhoud,$cilinders,$brandstof,$verbruik,$gewicht,$kleur,$bouwjaar,$kilometerstand,$vervaldatum,$prijs,$details,$omschrijving) {
        $sql = "INSERT INTO occasions (merk_id,uitvoering,model_id,deuren,transmissie_id,vermogen,cilinderinhoud,cilinders,brandstof_type_id,verbruik,gewicht,kleur_id,bouwjaar,kilometerstand,vervaldatum,prijs,details,omschrijving)
                VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($merk,$uitvoering,$model,$deuren,$transmissie,$vermogen,$cilinderinhoud,$cilinders,$brandstof,$verbruik,$gewicht,$kleur,$bouwjaar,$kilometerstand,$vervaldatum,$prijs,$details,$omschrijving));

        return $this->pdo->lastInsertId();
    }

    public function add_occasion_photo($occasion_id, $image_name) {
        $sql = "INSERT INTO occasion_photos (occasion_id, photo) VALUES (?, ?)";
                                                    
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($occasion_id, $image_name));
    }
    
}
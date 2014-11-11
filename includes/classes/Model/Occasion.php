<?php
class Model_Occasion extends DbModel
{
    public function add($values) {
        $sql = "INSERT INTO occasions (merk_id, uitvoering, model_id, deuren,transmissie_id, 
            vermogen, cilinderinhoud, cilinders, brandstof_type_id, verbruik, gewicht, kleur_id,
            kilometerstand, vervaldatum, prijs, details, omschrijving, bouwjaar)
                VALUES (:merk_id, :uitvoering, :model_id, :deuren,transmissie_id,
            :vermogen, :cilinderinhoud, :cilinders, :brandstof_type_id, :verbruik,gewicht, 
            :kleur_id, :kilometerstand, :vervaldatum, :prijs, :details, :omschrijving, :bouwjaar)";
                
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array(
            ':merk_id'              => $values['merk'],
            ':uitvoering'           => $values['uitvoering'],
            ':model_id'             => $values['model'],
            ':deuren'               => $values['deuren'],
            ':transmissie_id'       => $values['transmissie'],
            ':vermogen'             => $values['vermogen'],
            ':cilinderinhoud'       => $values['cilinderinhoud'],
            ':cilinders'            => $values['cilinders'],
            ':brandstof_type_id'    => $values['brandstof'],
            ':verbruik'             => $values['verbruik'],
            ':gewicht'              => $values['gewicht'],
            ':kleur_id'             => $values['kleur'],
            ':kilometerstand'       => $values['kilometerstand'],
            ':vervaldatum'          => $values['vervaldatum'],
            ':prijs'                => $values['prijs'],
            ':details'              => $values['details'],
            ':omschrijving'         => $values['omschrijving'],
            ':bouwjaar'             => $values['bouwjaar'],
        ));

        return $this->pdo->lastInsertId();
    }

    public function get_details($occasion_id)
    {
        $sql = $this->getQuery();
        $sql .= "WHERE O.occasion_id = ?";
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($occasion_id));
        
        return $stmt->fetch();
    }
    
    public function get_featured()
    {
        $sql = $this->getQuery(TRUE);
        $sql .= "ORDER BY O.isGezien DESC 
                LIMIT 3";
        
        $stmt = $this->pdo->query($sql);

        return $stmt->fetchAll();
    }

    public function add_photo($occasion_id, $image_name) {
        $sql = "INSERT INTO occasion_photos (occasion_id, photo) VALUES (?, ?)";
                                                    
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($occasion_id, $image_name));
    }

    public function get_photos($occasion_id)
    {
        $sql = "SELECT photo
                  FROM occasion_photos
                 WHERE occasion_id = ?";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($occasion_id));

        return $stmt->fetchAll();
    }
    
    public function zoeken($merk, $model, $prijs, $bouwjaar, $transmissie, $brandstof, $kilometers, $kleur)
    {
        $sql = $this->getQuery(TRUE);
        $sql .= "WHERE 0 = 0";

        $params = array();

        if ($merk) {
            $sql .= " AND O.merk_id = :merk";
            $params[':merk'] = $merk;
        }
        if ($model) {
            $sql .= " AND O.model_id = :model";
            $params[':model'] = $model;
        }
        if ($prijs) {
            $sql .= " AND O.prijs <= :prijs";
            $params[':prijs'] = $prijs;
        }
        if ($bouwjaar) {
            $sql .= " AND O.bouwjaar => :bouwjaar";
            $params[':bouwjaar'] = $bouwjaar;
        }
        if ($transmissie) {
            $sql .= " AND O.transmissie_id = :transmissie";
            $params[':transmissie'] = $transmissie;
        }
        if ($brandstof) {
            $sql .= " AND O.brandstof_type_id = :brandstof";
            $params[':brandstof'] = $brandstof;
        }
        if ($kilometers) {
            $sql .= " AND O.kilometerstand <= :kilometers";
            $params[':kilometers'] = $kilometers;
        }
        if ($kleur) {
            $sql .= " AND O.kleur_id = :kleur";
            $params[':kleur'] = $kleur;
        }
        
        $stmt = $this->pdo->prepare($sql . " ORDER BY ingevoerd DESC");
        $stmt->execute($params);

        return $stmt->fetchAll();
    }
    
    public function update_gezien_status($occasion_id)
    {
        $sql = "UPDATE occasions
                   SET isGezien = isGezien + 1
                 WHERE occasion_id = ?";
                 
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($occasion_id));
    }

    private function getQuery($withPhotos = false)
    {
        $fields = "SELECT O.occasion_id
                     , O.merk_id, M.merk
                     , O.model_id, MO.model
                     , O.uitvoering
                     , DATE_FORMAT(vervaldatum, '%d/%m/%Y') AS vervaldatum
                     , O.prijs
                     , DATE_FORMAT(bouwjaar, '%m / %Y') AS bouwjaar
                     , O.bouwjaar
                     , O.transmissie_id, T.transmissie
                     , O.brandstof_type_id, B.brandstof_type
                     , O.kilometerstand
                     , O.kleur_id
                     , K.kleur
                     , O.details
                     , O.verbruik
                     , O.cilinderinhoud
                     , O.cilinders
                     , O.vermogen
                     , O.deuren
                     , O.gewicht
                     , O.isGezien";

        $tables = " FROM occasions O
                  JOIN merken M ON O.merk_id = M.merk_id 
                  JOIN modellen MO ON O.model_id = MO.model_id 
                  JOIN brandstof_types B ON O.brandstof_type_id = B.brandstof_type_id 
                  JOIN transmissie T ON O.transmissie_id = T.transmissie_id 
                  JOIN kleuren K ON O.kleur_id = K.kleur_id ";

        $photoSQL = "JOIN (SELECT occasion_id
                             , MAX(photo_id) AS laatste
                          FROM occasion_photos
                      GROUP BY occasion_id ) AS PX
                    ON PX.occasion_id = O.occasion_id
             LEFT JOIN occasion_photos AS OP ON OP.occasion_id = PX.occasion_id
                   AND OP.photo_id = PX.laatste ";

        if ($withPhotos) {
            $fields .= ", OP.photo";
            $tables .= $photoSQL;
        }

        return $fields . $tables . ' ';
    }
}
<?php
class Search extends DbModel {
    
    function get_merken() {
        $sql = "SELECT DISTINCT O.merk_id
                     , M.merk
                  FROM occasions O
             LEFT JOIN merken M ON O.merk_id = M.merk_id";
             
        $stmt = $this->pdo->query($sql);
        
        $results = $stmt->fetchAll();
        return $results;                        
    }
                        
    function get_modellen() {
        $sql = "SELECT DISTINCT O.model_id
                     , M.model
                  FROM occasions O
             LEFT JOIN modellen M ON O.model_id = M.model_id";
             
        $stmt = $this->pdo->query($sql);
        
        $results = $stmt->fetchAll();
        return $results;                        
    }

    function get_brandstoffen() {
        $sql = "SELECT DISTINCT O.brandstof_type_id
                     , B.brandstof_type
                  FROM occasions O
             LEFT JOIN brandstof_types B ON O.brandstof_type_id = B.brandstof_type_id";
             
        $stmt = $this->pdo->query($sql);
        
        $results = $stmt->fetchAll();
        return $results;                        
    }

    function get_transmissies() {
        $sql = "SELECT DISTINCT O.transmissie_id
                     , T.transmissie
                  FROM occasions O
             LEFT JOIN transmissie T ON O.transmissie_id = T.transmissie_id";
             
        $stmt = $this->pdo->query($sql);
        
        $results = $stmt->fetchAll();
        return $results;                        
    }

    function get_prijzen() {
        $sql = "SELECT prijs_value
                     , prijs
                  FROM prijzen";
             
        $stmt = $this->pdo->query($sql);
        
        $results = $stmt->fetchAll();
        return $results;                        
    }   
    
    function get_kleuren() {
        $sql = "SELECT DISTINCT O.kleur_id
                     , K.kleur
                  FROM occasions O
             LEFT JOIN kleuren K ON O.kleur_id = K.kleur_id";
             
        $stmt = $this->pdo->query($sql);
        
        $results = $stmt->fetchAll();
        return $results;                        
    }   
    
}
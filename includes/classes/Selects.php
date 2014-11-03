<?php
class Selects extends DbModel {
    
    function get_merken() {
        $sql = "SELECT merk_id
                     , merk
                  FROM merken
              ORDER BY merk";
             
        $stmt = $this->pdo->query($sql);
        
        $results = $stmt->fetchAll();
        return $results;                        
    }
                        
    function get_modellen() {
        $sql = "SELECT model_id
                     , model
                  FROM modellen";
             
        $stmt = $this->pdo->query($sql);
        
        $results = $stmt->fetchAll();
        return $results;                        
    }

    function get_brandstoffen() {
        $sql = "SELECT brandstof_type_id
                     , brandstof_type
                  FROM brandstof_types";
             
        $stmt = $this->pdo->query($sql);
        
        $results = $stmt->fetchAll();
        return $results;                        
    }

    function get_transmissies() {
        $sql = "SELECT transmissie_id
                     , transmissie
                  FROM transmissie";
             
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
        $sql = "SELECT kleur_id
                     , kleur
                  FROM kleuren";
             
        $stmt = $this->pdo->query($sql);
        
        $results = $stmt->fetchAll();
        return $results;                        
    }

    function get_maanden() {
        $sql = "SELECT waarde
                     , maand
                  FROM maanden";
             
        $stmt = $this->pdo->query($sql);
        
        $results = $stmt->fetchAll();
        return $results;                        
    }   
    
}
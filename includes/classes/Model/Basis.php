<?php
class Model_Basis extends DbModel {

    public function get_content_menu() {
        $sql = "SELECT pagina_naam
                 FROM  paginas";

        $results = $this->pdo->query($sql);

        return $results->fetchAll();        
    }

    public function get_slideshow() {
        $sql = "SELECT photo
                  FROM slideshow_photos
              ORDER BY RAND()";
                             
                 
        $results = $this->pdo->query($sql);
        
        return $results->fetchAll();
    }
    
    public function get_header_menu() {
        $sql = "SELECT *
                  FROM paginas
                 WHERE pagina_id IN (1,2,3,4,5,8)
              ORDER BY pagina_sequence";
                  
        $result = $this->pdo->query($sql);
        
        return $result->fetchAll();
    }
    
    public function get_footer_menu() {
        $sql = "SELECT *
                  FROM paginas
                 WHERE pagina_id IN (6,7,5)
              ORDER BY FIELD(pagina_sequence, 6, 7, 5)";
                  
        $result = $this->pdo->query($sql);
        
        return $result->fetchAll();
    }
    
    public function get_pagina_content($pagina_id) {
        $sql = "SELECT meta_title
                     , meta_description
                     , meta_keywords
                     , title
                     , content
                  FROM pagina_content
                 WHERE pagina_id = ?";
                 
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($pagina_id));
        
        $result = $stmt->fetch();
        
        return $result;         
    }
    
    public function update_gezien_status($occasion_id){
        $sql = "UPDATE occasions
                   SET isGezien = isGezien + 1
                 WHERE occasion_id = ?";
                 
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($occasion_id));
    }

}
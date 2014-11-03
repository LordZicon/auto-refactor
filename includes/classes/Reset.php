<?php
class Reset extends DbModel {
        
    function attempt($email) {
        $sql = "SELECT *
                  FROM admins
                 WHERE email = ?
                 LIMIT 1";
                 
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($email));
        
        if ($data = $stmt->fetch( PDO::FETCH_OBJ )) {          
            return true;
        } else {

            return false;
        }   
    }   
    
    function redirect($url) {
        header('Location: ' .$url);
    }

                
}
    
    
<?php
class Model_User extends DbModel
{
    public function get_roles() {
        $sql = "SELECT role_id, role FROM roles";
        
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll();
    }

    public function update_last_login($userId) {
        $sql = "UPDATE admins
                   SET last_online = CURRENT_TIMESTAMP
                 WHERE admin_id = ?
                 LIMIT 1";
                 
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($userId));
    }

    public function username_exists($gebruikersnaam) {
        $sql = "SELECT admin_id
                  FROM admins
                 WHERE gebruikersnaam = ?
                 LIMIT 1";
                 
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($gebruikersnaam));
        
        return $stmt->fetchColumn();
    }   

    public function attempt_login($gebruikersnaam, $wachtwoord) {
        $sql = "SELECT *
                  FROM admins
                 WHERE gebruikersnaam = ?
                 LIMIT 1";
                 
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($gebruikersnaam));
        
        if ($data = $stmt->fetch( PDO::FETCH_OBJ )) {
            if (crypt($wachtwoord, $data->wachtwoord)) {
            
                $_SESSION['admin']     = $data->admin_id;
                $_SESSION['naam']      = $data->naam;
                $_SESSION['gebruiker'] = $data->gebruikersnaam;
                return true;
            } else {
                return false;
            }
        } else {

            return false;
       }    
    }   
    
    public function is_gebruiker() {
        return isset($_SESSION['gebruiker']);
    }
    
    public function redirect($url) {
        header('Location: ' .$url);
    }
    
    
    public function valid_gebruikersnaam($str) {
        return preg_match('/^[a-z0-9_-]{3,16}$/', $str);
    }
    
    public function valid_wachtwoord($str){
        return preg_match('/^[a-z0-9_-]{6,18}$/', $str);    
    }
}
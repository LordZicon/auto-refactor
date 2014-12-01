<?php

class Controller_Admin_Occasion extends Controller_Admin
{
    public function addAction()
    {

    }

    public function toevoegenAction($params)
    {
        $huidigjaar = date("Y");
        $startJaar  = date("Y") - 40;

        $values = $this->selects->get_values();

        $data = [
            'title'        => 'Admin Panel Home',
            'naam'         => $this->session->get('naam'),
            'huidigjaar'   => $huidigjaar,
            'startJaar'    => $startJaar,
            'jaren'        => range ($huidigjaar, $startJaar),
            'errors'       => $this->session->getOnce('errors'),
        ] + $values;

        $this->render('admin/occasion_toevoegen', $data);
    }

    public function bewarenAction()
    {
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            $login->redirect('/admin/occasion/toevoegen');
        }

        $target_path = "../occasion_photos/";
        $errors      = array();

        $validator = new Validator_Occasion($_POST);
        $values = $validator->validate();
        
        if ( ! $values) {
            $ession->set('errors', $validator->getErrors());
            $login->redirect('/admin/occasion/toevoegen');
        }

        $values['bouwjaar'] = $values['jaar'].'-'.$values['maand'].'-'."01";
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
        
    }

}
<?php
/**
 * Controller for homepage and general pages.
 */
 
		
class controller_reclamatii {

	function action_index($params) {
	
        global $user;
        
        if($_POST['Submit'] == 'submit'){
            $reclamatie = array(
              'nume' => $_POST['name'],
              'telefon' => $_POST['telefon'],
              'email' => $_POST['email'],
              'message' => $_POST['message'],
              'idu' => (!empty($user) ? $user->iduser : -1), // -1 reprezinta user anonim
            );
            $message_reclamatie = array("text" => "Reclamatia nu a putut fi raportata .","cod" => 0);
            if(is_numeric(model_Reclamati::save($reclamatie)))
                $message_reclamatie =array("text" => "Reclamatia raportata cu succes!","cod" => 1);
            
        }
        @include_once APP_PATH . 'view/reclamatii_index.tpl.php';
    }
			       
}

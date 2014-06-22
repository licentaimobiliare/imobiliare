<?php
class controller_AdminUpdateDateImobil {

	function action_update($params) {
            
            
        
             @include_once APP_PATH . 'view/AdminUpdateDateImobil_update.tpl.php';
        }
         public static function getFinisaj(){
        $connection = model_database::get_instance();
        
        $stmt = $connection->prepare("select distinct(finisaj) from finisaje");
        $stmt->execute();
        
        return $stmt->fetchAll();
    }
}
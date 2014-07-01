<?php

class controller_harta {

	/**
	 * This is the homepage.
	 */
	function action_index($params) {
		
        $connection = model_database::get_instance();
        $stmt= $connection->prepare("select m.* from markers as m inner join imobil as i on m.idi=i.idi
order by data_inregistrare desc limit 0,10");
        
        $stmt->execute();
        $imobils_location = $stmt->fetchAll(PDO::FETCH_OBJ);
        
        @include_once APP_PATH . 'view/harta_index.tpl.php';
        
	}

}

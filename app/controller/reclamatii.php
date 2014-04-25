<?php
/**
 * Controller for homepage and general pages.
 */
 
		
class controller_reclamatii {

	function action_index($params) {
	
  	
        $ok= new controller_helper();
        $ok->login();
        var_dump($ok);
			if ($ok==1)
			
						
				@include_once APP_PATH . 'view/reclamatii_index.tpl.php';
			else
                            
                          echo "Nu esti autentificat. Pentru a avea acces la aceasta pagina te rog sa te loghezi!"; 
			

        }         
}

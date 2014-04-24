<?php
/**
 * Controller for homepage and general pages.
 */
 
		
class controller_reclamatii {

	function action_index($params) {
	
  	$sec=0;
        $sec= new controller_helper();
        $sec->login();
			if ($sec==1)
			{
						
				@include_once APP_PATH . 'view/reclamatii_index.tpl.php';
			}
			if ($sec==0)
			{
                           
			}

        }         
}

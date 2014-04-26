<?php
/**
 * Controller for homepage and general pages.
 */
class controller_home {

	/**
	 * This is the homepage.
	 */
	function action_index($params) {
        echo '<pre>';print_r(model_imobil::getById(1));die;
        
		@include_once APP_PATH . 'view/home_index.tpl.php';
	
	}

}


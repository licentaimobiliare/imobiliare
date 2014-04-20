<?php
/**
 * Controller for homepage and general pages.
 */
class controller_home {

	/**
	 * This is the homepage.
	 */
	function action_index($params) {
		model_imobil::getById(array(2,1));die;
        
        $param= 'abc';
		echo 'Acum sa apelat controlleru';
        
		@include_once APP_PATH . 'view/home_index.tpl.php';
	}

}
<?php

/**
 * Controller for homepage and general pages.
 */
class controller_test {

	/**
	 * This is the homepage.
	 */
	function action_index($params) {
		
            echo "<pre>";
                        print_r(model_imobil :: getById(2));die;
		$arr = array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5);
		echo json_encode($arr);
		//@include_once APP_PATH . 'view/home_index.tpl.php';
	
	}


	function action_exemplu ($params){
		@include_once APP_PATH . 'view/asdf.tpl.php';
}
}

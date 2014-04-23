<?php
/**
 * Controller for homepage and general pages.
 */
class controller_home {

	/**
	 * This is the homepage.
	 */
	function action_index($params) {
		
		$arr = array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5);
		echo json_encode($arr);
		//@include_once APP_PATH . 'view/home_index.tpl.php';
	
	}


	function action_exemplu ($params){
		@include_once APP_PATH . 'view/asdf.tpl.php';
}
}

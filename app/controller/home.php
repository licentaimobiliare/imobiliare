<?php
/**
 * Controller for homepage and general pages.
 */
class controller_home {

	/**
	 * This is the homepage.
	 */
	function action_index($params) {
		$param= 'abc';
		echo 'Acum sa apelat controlleru';
        
		@include_once APP_PATH . 'view/home_index.tpl.php';
	}

}
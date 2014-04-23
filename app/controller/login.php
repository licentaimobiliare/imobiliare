<?php
/**
 * Controller for homepage and general pages.
 */
class controller_login {

	function action_index($params) {

		@include_once APP_PATH . 'view/login_index.tpl.php';
	
	}

}
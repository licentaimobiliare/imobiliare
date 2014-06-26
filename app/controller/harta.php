<?php

class controller_harta {

	/**
	 * This is the homepage.
	 */
	function action_index($params) {
		@include_once APP_PATH . 'view/harta_index.tpl.php';
                
	}

}

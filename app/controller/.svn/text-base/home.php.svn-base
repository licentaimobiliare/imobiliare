<?php
/**
 * Controller for homepage and general pages.
 */
class controller_home {

	/**
	 * This is the homepage.
	 */
	function action_index($params) {

        if($_GET && $_GET['Search']=="Search" && !empty($_GET['search']))
        {
            $list_search=model_game::searchGame($_GET['search']);
        }


        if(empty($params))
        {
            $list_games=model_game::getLastGame(5);
            $list_top_game=model_game::getTopGame(5);
            $_SESSION['category']="";
        }
        else {
            $list_games=model_game::search($params[0]);
            $list_top_game=model_game::getTopGameCategory(5,$params[0]);
            $_SESSION['category']=$params[0];
        }
        if($_POST && !empty($_POST['login']))
        {
            $user=model_user::checklogin($_POST['username'],$_POST['password']);
            if(!empty($user))
            {$username=$user->getName();
                $_SESSION['username']=$user->getName();
                $_SESSION['userid']=$user->getId();
                $_SESSION['admin']=$user->getAdmin();}
            else {header("Location: ".APP_URL."/login/view/fail");}
        }

        $list_categories=model_category::all();
		// Include view for this page
		@include_once APP_PATH . 'view/home_index.tpl.php';
	}

    function action_logout($params){
        session_unset();
        header("Location: ".APP_URL."home/index/".$params[0]);
    }

}
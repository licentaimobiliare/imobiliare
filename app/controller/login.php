<?php
/**
 * Controller for homepage and general pages.
 */
class controller_login {

	function action_index($params) {
           if ($_POST['type'] == 1)
                {
                    $sec = controller_helper::login();
                    if ($sec == 1)
                    {
                        $_SESSION['txtuser']=$_POST['txtuser'];
                        $_SESSION['txtpass']=$_POST['txtpass'];
                        global $user;
                        $_SESSION['user']=$user;
                    }
                    else
                        if ($sec == 0)
                        {
                            $message="Nu exista acest utilizator";
                        }
                        else
                        {
                            $message="User sau parola introduse gresit";
                        }
                }
		
                
           
           if ($_POST['type'] ==2)
           {
               $user = controller_helper::inregistrare($_POST);
               if (!$user)
               {
                   $message="Inregistrare esuata";
               } 
               else
               {
                   $message="Te-ai inregistrat cu succes!";
                    $_SESSION['txtuser']= $user['nume_user'] ;
                    $_SESSION['txtpass']=$user['pass'];
               }
             
            
           }
	@include_once APP_PATH . 'view/login_index.tpl.php';
	}
        

}
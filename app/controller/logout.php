<?php

class controller_logout{
    function action_index($params){
        if (isset($_POST['logout'])) 
        {
            unset($_SESSION['txtuser']);
            unset($_SESSION['txtpass']);
        }
   header('location: /');

    }
}





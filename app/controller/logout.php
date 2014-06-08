<?php

class controller_logout{
    function action_index($params){
        if (isset($_POST['logout'])) 
        {
            unset($_SESSION['user']);
          
        }
   header('location: /');

    }
}





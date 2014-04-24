<?php

class controller_logout{
    function action_index($params){
        if (isset($_POST['logout'])) {
            session_unset();
            session_destroy();
@include_once APP_PATH . 'view/home_index.tpl.php';
}
    }
}





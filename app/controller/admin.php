<?php

class controller_admin{
    function action_index($params){
        
        @include_once APP_PATH . 'view/admin_index.tpl.php';
   }
}
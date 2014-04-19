<?php

class controller_comments{

    function action_add($params){
        model_comments::add(2,3,"DSGsfgi nrgn");
        die();
    }

    function action_view($params){
        @include_once APP_PATH . 'view/comments_view.tpl.php';
    }

    function action_edit($params){
        model_comments::edit('3', '2013-08-26 12:13:32', "NEW");
        die();
    }

    function action_delete($params){
        model_comments::delete('3', '2013-08-26 12:13:32');
        die();
    }

}
<?php

class controller_category{

    //Edit a category's name.
    function action_edit($params){
        $category_id = $params[0];
        $category = model_category::load($category_id);
        $category_name = $category->getName();
        if($_POST){
            switch($_POST['submit']){
                case 'Edit':{
                    if($_POST['nume'] != ""){
                        model_category::edit($category_id, $_POST['nume']);
                        header('Location:' . APP_URL . "/home/index/" . $category_id);
                    }
                    break;
                }
                case 'Cancel':{
                    header('Location:' . APP_URL . "/home/index/" . $category_id);
                    break;
                }
                case 'Remove category':{
                    if(model_game::search($category_id)){
                        $not_empty_category = true;
                        @include_once APP_PATH . 'view/category_edit.tpl.php';
                    }
                    else{
                        model_category::delete($category_id);
                        header('Location:' . APP_URL . "/home/index/");
                    }
                    break;
                }
            }
        }
        @include_once APP_PATH . 'view/category_edit.tpl.php';
    }

}
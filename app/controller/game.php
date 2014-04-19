<?php
class controller_game {

    function action_view($params) {

        if (!empty($_POST['id_categories'])) {

        }
        $_game=model_game::load($params[0]);
        $list_comments=model_comments::load_g($params[0]);
        $voteUser=true;
        $favoriteGame=true;
        if(!empty($_SESSION['userid'])){
        if(!model_game::existVote($_SESSION['userid'],$params[0]))
        {   $voteUser=false;}
        if(!model_game::existFavorite($_SESSION['userid'],$params[0]))
        {   $favoriteGame=false;}
        }



        @include_once APP_PATH . 'view/game_view.tpl.php';
    }

    function action_favorite($params){
        if($params[1])
        {model_game::removeFavorite($_SESSION['userid'],$params[0]);}
        else {
        model_game::addFavorite($_SESSION['userid'],$params[0]);}
        header('Location: '.APP_URL.'game/view/'.$params[0]);
    }

    function action_vote($params) {

        model_game::vote($params[0],$_SESSION['userid'],$_POST['vote']);
        header('Location: '.APP_URL."game/view/".$params[0]);
    }
    function action_addComment($params)
    {
        if($_POST && $_POST['user_answer']==$_POST['answer'] && $_POST['comment_text']!='')
        {

            model_comments::add($_SESSION['userid'],$params[0],$_POST['comment_text']);
            header('Location: '.APP_URL."game/view/".$params[0]);
        }
        else{
            $_SESSION['error'] = "yes";
            header("Location: " . APP_URL . "game/view/" . $params[0]);
        }
    }

    function action_deleteComment($params)
    {
        model_comments::delete($params[0],urldecode($params[1]));
        header('Location: '.APP_URL."game/view/".$params[0]);
    }

    function action_editComment($params){
        $time=substr(urldecode($params[1]),1,19);
        $i=2;
        $comments=array();
        while(!empty($params[$i]))
        {
            $comments[]=$params[$i];
            $i++;
        }
        $comment=implode('/',$comments);

        model_comments::edit($params[0],$time,$comment);
        header('Location: '.APP_URL."game/view/".$params[0]);
    }

    function action_add($params){
        $err=false;
        if(!empty($params[1]))
            $err= true;

        if(!empty($params)){
            $game=model_game::load($params[0]);
            $categorie=model_game::getCategory($params[0]);

        }
        else {$game=new model_game('','','','','','');
        $categorie=new model_category('','');}
        $list_categories=model_category::all();

        @include APP_PATH.'/view/game_add.tpl.php';
    }

    function action_delete($params){

        model_game::delete($params[0]);
        header('Location: '.APP_URL."home/index/".$params[1]);
    }

    function action_addGame($params){

        if($_POST['submit']=='Cancel')
        {      header('Location: '.APP_URL."home/index");}
        else
        if(!empty($_POST['name']))
        {
        $image=$_FILES['image'];

        if(!empty($image['name'])){
        $name=time() . '_' . mt_rand(1000,9999).$this->getImageExtension($image['type']);
        if(!move_uploaded_file($image['tmp_name'],dirname(APP_PATH)."/img/".$name))
            die("Conexiune esuata");
        }
        else $name=$_POST['images'];
        $game=new model_game($_POST['description'],'',$name,$_POST['link'],$_POST['name'],$_POST['rate']);
       if($_POST['submit']=='Add')
        if(!($game=model_game::save($game)))
            @include APP_PATH.'view/404_index.tpl.php';
        else {
            model_game::saveCategory($game->getId(),$_POST['category']);
            header('Location: '.APP_URL."home/index/".$_POST['category']);
        }
        else if($_POST['submit']=='Edit'){

            $game->setId($_POST['id_game']);

            model_game::edit($game);
            model_game::editCategory($game->getId(),$_POST['category']);
            header('Location: '.APP_URL."home/index/".$_POST['category']);
        }

        }
        else {
            header('Location: '.APP_URL."game/add/".$_POST['id_game']."/fail");}
    }
    private function getImageExtension($type)
    {
        switch($type) {
            case 'image/gif':
                return '.gif';
            case 'image/jpeg':
            case 'image/pjpeg':
                return '.jpg';
            case 'image/png':
                return '.png';
            default:
                throw new Exception('File type is not recognized!');
        }
    }
}
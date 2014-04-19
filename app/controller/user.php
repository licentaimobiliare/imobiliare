<?php

//Controller for the User's profile page.
class controller_user{

    function action_view(){
        $user = model_user::getUser($_SESSION['userid']);
        $user_id = $user->getId();
        $user_name = $user->getName();
        $user_mail = $user->getMail();
        $user_image = $user->getImage();
        $user_admin = $user->getAdmin();

        @include_once APP_PATH . 'view/user_view.tpl.php';
    }

    //Insert new category & back to the user/view.
    function action_addCategory($params){
        //Add new category.
        model_category::add($_POST['nume']);
        //Back to user/view.
        header("Location: " .  APP_URL . 'user/view');
    }

    function action_register($params){
        if($_POST && $_POST['submit']=="Cancel"){
            header("Location: " . APP_URL . 'login/view');
        }
        if($_POST && $_POST['submit'] == "Register"){
            if($_POST['username']=='' || $_POST['password1']=='' || $_POST['password2']==''){
                $no_basic_info = true;
                @include_once APP_PATH . 'view/user_register.tpl.php';
            }
            else{
                if($_POST['password1']!=$_POST['password2']){
                    $incorrect_password = true;
                    @include_once APP_PATH . 'view/user_register.tpl.php';
                }
                else{
                    //Get new information.
                    $username = $_POST['username'];
                    $password = $_POST['password1'];
                    $mail = $_POST['mail'];
                    $image = $_FILES['image'];
                    $image_name = $_FILES['image']['name'];
                    //Do stuff with image.
                    if(!empty($image['name'])){
                        $image_name = time() . '_' . mt_rand(1000,9999) . $this->getImageExtension($image['type']);
                        if(!move_uploaded_file($image['tmp_name'], dirname(APP_PATH)."/img/".$image_name))
                            die("An error occurred while uploading the image!");
                    }
                    else{
                        $image_name = $_POST['old_image'];
                    }
                    if(model_user::getUser($_SESSION['userid'])){
                        //Update user.
                        model_user::edit($_SESSION['userid'], $username, $password, $mail, $image_name);
                        $_SESSION['username'] = $username;
                    }
                    else{
                        //Add new user.
                        model_user::add($username, $password, 'no', $mail, $image_name);
                    }
                    header("Location: ". APP_URL . "home/index");
                }
            }
        }


        @include_once APP_PATH . 'view/user_register.tpl.php';
    }

    private function getImageExtension($type)
    {
        switch($type){
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

    function action_edit($params){

        if($_POST && $_POST['submit']=="Cancel"){
            header("Location: " . APP_URL . "user/view");
        }
        if($_POST && $_POST['submit']=="Edit"){
            if($_POST['username']!=''){
                $image = $_FILES['image'];
                $image_name = $_FILES['image']['name'];
                $user = model_user::getUser($_SESSION['userid']);

                if(!empty($image['name'])){
                    $image_name = time() . '_' . mt_rand(1000,9999) . $this->getImageExtension($image['type']);
                    if(!move_uploaded_file($image['tmp_name'], dirname(APP_PATH)."/img/".$image_name))
                        die("An error occurred while uploading the image!");
                        //Delete old image.
                        $image = $user->getImage();
                        unlink(dirname(APP_PATH) . "/img/" . $image);
                }
                else{
                    $image_name = $_POST['old_image'];
                }
                model_user::edit2($_SESSION['userid'], $_POST['username'], $_POST['mail'], $image_name);
                $_SESSION['username'] = $_POST['username'];
            }
            header("Location: " . APP_URL . "user/view");
        }
        @include_once APP_PATH . 'view/user_edit.tpl.php';
    }

    function action_editpass($params){
        if($_POST && $_POST['submit']=="Cancel"){
            header("Location: " . APP_URL . "user/edit");
        }
        if($_POST && $_POST['submit']=="Submit"){
            $user = model_user::getUser($_SESSION['userid']);
            $password = $user->getPassword();
            if(sha1($_POST['old_password']) != $password){
                $old_bad = true;
            }
            else{
                    if(($_POST['password1'] != $_POST['password2']) &&($_POST['password2'] != '')){
                        $new_bad = true;
                    }
                    else{
                        model_user::edit3($_SESSION['userid'], $_POST['password1']);
                        header("Location: " . APP_URL . "user/edit");
                    }
            }
        }
        @include_once APP_PATH . 'view/user_editpass.tpl.php';
    }

    function action_manage($params){

        if($_POST && $_POST['submit']=='Apply changes'){

            //Admin resolving.
            $ids1 = $_POST['admin'];
            model_user::lose_admin($_SESSION['userid']);
            foreach($ids1 as $id){
                model_user::edit_admin($id, 'yes');
            }

            //Delete resolving.
            $ids2 = $_POST['delete'];
            foreach($ids2 as $id){
                model_user::delete($id);
            }
            header("Location: " . APP_URL . "user/manage");
        }
        @include_once APP_PATH . 'view/user_manage.tpl.php';
    }

    function action_about($params){
        @include_once APP_PATH . "view/about_authors.tpl.php";
    }
}


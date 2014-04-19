<?php
class model_user{

    private $id;
    private $name;
    private $password;
    private $admin;
    private $mail;
    private $image;

    function __construct($name, $password, $admin, $mail ,$image)
    {
        $this->name = $name;
        $this->password = $password;
        $this->admin = $admin;
        $this->mail = $mail;
        $this->image = $image;
    }


    public function setAdmin($admin)
    {
        $this->admin = $admin;
    }

    public function getAdmin()
    {
        return $this->admin;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setMail($mail)
    {
        $this->mail = $mail;
    }

    public function getMail()
    {
        return $this->mail;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

     public function getName()
    {
        return $this->name;
    }

    public static function add($name, $password, $admin, $mail, $image){
        $db = model_database::get_instance();
        try{
            $stmt = $db->prepare("INSERT INTO users (name, password, admin) VALUES(?, ?, ?)");
            $password=SHA1($password);
            $stmt->execute(array($name, $password, $admin));

            $stmt = $db->prepare("SELECT id FROM users WHERE name=? AND password=?");
            $stmt->execute(array($name, $password));
            $result=$stmt->fetch();
            $id = $result['id'];
            $stmt = $db->prepare("INSERT INTO users_info (id, mail, image) VALUES(?, ?, ?)");
            $stmt->execute(array($id, $mail, $image));
        }
        catch(Exception $e)
        { print("Error ". $e);}
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public static function all(){
        $db = model_database::get_instance();
        try{
            $stmt = $db->prepare("SELECT * FROM users, users_info WHERE users.id = users_info.id");
            $stmt->execute();
            $fin = array();
            while($result = $stmt->fetch()){
                $name = $result['name'];
                $password = $result['password'];
                $admin = $result['admin'];
                $mail = $result['mail'];
                $image = $result['image'];
                $user = new model_user($name, $password, $admin, $mail, $image);
                $user->setId($result['id']);
                $fin[] = $user;
            }
            return $fin;
        }
        catch(Exception $e)
        {print("Error " . $e);}
    }

    public static function getUser($id)
    {
        $db=model_database::get_instance();
        try{
            $stmt=$db->prepare("SELECT users.id, name, password, admin, mail, image
                                FROM users, users_info
                                WHERE users.id = ? AND users.id = users_info.id");
            $stmt->execute(array($id));
            $result = $stmt->fetch();
            if($result){
                $admin = $result['admin'];
                $mail = $result['mail'];
                $password = $result['password'];
                $image = $result['image'];
                $name = $result['name'];
                $user = new model_user($name, $password, $admin, $mail, $image);
                $user->setId($result['id']);
                return $user;
            }
        }
        catch(Exception $e){print("Error " . $e);}
    }
    public static function checklogin($name, $password){
        $db = model_database::get_instance();
        try{
            //$password = SHA1($password);
            $stmt = $db->prepare("SELECT users.id, name, password, admin, mail, image
                                  FROM users, users_info
                                  WHERE users.id = users_info.id AND name = ? AND password = SHA1(?)
                                  GROUP BY users.id");
            $stmt->execute(array($name, $password));
            $result = $stmt->fetch();
            if($result){
                $admin = $result['admin'];
                $mail = $result['mail'];
                $image = $result['image'];
                $user = new model_user($name, $password, $admin, $mail, $image);
                $user->setId($result['id']);
                return $user;

            }
        }
        catch(Exception $e)
        {print("Error " . $e);}
    }

    public static function delete($id){
        $db = model_database::get_instance();
        try{
            //If has image, delete it!
            $user = model_user::getUser($id);
            $image = $user->getImage();
            if($image!=''){
                unlink(dirname(APP_PATH) . "/img/" . $image);
            }

            $stmt = $db->prepare("DELETE FROM users where id = ? LIMIT 1");
            $stmt->execute(array($id));
            $stmt = $db->prepare("DELETE FROM users_info where id = ? LIMIT 1");
            $stmt->execute(array($id));
        }
        catch(Exception $e){
            print("Error " . $e);
        }
    }

    public static function my_games($id_users){
        $db = model_database::get_instance();
        try{
            $stmt=$db->prepare("SELECT id_users, id_games
                                FROM rel_users_games
                                WHERE id_users = ?");
            $stmt->execute(array($id_users));
            $fin = array();
            while($result = $stmt->fetch()){
                $fin[] = $result['id_games'];
            }
        }
        catch(Exception $e){print("Error " . $e);}
        return $fin;
    }

    public static function edit($id, $name, $password, $mail, $image)
    {
        $db=model_database::get_instance();
        $password = sha1($password);
        try{
            $stmt=$db->prepare("UPDATE users
                                SET name = ?, password = ?
                                WHERE id = ?");
            $stmt->execute(array($name, $password, $id));
            $stmt=$db->prepare("UPDATE users_info
                                SET mail = ?, image = ?
                                WHERE id = ?");
            $stmt->execute(array($mail, $image, $id));
            return true;
        }
        catch(Exception $e){print("Error " . $e);}
    }

    public static function edit2($id, $name, $mail, $image)
    {
        $db=model_database::get_instance();
        try{
            $stmt=$db->prepare("UPDATE users
                                SET name = ?
                                WHERE id = ?");
            $stmt->execute(array($name, $id));
            $stmt=$db->prepare("UPDATE users_info
                                SET mail = ?, image = ?
                                WHERE id = ?");
            $stmt->execute(array($mail, $image, $id));
            return true;
        }
        catch(Exception $e){print("Error " . $e);}
    }

    public static function edit3($id, $password)
    {
        $db=model_database::get_instance();
        $password = sha1($password);
        try{
            $stmt=$db->prepare("UPDATE users
                                SET password = ?
                                WHERE id = ?");
            $stmt->execute(array($password, $id));
            return true;
        }
        catch(Exception $e){print("Error " . $e);}
    }

    public static function edit_admin($id, $admin)
    {
        $db=model_database::get_instance();
        try{
            $stmt=$db->prepare("UPDATE users
                                SET admin = ?
                                WHERE id = ?");
            $stmt->execute(array($admin, $id));
            return true;
        }
        catch(Exception $e){print("Error " . $e);}
    }

    //Sets all admins to 'no' except $id.
    public static function lose_admin($id){
        $db=model_database::get_instance();
        try{
            $stmt=$db->prepare("UPDATE users
                                SET admin = ?
                                WHERE id != ?");
            $stmt->execute(array('no', $id));
            return true;
        }
        catch(Exception $e){print("Error " . $e);}
    }


}
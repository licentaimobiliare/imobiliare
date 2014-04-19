<?php

class model_comments{
    private $id_users;
    private $id_games;
    private $comment;
    private $time;

    function __construct($id_users, $id_games, $comment, $time)
    {
        $this->id_users = $id_users;
        $this->id_games = $id_games;
        $this->comment = $comment;
        $this->time = $time;
    }

    public function setId_users($id_users)
    {
        $this->id_users = $id_users;
    }

    public function getId_users()
    {
        return $this->id_users;
    }

    public function setId_games($id_games)
    {
        $this->id_games= $id_games;
    }

    public function getId_games()
    {
        return $this->id_games;
    }

    public function setComment($comment)
    {
        $this->comment= $comment;
    }

    public function getComment()
    {
        return $this->comment;
    }


    public function setTime($time)
    {
        $this->time = $time;
    }

    public function getTime()
    {
        return $this->time;
    }

    public static function load_u($id_users){
        $db = model_database::get_instance();
        try{
            $stmt = $db->prepare("SELECT * FROM comments WHERE id_users=?");
            $stmt->execute(array($id_users));
            $result=$stmt->fetch();
            $comment=new model_comments($result['id_users'], $result['id_games'], $result['comment'], $result['time']);
            return $comment;
        }
        catch(Exception $e)
        { print("Error ".$e);}
    }

    public static function load_g($id_games){
        $db = model_database::get_instance();
        try{
            $comment=array();
            $stmt = $db->prepare("SELECT * FROM comments WHERE id_games=?");
            $stmt->execute(array($id_games));
            while($result=$stmt->fetch())
            $comment[]=new model_comments($result['id_users'], $result['id_games'], $result['comment'], $result['time']);
            return $comment;
        }
        catch(Exception $e)
        { print("Error ".$e);}
    }

    public static function add($id_users, $id_games, $comment){
        $db = model_database::get_instance();
        try{
            $stmt = $db->prepare("INSERT INTO comments (id_users, id_games, comment) VALUES(?,?,?)");
            $stmt->execute(array($id_users, $id_games, $comment));
           }
        catch(Exception $e)
        { print("Error " . $e);}
    }

    public static function edit($id_games, $time, $comment){
        $db = model_database::get_instance();
        try{
            $stmt = $db->prepare("UPDATE comments SET comment = ? WHERE id_games = ? AND time = ?");
            $stmt->execute(array($comment, $id_games, $time));
        }
        catch(Exeption $e){
            print("Error " . $e);
        }
    }

    public static function delete($id_games, $time){
        $db = model_database::get_instance();
        try{
            $stmt = $db->prepare("DELETE FROM comments WHERE id_games = ? AND time = ? LIMIT 1");
            $stmt->execute(array($id_games, $time));
        }
        catch(Exeption $e){
            print("Error " . $e);
        }
    }


}
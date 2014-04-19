<?php

class model_category{
    private $id;
    private $name;

    function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setName($name)
    {
        $this->name= $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public static function load($id){
        $db=model_database::get_instance();
        try{
            $stmt = $db->prepare("SELECT * FROM categories WHERE id=?");
            $stmt->execute(array($id));
            $result=$stmt->fetch();
            $category=new model_category($result['id'], $result['nume']);
            return $category;
        }
        catch(Exception $e)
        { print("Error ".$e);}
    }

    public static function add($name){
        $db = model_database::get_instance();
        try{
            $stmt = $db->prepare("INSERT INTO categories (nume) VALUES(?)");
            $stmt->execute(array($name));
            $stmt = $db->prepare("SELECT id FROM categories WHERE nume = ?");
            $stmt->execute(array($name));
            $result = $stmt->fetch();
            return $result['id'];
        }
        catch(Exception $e)
        { print("Error ".$e);}
    }

    public static function all(){
        $db = model_database::get_instance();
        try{
            $stmt = $db->prepare("SELECT * FROM categories");
            $stmt->execute();
            $fin=array();
            while($result = $stmt->fetch() )
            {
                $fin[] = model_category::load($result['id']);
            }
            return $fin;
        }
        catch(Exception $e)
        { print("Error ".$e);}
    }

    public static function edit($id, $nume){
        $db = model_database::get_instance();
        try{
            $stmt = $db->prepare("UPDATE categories SET nume = ?  WHERE id = ?");
            if($stmt->execute(array($nume, $id))){
                $category = new model_category($id, $nume);
                return $category;
            }
        }
        catch(Exception $e)
        { print("Error ".$e);}
    }

    public static function delete($id){
        $db = model_database::get_instance();
        try{
            $stmt = $db->prepare("DELETE FROM categories WHERE id = ? LIMIT 1");
            if($stmt->execute(array($id))){
                return true;
            }
        }
        catch(Exception $e)
        { print("Error ".$e);}
    }
}
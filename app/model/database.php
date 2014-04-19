<?php
class model_database{
    private static $connection;

    public static function get_instance(){

        if(empty($connection))
        {
        global $config;
        try{
            $connection= new PDO("mysql:host=localhost;dbname=".$config['database']['name'],$config['database']['user'],
            $config['database']['password']);
            return $connection;
            }
        catch(Exception $e){print("ERROR".$e->getMessage());}
        }
        else return $connection;
    }
}
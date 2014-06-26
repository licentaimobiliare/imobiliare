<?php

class model_Reclamati{
    
    public static function save(array $reclamatie){
        $keys=array();$values=array();
        foreach($reclamatie as $key => $value){
                $keys[]=$key;
                $values[]=$value;
            }
     
        $connection= model_database::get_instance();
        
         $stmt =$connection->prepare('insert into reclamatii('.implode(',', $keys).') values ('. str_pad('', count($values) * 2 - 1, '?,') . ')');        
         try{
            $stmt->execute($values);
            return $connection->lastInsertId();
        }
        catch(Exception $e){
            return false;
        }
    }
    
}


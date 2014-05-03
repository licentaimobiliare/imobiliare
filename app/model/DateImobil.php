<?php

class model_DateImobil{
    public static function adaugafinisaj($finisaj){
    $keys=array();$values=array();
        foreach($finisaj as $key => $value){
                $keys[]=$key;
                $values[]=$value;
            }
     
        $connection= model_database::get_instance();
        
         $stmt =$connection->prepare('insert into finisaje('.implode(',', $keys).') values ('. str_pad('', count($values) * 2 - 1, '?,') . ')');        
         try{
            $stmt->execute($values);
            return $connection->lastInsertId();
        }
        catch(Exception $e){
            return false;
        }
}
}


        
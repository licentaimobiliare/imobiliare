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

    public static function FinisajGetById($id)
    {    
    $connection= model_database::get_instance();
        if(is_array($id))
        {
             $stmt = $connection->prepare('select * from finisaje                                
                                        where idf in (' . str_pad('', count($id) * 2 - 1, '?,') . ')'
                . 'order by FIELD(idf ,'.str_pad('', count($id) * 2 - 1, '?,').')');                      
             $orderid= array_merge_recursive($id,$id);
             //var_dump($orderid);
            $stmt ->execute($orderid);
            $results = $stmt -> fetchAll(PDO::FETCH_OBJ);
            
        }
        else
        {      
        $stmt = $connection -> prepare('Select * from finisaje where idf = ?');
        $stmt-> execute(array($id));
        $results = $stmt ->fetchObject();
        }
        return $results;
   }
   
   
   public static function FinisajGetByName($name)
   {
       
       $connection= model_database::get_instance();
       $stmt = $connection -> prepare("Select * from finisaje where finisaj=?" );
       
       $stmt-> execute(array($name));
       var_dump($stmt);
       //var_dump($results);
       $results = $stmt ->fetchObject(); 
       var_dump($results);
       return $results;
       
   }
   
    public static function FinisajListName($name)
   {
       
       $connection= model_database::get_instance();
       $stmt = $connection -> prepare("Select * from finisaje where finisaj ='?'" );
       
       $stmt-> execute(array($name).'%');
       //var_dump($stmt);
       //var_dump($results);
       $results = $stmt -> fetchAll(PDO::FETCH_OBJ);
       //var_dump($results);
       return $results;
       
   }
   
   public static function deletefinisaj($id)
   {   
         $connection= model_database::get_instance();
        
         $stmt =$connection->prepare("delete from finisaje where idf= $id");    
         //var_dump($stmt);
         try{
            $stmt->execute(array($id));
           // var_dump($values);
            return true;
        } 
        catch(Exception $e){
            
            return false;
            
        }  
   }
   
   public static function updatefinisaj($id)
   {
       $connection= model_database::get_instance();
        
         $stmt =$connection->prepare("update from finisaje where idf= $id");    
         //var_dump($stmt);
         try{
            $stmt->execute(array($id));
           // var_dump($values);
            return true;
        } 
        catch(Exception $e){
            
            return false;
            
        }  
   }
   
    public static function adaugatc($tc){
    $keys=array();$values=array();
        foreach($tc as $key => $value){
                $keys[]=$key;
                $values[]=$value;
            }
     
        $connection= model_database::get_instance();
        
         $stmt =$connection->prepare('insert into tip_constructii('.implode(',', $keys).') values ('. str_pad('', count($values) * 2 - 1, '?,') . ')');        
         try{
            $stmt->execute($values);
            return $connection->lastInsertId();
        }
        catch(Exception $e){
            return false;
        }
    }
    
    public static function adaugatl($tl){
    $keys=array();$values=array();
        foreach($tl as $key => $value){
                $keys[]=$key;
                $values[]=$value;
            }
     
        $connection= model_database::get_instance();
        
         $stmt =$connection->prepare('insert into tip_locuinte('.implode(',', $keys).') values ('. str_pad('', count($values) * 2 - 1, '?,') . ')');        
         try{
            $stmt->execute($values);
            return $connection->lastInsertId();
        }
        catch(Exception $e){
            return false;
        }
    }
    
    public static function adaugats($ts){
    $keys=array();$values=array();
        foreach($ts as $key => $value){
                $keys[]=$key;
                $values[]=$value;
            }
     
        $connection= model_database::get_instance();
        
         $stmt =$connection->prepare('insert into tip_strada('.implode(',', $keys).') values ('. str_pad('', count($values) * 2 - 1, '?,') . ')');        
         try{
            $stmt->execute($values);
            return $connection->lastInsertId();
        }
        catch(Exception $e){
            return false;
        }
    }
    
    public static function adaugati($ti){
    $keys=array();$values=array();
        foreach($ti as $key => $value){
                $keys[]=$key;
                $values[]=$value;
            }
     
        $connection= model_database::get_instance();
        
         $stmt =$connection->prepare('insert into tip_imobil('.implode(',', $keys).') values ('. str_pad('', count($values) * 2 - 1, '?,') . ')');        
         try{
            $stmt->execute($values);
            return $connection->lastInsertId();
        }
        catch(Exception $e){
            return false;
        }
    }
    
    public static function adaugaserviciu($serviciu){
    $keys=array();$values=array();
        foreach($serviciu as $key => $value){
                $keys[]=$key;
                $values[]=$value;
            }
     
        $connection= model_database::get_instance();
        
         $stmt =$connection->prepare('insert into servicii('.implode(',', $keys).') values ('. str_pad('', count($values) * 2 - 1, '?,') . ')');        
         try{
            $stmt->execute($values);
            return $connection->lastInsertId();
        }
        catch(Exception $e){
            return false;
        }
    }
    
    public static function adaugacp($cp){
    $keys=array();$values=array();
        foreach($cp as $key => $value){
                $keys[]=$key;
                $values[]=$value;
            }
     
        $connection= model_database::get_instance();
        
         $stmt =$connection->prepare('insert into coduri_postale('.implode(',', $keys).') values ('. str_pad('', count($values) * 2 - 1, '?,') . ')');        
         try{
            $stmt->execute($values);
            return $connection->lastInsertId();
        }
        catch(Exception $e){
            return false;
        }
    }
    
    public static function adaugauser($user){
    $keys=array();$values=array();
        foreach($user as $key => $value){
                $keys[]=$key;
                $values[]=$value;
            }
     
        $connection= model_database::get_instance();
        
         $stmt =$connection->prepare('insert into users('.implode(',', $keys).') values ('. str_pad('', count($values) * 2 - 1, '?,') . ')');        
         try{
            $stmt->execute($values);
            return $connection->lastInsertId();
        }
        catch(Exception $e){
            return false;
        }
    }
    
    public static function adauganumar($numar){
    $keys=array();$values=array();
        foreach($numar as $key => $value){
                $keys[]=$key;
                $values[]=$value;
            }
     
        $connection= model_database::get_instance();
        
         $stmt =$connection->prepare('insert into numar('.implode(',', $keys).') values ('. str_pad('', count($values) * 2 - 1, '?,') . ')');        
         try{
            $stmt->execute($values);
            return $connection->lastInsertId();
        }
        catch(Exception $e){
            return false;
        }
    }
    
    public static function adaugaclient($client){
    $keys=array();$values=array();
        foreach($client as $key => $value){
                $keys[]=$key;
                $values[]=$value;
            }
     
        $connection= model_database::get_instance();
        
         $stmt =$connection->prepare('insert into clienti('.implode(',', $keys).') values ('. str_pad('', count($values) * 2 - 1, '?,') . ')');        
         try{
            $stmt->execute($values);
            return $connection->lastInsertId();
        }
        catch(Exception $e){
            return false;
        }
    }
    
    public static function adaugamarkers($marker){
    $keys=array();$values=array();
        foreach($markers as $key => $value){
                $keys[]=$key;
                $values[]=$value;
            }
     
        $connection= model_database::get_instance();
        
         $stmt =$connection->prepare('insert into markers('.implode(',', $keys).') values ('. str_pad('', count($values) * 2 - 1, '?,') . ')');        
         try{
            $stmt->execute($values);
            return $connection->lastInsertId();
        }
        catch(Exception $e){
            return false;
        }
     }
     
     public static function tcGetById($id)
    {    
    $connection= model_database::get_instance();
        if(is_array($id))
        {
             $stmt = $connection->prepare('select * from tip_constructii                                
                                        where idtc in (' . str_pad('', count($id) * 2 - 1, '?,') . ')'
                . 'order by FIELD(idtc ,'.str_pad('', count($id) * 2 - 1, '?,').')');                      
             $orderid= array_merge_recursive($id,$id);
             //var_dump($orderid);
            $stmt ->execute($orderid);
            $results = $stmt -> fetchAll(PDO::FETCH_OBJ);
            
        }
        else
        {     
        $stmt = $connection -> prepare('Select * from tip_constructii where idtc = ?');
        $stmt-> execute(array($id));
        $results = $stmt ->fetchObject();
        }
        return $results;
   }
   
      public static function tlGetById($id)
    {    
    $connection= model_database::get_instance();
        if(is_array($id))
        {
             $stmt = $connection->prepare('select * from tip_locuinte                                
                                        where idtl in (' . str_pad('', count($id) * 2 - 1, '?,') . ')'
                . 'order by FIELD(idtl ,'.str_pad('', count($id) * 2 - 1, '?,').')');                      
             $orderid= array_merge_recursive($id,$id);
             //var_dump($orderid);
            $stmt ->execute($orderid);
            $results = $stmt -> fetchAll(PDO::FETCH_OBJ);
            
        }
        else
        {     
        $stmt = $connection -> prepare('Select * from tip_locuinte where idtl = ?');
        $stmt-> execute(array($id));
        $results = $stmt ->fetchObject();
        }
        return $results;
   }
   
   public static function tiGetById($id)
    {    
    $connection= model_database::get_instance();
        if(is_array($id))
        {
             $stmt = $connection->prepare('select * from tip_imobil                                
                                        where idti in (' . str_pad('', count($id) * 2 - 1, '?,') . ')'
                . 'order by FIELD(idti ,'.str_pad('', count($id) * 2 - 1, '?,').')');                      
             $orderid= array_merge_recursive($id,$id);
             //var_dump($orderid);
            $stmt ->execute($orderid);
            $results = $stmt -> fetchAll(PDO::FETCH_OBJ);
            
        }
        else
        {     
        $stmt = $connection -> prepare('Select * from tip_imobil where idtl = ?');
        $stmt-> execute(array($id));
        $results = $stmt ->fetchObject();
        }
        return $results;
   }
   
   public static function tsGetById($id)
    {    
    $connection= model_database::get_instance();
        if(is_array($id))
        {
             $stmt = $connection->prepare('select * from tip_strazi                                
                                        where idts in (' . str_pad('', count($id) * 2 - 1, '?,') . ')'
                . 'order by FIELD(idts ,'.str_pad('', count($id) * 2 - 1, '?,').')');                      
             $orderid= array_merge_recursive($id,$id);
             //var_dump($orderid);
            $stmt ->execute($orderid);
            $results = $stmt -> fetchAll(PDO::FETCH_OBJ);
            
        }
        else
        {      
        $stmt = $connection -> prepare('Select * from tip_strazi where idts = ?');
        $stmt-> execute(array($id));
        $results = $stmt ->fetchObject();
        }
        return $results;
   }
   
   public static function numarGetById($id)
    {    
    $connection= model_database::get_instance();
        if(is_array($id))
        {
             $stmt = $connection->prepare('select * from numar                                
                                        where idn in (' . str_pad('', count($id) * 2 - 1, '?,') . ')'
                . 'order by FIELD(idn ,'.str_pad('', count($id) * 2 - 1, '?,').')');                      
             $orderid= array_merge_recursive($id,$id);
             //var_dump($orderid);
            $stmt ->execute($orderid);
            $results = $stmt -> fetchAll(PDO::FETCH_OBJ);
            
        }
        else
        {    
        $stmt = $connection -> prepare('Select * from numar where idn = ?');
        $stmt-> execute(array($id));
        $results = $stmt ->fetchObject();
        }
        return $results;
   }
   
   public static function cpGetById($id)
    {    
    $connection= model_database::get_instance();
        if(is_array($id))
        {
             $stmt = $connection->prepare('select * from coduri_postale                                
                                        where idcp in (' . str_pad('', count($id) * 2 - 1, '?,') . ')'
                . 'order by FIELD(idcp ,'.str_pad('', count($id) * 2 - 1, '?,').')');                      
             $orderid= array_merge_recursive($id,$id);
             //var_dump($orderid);
            $stmt ->execute($orderid);
            $results = $stmt -> fetchAll(PDO::FETCH_OBJ);
            
        }
        else
        {      
        $stmt = $connection -> prepare('Select * from coduri_postale where idcp = ?');
        $stmt-> execute(array($id));
        $results = $stmt ->fetchObject();
        }
        return $results;
   }
   
   public static function usersGetById($id)
    {    
    $connection= model_database::get_instance();
        if(is_array($id))
        {
             $stmt = $connection->prepare('select * from users                                
                                        where iduser in (' . str_pad('', count($id) * 2 - 1, '?,') . ')'
                . 'order by FIELD(iduser ,'.str_pad('', count($id) * 2 - 1, '?,').')');                      
             $orderid= array_merge_recursive($id,$id);
             //var_dump($orderid);
            $stmt ->execute($orderid);
            $results = $stmt -> fetchAll(PDO::FETCH_OBJ);
            
        }
        else
        {      
        $stmt = $connection -> prepare('Select * from users where iduser = ?');
        $stmt-> execute(array($id));
        $results = $stmt ->fetchObject();
        }
        return $results;
   }
   
   public static function markersGetById($id)
    {    
    $connection= model_database::get_instance();
        if(is_array($id))
        {
             $stmt = $connection->prepare('select * from markers                                
                                        where id in (' . str_pad('', count($id) * 2 - 1, '?,') . ')'
                . 'order by FIELD(id ,'.str_pad('', count($id) * 2 - 1, '?,').')');                      
             $orderid= array_merge_recursive($id,$id);
             //var_dump($orderid);
            $stmt ->execute($orderid);
            $results = $stmt -> fetchAll(PDO::FETCH_OBJ);
            
        }
        else
        {      
        $stmt = $connection -> prepare('Select * from markers where id = ?');
        $stmt-> execute(array($id));
        $results = $stmt ->fetchObject();
        }
        return $results;
   }
   
   public static function serviciiGetById($id)
    {    
    $connection= model_database::get_instance();
        if(is_array($id))
        {
             $stmt = $connection->prepare('select * from servicii                                
                                        where ids in (' . str_pad('', count($id) * 2 - 1, '?,') . ')'
                . 'order by FIELD(ids ,'.str_pad('', count($id) * 2 - 1, '?,').')');                      
             $orderid= array_merge_recursive($id,$id);
             //var_dump($orderid);
            $stmt ->execute($orderid);
            $results = $stmt -> fetchAll(PDO::FETCH_OBJ);
            
        }
        else
        {      
        $stmt = $connection -> prepare('Select * from servicii where ids = ?');
        $stmt-> execute(array($id));
        $results = $stmt ->fetchObject();
        }
        return $results;
   }
   
   public static function clientiGetById($id)
    {    
    $connection= model_database::get_instance();
        if(is_array($id))
        {
             $stmt = $connection->prepare('select * from clienti                                
                                        where cnp in (' . str_pad('', count($id) * 2 - 1, '?,') . ')'
                . 'order by FIELD(cnp ,'.str_pad('', count($id) * 2 - 1, '?,').')');                      
             $orderid= array_merge_recursive($id,$id);
             //var_dump($orderid);
            $stmt ->execute($orderid);
            $results = $stmt -> fetchAll(PDO::FETCH_OBJ);
            
        }
        else
        {
        $stmt = $connection -> prepare('Select * from clienti where cnp = ?');
        $stmt-> execute(array($id));
        $results = $stmt ->fetchObject();
        }
        return $results;
   }
   
   public static function proprietariGetById($id)
    {    
    $connection= model_database::get_instance();
        if(is_array($id))
        {
             $stmt = $connection->prepare('select * from proprietari                               
                                        where cnp in (' . str_pad('', count($id) * 2 - 1, '?,') . ')'
                . 'order by FIELD(cnp ,'.str_pad('', count($id) * 2 - 1, '?,').')');                      
             $orderid= array_merge_recursive($id,$id);
             //var_dump($orderid);
            $stmt ->execute($orderid);
            $results = $stmt -> fetchAll(PDO::FETCH_OBJ);
            
        }
        else
        {
        $stmt = $connection -> prepare('Select * from proprietari where cnp = ?');
        $stmt-> execute(array($id));
        $results = $stmt ->fetchObject();
        }
        return $results;
   }
}




        
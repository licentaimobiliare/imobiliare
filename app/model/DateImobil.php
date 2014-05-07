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
       $results = $stmt ->fetchObject(); 
       return $results;
       
   }
   
    public static function FinisajListName($name)
   {
       $connection= model_database::get_instance();
       $stmt = $connection -> prepare("Select * from finisaje where finisaj like ?" );     
       $stmt-> execute(array($name.'%'));
        $results = $stmt -> fetchAll(PDO::FETCH_OBJ);
       return $results;
   }
   
   public static function deletefinisaj($id)
   {   
         $connection= model_database::get_instance();
        
         $stmt =$connection->prepare("delete from finisaje where idf= $id");           
         try{
            $stmt->execute(array($id));         
            return true;
        } 
        catch(Exception $e){  
            return false;
        }  
   }
   
   public static function updatefinisaj($a)
   {         
         $connection= model_database::get_instance();
         $stmt =$connection->prepare("update finisaje set finisaj=? where idf=?");    
         $stmt->execute(array($a['finisaj'],$a['idf']));
         $object = new stdClass();
         $object->finisaj = $a['finisaj'] ;
         $object->idf = $a['idf'] ;  
         return $object;
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
   
    public static function deletetc($id)
   {   
         $connection= model_database::get_instance();
        
         $stmt =$connection->prepare("delete from tip_constructii where idtc= $id");           
         try{
            $stmt->execute(array($id));         
            return true;
        } 
        catch(Exception $e){  
            return false;
        }  
   }
   
   public static function deletetl($id)
   {   
         $connection= model_database::get_instance();
        
         $stmt =$connection->prepare("delete from tip_locuinte where idtl= $id");           
         try{
            $stmt->execute(array($id));         
            return true;
        } 
        catch(Exception $e){  
            return false;
        }  
   }
   
   public static function deleteti($id)
   {   
         $connection= model_database::get_instance();
        
         $stmt =$connection->prepare("delete from tip_imobil where idti= $id");           
         try{
            $stmt->execute(array($id));         
            return true;
        } 
        catch(Exception $e){  
            return false;
        }  
   }
   
   public static function deletets($id)
   {   
         $connection= model_database::get_instance();
        
         $stmt =$connection->prepare("delete from tip_strazi where idts= $id");           
         try{
            $stmt->execute(array($id));         
            return true;
        } 
        catch(Exception $e){  
            return false;
        }  
   }
   
   public static function deletenumar($id)
   {   
         $connection= model_database::get_instance();
        
         $stmt =$connection->prepare("delete from numar where numar= $id");           
         try{
            $stmt->execute(array($id));         
            return true;
        } 
        catch(Exception $e){  
            return false;
        }  
   }
   
   public static function deletecp($id)
   {   
         $connection= model_database::get_instance();
        
         $stmt =$connection->prepare("delete from coduri_postale where idcp= $id");           
         try{
            $stmt->execute(array($id));         
            return true;
        } 
        catch(Exception $e){  
            return false;
        }  
   }
   
   public static function deleteusers($id)
   {   
         $connection= model_database::get_instance();
        
         $stmt =$connection->prepare("delete from users where iduser= $id");           
         try{
            $stmt->execute(array($id));         
            return true;
        } 
        catch(Exception $e){  
            return false;
        }  
   }
   
   public static function deletemarkers($id)
   {   
         $connection= model_database::get_instance();
        
         $stmt =$connection->prepare("delete from markers where id= $id");           
         try{
            $stmt->execute(array($id));         
            return true;
        } 
        catch(Exception $e){  
            return false;
        }  
   }
   
   public static function deleteservicii($id)
   {   
         $connection= model_database::get_instance();
        
         $stmt =$connection->prepare("delete from servicii where ids= $id");           
         try{
            $stmt->execute(array($id));         
            return true;
        } 
        catch(Exception $e){  
            return false;
        }  
   }
   
   public static function deleteclienti($id)
   {   
         $connection= model_database::get_instance();
        
         $stmt =$connection->prepare("delete from clienti where cnp= $id");           
         try{
            $stmt->execute(array($id));         
            return true;
        } 
        catch(Exception $e){  
            return false;
        }  
   }
   
   public static function deleteproprietari($id)
   {   
         $connection= model_database::get_instance();
        
         $stmt =$connection->prepare("delete from proprietari where cnp= $id");           
         try{
            $stmt->execute(array($id));         
            return true;
        } 
        catch(Exception $e){  
            return false;
        }  
   }
   
   public static function tcGetByName($name)
   {       
       $connection= model_database::get_instance();
       $stmt = $connection -> prepare("Select * from tip_constructii where tip_constructie=?" );       
       $stmt-> execute(array($name));
       $results = $stmt ->fetchObject(); 
       return $results;     
   }
   
    public static function tcListName($name)
   {
       $connection= model_database::get_instance();
       $stmt = $connection -> prepare("Select * from tip_constructii where tip_constructie like ?" );     
       $stmt-> execute(array($name.'%'));
        $results = $stmt -> fetchAll(PDO::FETCH_OBJ);
       return $results;
   }
   
   public static function tlGetByName($name)
   {       
       $connection= model_database::get_instance();
       $stmt = $connection -> prepare("Select * from tip_locuinte where tip_locuinta=?" );       
       $stmt-> execute(array($name));
       $results = $stmt ->fetchObject(); 
       return $results;    
   }
   
    public static function tlListName($name)
   {
       $connection= model_database::get_instance();
       $stmt = $connection -> prepare("Select * from tip_locuinte where tip_locuinta like ?" );     
       $stmt-> execute(array($name.'%'));
        $results = $stmt -> fetchAll(PDO::FETCH_OBJ);
       return $results;
   }
   
   public static function tiGetByName($name)
   {       
       $connection= model_database::get_instance();
       $stmt = $connection -> prepare("Select * from tip_imobil where tip_imobil=?" );       
       $stmt-> execute(array($name));
       $results = $stmt ->fetchObject(); 
       return $results;      
   }
   
    public static function tiListName($name)
   {
       $connection= model_database::get_instance();
       $stmt = $connection -> prepare("Select * from tip_imobil where tip_imobil like ?" );     
       $stmt-> execute(array($name.'%'));
        $results = $stmt -> fetchAll(PDO::FETCH_OBJ);
       return $results;
   }
   
   public static function tsGetByName($name)
   {       
       $connection= model_database::get_instance();
       $stmt = $connection -> prepare("Select * from tip_strazi where tip_strada=?" );       
       $stmt-> execute(array($name));
       $results = $stmt ->fetchObject(); 
       return $results;     
   }
   
    public static function tsListName($name)
   {
       $connection= model_database::get_instance();
       $stmt = $connection -> prepare("Select * from tip_strazi where tip_strada like ?" );     
       $stmt-> execute(array($name.'%'));
        $results = $stmt -> fetchAll(PDO::FETCH_OBJ);
       return $results;
   }
   
   public static function numarGetByName($name)
   {       
       $connection= model_database::get_instance();
       $stmt = $connection -> prepare("Select * from numar where numar=?" );       
       $stmt-> execute(array($name));
       $results = $stmt ->fetchObject(); 
       return $results;     
   }
   
    public static function numarListName($name)
   {
       $connection= model_database::get_instance();
       $stmt = $connection -> prepare("Select * from numar where numar like ?" );     
       $stmt-> execute(array($name.'%'));
        $results = $stmt -> fetchAll(PDO::FETCH_OBJ);
       return $results;
   }
   
   public static function cpGetByName($name)
   {       
       $connection= model_database::get_instance();
       $stmt = $connection -> prepare("Select * from coduri_postale where cod_postal=?" );       
       $stmt-> execute(array($name));
       $results = $stmt ->fetchObject(); 
       return $results;       
   }
   
    public static function cpListName($name)
   {
       $connection= model_database::get_instance();
       $stmt = $connection -> prepare("Select * from coduri_postale where cod_postal like ?" );     
       $stmt-> execute(array($name.'%'));
        $results = $stmt -> fetchAll(PDO::FETCH_OBJ);
       return $results;
   }
   
   public static function usersGetByName($name)
   {       
       $connection= model_database::get_instance();
       $stmt = $connection -> prepare("Select * from users where nume_user=?" );       
       $stmt-> execute(array($name));
       $results = $stmt ->fetchObject(); 
       return $results;      
   }
   
    public static function usersListName($name)
   {
       $connection= model_database::get_instance();
       $stmt = $connection -> prepare("Select * from users where nume_user like ?" );     
       $stmt-> execute(array($name.'%'));
        $results = $stmt -> fetchAll(PDO::FETCH_OBJ);
       return $results;
   }
   
   public static function markersGetByName($name)
   {       
       $connection= model_database::get_instance();
       $stmt = $connection -> prepare("Select * from markers where name=?" );       
       $stmt-> execute(array($name));
       $results = $stmt ->fetchObject(); 
       return $results;     
   }
   
    public static function markersListName($name)
   {
       $connection= model_database::get_instance();
       $stmt = $connection -> prepare("Select * from markers where name like ?" );     
       $stmt-> execute(array($name.'%'));
        $results = $stmt -> fetchAll(PDO::FETCH_OBJ);
       return $results;
   }
   
   public static function serviciiGetByName($name)
   {       
       $connection= model_database::get_instance();
       $stmt = $connection -> prepare("Select * from servicii where serviciu=?" );       
       $stmt-> execute(array($name));
       $results = $stmt ->fetchObject(); 
       return $results;     
   }
   
    public static function serviciiListName($name)
   {
       $connection= model_database::get_instance();
       $stmt = $connection -> prepare("Select * from servicii where serviciu like ?" );     
       $stmt-> execute(array($name.'%'));
        $results = $stmt -> fetchAll(PDO::FETCH_OBJ);
       return $results;
   }
   
   public static function clientiGetByName($name)
   {       
       $connection= model_database::get_instance();
       $stmt = $connection -> prepare("Select * from clienti where cnp=?" );       
       $stmt-> execute(array($name));
       $results = $stmt ->fetchObject(); 
       return $results;     
   }
   
    public static function clientiListName($name)
   {
       $connection= model_database::get_instance();
       $stmt = $connection -> prepare("Select * from clienti where cnp like ?" );     
       $stmt-> execute(array($name.'%'));
        $results = $stmt -> fetchAll(PDO::FETCH_OBJ);
       return $results;
   }
   
   public static function proprietariGetByName($name)
   {       
       $connection= model_database::get_instance();
       $stmt = $connection -> prepare("Select * from proprietari where cnp=?" );       
       $stmt-> execute(array($name));
       $results = $stmt ->fetchObject(); 
       return $results;
   }
   
    public static function proprietariListName($name)
   {
       $connection= model_database::get_instance();
       $stmt = $connection -> prepare("Select * from proprietari where cnp like ?" );     
       $stmt-> execute(array($name.'%'));
        $results = $stmt -> fetchAll(PDO::FETCH_OBJ);
       return $results;
   }
   
   public static function updatetc($a)
   {         
         $connection= model_database::get_instance();
         $stmt =$connection->prepare("update tip_constructii set tip_constructie=? where idtc=?");    
         $stmt->execute(array($a['tip_constructie'],$a['idtc']));
         $object = new stdClass();
         $object->tip_constructie = $a['tip_constructie'] ;
         $object->idtc = $a['idtc'] ;  
         return $object;
   }
   
   public static function updatetl($a)
   {         
         $connection= model_database::get_instance();
         $stmt =$connection->prepare("update tip_locuinte set tip_locuinta=? where idtl=?");    
         $stmt->execute(array($a['tip_locuinta'],$a['idtl']));
         $object = new stdClass();
         $object->tip_locuinta = $a['tip_locuinta'] ;
         $object->idtl = $a['idtl'] ;  
         return $object;
   }
   
    public static function updateti($a)
   {         
         $connection= model_database::get_instance();
         $stmt =$connection->prepare("update tip_imobil set tip_imobil=? where idti=?");    
         $stmt->execute(array($a['tip_imobil'],$a['idti']));
         $object = new stdClass();
         $object->tip_imobil = $a['tip_imobil'] ;
         $object->idti = $a['idti'] ;  
         return $object;
   }
   
    public static function updatets($a)
   {         
         $connection= model_database::get_instance();
         $stmt =$connection->prepare("update tip_strazi set tip_strada=? where idts=?");    
         $stmt->execute(array($a['tip_strada'],$a['idts']));
         $object = new stdClass();
         $object->tip_strada = $a['tip_strada'] ;
         $object->idts = $a['idts'] ;  
         return $object;
   }
   
    public static function updatenumar($a)
   {         
         $connection= model_database::get_instance();
         $stmt =$connection->prepare("update numar set numar=? where idn=?");    
         $stmt->execute(array($a['numar'],$a['idn']));
         $object = new stdClass();
         $object->numar = $a['numar'] ;
         $object->idn = $a['idn'] ;  
         return $object;
   }
   
    public static function updatecp($a)
   {         
         $connection= model_database::get_instance();
         $stmt =$connection->prepare("update coduri_postale set cod_postal=? where idcp=?");    
         $stmt->execute(array($a['cod_postal'],$a['idcp']));
         $object = new stdClass();
         $object->cod_postal = $a['cod_postal'] ;
         $object->idcp = $a['idcp'] ;  
         return $object;
   }
   
    public static function updateusers($a)
   {         
         $connection= model_database::get_instance();
         $stmt =$connection->prepare("update users set nume_user=?,parola=?,mentiuni=?,telefon=?,email=?,tip=? where iduser=?");    
         $stmt->execute(array($a['nume_user'],$a['parola'],$a['mentiuni'],$a['telefon'],$a['email'],$a['tip'],$a['iduser']));
         $object = new stdClass();
         $object->nume_user = $a['nume_user'] ;
         $object->parola = $a['parola'] ;
         $object-> mentiuni= $a['mentiuni'] ;
         $object->telefon = $a['telefon'] ;
         $object->email = $a['email'] ;
         $object->tip = $a['tip'] ;
         $object->iduser = $a['iduser'] ;  
         return $object;
   }
   
   
}




        
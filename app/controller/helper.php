<?php

class controller_helper {
    
   
    
    public static function login(){
       
         global $sec;
          $connection = model_database::get_instance();
	$sql = $connection->prepare("SELECT nume_user, parola FROM users where nume_user=?");
         $sql ->execute(array($_POST['txtuser']));
         $resursa = $sql -> fetchAll(PDO::FETCH_OBJ);
         //var_dump($resursa);
		if(count($resursa) == 0) 
                    $sec=0;
                 else 
                     if($resursa[0]->parola == $_POST['txtpass']) 
                             $sec=1;
                 else 
                   $sec=2;
                       //var_dump($resursa)  ;
	return $sec;
    
}
    public static function inregistrare($date)
    {
      
		if($date['nume_client']=="" || $date['adresa']=="" || $date['adresa_email']=="" || $date['telefon']=="" || $date['pass']=="" || $date['pass2']=="")

                return false;

	//formular cont nou
	if ($date['pass']==$date['pass2'])//parolele trebuie sa corespunda
	{       $connection = model_database::get_instance();
		$sqlClienti= "INSERT INTO users (nume_user, mentiuni, email,telefon, parola) VALUES (?,?,?,?,?)";
                $stmt = $connection->prepare($sqlClienti)  ;
                $stmt->execute(array($date['nume_client'],$date['adresa'],$date['adresa_email'],$date['telefon'],$date['pass']));
		$id = $connection->lastInsertId();
      
                if (isset($id))
                {
                    $user = array();
                    $user['id']=$id;
                    $user['nume_user']=$date['nume_client'];
                    $user['adresa']=$date['adresa'];
                    $user['email'] =$date['adresa_email'];
                    $user['telefon']=$date['telefon'];
                    $user['parola']=$date['pass'];
                    return $user;
                }
                else
                    return false;
		
    }
    }
    }
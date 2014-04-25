<?php

class controller_helper {
    
   
    
    public  function login(){
       
         global $sec;
          $connection = model_database::get_instance();
	$sql = $connection->prepare("SELECT nume_user, parola FROM users where nume_user=?");
         $sql ->execute(array($_POST['txtuser']));
         $resursa = $sql -> fetchAll(PDO::FETCH_OBJ);
         //var_dump($resursa);
		if(count($resursa) == 0) 
                    echo "Nu exista acest utilizator in baza de date";
                 else 
                     if($resursa[0]->parola == $_POST['txtpass']) 
                             $sec=1;
                 else 
                    echo "Parola introdusa este gresita";
                       //var_dump($resursa)  ;
	return $sec;
    
}
}
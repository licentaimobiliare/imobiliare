<?php

class controller_helper {
    
    public  function login(){
        global $sec;
         $connection = model_database::get_instance();
	 
			 $sql = $connection->prepare("SELECT nume_user, parola FROM users");
                         $sql ->execute();
                         $resursa = $sql -> fetchAll(PDO::FETCH_OBJ);
                  
		if (($_SESSION['txtuser']!='') && ($_SESSION['txtpass']!=''))
		{
                    
			while($row=mysql_fetch_array($resursa))
			{
				if($_SESSION['txtuser']==$row['nume_user'] && $_SESSION['txtpass']==$row['parola']) 
						$sec=1;
			}
		}
	return $sec;
    
}
}
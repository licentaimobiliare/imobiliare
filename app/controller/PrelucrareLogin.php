<?php
/**
 * Controller for homepage and general pages.
 */
class controller_PrelucrareLogin {

	function action_index($params) {

            $connection = model_database::get_instance();
	 
             
		if($_POST['txtuser']=="")
	{
		print '<font color="red">Trebuie sa completezi acest camp!</font><br>';
		
	}
	if($_POST['txtpass']=="")
	{
		print '<font color="red">Trebuie sa completezi acest camp!</font><br>';
		
	}
	if ($_POST['txtuser']=="" || $_POST['txtpass']=="") print '<a href="login1.php">Back</a>';
	$ok=0;
	$_SESSION['txtuser']=$_POST['txtuser'];
	$_SESSION['txtpass']=$_POST['txtpass'];
       // var_dump($_SESSION);
        //echo "da";die;
	 $sql = $connection->prepare("SELECT nume_user, parola FROM users where nume_user=?");
         $sql ->execute(array($_POST['txtuser']));
         $resursa = $sql -> fetchAll(PDO::FETCH_OBJ);
                         
        if(count($resursa) == 0) 
            echo "Nu exista acest utilizator in baza de date";
         else 
           if($resursa[0]->parola == $_POST['txtpass']) 
               $ok=1;
           else 
                    echo "Parola introdusa este gresita";
                       //var_dump($resursa)  ;
	
        
	if ($ok==1)//in caz afirmativ afisare username-ul clientului
	{
		
		print 'Welcome,'.$_SESSION['txtuser'];
		print '<br><a href="/index.php">Back</a>';//se va afisa in browser numele acestuia si un mesaj de bun venit
	}
	/*else
           // if ok=0
	{
		
		echo '<font color="red">Numele de utilizator si parola sunt gresite!</font><br>';
		print '<a href="/index.php/login/index">Inapoi la pagina de logare!</a>';
	}*/
	     header ("location:/index.php");
		//@include_once APP_PATH . 'view/PrelucrareLogin_index.tpl.php';
	
	}
        }

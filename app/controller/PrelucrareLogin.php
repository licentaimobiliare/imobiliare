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
	 $sql = $connection->prepare("SELECT nume_user, parola FROM users");
         $sql ->execute();
         $resursa = $sql -> fetchAll(PDO::FETCH_OBJ);
                         
                       
                       //var_dump($resursa)  ;
	
	while($row=mysql_fetch_array($resursa))
	{
		if($_SESSION['txtuser']==$row['nume_user'] && $_SESSION['txtpass']==$row['parola']) $ok=1;//verificam daca exista memorata o persoana cu username-ul 
																		//si parola specifica
	}
	if ($ok==1)//in caz afirmativ afisare username-ul clientului
	{
		
		print 'Welcome,'.$_SESSION['txtuser'];
		print '<br><a href="/index.php">Back</a>';//se va afisa in browser numele acestuia si un mesaj de bun venit
	}
	else
	{
		
		echo '<font color="red">Numele de utilizator si parola sunt gresite!</font><br>';
		print '<a href="login.php">Inapoi la pagina de logare!</a>';
	}
	    // header ("location:/index.php");
		@include_once APP_PATH . 'view/PrelucrareLogin_index.tpl.php';
	
	}
        }

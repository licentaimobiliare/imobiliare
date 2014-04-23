<?php
/**
 * Controller for homepage and general pages.
 */
class controller_PrelucrareInregistrare {

	function action_index($params) {
	
		if($_POST['nume_client']=="")
	{
		print '<font color="red" >Trebuie sa completezi acest camp!</font><br>';
		
	}
	if($_POST['adresa']=="")
	{
		print '<font color="red" >Trebuie sa completezi acest camp!</font>';
		
	}
	if($_POST['adresa_email']=="")
	{
		print '<font color="red" >Trebuie sa completezi acest camp!</font><br>';
		
	}
	if($_POST['telefon']=="")
	{
		print '<font color="red" >Trebuie sa completezi acest camp!</font><br>';
		
	}
	if($_POST['pass']=="")
	{
		print '<font color="red" >Trebuie sa completezi acest camp!</font><br>';
		
	}
	if($_POST['pass2']=="")
	{
		print '<font color="red" >Trebuie sa completezi acest camp!</font><br>';
		
	}
	
	if ($_POST['pass']!=$_POST['pass2'])
	{
		print '<font color="red" >Parolele nu se potrivesc!Incearca din nou!</font><br><a href="login.php">Inapoi</a>';
		
	}
	if ($_POST['nume_client']=="" || $_POST['adresa']=="" || $_POST['adresa_email']=="" || $_POST['telefon']=="" || $_POST['pass']==""
	||$_POST['pass2']=="") print '<a href="login.php">Back</a>';

	
	//formular cont nou
	
	if ($_POST['pass']==$_POST['pass2'] && $_POST['pass']!="" && $_POST['pass2']!="" )//parolele trebuie sa corespunda
	{
		//inseram in tabelul Clienti informatiile introduse de utilizator, in cazul in care e nou utilizator
		$sqlClienti="INSERT INTO users (nume_user, adresa, email,telefon, parola) VALUES ('".$_POST['nume_client']."','".$_POST['adresa']."',
		'".$_POST['adresa_email']."','".$_POST['telefon']."','".$_POST['pass']."')";
		$resursaClient=mysql_query($sqlClienti);
		//print '<td valign="top">Your account has been created successfully!</td>';
?>
		<script type="text/javascript" language="javascript">
			alert("Contul dumneavoastra a fost creat!");
		</script>

<?php
header("location:controller/home.php");
	}
		@include_once APP_PATH . 'view/PrelucrareInregistrare_index.tpl.php';
	
	}

}

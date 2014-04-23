<?php
/**
 * Controller for homepage and general pages.
 */
 
		
		
		// trebuie inclusa baza de date......
		
class controller_reclamatii {

	function action_index($params) {
	
  	$sec=0;
	echo "da";die;
	function login()
	{
			global $sec;
				$sql="SELECT nume_user, parola FROM users";
				$resursa=mysql_query($sql);
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

		$sec=login();
			if ($sec==1)
			{
						
				@include_once APP_PATH . 'view/reclamatii_index.tpl.php';
			}
			if ($sec==0)
			{
			}
}
}
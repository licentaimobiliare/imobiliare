<html>
<head>
<title></title>
  <header>
    <div>
      <h1><a href="index.php"><img src="media/images/logo.jpg" alt=""></a></h1>
      <div class="social-icons">
			
			<?php
			
			function login(){
		$ok=0;
		$sql="SELECT nume_user, parola FROM users";
		$resursa=mysql_query($sql);
		//var_dump($resursa);
		if (($_SESSION['txtuser']!='') && ($_SESSION['txtpass']!=''))
		{
			while($row=mysql_fetch_array($resursa))
			{
				if($_SESSION['txtuser']==$row['nume_user'] && $_SESSION['txtpass']==$row['parola'])
					$ok=1;
			}
		}
		return ok;
		}
		if ($_SESSION['txtuser'] != "")
			{echo 'Te-ai autentificat ca <b>'.$_SESSION['txtuser'].'</b>';
			?>
			 <form action="logout.php" method="post" >
			<input type="submit" name="logout" size="8" value="Log-out"/>
			</form>
			<?php
			}
			else 
			{echo 'Nu esti autentificat.Te rog logheaza-te!';
			?>
			 <form action="login.php" method="post" >
			<input type="submit" name="signin" value="Log-in" size="8" / >
			<form>
			<?php
		}
	?>
	 </div>
      <div id="slide">
        <div class="slider">
          <ul class="items">
            <li><img src="media/images/slider-1.jpg" alt=""></li>
            <li><img src="media/images/slider-2.jpg" alt=""></li>
            <li><img src="media/images/slider-3.jpg" alt=""></li>
          </ul>
        </div>
        <a href="#" class="prev"></a><a href="#" class="next"></a> </div>
      <nav>
        <ul class="menu">
          <li class="current"><a href="index.php">Acasa</a></li>
          <li><a href="cautare.php">Cautare</a></li>
          <li><a href="harta.php">Harta</a></li>
          <li><a href="comerciale.php">Comerciale</a></li>
          <li><a href="login.php">Acces</a></li>
          <li><a href="contact.php">Reclamatii</a></li>
        </ul>
      </nav>
    </div>
  </header>
  
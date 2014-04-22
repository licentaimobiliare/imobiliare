<html>
<head>
<title></title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" media="screen" href="media/css/reset.css">
<link rel="stylesheet" type="text/css" media="screen" href="media/css/style.css">
<link rel="stylesheet" type="text/css" media="screen" href="media/css/grid_12.css">
<link rel="stylesheet" type="text/css" media="screen" href="media/css/slider.css">
<link rel="stylesheet" type="text/css" media="screen" href="media/css/jqtransform.css">
<script src="media/js/jquery-1.7.min.js"></script>
<script src="media/js/jquery.easing.1.3.js"></script>
<script src="media/js/cufon-yui.js"></script>
<script src="media/js/vegur_400.font.js"></script>
<script src="media/js/Vegur_bold_700.font.js"></script>
<script src="media/js/cufon-replace.js"></script>
<script src="media/js/tms-0.4.x.js"></script>
<script src="media/js/jquery.jqtransform.js"></script>
<script src="media/js/FF-cash.js"></script>
<script>
$(document)
    .ready(function () {
    $('.form-1')
        .jqTransform();
    $('.slider')
        ._TMS({
        show: 0,
        pauseOnHover: true,
        prevBu: '.prev',
        nextBu: '.next',
        playBu: false,
        duration: 1000,
        preset: 'fade',
        pagination: true,
        pagNums: false,
        slideshow: 7000,
        numStatus: false,
        banners: false,
        waitBannerAnimation: false,
        progressBar: false
    })
});
</script>
<!--[if lt IE 9]>
<script src="js/html5.js"></script>
<link rel="stylesheet" type="text/css" media="screen" href="css/ie.css">
<![endif]-->
</head>
<body>
<div class="main">
  <!--==============================header=================================-->
  <header>
    <div>
      <h1><a href="index.php"><img src="media/images/logo.jpg" alt=""></a></h1>
      <div class="social-icons">
			
			<!--<span>Follow Us:</span> <a href="#" class="icon-3"></a> <a href="#" class="icon-2"></a> <a href="#" class="icon-1"></a>-->
			
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
          <li><a href="case.php">Case</a></li>
          <li><a href="apartamente.php">Apartamente</a></li>
          <li><a href="comerciale.php">Comerciale</a></li>
          <li><a href="login.php">Acces</a></li>
          <li><a href="contact.php">Reclamatii</a></li>
        </ul>
      </nav>
    </div>
  </header>
  </body>
  </html>
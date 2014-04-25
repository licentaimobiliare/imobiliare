<html>
<head>
<title></title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $config['domain'];?>/media/css/reset.css">
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $config['domain'];?>/media/css/style.css">
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $config['domain'];?>/media/css/grid_12.css">
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $config['domain'];?>/media/css/slider.css">
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $config['domain'];?>/media/css/jqtransform.css">
<script src="<?php echo $config['domain'];?>/media/js/jquery-1.7.min.js"></script>
<script src="<?php echo $config['domain'];?>/media/js/jquery.easing.1.3.js"></script>
<script src="<?php echo $config['domain'];?>/media/js/cufon-yui.js"></script>
<script src="<?php echo $config['domain'];?>/media/js/vegur_400.font.js"></script>
<script src="<?php echo $config['domain'];?>/media/js/Vegur_bold_700.font.js"></script>
<script src="<?php echo $config['domain'];?>/media/js/cufon-replace.js"></script>
<script src="<?php echo $config['domain'];?>/media/js/tms-0.4.x.js"></script>
<script src="<?php echo $config['domain'];?>/media/js/jquery.jqtransform.js"></script>
<script src="<?php echo $config['domain'];?>/media/js/FF-cash.js"></script>
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

</head>
  <header>
    <div>
      <h1><a href="/index.php"><img src="<?php echo $config['domain'];?>/media/images/logo.jpg" alt=""></a></h1>
      <div class="social-icons">
			
			<?php
		$connection = model_database::get_instance();  	
			function login(){
		$ok=0;
                                    
			 $sql = $connection->prepare("SELECT nume_user, parola FROM users where nume_user=?");
                         $sql ->execute(array($_POST['txtuser']));
                         $resursa = $sql -> fetchAll(PDO::FETCH_OBJ);
	//var_dump($_SESSION['txtpass']);
            if(count($resursa) == 0) 
            echo "Nu exista acest utilizator in baza de date";
         else 
           if($resursa[0]->parola == $_POST['txtpass']) 
               $ok=1;
           else 
                    echo "Parola introdusa este gresita";
                       //var_dump($resursa)  ;
	 
		
		return ok;
		}
              //  var_dump($_SESSION['txtuser']);
                
                if (ok == 1)
                {
		if ($_SESSION['txtuser'] != "")  
			{echo 'Te-ai autentificat ca <b>'.$_SESSION['txtuser'].'</b>';
			?>
         
			 <form action="/index.php/logout/index" method="post" >
			<input type="submit" name="logout" size="8" value="Log-out"/>
			</form>
			<?php
                }}
			else 
			{
                            echo 'Nu esti autentificat.Te rog logheaza-te!';
			?>
			 <form action="/index.php/login/index" method="post" >
			<input type="submit" name="signin" value="Log-in" size="8" />
			<form>
			<?php
		}
	?>
	 </div>
      <div id="slide">
        <div class="slider">
          <ul class="items">
            <li><img src="<?php echo $config['domain'];?>/media/images/slider-1.jpg" alt=""></li>
            <li><img src="<?php echo $config['domain'];?>/media/images/slider-2.jpg" alt=""></li>
            <li><img src="<?php echo $config['domain'];?>/media/images/slider-3.jpg" alt=""></li>
          </ul>
        </div>
        <a href="#" class="prev"></a><a href="#" class="next"></a> </div>
      <nav>
        <ul class="menu">
          <li><a href="/index.php">Acasa</a></li>
          <li><a href="/index.php/cautare/index">Cautare</a></li>
          <li><a href="harta.php">Harta</a></li>
          <li><a href="comerciale.php">Comerciale</a></li>
          <li><a href="/index.php/login/index">Acces</a></li>
          <li><a href="/index.php/reclamatii/index">Reclamatii</a></li>
        </ul>
      </nav>
    </div>
  </header>
  <body>
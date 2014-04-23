<?php @include APP_PATH . 'view/snippets/header.tpl.php'; ?>

<body>
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
<div class="main">
<section id="content">
    <div class="container_12">
      <div class="grid_8">
        <h2 class="top-1 p3">Despre noi...</h2>
        <p class="p2">Agentia Andrada Imobiliare SRL functioneaza pe piata clujeana din anul 2010 distingandu-se  prin calitatea serviciilor de consultanta imobiliara si juridica oferite si prin baza de date informatizata foarte vasta de care dispune, actualizata zilnic.De asemenea pune la dispozitia clientilor o echipa de agenti si experti imobiliari tineri, activi, cu o reputatie ireprosabila si foarte bine pregatiti pentru a raspunde celor mai exigente cerinte. Membrii firmei sunt capabili sa armonizeze experienta cu schimbarile frecvente ce apar pe piata imobiliara, adaptandu-se la situatia existenta, luand in considerare in primul rand dorintele clientului.</p>
        <p class="line-1">In acelasi timp, datorita managementului si coordonarii echipei noastre, pornind de la principia riguroase privind competent si calificarea profesionala si printr-o activitate bazata pe o atenta analiza a pietei, compania Andrada Imobiliare SRL ofera clientilor sai incredere in capacitatea de a solutiona problemele imobiliare de orice natura. </p>
        <p class="line-2">Pentru a mari profitabilitatea afacerii trebuie luate in considerare aspecte legate de diversitatea ofertei fata de concurenta – tocmai de aceea, firmele de dimensiuni relative mici au inceput sa ofere produse integrate (de la tranzactia imobiliara propriu-zisa pana la asistenta necesara la perfectarea tuturor documentelor aferente unei tranzactii). Cu cat o firma de dimensiune mica si mijlocie ofera asistenta in toate etapele derularii unei tranzactii (Administratie Financiara, Cadastru, Notariat, etc), cu atat sansele acesteia de a castiga teren in fata concurentei cresc. Agentia imobiliara Andrada Imobiliare SRL doreste sa se distinga de restul agentiilor si sa isi creasca numarul de clienti prin procurarea unei aplicatii web, care sa utilizeze baza de date existenta si sa permita utilizatorilor o cautare avansata a imobilelor inregistrate in baza de date precum si rapoarte detaliate a proprietatilor.</p>
		<h2 class="p4"><br><br>Cele mai noi proprietati</h2>
        <div class="wrap block-1">
          <div> <img src="media/images/casa1.jpg" alt="" class="img-border">
            <h3>CASE</h3>
            <p>Pentru a putea vedea toate casele disponibile apasa pe buton de mai jos.</p>
            <a href="case.php" class="button">Mai multe</a> </div>
          <div> <img src="media/images/apartamente1.jpg" alt="" class="img-border">
            <h3>APARTAMENTE</h3>
            <p>In aceasta sectiune se pot vizualiza toate apartamentele disponibile. Click pe butonul de mai jos pentru mai multe detalii.</p>
            <a href="apartamente.php" class="button">Mai multe</a> </div>
          <div class="last"> <img src="media/images/comercial1.jpg" alt="" class="img-border">
            <h3>COMERCIALE</h3>
            <p>Pentru a vizualiza toate spatiile comerciale disponibile apasa pe butonul de mai jos.</p>
            <a href="comerciale.php" class="button">Mai multe</a> </div>
        </div>
      </div>
   <div class="grid_4">
        <div class="left-1">
          <h2 class="top-1 p3">Cauta imobil</h2>
          <form id="form-1" class="form-1 bot-1" action="#">
            <div class="select-1">
              <label>Serviciu</label>
              <select name="select" >
                <option>Inchiriere</option>
				<option>Cumparare</option>
				<option></option>
              </select>
            </div>
            <div>
              <label>Cartier/Strada</label>
              <input type="text" value="Address, City, Zip" onBlur="if(this.value=='') this.value='Address, Zip'" onFocus="if(this.value =='Address, City, Zip' ) this.value=''">
            </div>
            <div class="select-2">
              <label>Camere</label>
              <select name="select" >
                <option>o camera</option>
				<option>2 camera</option>
				<option>3 camera</option>
				<option>4 camera</option>
				<option>+4 camera</option>
              </select>
            </div>
            <div class="select-2 last">
              <label>Bai</label>
              <select name="select" >
                <option>o baie</option>
				<option>2 bai</option>
				<option>3 bai</option>
				<option>+3 bai</option>
              </select>
            </div>
			<br>
            <a class="button">Cauta</a>
            <div class="clear"></div>
          </form>
		  <br><br>
          <h2 class="p3">Gaseste-ti un birou</h2>
          <img src="media/images/page1-img4.png" alt="">
          <div class="lists">
            <ul class="list-1">
              <li><a href="#">Gheorgheni</a></li>
              <li><a href="#">Grigorescu</a></li>
			  <li><a href="#">Manastur</a></li>
            </ul>
            <ul class="list-1 last">
              <li><a href="#">Marasti</a></li>
			  <li><a href="#">Someseni</a></li>
              <li><a href="#">Zorilor</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="clear"></div>
    </div>
  </section>
</div>

<?php @include APP_PATH . 'view/snippets/footer.tpl.php'; ?>
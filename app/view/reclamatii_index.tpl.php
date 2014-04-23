<?php @include APP_PATH . 'view/snippets/header.tpl.php'; ?>

<body>

<div class="main">

 <section id="content">
    <div class="container_12">
      <div class="grid_8">
        <h2 class="top-1 p3">Formular de reclamatii:</h2>
        <form id="form" method="post" action="#">
          <fieldset>
            <label><strong>Nume:</strong>
              <input type="text" value="">
            </label>
			 <label><strong>Telefon:</strong>
              <input type="text" value="">
            </label>
            <label><strong>E-mail:</strong>
              <input type="text" value="">
            </label>
            <label><strong>Mesaj:</strong>
              <textarea></textarea>
            </label>
            <div class="btns"><a href="contact.php" class="button">Sterge</a><a href="#" class="button">Trimite</a></div>
          </fieldset>
        </form>
      </div>
      <div class="grid_4">
        <div class="left-1">
         <!-- <h2 class="top-1 p3">Find your home</h2>
          <form id="form-1" class="form-1 bot-2" action="#">
            <div class="select-1">
              <label>Home type</label>
              <select name="select" >
                <option>Homes for sale</option>
              </select>
            </div>
            <div>
              <label>Location</label>
              <input type="text" value="Address, City, Zip" onBlur="if(this.value=='') this.value='Address, City, Zip'" onFocus="if(this.value =='Address, City, Zip' ) this.value=''">
            </div>
            <div class="select-2">
              <label>Beds</label>
              <select name="select" >
                <option>&nbsp;</option>
              </select>
            </div>
            <div class="select-2 last">
              <label>Baths</label>
              <select name="select" >
                <option>&nbsp;</option>
              </select>
            </div>
            <a class="button">Search</a>
            <div class="clear"></div>
          </form>-->
		  <br><br>
          <h2 class="p3">Contact:</h2>
          <dl>
            <dt class="color-1 p2"><strong>Strada Meteor, nr. 2,<br>
              Cluj-Napoca, Cluj</strong></dt>
            <dd><span>Telefon:</span>0756 636 489</dd>
            <dd><span>E-mail:</span><a href="#" class="link">imobiliarecluj@yahoo.com</a></dd>
          </dl>
        </div>
      </div>
      <div class="clear"></div>
    </div>
  </section>
</div>

<div class="grid_4">
        <div class="left-1">
          <h2 class="top-1 p3">Nu esti autentificat. Pentru a avea acces la aceasta pagina te rog sa te loghezi!</h2>
 <!-- <label> Nu esti autentificat. Pentru a avea acces la aceasta pagina te rog sa te loghezi! </label> -->
 </div>
 </div>
 
<?php @include APP_PATH . 'view/snippets/footer.tpl.php'; ?>
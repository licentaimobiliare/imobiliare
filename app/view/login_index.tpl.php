<?php @include APP_PATH . 'view/snippets/header.tpl.php'; ?>

<div class="main">
<section id="content">
    <div class="container_12">
			<div class="grid_8">
			<?phpif (isset($_POST['login'])) {?>
				<h2 class="top-1 p3">Logare membri inregistrati:</h2>
					
     <table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
	<tr>

			<form name="form1" class="form-1 bot-2" method="post" action="/index.php/PrelucrareLogin/index"> 
			<td>
			<table width="100%" border="50" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">

			<tr>
				<td width="78">Nume utilizator</td>
				<td width="294"><input name="txtuser" type="text" id="myusername"></td>
			</tr>
			<tr>
				<td>Parola</td>
				<td><input name="txtpass" type="text" id="mypassword"></td>
			</tr>
			<tr>
				<td><br><input type="submit" name="submit" value="Logare"></td>
			</tr>
			</table>
			</td>
			</form>
	</table>
	<h2 class="top-1 p3">Creare cont nou:</h2>
	<table width="100%" align="left" border="3" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
	<td><br><br><br><br><br>
		<form name="form2" class="form-1 bot-2" method="post" action="/index.php/PrelucrareInregistrare/index">
		
		

			<tr>
			<label>Nume utilizator</label>
							<div><input type="text" name="nume_client" class="input" size="23"/></div><br/>
			</tr>
			
<tr>			
				<label>Email</label>
								<div><input type="text" name="adresa_email" class="input" size="20" placeholder="exemplu@yahoo.com" onblur="valideaza(this.value)"/></div><br/>
							</tr>
							<tr>
							<label>Telefon</label>
								<div><input type="text" name="telefon" class="input" size="15"/></div><br/>
							</tr>
							<tr>
							<label>Parola</label>
								<div><input name="pass" type="password" class="input" size="15"></div><br/>
							</tr>
							<tr>
							
							<label>Reintroducere parola</label>
								<div><input name="pass2" type="password" class="input" size="15"/></div><br/>
							</tr>
							<tr>
							<label>Mentiuni:</label>
								<div><textarea name="adresa" cols="45" class="input" size="10"></textarea></div><br/>						
			</tr>
							<tr>
							<div align="left"><input type="submit" name="submit" class="button" value="Inregistrare"></div>
							</tr>
							</table>
							</td>
	</form>
	</tr>
	</table> 
	<?php}?>

	  </div>
      <div class="grid_4">
        <div class="left-1">
          <h2 class="top-1 p3">Find your home</h2>
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
          </form>
          <h2 class="p3">Did you know?</h2>
          <p class="color-1 p6"><strong>At vero eos et accusam et justo doles et ea rebum</strong></p>
          <p>Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est.</p>
        </div>
      </div>
      <div class="clear"></div>
    </div>
  </section>
</div>

<?php @include APP_PATH . 'view/snippets/footer.tpl.php'; ?>
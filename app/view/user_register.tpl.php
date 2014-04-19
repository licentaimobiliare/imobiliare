<?php @include APP_PATH . 'view/snippets/header.tpl.php'; ?>

<h2>Be kind and enter the required information.</h2>

<form method="POST" action="<?php APP_URL . "home/index" ?>" enctype="multipart/form-data">
    <p class="wrong">
    <?php if($_POST['submit']=="Register" && $no_basic_info){echo "Please enter your basic information(name and password)!";} ?>
    <?php if($_POST['submit']=="Register" && $incorrect_password){echo "Please be careful when entering your password!";} ?>

    </p>

<fieldset class="login_arr">
        <label>Username:</label><input class="text_box_x" type="text" name="username"/><br/><br/>
        <label>Enter password:</label><input class="text_box_x" type="password" name ="password1"/><br/><br/>
        <label>Confirm password: </label><input class="text_box_x" type="password" name="password2"/><br/><br/>
        <label>E-Mail:</label><input class="text_box_x" type="email" name="mail"/><br/><br/>
    <label>Profile picture: </label><input class="button_x" type="file" name="image" /><br/><br/><br/>
    <input class="button_x" type="hidden" name="old_image" value="<?php echo $image ?>"/>
    <input class="button_x" type="submit" value="Register" name="submit"/>
    <input class="button_x" type="submit" value="Cancel" name="submit"/>
</fieldset>

</form>


<?php @include APP_PATH . 'view/snippets/footer.tpl.php';
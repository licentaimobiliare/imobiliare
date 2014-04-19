<?php @include APP_PATH . 'view/snippets/header.tpl.php'; ?>

<p class="wrong">
<?php if($_POST && $old_bad){echo "Current password not acceptable!";} ?>
<?php if($_POST && $new_bad){echo "New password not acceptable!";} ?>
</p>

    <h2>Be kind and enter the required information.</h2>
<fieldset class="login_arr">
<form method="POST" action="<?php echo APP_URL . 'user/editpass' ?>">
    <label>Enter current password:&nbsp</label><input class="text_box_x" type="password" name="old_password"/><br/><br/>
    <label>Enter new password:&nbsp&nbsp&nbsp&nbsp&nbsp</label><input class="text_box_x" type="password" name ="password1"/><br/><br/>
    <label>Confirm new password: </label><input class="text_box_x" type="password" name="password2"/><br/><br/>

    <input class="button_x" type="submit" value="Submit" name="submit"/>
    <input class="button_x" type="submit" value="Cancel" name="submit"/>
</form>
</fieldset>

<?php @include APP_PATH . 'view/snippets/footer.tpl.php';
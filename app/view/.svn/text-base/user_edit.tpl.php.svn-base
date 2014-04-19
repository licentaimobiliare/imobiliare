<?php @include APP_PATH . 'view/snippets/header.tpl.php'; ?>

<?php
    $id = $_SESSION['userid'];
    $user = model_user::getUser($id);
    $name = $user->getName();
    $mail = $user->getMail();
    $image = $user->getImage();
    $password = $user->getPassword();

?>
    <h2>You may change your account information</h2>

<form method="POST" action="<?php echo APP_URL . 'user/edit'; ?> " enctype="multipart/form-data">
    <fieldset class="login_arr">
        <label>Username:</label><input class="text_box_x" type="text" name="username" <?php if(isset($name)){ ?>value=<?php echo $name;} ?> /><br/><br/>
        <label>E-Mail:</label><input class="text_box_x" type="email" name="mail" <?php if(isset($mail)){ ?>value=<?php echo $mail;} ?> /><br/><br/>
        <label>Profile picture: </label><input class="text_box_x" type="file" name="image" /><br/><br/><br/>
        <input type="hidden" name="old_image" value="<?php echo $image ?>"/>
    <span>
        <input class="button_x" type="submit" value="Edit" name="submit"/>
        <input class="button_x" type="submit" value="Cancel" name="submit"/>
    </span>
        <a class="meniu bold" href="<?php echo APP_URL . 'user/editpass' ?>">[Change Password]</a>
</fieldset>
</form>

<?php @include APP_PATH . 'view/snippets/footer.tpl.php';
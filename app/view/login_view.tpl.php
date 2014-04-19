<?php @include APP_PATH . 'view/snippets/header.tpl.php'; ?>
    <p class="wrong">
        <?PHP
            if(!$ok){ echo "Username/Password is incorrect! Please try again!";}
        ?>
    </p>
    <h3>Please enter the required information</h3>


<fieldset class="login_arr">
    <form method="POST" action="<?PHP echo APP_URL . 'home/index'?>">
            <label>Username: </label><input class="text_box_x" type="text" name="username"/><br/><br/>
            <label>Password: </label><input class="text_box_x" type="password" name="password"/>
        <p class="cell" >
            <input class="button_x" type="submit" name="login" value="Log in">
            <input class="button_x" type="submit" name="cancel" value="Cancel">
        </p>
    </form>
    <form mehod="POST" action="<?php echo APP_URL . 'user/register' ?>">
        <input class="button_x" type="submit" name="submit" value="Register"/>
    </form>
</fieldset>

<?php @include APP_PATH . 'view/snippets/footer.tpl.php'; ?>
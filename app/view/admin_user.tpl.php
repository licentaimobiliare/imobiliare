<?php @include_once APP_PATH.'view/snippets/header.tpl.php'; ?>
<style type="text/css">
    .row p{
        display: inline-block;
        width: 15%;
    }
</style>
<script src="<?php echo $config['domain']; ?>/media/js/admin_user.js"></script>
<div>
    <div class="row header">
        <p>nume</p>
        <p>mentiuni</p>
        <p>telefon</p>
        <p>email</p>
        <p>tip</p>
    </div>
<?php foreach($users as $user){ ?>
    <div class="row">
        <p><?php echo $user->nume_user;?></p>
        <p><?php echo $user->mentiuni;?></p>
        <p><?php echo $user->telefon;?></p>
        <p><?php echo $user->email;?></p>
        <select data-id="<?php echo $user->iduser; ?>">
            <option value="user" <?php echo ($user->tip== "user" ? "selected" : "")?>>user</option>
            <option value="angajat" <?php echo ($user->tip== "angajat" ? "selected" : "")?>>angajat</option>
            <option value="administrator" <?php echo ($user->tip== "administrator" ? "selected" : "")?>>administrator</option>
        </select>
    </div>
    <?php } ?>
</div>

<?php @include_once APP_PATH.'view/snippets/footer.tpl.php'; ?>
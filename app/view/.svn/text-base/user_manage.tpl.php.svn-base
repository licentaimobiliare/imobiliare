<?php @include APP_PATH . 'view/snippets/header.tpl.php'; ?>

<h2>Every user</h2>

<p class="wrong"><?php if($user_not_found){ echo "The requested user could not be found!"; } ?></p>

<form style="text-align: right" method="POST" action="<?php echo APP_URL ?>user/view">
    <input class="button_x" type="submit" value="Back to my profile" name="submit"/><br/><br/>
</form>


<form style="text-align: center"  method="POST" action="<?php echo APP_URL . "user/manage"; ?>">
    <table class="table_x" border="1">
        <tr>
            <th class="cell_x">ID</th>
            <th class="cell_x">Name</th>
            <th class="cell_x">E-Mail</th>
            <th class="cell_x">Image</th>
            <th class="cell_x">Delete</th>
            <th class="cell_x">Admin</th>
        </tr>

<?php

    $users = model_user::all();
    foreach($users as $user){
        $id = $user->getId();
        if($id != $_SESSION['userid']){
            $name = $user->getName();
            $admin = $user->getAdmin();
            $mail = $user->getMail();
            $image = $user->getImage();

            if($mail=='')
                $mail = 'no_value';
            if($image=='')
                $image = 'no_value';

            ?>
                    <tr>
                        <td class="cell"><?php echo $id; ?></td>
                        <td class="cell"><?php echo $name; ?></td>
                        <td class="cell"><?php echo $mail; ?></td>
                        <td class="cell"><a target="_blank" href="<?php echo APP_URL . "img/" . $image; ?>"><?php echo $image; ?></a></td>
                        <td class="cell"><input type="checkbox" name="delete[]" value="<?php echo $id; ?>"/></td>
                        <td class="cell"><input type="checkbox" name="admin[]" value="<?php echo $id; ?>"
                            <?php $user = model_user::getUser($id);
                                $a = $user->getAdmin();
                                if($a=='yes'){
                                    echo "checked";
                                }else{
                                    echo "";
                                }
                            ?>/>
                        </td>
                    </tr>
            <?php
        }
    }
?>

    </table>

        <input class="button_x" type="submit" value="Apply changes" name="submit"/>
</form>

<?php @include APP_PATH . 'view/snippets/footer.tpl.php';
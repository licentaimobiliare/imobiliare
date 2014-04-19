<?php @include APP_PATH . 'view/snippets/header.tpl.php'; ?>
    <a class="meniu bold" href="<?php echo APP_URL ?>home/index">[Home]</a>

    <a class="meniu bold" href="<?php echo APP_URL ?>user/edit" >[Edit account]</a>
<?php
    if($_SESSION['admin']=='yes'){
?>
    <a class="meniu bold" href="<?php echo APP_URL ?>user/manage">[Manage other accounts]</a>
    <a class="meniu bold" href="<?php echo APP_URL ?>home/logout" >[Log out]</a><br/><br/>
    <a href="<?php echo APP_URL . 'game/add' ?>"></a>
    <form method="POST" action="<?php APP_URL ?>addCategory">
        <label>New category: </label><input class="text_box_x" type="text" name="nume">
        <input class="button_x" type="submit" value="Add">
    </form>
    <form method="POST" action=<?php echo APP_URL . "game/add"?>>
        <input class="button_x" type="submit" value="Add game" name="add_game"/>
    </form>
    <?php
    }
else{
    ?>
    <a class="meniu bold" href="<?php echo APP_URL ?>home/logout" >[Log out]</a><br/><br/>
    <?php
}
    //If admin~end~
    ?>
    <h2><?php echo $user_name; ?>'s personal page.</h2>
<span class="cell">
    <p class="mail_disp"><label>E-Mail adress:<?php echo " ", $user_mail ?><label/></p>
<p>
    <img class="last" style="max-height: 400px;" src="<?php echo APP_URL . 'img/' . $user_image ?>" alt="<?php echo $user_image ?>">
    <?php
        if(isset($_SESSION['userid'])){
        $games = model_user::my_games($_SESSION['userid']);
        if($games){
            ?>
            <p>My Games:
            <?php
                foreach($games as $game_id){
                $game = model_game::load($game_id);
                    ?>
                        <a class="button_my_games" href="<?php echo APP_URL; ?>game/view/<?php echo $game->getId() ?>">[<?php echo $game->getNume() ?>]</a>
                    <?php
                }
                unset($game);
            ?> </p> <?php
            }
        }
    ?>



</span>
<?php @include APP_PATH . 'view/snippets/footer.tpl.php';


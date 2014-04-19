<?php @include APP_PATH . 'view/snippets/header.tpl.php'; ?>
<div class="page-wrapper" >
    <a class="detali_game" style="margin-left: 0%" href="<?php echo APP_URL."home/index/".$_SESSION['category'] ?>">Back</a>
    <h2><?php echo $_game->getNume(); ?></h2>

    <img class='detali_game' src="<?php echo APP_URL."img/".$_game->getImage() ?>" >
    <br>

    <div class="detali_game"><?php echo $_game->getLink(); ?></div>
    <div class="detali_game">
        <?php echo $_game->getDescription(); ?>
    </div>
    <div class="detali_game">
    <?php $rate=$_game->getRate();
    @include APP_PATH.'view/rate.tpl.php';?>
    </div>

    <?php if(!$favoriteGame) { ?>
    <a class="detali_game" href="<?php echo APP_URL ?>game/favorite/<?php echo $params[0]; ?>">Add To Favorite</a>
    <?php }
    else {?>
        <a class="detali_game" href="<?php echo APP_URL ?>game/favorite/<?php echo $params[0]; ?>/remove">Remove To Favorite</a>
        <?php } ?>

    <?php if(!$voteUser) { ?>
    <form class="detali_game" action="<?php echo APP_URL ?>game/vote/<?php echo $params[0]; ?>"
        method="POST">

            <input type="radio" name=vote    value="1" class="detali_game star">
            <input type="radio" name=vote    value="2" class="detali_game star">
            <input type="radio" name=vote    value="3" class="detali_game star">
            <input type="radio" name=vote    value="4" class="detali_game star">
            <input type="radio" name=vote    value="5" class="detali_game star">
            <input type="submit" name=vot VALUE="VOTE" class="detali_game button_x">


    </form>

    <?php } ?>

    <?php if( $_SESSION['admin']=='yes') { ?>
    <div class="detali_game">
        <a href="<?php echo APP_URL."game/add/".$_game->getId(); ?>">Edit</a>
        <a href="<?php echo APP_URL."game/delete/".$_game->getId()."/".$_SESSION['category']; ?>">Delete</a>
    </div>
    <?php }?>

    <div class="detali_game">
        <h1>Comments :</h1>
        <?php foreach($list_comments as $comment)
        { ?>
           <div>
               <p>
                   <?php $name_user=model_user::getUser($comment->getID_users())->getName();
                   echo $name_user ?>
                    <span> <?php
                        echo $comment->getTime(); ?>
                    </span>
               </p>
               <p class="mail_disp"><?php echo urldecode($comment->getComment()); ?></p>
               <?php if($_SESSION['username']==$name_user || $_SESSION['admin']=='yes') { ?>
               <a href="<?php echo APP_URL ?>game/deleteComment/<?php echo $params[0]."/".$comment->getTime(); ?>"
                   class="deletecomment">Delete</a>
               <a href="<?php echo APP_URL ?>game/editComment/<?php echo $params[0] ?>" class='editcomment'>Edit</a>
                <?php } ?>
           </div>
        <?php }
        if(!empty($_SESSION['username']))
        @include APP_PATH.'view/comments_view.tpl.php';?>

    </div>
</div>
<?php @include APP_PATH . 'view/snippets/footer.tpl.php'; ?>
<?php @include APP_PATH . 'view/snippets/header.tpl.php'; ?>

<div>
    <p class='head'>
        <a href="<?php echo APP_URL ?>home/index" class="head">Home</a>
        <?php if(empty($_SESSION['username'])){  ?>
        <a href="<?php echo APP_URL ?>login/view" class="head">Login</a>
        <?php }
        else{
            ?>
            <span class="head">
                <b>Welcome,</b> <a class="meniu bold" href="<?php echo APP_URL ?>user/view"><?php echo $_SESSION['username'];?></a><b> !</b>
                <a class="meniu bold" href="<?php echo APP_URL ?>home/logout" >[Log out]</a>
            </span>
        <?php }?>
    </p>

        <table>
            <tr>
            <td width=100 px class="last_game" style="vertical-align: sub">
                <h3>Categories</h3>
                <?php foreach($list_categories as $category)
                    {
                    echo "<p class='categories'><a class='meniu meniu_aux' href='"
                        .APP_URL."home/index/".$category->getId()."'>".$category->getName()."</a></p>";
                    }?>
            </td>
            <td width=100%>
                <?php if(!$params[0]) { ?>
                <form method="GET" style="text-align: right"
                    action="<?php echo APP_URL; ?>home/index">
                    <input class="text_box_x" type="text" name="search">
                    <input class="button_x" type="submit" name="Search" value="Search">
                </form>
                <?php } ?>
                <div class="last_game" style="width: 100%;height: auto;">
                <?php foreach($list_search as $game) {
                    $l=APP_URL."game/view/".$game->getId();
                    echo "<div class='hom_pg'><p class='last_game'>"."<a href=".$l.">".
                        $game->getNume()."<img class='last_game' src='".APP_URL.
                        "img/".$game->getImage()."'></a></p>";
                    $rate=$game->getRate();

                    @include APP_PATH."view/rate.tpl.php";echo "</div>";
                }?>
                </div>
                <?php if($_SESSION['category'] && (!empty($_SESSION['admin']) && $_SESSION['admin']=='yes' )){ ?>
                <a href="<?php echo APP_URL ?>category/edit/<?php echo $_SESSION['category'] ?>">Edit Category</a>
                <?php } ?>
                <div class="last_game">
                        <h2>Top games</h2>
                    <div style="display: block">
                <?php foreach($list_top_game as $game)
                {

                $l=APP_URL."game/view/".$game->getId();
                echo "<div class='hom_pg'><p class='last_game'>"."<a href=".$l.">".
                $game->getNume()."<img class='last_game' src='".APP_URL.
                "img/".$game->getImage()."'></a></p>";
                    $rate=$game->getRate();

                @include APP_PATH."view/rate.tpl.php";echo "</div>";
                }?>
                    </div>
                </div>


                <div class="last_game">
                    <h2>Latest games</h2>
                    <div>
                <?php foreach($list_games as $game)
                {
                    $l=APP_URL."game/view/".$game->getId();
                    echo "<div class='hom_pg'><p class='last_game'>"."<a href=".$l.">".
                        $game->getNume()."<img class='last_game' src='".APP_URL.
                        "img/".$game->getImage()."'></a></img></p>";
                    $rate=$game->getRate();
                    @include APP_PATH."view/rate.tpl.php";
                    echo "</div>";
                }?>
                </div>
                </div>

            </td>
            </tr>
        </table>


</div>

<?php @include APP_PATH . 'view/snippets/footer.tpl.php'; ?>
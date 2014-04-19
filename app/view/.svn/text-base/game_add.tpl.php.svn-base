<?php @include_once APP_PATH.'view/snippets/header.tpl.php'; ?>
<?php if($err){ ?>
    <p style="font: bold;color: red;font-size: 20" class="add">Name can't be null !!</p>
    <?php }  ?>
<div class="add">
    <form action="<?php echo APP_URL ?>game/addGame" method="POST" class="add"
          enctype="multipart/form-data">
        <label class="add">
            Name:<input class="text_box_x" type="text" name="name" value="<?php echo $game->getNume() ?>">
        </label>

        <label class="add">Category
        <select name="category" class="text_box_x">
        <?php foreach($list_categories as $category){ ?>
        <option value="<?php echo $category->getId(); ?>"
            <?php  if($category->getId() == $categorie->getId()){ ?>
                 selected="selected" <?php } ?> >
            <?php echo $category->getName(); ?> </option>
        <?php } ?>
    </select></label>

        <label class="add">
            Image:
            <input class="button_x" type="file" name="image" />
            <input type="hidden" name="images" value="<?php echo $game->getImage(); ?>">
            <?php   $i=$game->getImage();
            if(!empty($i)) { ?>
            <img src="<?php echo APP_URL ?>/img/<?php echo $game->getImage() ?>" class="last_game">
            <?php } ?>
        </label>
        <label class="add">
            Trailer:
            <input class="text_box_x" type="text" name="link" value='<?php echo $game->getLink(); ?>'>
        </label>
        <label class="add">
            Description:</label>
        <p class="add" id="comments">

            <input type="button" id="bold" value="B" class="button_x">
            <input type="button" id="italic" value="I" class="button_x">
            <input type="button" id="underline" value="U" class="button_x">

            <select id="color">
                <option value="black">black</option>
                <option value="white">white</option>
                <option value="red">red</option>
                <option value="yellow">yellow</option>
                <option value="blue">blue</option>
            </select>
            <textarea name="description" class="add"><?php echo $game->getDescription(); ?></textarea>
        </p>
        <label style="display: block">
            <?php if($game->getId()==''){ ?>
            <input class="button_x" type="submit" name="submit" value="Add" >
            <?php } else { ?>
            <input class="button_x" type="submit" name="submit" value="Edit">
            <input type="hidden" name="id_game" value="<?php echo $game->getId(); ?>">
            <?php } ?>
            <input class="button_x" type="submit" name="submit" value="Cancel">
            <input type="hidden" name="rate" value="<?php $game->getRate(); ?>">
        </label>
    </form>
</div>

<?php @include_once APP_PATH.'view/snippets/footer.tpl.php'; ?>
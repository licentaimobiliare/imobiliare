<?php @include APP_PATH . 'view/snippets/header.tpl.php'; ?>


    <?php if($not_empty_category){ ?> <p class="seven">Only empty categories can be deleted!</p> <?php }?>
    <form method="POST" action="<?php echo APP_URL; ?>category/edit/<?php echo $category_id; ?> ">
        <label>Category name: <?php echo $category_name; ?> </label> <br/>
        <label>New name: </label><input type="text" name="nume">
        <input type="submit" value="Edit" name="submit">
        <input type="submit" value="Cancel" name="submit">
        <input type="submit" value="Remove category" name="submit">
    </form>

<?php @include APP_PATH . 'view/snippets/footer.tpl.php'; ?>

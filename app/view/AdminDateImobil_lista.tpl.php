<?php
    foreach($date as $data){
        ?>
<p data-id="<?php echo $data->view_id;?>"><?php echo $data->view_name; ?></p>
<?php    } ?>
<input type="hidden" data-type="<?php echo $params[0]; ?>" />
<div>
    <a>Actualizare</a>
    <a>Sterge</a>
</div>


<?php
    foreach($date as $data){
        ?>
<p data-id="<?php echo $data->view_id;?>"><?php echo $data->view_name; ?></p>
<?php    } ?>

<div>
    <a href="/AdminDateImobil/adaugare/<?php echo $params[0];?>/">Actualizare</a>
    <a>Sterge</a>
</div>


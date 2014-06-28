<?php @include_once APP_PATH . 'view/snippets/header.tpl.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo $config['domain']; ?>/media/css/admindateimobil_lista.css" />
<script src="<?php echo $config['domain']; ?>/media/js/AdminDateImobil_lista.js"></script>
<div id="lista_items">
    <?php
    foreach ($date as $data) {
        ?>
        <p data-id="<?php echo $data->view_id; ?>"><?php echo $data->view_name; ?></p>
    <?php } ?>
</div>
<input type="hidden" data-type="<?php echo $params[0]; ?>" />


<div>
    <a id ="actualizare" href="#">Actualizare</a>
    <a id="stergere" href="#">Sterge</a>

</div>
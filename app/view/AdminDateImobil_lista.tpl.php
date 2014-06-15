<?php @include_once APP_PATH . 'view/snippets/header.tpl.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo $config['domain']; ?>/media/css/admindateimobil_lista.css" />
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



<script type="text/javascript">

    jQuery(document).ready(function() {
        jQuery('p').off("click").on("click", function() {
            jQuery('#actualizare').attr('href', '/AdminDateImobil/adaugare/' + jQuery('input[type="hidden"]').data('type') + '/' + jQuery(this).data('id'));
            jQuery('#stergere').attr('href', '/AdminDateImobil/lista/' + jQuery('input[type="hidden"]').data('type') + '/' + jQuery(this).data('id'));
        });
    });


</script>
<?php @include_once APP_PATH.'view/snippets/header.tpl.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo $config['domain']; ?>/media/css/imobil_tranzactie.css" />
<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script src="<?php echo $config['domain']; ?>/media/js/imobil_tranzactie.js"></script>

<form action="" method="POST">
    <input type="text" placeholder="CNP" name="tranzactie[client][cnp]"/>
    <input type="text" placeholder="Nume" name="tranzactie[client][nume]" />
    <input type="text" placeholder="Prenume" name="tranzactie[client][prenume]" />
    <input type="text"  placeholder="Telefon" name="tranzactie[client][telefon]" />
    <input type="hidden" name="idi" value="<?php echo $params[0]; ?>" />
    
    <select name="tranzactie[servici][ids]">
        <?php foreach ($servicii as $serviciu){ ?>
        <option value="<?php echo $serviciu->ids; ?>"><?php echo $serviciu->serviciu; ?></option>
        <?php }?>
    </select>
    
    <input type="date" name="tranzactie[data_final_tranzactie]" />
    <button name="Submit" value="submit" disabled>Tranzactioneaza</button>
</form>

<?php @include_once APP_PATH.'view/snippets/footer.tpl.php'; ?>
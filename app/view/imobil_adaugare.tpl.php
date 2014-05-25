<?php @include_once APP_PATH.'view/snippets/header.tpl.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo $config['domain']; ?>/media/css/imobil_style.css" />
<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script src="<?php echo $config['domain']; ?>/media/js/imobil_adaugare.js"></script>
<?php if(!empty($message)){?>
<p class="error"> <?php echo $message?></p>
<?php } ?>
<form class="imobil_form" action="" method="POST" enctype="multipart/form-data" >
    <!--Inputuri pentru proprietarul imobilului-->
    <input type="text" data-type="proprietar" placeholder="CNP" name="imobil[proprietar][cnp]" />
    <input type="text" data-type="proprietar" placeholder="Nume" name="imobil[proprietar][nume]"/>
    <input type="text" data-type="proprietar" placeholder="Strada" name="imobil[proprietar][strada]"/>
    <input type="text" data-type="proprietar" placeholder="Numar Strada" name="imobil[proprietar][nr]"/>
    <input type="text" data-type="proprietar" placeholder="Bloc" name="imobil[proprietar][bl]"/>
    <input type="text" data-type="proprietar" placeholder="Apartament" name="imobil[proprietar][ap]"/>
    <input type="text" data-type="proprietar" placeholder="Scara" name="imobil[proprietar][sc]"/>
    <input type="text" data-type="proprietar" placeholder="Etaj" name="imobil[proprietar][et]"/>
    <input type="text" data-type="proprietar" placeholder="Oras" name="imobil[proprietar][oras]"/>
    <input type="text" data-type="proprietar" placeholder="Judet" name="imobil[proprietar][judet]"/>
    
    <!--Inputuri pentru adaugarea adresei imobilului-->
    <input type="text" data-type="adresa" placeholder="Tip strada" name="imobil[adresa][tip_strada]" class="hidden"/>
    <input type="text" data-type="adresa" placeholder="Nume strada" name="imobil[adresa][nume_strada]" class="hidden"/>
    <input type="text" data-type="adresa" placeholder="Numar" name="imobil[adresa][numar]" class="hidden"/>
    <input type="text" data-type="adresa" placeholder="Codu Postal" name="imobil[adresa][cod_postal]" class="hidden"/>
    
    <!--Inputuri pentru adaugarea imobilului-->
    <input type="text" data-type="date" placeholder="Pret" name="imobil[date][pret]" class="hidden"/>
    <input type="text" data-type="date" placeholder="Cartier" name="imobil[date][cartier]" class="hidden"/>
    <input type="text" data-type="date" placeholder="Metri patrati" name="imobil[date][mp]" class="hidden"/>
    <input type="text" data-type="date" placeholder="Descriere" name="imobil[date][descriere]" class="hidden"/>
    <input type="text" data-type="date" placeholder="Finisaj" name="imobil[date][finisaj]" class="hidden"/>
    <input type="text" data-type="date" placeholder="Tip constructie" name="imobil[date][tip_constructie]" class="hidden"/>
    <input type="text" data-type="date" placeholder="Tip locuinta" name="imobil[date][tip_locuinta]" class="hidden"/>
    <input type="text" data-type="date" placeholder="Tip imobil" name="imobil[date][tip_imobil]" class="hidden"/>
    <input type="date" data-type="date" placeholder="Data constructiei" name="imobil[date][data_constructie]" class="hidden"/>
    <input type="number" data-type="date" name="imobil[date][nr_camere][]" class="nr_camere hidden" />
    <input type="text" data-type="date" placeholder="Tip camera" name="imobil[date][tip_camera][]" class="tip_camera hidden"/>
    <button id="adauga_camera" class="hidden">Adauga</button>
    <button id="imobil_back" class="hidden">Back</button>
    <button id="submit">Submit</button>
</form>

<?php @include_once APP_PATH.'view/snippets/footer.tpl.php'; ?>

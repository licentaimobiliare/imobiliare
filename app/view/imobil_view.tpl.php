<?php @include_once APP_PATH.'view/snippets/header.tpl.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo $config['domain']; ?>/media/css/imobil_view.css" />
<script src="<?php echo $config['domain']; ?>/media/js/imobil_view.js"></script>
<?php // echo '<pre>';var_dump($imobil);die; ?>
<script type="text/javascript">
window.idi=<?php echo $imobil->idi;?></script>
<div class="main">
        <div class="container_12">
            <div class="grid_8">
                <h4 id="imobil_title"><?php echo $imobil->tip_imobil;?></h4>
                <div class="row">
                    <p class="first"><span>Metri Patrati: </span> <?php echo $imobil->mp;?></p>
                    <p><span>Pret: </span> <?php echo $imobil->pret;?></p>
                </div>
                <div class="row">
                    <p class="first"><span>Tip locuinta: </span><?php echo $imobil->tip_locuinta?></p>
                    <p><span>Cartier: </span> <?php echo $imobil->cartier; ?></p>
                </div>
                <div class="row">
                    <p class="first"><span>Tip contructie: </span><?php echo $imobil->tip_constructie;?></p>
                    <p><span>Data constructiei: </span><?php echo $imobil->data_constructie;?></p>
                </div>
                <div class="row">
                    <p class="first"><span>Finisaj: </span><?php echo $imobil->finisaj;?></p>
                    <p><span>Data inregistrarii: </span><?php echo $imobil->data_inregistrare;?></p>
                </div>
                <?php 
                if (in_array($user->tip,array('administrator','angajat'))) {
                    ?>
                <form method="POST" action="" enctype="multipart/form-data">
                    Poze imobil:<input name="filesToUpload[]" id="filesToUpload" type="file" multiple="" />
                    <button>Adauga</button>
                </form>
                <button onclick="window.location.href=window.location.origin+'/imobil/tranzactie/<?php echo $imobil->idi ?>'">
                    Tranzactie</button>
                <?php } ?>
            </div>
            <div class="grid_4">
                <div class="camere">
                    <h4>Camere</h4>
                    <?php foreach($imobil->camere as $camera){ ?>
                    <p><?php echo $camera['tip_camera'].': '.$camera['nr_camere']?></p>
                    <?php } ?>
                </div>
                <hr />
                <div>
                    <?php echo $imobil->descriere;?>
                </div>
                <hr />
                <div>
                    <h5>Adresa</h5>
                    <p>
                    <?php $adresa=$imobil->adresa;global $id_tip_imobile_apartament;
                        echo $adresa['tip_strada'].' '.$adresa['nume_strada'].
                            ' nr. '.$adresa['numar'].' cod postal '.$adresa['cod_postal'];
                         if(in_array($adresa->idti, $id_tip_imobile_apartament))
                             echo ' blocu '.$adresa['numar_imobil'].' ap. '.$adresa['apartament'].
                             ' sc. '.$adresa['scara'].' et. '.$adresa['etaj'];
                    ?>
                    </p>
                </div>
            </div>
        </div>
</div>

<?php @include_once APP_PATH.'view/snippets/footer.tpl.php'; ?>

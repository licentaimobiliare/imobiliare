<?php @include_once APP_PATH.'view/snippets/header.tpl.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo $config['domain']; ?>/media/css/imobil_view.css" />
<script src="<?php echo $config['domain']; ?>/media/js/imobil_view.js"></script>
<?php // echo '<pre>';var_dump($imobil);die; ?>
<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM&sensor=false"></script>
<script src="<?php echo $config['domain']; ?>/media/js/map.js"></script>
<script type="text/javascript">
window.idi=<?php echo $imobil->idi;?>;
<?php if(!empty($imobil_marker)){ ?>
    window.imobil_location={};
    <?php foreach($imobil_marker as $key => $value ){ ?>
        window.imobil_location.<?php echo "$key";?>='<?php echo ($key == 'address' ? urlencode($value) : $value);?>';
    <?php } ?>
    
<?php }?>
</script>
<div class="main">
        <div class="container_12">
            <div class="grid_8">
                <?php echo (!empty($message_tranzactie) ? '<p class="'.($message_tranzactie['succes']==1 ? "success" : "error").'">'.$message_tranzactie['message'].'</p>' : "") ?>
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
                <div class="proprietar">
                        <h3>Proprietar</h3>
                        <div class="row">
                            <p class="first"><span>CNP:</span> <?php echo $imobil->idp; ?></p>
                            <p><span>Nume: </span><?php echo $imobil->proprietar['nume']; ?></p>
                        </div>
                        <div class="row">
                            <p class="first"><span>Strada: </span><?php echo $imobil->proprietar['strada']; ?></p>
                            <p><span>Nr: </span><?php echo $imobil->proprietar['nr']; ?></p>
                        </div>
                        <div class="row">
                            <p class="first"><span>Bl: </span><?php echo $imobil->proprietar['bl']; ?></p>
                            <p><span>Ap: </span><?php echo $imobil->proprietar['ap']; ?></p>
                        </div>
                        <div class="row">
                            <p class="first"><span>Sc: </span><?php echo $imobil->proprietar['sc']; ?></p>
                            <p><span>Et: </span><?php echo $imobil->proprietar['et']; ?></p>
                        </div>
                        <div class="row">
                            <p class="first"><span>Oras: </span><?php echo $imobil->proprietar['oras']; ?></p>
                            <p><span>Judet: </span><?php echo $imobil->proprietar['judet']; ?></p>
                        </div>
                    </div>
                <form method="POST" action="" enctype="multipart/form-data">
                    Poze imobil:<input name="filesToUpload[]" id="filesToUpload" type="file" multiple="" />
                    <button>Adauga</button>
                </form>
                <button onclick="window.location.href=window.location.origin+'/imobil/tranzactie/<?php echo $imobil->idi ?>'">
                    Tranzactie</button>
                <form method="POST" action="">
                    <button name="track" value="track">Track</button>
                </form>
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
                <div class="adresa">
                    <h5>Adresa</h5>
                    <p>
                    <?php 
                    if(in_array($user->tip,array('administrator','angajat'))){
                        $adresa=$imobil->adresa;global $id_tip_imobile_apartament;
                        echo $adresa['tip_strada'].' '.$adresa['nume_strada'].
                                ' nr. '.$adresa['numar'].' cod postal '.$adresa['cod_postal'];
                        if(in_array($adresa->idti, $id_tip_imobile_apartament))
                           echo ' blocu '.$adresa['numar_imobil'].' ap. '.$adresa['apartament'].
                                ' sc. '.$adresa['scara'].' et. '.$adresa['etaj'];
                    } ?>
                    </p>
                       <div id="googleMap" style="width:300px;height:180px;"></div>
                </div>    
            </div>
        </div>
</div>
 <div id="dialog-confirm"></div>
<?php @include_once APP_PATH.'view/snippets/footer.tpl.php'; ?>

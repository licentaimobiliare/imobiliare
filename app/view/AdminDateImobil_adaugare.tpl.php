<?php

@include_once APP_PATH . 'view/snippets/header.tpl.php'; ?>

    <?php
    if ($params[0] == 'finisaj') {
        ?>
        <?php echo (!empty($finisaj) ? 'Actualizare tipuri de finisaje' : 'Adauga un nou tip de finisaj') ?>
      
        <form method="POST" action="">
            <input type="text" name="txtfinisaj" placeholder="Nume finisaj"
                   <?php if(!empty($finisaj)) echo 'value="'.$finisaj->finisaj.'"'?>>
            <input type="submit" name="adauga_finisaj" 
                   value="<?php echo (!empty($finisaj) ? 'Actualizeaza' : 'Adauga') ?>">
        </form> 
        <?php
    }
    if ($params[0] == 'TipConstructie') {
       
        ?>
        <?php echo (!empty($tc) ? 'Actualizare tipuri de constructii' : 'Adauga un nou tip de constructie') ?>
       
        <form method="POST" action="">
            <input type="text" name="txttc" placeholder="Tip Constructie"
                   <?php if(!empty($tc)) echo 'value="'.$tc->tip_constructie.'"'?>>
            <input type="submit" name="adauga_tc" 
                   value="<?php echo (!empty($tc) ? 'Actualizeaza' : 'Adauga') ?>">
        </form> 
        <?php
    }
        if ($params[0] == 'TipLocuinta') {
            ?>
            <?php echo (!empty($TipLocuinta) ? 'Actualizare tipuri de locuinte' : 'Adauga un nou tip de locuinta') ?>
            <form method="POST" action="">
                <input type="text" name="txttl" placeholder="Tip Locuinta"
                       <?php if(!empty($TipLocuinta)) echo 'value="'.$TipLocuinta->tip_locuinta.'"'?>>
                <input type="submit" name="adauga_tl" value="<?php echo (!empty($TipLocuinta) ? 'Actualizeaza' : 'Adauga') ?>">
            </form> 


            <?php
        }
        if ($params[0] == 'TipImobil') {
            ?>
            <?php echo (!empty($TipImobil) ? 'Actualizeaza tipurile de imobile' : 'Adauga un nou tip de imobil') ?>
            <form method="POST" action="">
                <input type="text" name="txtti" placeholder="Tip Imobil"
                       <?php if(!empty($TipImobil)) echo 'value="'.$TipImobil->tip_imobil.'"'?>>
                <input type="submit" name="adauga_ti" value="<?php echo (!empty($TipImobil) ? 'Actualizeaza' : 'Adauga') ?>">
            </form> 


            <?php
        }
            if ($params[0] == 'TipStrada') {
                ?>
               <?php echo (!empty($TipStrada) ? 'Actualizeaza tipurile de strazi' : 'Adauga un nou tip de strada') ?>
                <form method="POST" action="">
                    <input type="text" name="txtts" placeholder="Tip Strada"
                           <?php if(!empty($TipStrada)) echo 'value="'.$TipStrada->tip_strada.'"'?>>
                    <input type="submit" name="adauga_ts" value="<?php echo (!empty($TipStrada) ? 'Actualizeaza' : 'Adauga') ?>">
                </form> 


                <?php
            }
            if ($params[0] == 'TipServiciu') {
                ?>
                <?php echo (!empty($TipServiciu) ? 'Actualizeaza tipurile de servicii' : 'Adauga un nou tip de serviciu') ?>
                <form method="POST" action="">
                    <input type="text" name="txtserviciu" placeholder="Nume serviciu"
                           <?php if(!empty($TipServiciu)) echo 'value="'.$TipServiciu->serviciu.'"'?>>
                    <input type="submit" name="adauga_serviciu" 
                           value="<?php echo (!empty($TipServiciu) ? 'Actualizeaza' : 'Adauga') ?>">
                </form> 


                <?php
            }
            if ($params[0] == 'Client') {
                ?>
               <?php echo (!empty($Client) ? 'Actualizeaza clienti' : 'Adauga un nou tip de client') ?>
                <form method="POST" action="">
                    <input type="text" name="txtcnp" placeholder="CNP" <?php if(!empty($Client)) echo 'value="'.$Client->cnp.'"'?>>
                    <input type="text" name="txtnume" placeholder="Nume" <?php if(!empty($Client)) echo 'value="'.$Client->nume.'"'?>>
                    <input type="text" name="txtprenume" placeholder="Prenume" <?php if(!empty($Client)) echo 'value="'.$Client->prenume.'"'?>>
                    <input type="text" name="txttelefon" placeholder="Telefon" <?php if(!empty($Client)) echo 'value="'.$Client->telefon.'"'?>>
                    <input type="submit" name="adauga_client" 
                           value="<?php echo (!empty($Client) ? 'Actualizeaza' : 'Adauga') ?>">
                </form> 


                <?php
            }
            if ($params[0] == 'Proprietar') {
                ?>
               <?php echo (!empty($Proprietar) ? 'Actualizeaza proprietarii' : 'Adauga un nou proprietar') ?>
                <form method="POST" action="">
                    <input type="text" name="txtcnp" placeholder="CNP" <?php if(!empty($Proprietar)) echo 'value="'.$Proprietar->cnp.'"'?>>
                    <input type="text" name="txtnume" placeholder="Nume" <?php if(!empty($Proprietar)) echo 'value="'.$Proprietar->nume.'"'?>>
                    <input type="text" name="txtstrada" placeholder="Strada" <?php if(!empty($Proprietar)) echo 'value="'.$Proprietar->strada.'"'?>>
                    <input type="text" name="txtnr" placeholder="Numar" <?php if(!empty($Proprietar)) echo 'value="'.$Proprietar->nr.'"'?>>
                    <input type="text" name="txtbl" placeholder="Bloc" <?php if(!empty($Proprietar)) echo 'value="'.$Proprietar->bl.'"'?>>
                    <input type="text" name="txtap" placeholder="Apartament" <?php if(!empty($Proprietar)) echo 'value="'.$Proprietar->ap.'"'?>>
                    <input type="text" name="txtsc" placeholder="Scara" <?php if(!empty($Proprietar)) echo 'value="'.$Proprietar->sc.'"'?>>
                    <input type="text" name="txtet" placeholder="Etaj" <?php if(!empty($Proprietar)) echo 'value="'.$Proprietar->et.'"'?>>
                    <input type="text" name="txtoras" placeholder="Oras" <?php if(!empty($Proprietar)) echo 'value="'.$Proprietar->oras.'"'?>>
                    <input type="text" name="txtjudet" placeholder="Judet" <?php if(!empty($Proprietar)) echo 'value="'.$Proprietar->judet.'"'?>>
                    <input type="submit" name="adauga_proprietar" 
                           value="<?php echo (!empty($Proprietar) ? 'Actualizeaza' : 'Adauga') ?>">
                </form> 
                <?php
            }
            if ($params[0] == 'CodPostal') {
                ?>
               <?php echo (!empty($CodPostal) ? 'Actualizeaza codurile postale' : 'Adauga un nou cod postal') ?>
                <form method="POST" action="">
                    <input type="text" name="txtcd" placeholder="Cod postal"
                           <?php if(!empty($CodPostal)) echo 'value="'.$CodPostal->cod_postal.'"'?>>
                    <input type="submit" name="adauga_cd" 
                           value="<?php echo (!empty($CodPostal) ? 'Actualizeaza' : 'Adauga') ?>">
                </form> 
            <?php } 
            if ($params[0] == 'Numar') {
                ?>
                <?php echo (!empty($Numar) ? 'Actualizeaza numerele' : 'Adauga un nou numar') ?>
                <form method="POST" action="">
                    <input type="text" name="txtnr" placeholder="numar"
                           <?php if(!empty($Numar)) echo 'value="'.$Numar->numar.'"'?>>
                    <input type="submit" name="adauga_nr" 
                           value="<?php echo (!empty($Numar) ? 'Actualizeaza' : 'Adauga') ?>">
                </form> 
            <?php }     
             if ($params[0] == 'User') {
                ?>
                 <?php echo (!empty($User) ? 'Actualizeaza utilizatorii' : 'Adauga un nou utilizator') ?>
                <form method="POST" action="">
                    <input type="text" name="txtnume" placeholder="Nume" <?php if(!empty($User)) echo 'value="'.$User->nume_user.'"'?>>
                    <input type="text" name="txtparola" placeholder="Parola" <?php if(!empty($User)) echo 'value="'.$User->parola.'"'?>>
                    <input type="text" name="txtmentiuni" placeholder="Mentiuni" <?php if(!empty($User)) echo 'value="'.$User->mentiuni.'"'?>>
                    <input type="text" name="txttelefon" placeholder="Telefon" <?php if(!empty($User)) echo 'value="'.$User->telefon.'"'?>>
                    <input type="text" name="txtemail" placeholder="Email" <?php if(!empty($User)) echo 'value="'.$User->email.'"'?>>
                    <input type="text" name="txttip" placeholder="Tip" <?php if(!empty($User)) echo 'value="'.$User->tip.'"'?>>
                    <input type="submit" name="adauga_user" 
                           value="<?php echo (!empty($User) ? 'Actualizeaza' : 'Adauga') ?>">
                </form> 
            <?php }  
            if ($params[0] == 'Markers') {
                ?>
                 <?php echo (!empty($Markers) ? 'Actualizeaza harta' : 'Adauga un nou imobil pe harta') ?>
                <form method="POST" action="">
                    <input type="text" name="txtname" placeholder="Nume" <?php if(!empty($Markers)) echo 'value="'.$Markers->name.'"'?>>
                    <input type="text" name="txtadress" placeholder="Adresa" <?php if(!empty($Markers)) echo 'value="'.$Markers->address.'"'?>>
                    <input type="text" name="txtlat" placeholder="Latitudine" <?php if(!empty($Markers)) echo 'value="'.$Markers->lat.'"'?>>
                    <input type="text" name="txtlng" placeholder="Longitudine" <?php if(!empty($Markers)) echo 'value="'.$Markers->lng.'"'?>>
                    <input type="text" name="txttype" placeholder="Tip" <?php if(!empty($Markers)) echo 'value="'.$Markers->type.'"'?>>
                    <input type="submit" name="adauga_markers" 
                           value="<?php echo (!empty($Markers) ? 'Actualizeaza' : 'Adauga') ?>">
                </form> 
            <?php }   
             
                if ($params[0] == 'Strazi') {
                ?>
                 <?php echo (!empty($Strazi) ? 'Actualizeaza o strada' : 'Adauga o noua strada') ?>
                <form method="POST" action="">
                    <input type="text" name="txtnume" placeholder="Nume strada" <?php if(!empty($Strazi)) echo 'value="'.$Strazi->nume.'"'?>>
                    <input type="text" placeholder="Tip strada" name="txtts">
                    <input type="submit" name="adauga_strada" 
                           value="<?php echo (!empty($Strazi) ? 'Actualizeaza' : 'Adauga') ?>">
                </form> 
            <?php } ?>
        
        <?php @include APP_PATH . 'view/snippets/footer.tpl.php'; ?>

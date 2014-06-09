<?php

@include_once APP_PATH . 'view/snippets/header.tpl.php'; ?>

    <?php
    if ($params[0] == 'finisaj') {
        ?>
        <p> Adauga un nou tip de finisaj </p><br>
        <form method="POST" action="">
            <input type="text" name="txtfinisaj" placeholder="Nume finisaj"
                   <?php if(!empty($finisaj)) echo 'value="'.$finisaj->finisaj.'"'?>>
            <input type="submit" name="adauga_finisaj" value="Adauga">
        </form> 
        <?php
    }
    if ($params[0] == 'TipConstructie') {
        ?>
        <p> Adauga un nou tip de constructie </p><br>
        <form method="POST" action="">
            <input type="text" name="txttc" placeholder="Tip Constructie">
            <input type="submit" name="adauga_tc" value="Adauga">
        </form> 
        <?php
    }
        if ($params[0] == 'TipLocuinta') {
            ?>
            <p> Adauga un nou tip de locuinta </p><br>
            <form method="POST" action="">
                <input type="text" name="txttl" placeholder="Tip Locuinta">
                <input type="submit" name="adauga_tl" value="Adauga">
            </form> 


            <?php
        }
        if ($params[0] == 'TipImobil') {
            ?>
            <p> Adauga un nou tip de imobil </p><br>
            <form method="POST" action="">
                <input type="text" name="txtti" placeholder="Tip Imobil">
                <input type="submit" name="adauga_ti" value="Adauga">
            </form> 


            <?php
        }
            if ($params[0] == 'TipStrada') {
                ?>
                <p> Adauga un nou tip de strada </p><br>
                <form method="POST" action="">
                    <input type="text" name="txtts" placeholder="Tip Strada">
                    <input type="submit" name="adauga_ts" value="Adauga">
                </form> 


                <?php
            }
            if ($params[0] == 'TipServiciu') {
                ?>
                <p> Adauga un nou serviciu </p><br>
                <form method="POST" action="">
                    <input type="text" name="txtserviciu" placeholder="Nume serviciu">
                    <input type="submit" name="adauga_serviciu" value="Adauga">
                </form> 


                <?php
            }
            if ($params[0] == 'Client') {
                ?>
                <p> Adauga un nou client </p><br>
                <form method="POST" action="">
                    <input type="text" name="txtcnp" placeholder="CNP">
                    <input type="text" name="txtnume" placeholder="Nume">
                    <input type="text" name="txtprenume" placeholder="Prenume">
                    <input type="text" name="txttelefon" placeholder="Telefon">
                    <input type="submit" name="adauga_client" value="Adauga">
                </form> 


                <?php
            }
            if ($params[0] == 'Proprietar') {
                ?>
                <p> Adauga un nou proprietar </p><br>
                <form method="POST" action="">
                    <input type="text" name="txtcnp" placeholder="CNP">
                    <input type="text" name="txtnume" placeholder="Nume">
                    <input type="text" name="txtstrada" placeholder="Strada">
                    <input type="text" name="txtnr" placeholder="Numar">
                    <input type="text" name="txtbl" placeholder="Bloc">
                    <input type="text" name="txtap" placeholder="Apartament">
                    <input type="text" name="txtsc" placeholder="Scara">
                    <input type="text" name="txtet" placeholder="Etaj">
                    <input type="text" name="txtoras" placeholder="Oras">
                    <input type="text" name="txtjudet" placeholder="Judet">
                    <input type="submit" name="adauga_proprietar" value="Adauga">
                </form> 
                <?php
            }
            if ($params[0] == 'CodPostal') {
                ?>
                <p> Adauga un nou cod postal </p><br>
                <form method="POST" action="">
                    <input type="text" name="txtcd" placeholder="Cod postal">
                    <input type="submit" name="adauga_cd" value="Adauga">
                </form> 
            <?php } 
            if ($params[0] == 'Numar') {
                ?>
                <p> Adauga un nou numar </p><br>
                <form method="POST" action="">
                    <input type="text" name="txtnr" placeholder="numar">
                    <input type="submit" name="adauga_nr" value="Adauga">
                </form> 
            <?php }     
             if ($params[0] == 'User') {
                ?>
                <p> Adauga un nou utilizator </p><br>
                <form method="POST" action="">
                    <input type="text" name="txtnume" placeholder="Nume">
                    <input type="text" name="txtparola" placeholder="Parola">
                    <input type="text" name="txtmentiuni" placeholder="Mentiuni">
                    <input type="text" name="txttelefon" placeholder="Telefon">
                    <input type="text" name="txtemail" placeholder="Email">
                    <input type="text" name="txttip" placeholder="Tip">
                    <input type="submit" name="adauga_user" value="Adauga">
                </form> 
            <?php }  
            if ($params[0] == 'Markers') {
                ?>
                <p> Adauga un nou imobil pe harta </p><br>
                <form method="POST" action="">
                    <input type="text" name="txtname" placeholder="Nume">
                    <input type="text" name="txtadress" placeholder="Adresa">
                    <input type="text" name="txtlat" placeholder="Latitudine">
                    <input type="text" name="txtlng" placeholder="Longitudine">
                    <input type="text" name="txttype" placeholder="Tip">
                    <input type="submit" name="adauga_markers" value="Adauga">
                </form> 
            <?php }   
            if ($params[0] == 'Strazi') {
                ?>
                <p> Adauga o noua strada </p><br>
                <form method="POST" action="">
                    <input type="text" name="txtnume" placeholder="Nume strada">
                    <input type="text" placeholder="Tip strada" name="txtts">
                    <input type="submit" name="adauga_strada" value="Adauga">
                </form> 
            <?php } ?>
                
        
        <?php @include APP_PATH . 'view/snippets/footer.tpl.php'; ?>

<?php @include_once APP_PATH . 'view/snippets/header.tpl.php'; ?>

<link rel="stylesheet" type="text/css" href="<?php echo $config['domain']; ?>/media/css/admin.css" />


<div class="admin">


    <?php
    if ($params[0] == 'finisaj') {
        ?>
        <p> Adauga un nou tip de finisaj </p><br>
        <form method="POST" action="">
            <input type="text" name="txtfinisaj" placeholder="Nume finisaj">
            <input type="submit" name="adauga_finisaj" value="Next">
        </form> 
        <?php
    }
    if ($params[0] == 'TipConstructie') {
        ?>
        <p> Adauga un nou tip de constructie </p><br>
        <form method="POST" action="">
            <input type="text" name="txttc" placeholder="Tip Constructie">
            <input type="submit" name="adauga_tc" value="Next">
        </form> 


        <?php
    }
        if ($params[0] == 'TipLocuinta') {
            ?>
            <p> Adauga un nou tip de locuinta </p><br>
            <form method="POST" action="">
                <input type="text" name="txttl" placeholder="Tip Locuinta">
                <input type="submit" name="adauga_tl" value="Next">
            </form> 


            <?php
        }
        if ($params[0] == 'TipImobil') {
            ?>
            <p> Adauga un nou tip de imobil </p><br>
            <form method="POST" action="">
                <input type="text" name="txtti" placeholder="Tip Imobil">
                <input type="submit" name="adauga_ti" value="Next">
            </form> 


            <?php
        }
            if ($params[0] == 'TipStrada') {
                ?>
                <p> Adauga un nou tip de strada </p><br>
                <form method="POST" action="">
                    <input type="text" name="txtts" placeholder="Tip Strada">
                    <input type="submit" name="adauga_ts" value="Next">
                </form> 


                <?php
            }
            if ($params[0] == 'TipServiciu') {
                ?>
                <p> Adauga un nou serviciu </p><br>
                <form method="POST" action="">
                    <input type="text" name="txtserviciu" placeholder="Nume serviciu">
                    <input type="submit" name="adauga_serviciu" value="Next">
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
                    <input type="submit" name="adauga_client" value="Next">
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
                    <input type="submit" name="adauga_proprietar" value="Next">
                </form> 



                <?php
            }
            if ($params[0] == 'CodPostal') {
                ?>
                <p> Adauga un nou cod postal </p><br>
                <form method="POST" action="">
                    <input type="text" name="txtcd" placeholder="Cod postal">
                    <input type="submit" name="adauga_cd" value="Next">
                </form> 
            <?php } ?>
        </div>
        <?php @include APP_PATH . 'view/snippets/footer.tpl.php'; ?>
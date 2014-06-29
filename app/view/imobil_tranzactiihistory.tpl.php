<?php @include APP_PATH . 'view/snippets/header.tpl.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo $config['domain']; ?>/media/css/imobil_tranzactiihistory.css" />
<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script type="text/javascript" src="<?php echo $config['domain']; ?>/media/js/imobil_tanzactiihistory.js"></script>

<div class="cautare_avansata">
    <input type="button" value="Cautare Avansata" id="avansat">
    <div id="cautare_avansata">
        <input type="text" placeholder="Tip strada" />
        <input type="text" placeholder="Strada" />
        <input type="text" placeholder="Finisaj"/>
        <input type="text" placeholder="Tip Constructie"/>
        <input type="text" placeholder="Tip Locuinta"/>
        <input type="text" placeholder="Tip Imobil"/>
        <input type="button" value="Cauta" />
    </div>
</div>

<div class="table">
    <div class="row clona">
        <div class="detalii_imobil column">
            <a href='/imobil/view/' class='link_imobil'>
            <img class="imobil_avatar" src="<?php echo $config['domain'].'/media/images/imobil_pictures/@idi/avatar/@avatar';?>">
            <div>
            <span class="tip_imobil">Tip Imobil</span>
            <span class="pret">Pret</span>
            <span class="cartier">Cartier</span>
            <span class="data_inregistrare">Data inregistrare</span>
            </div></a>
        </div>
        
        <div class="detalii_proprietar column">
            <p><span>CNP:</span> @cnp </p>
            <p><span>Nume: </span>@nume </p>
            <p><span>Prenume: </span>@prenume </p>
            <p><span>Telefon: </span>@telefon </p>
        </div>  
        
        <div class="detalii_vanzare column">
            <h4>@serviciu</h4>
            <p><span>Data vanzare: </span>@data_vanzare</p>
            <p><span>Data final vanzare: </span>@data_final_vanzare</p>
        </div>
    </div>
</div>

<?php @include APP_PATH . 'view/snippets/footer.tpl.php'; ?>
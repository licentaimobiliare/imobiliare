<?php @include_once APP_PATH.'view/snippets/header.tpl.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo $config['domain']; ?>/media/css/cautare_style.css" />
<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script src="<?php echo $config['domain']; ?>/media/js/cautare.js"></script>
<div class="cautare">
    <?php global $user;
    if($user->tip == 'administrator'){ ?>
    <a href="/imobil/adaugare">Adauga imobil</a>
    <?php } ?>
    <div>
        Sortare dupa data inregistrarii
        <span><input type="radio" name="inregistrare" value="descrescator" checked/> Descrescator
        <input type="radio" name="inregistrare" value="crescator"/> Crescator</span>
    </div>
    
    <div>
        Sortare dupa data constructiei
        <span><input type="radio" name="constructie" value="descrescator" checked/> Descrescator
        <input type="radio" name="constructie" value="crescator"/> Crescator</span>
    </div>
</div>

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
<div class="container">
    <div class="item clona">
        <a href='/imobil/view/' class='link_imobil'>
            <img class="imobil_avatar" src="<?php echo $config['domain'].'/media/images/imobil_pictures/@idi/avatar/@avatar';?>">
            <span class="tip_imobil">Tip Imobil</span>
            <span class="pret">Pret</span>
            <span class="cartier">Cartier</span>
            <span class="data_inregistrare">Data inregistrare</span></a>
    </div>
</div>
<?php @include_once APP_PATH.'view/snippets/footer.tpl.php'; ?>


<?php @include_once APP_PATH.'view/snippets/header.tpl.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo $config['domain']; ?>/media/css/cautare_style.css" />
<script src="<?php echo $config['domain']; ?>/media/js/cautare.js"></script>
<div class="cautare">
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
<?php @include_once APP_PATH.'view/snippets/footer.tpl.php'; ?>


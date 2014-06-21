<?php @include_once APP_PATH . 'view/snippets/header.tpl.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo $config['domain']; ?>/media/css/cautare_style.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $config['domain']; ?>/media/css/imobil_comerciale.css" />

<div>
    <h3>Cele mai accesate imobile in ultima zi:</h3>
    <div class="container top_imobil">
        <?php foreach($top_imobile_site_lastday as $item){?>
        <div class="item">
            <a href='/imobil/view/<?php echo $item->idi; ?>' class='link_imobil'>
                <span class="tip_imobil"><?php echo $item->tip_imobil; ?></span>
                <span class="pret"><?php echo $item->pret; ?></span>
                <span class="cartier"><?php echo $item->cartier; ?></span>
                <span class="data_inregistrare"><?php echo $item->data_inregistrare; ?></span></a>
        </div>
        <?php }?>
    </div>
</div>
<div>
    <h3>Cele mai accesate imobile in ultima luna:</h3>
    <div class="container top_imobil">
        <?php foreach($top_imobile_site_lastmonth as $item){?>
        <div class="item">
            <a href='/imobil/view/<?php echo $item->idi; ?>' class='link_imobil'>
                <span class="tip_imobil"><?php echo $item->tip_imobil; ?></span>
                <span class="pret"><?php echo $item->pret; ?></span>
                <span class="cartier"><?php echo $item->cartier; ?></span>
                <span class="data_inregistrare"><?php echo $item->data_inregistrare; ?></span></a>
        </div>
        <?php }?>
    </div>
</div>
<div>
    <h3>Cele mai visitate imobile in ultima zi:</h3>
    <div class="container top_imobil">
        <?php foreach($top_imobile_teren_lastday as $item){?>
        <div class="item">
            <a href='/imobil/view/<?php echo $item->idi; ?>' class='link_imobil'>
                <span class="tip_imobil"><?php echo $item->tip_imobil; ?></span>
                <span class="pret"><?php echo $item->pret; ?></span>
                <span class="cartier"><?php echo $item->cartier; ?></span>
                <span class="data_inregistrare"><?php echo $item->data_inregistrare; ?></span></a>
        </div>
        <?php }?>
    </div>
</div>
<div>
    <h3>Cele mai vizitate imobile in ultima luna:</h3>
    <div class="container top_imobil">
        <?php foreach($top_imobile_teren_lastmonth as $item){?>
        <div class="item">
            <a href='/imobil/view/<?php echo $item->idi; ?>' class='link_imobil'>
                <span class="tip_imobil"><?php echo $item->tip_imobil; ?></span>
                <span class="pret"><?php echo $item->pret; ?></span>
                <span class="cartier"><?php echo $item->cartier; ?></span>
                <span class="data_inregistrare"><?php echo $item->data_inregistrare; ?></span></a>
        </div>
        <?php }?>
    </div>
</div>
<?php @include_once APP_PATH . 'view/snippets/footer.tpl.php'; ?>
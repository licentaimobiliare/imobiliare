<?php @include APP_PATH . 'view/snippets/header.tpl.php'; ?>
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM&sensor=false"></script>
<script type="text/javascript">
    window.imobils_location=[];
    <?php foreach($imobils_location as $imobil){?>
        Array.prototype.push.call(window.imobils_location,{lat:<?php echo $imobil->lat;?>,lng:<?php echo $imobil->lng;?>,
        name:'<?php echo $imobil->name?>'});
    <?php }?>
</script>
<script src="<?php echo $config['domain']; ?>/media/js/localizare_harta.js"></script>
<p id="geo"> Click aici pentru a-ti vedea pozitia actuala:<p>
    <button onclick="getLocation()">Vizualizare</button><br><br>
<div id="mapholder" style="width: 700px;height: 500px;margin: 0 auto;" class="hidden"></div>
<?php @include APP_PATH . 'view/snippets/footer.tpl.php'; ?>
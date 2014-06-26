<?php @include APP_PATH . 'view/snippets/header.tpl.php'; ?>


<script src="<?php echo $config['domain']; ?>/media/js/localizare_harta.js"></script>
<p id="geo"> Click aici pentru a-ti vedea pozitia actuala:<p>
    <button onclick="getLocation()">Vizualizare</button><br><br>
			<div id="mapholder"></div>
<?php @include APP_PATH . 'view/snippets/footer.tpl.php'; ?>
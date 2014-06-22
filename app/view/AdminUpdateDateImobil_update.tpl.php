<?php
@include_once APP_PATH . 'view/snippets/header.tpl.php'; ?>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script scr="/media/js/update.js"></script>
    <?php
    
    if ($params[0] == 'finisaj') {?>
       
<p>	Tipuri de finisaj </p>
       <select name="f">
            <?php  foreach(controller_AdminUpdateDateImobil:: getFinisaj() as $finisaj){ ?>
                <option value="$finisaj['finsaj']"><?php echo $finisaj['finisaj']?></option>
              <?php } ?>
 </select>
        <p> Editare finisaj </p><br>
        <form method="POST" action="">
            <input type="text" name="txtfinisaj" placeholder="Nume finisaj">
            <input type="submit" name="adauga_finisaj" value="Adauga">
        </form> 
        <?php
    }?>
<?php
@include_once APP_PATH . 'view/snippets/header.tpl.php'; ?>

    <?php
    
    if ($params[0] == 'finisaj') {?>
       
<p>	Tipuri de finisaj </p>
       <select name="finisaj">
           
           print '<option value="'.$row['id'].'">'.$row['nume'].'</option>';
			
					
		?>
		</select>
		<input type="hidden" name="id" value="<?php print $row['id']?>">
		
       
        
        ?>
        <p> Editare finisaj </p><br>
        <form method="POST" action="">
            <input type="text" name="txtfinisaj" placeholder="Nume finisaj">
            <input type="submit" name="adauga_finisaj" value="Adauga">
        </form> 
        <?php
    }?>
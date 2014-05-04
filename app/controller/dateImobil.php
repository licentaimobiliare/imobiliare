<?php

class controller_dateImobil {

	/**
	 * This is the homepage.
	 */
	function action_adaugare($params) {
            
            if (isset($_POST['adauga_finisaj']))
            {
               $exemplu=array('tip_constructie'=>'asdf');
               $rezultat= model_DateImobil :: adaugafinisaj(array('finisaj'=>$_POST['txtfinisaj']));
               
                if ($rezultat !== FALSE)
                {
                     echo 'S-a inserat cu succes in baza de date';
                }
                else
                {
                     echo 'Inserare esuata!Te rog incearca din nou cu mai multa atentie!';
                } 
            }
           
           @include_once APP_PATH . 'view/dateImobil_adaugare.tpl.php';
        }
}


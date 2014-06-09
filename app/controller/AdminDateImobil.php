<?php

class controller_AdminDateImobil {

	function action_adaugare($params) {
            
            if (isset($_POST['adauga_finisaj']))
            {
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
           
           if (isset($_POST['adauga_tc']))
            {
               $rezultat= model_DateImobil :: adaugatc(array('tip_constructie'=>$_POST['txttc']));
                if ($rezultat !== FALSE)
                {
                     echo 'S-a inserat cu succes in baza de date';
                }
                else
                {
                     echo 'Inserare esuata!Te rog incearca din nou cu mai multa atentie!';
                } 
            }
            
            if (isset($_POST['adauga_tl']))
            {
               $rezultat= model_DateImobil :: adaugatl(array('tip_locuinta'=>$_POST['txttl']));
                if ($rezultat !== FALSE)
                {
                     echo 'S-a inserat cu succes in baza de date';
                }
                else
                {
                     echo 'Inserare esuata!Te rog incearca din nou cu mai multa atentie!';
                } 
            }
            
            if (isset($_POST['adauga_ti']))
            {
               $rezultat= model_DateImobil :: adaugati(array('tip_imobil'=>$_POST['txtti']));
                if ($rezultat !== FALSE)
                {
                     echo 'S-a inserat cu succes in baza de date';
                }
                else
                {
                     echo 'Inserare esuata!Te rog incearca din nou cu mai multa atentie!';
                } 
            }
            
            if (isset($_POST['adauga_ts']))
            {
               $rezultat= model_DateImobil :: adaugats(array('tip_strada'=>$_POST['txtts']));
                if ($rezultat !== FALSE)
                {
                     echo 'S-a inserat cu succes in baza de date';
                }
                else
                {
                     echo 'Inserare esuata!Te rog incearca din nou cu mai multa atentie!';
                } 
            }
            
            if (isset($_POST['adauga_serviciu']))
            {
               $rezultat= model_DateImobil :: adaugaserviciu(array('tip_locuinta'=>$_POST['txttl']));
                if ($rezultat !== FALSE)
                {
                     echo 'S-a inserat cu succes in baza de date';
                }
                else
                {
                     echo 'Inserare esuata!Te rog incearca din nou cu mai multa atentie!';
                } 
            }
            
            if (isset($_POST['adauga_client']))
            {
               $rezultat= model_DateImobil :: adaugaclient(array('CNP'=>$_POST['txtcnp'],'nume'=>$_POST['txtnume'],'prenume'=>$_POST['txtprenume'],'telefon'=>$_POST['txttelefon']));
                if ($rezultat !== FALSE)
                {
                     echo 'S-a inserat cu succes in baza de date';
                }
                else
                {
                     echo 'Inserare esuata!Te rog incearca din nou cu mai multa atentie!';
                } 
            }
            
            if (isset($_POST['adauga_proprietar']))
            {
               $rezultat= model_imobil :: addProprietar(array('cnp'=>$_POST['txtcnp'],'nume'=>$_POST['txtnume'],'strada'=>$_POST['txtstrada'],'nr'=>$_POST['txtnr'],'bl'=>$_POST['txtbl'],'ap'=>$_POST['txtap'],'sc'=>$_POST['txtsc'],'et'=>$_POST['txtet'],'oras'=>$_POST['txtoras'],'judet'=>$_POST['txtjudet']));
                if ($rezultat !== FALSE)
                {
                     echo 'S-a inserat cu succes in baza de date';
                }
                else
                {
                     echo 'Inserare esuata!Te rog incearca din nou cu mai multa atentie!';
                } 
            }
            
            
            if (isset($_POST['adauga_cd']))
            {
               $rezultat= model_DateImobil :: adaugacp(array('cod_postal'=>$_POST['txtcd']));
                if ($rezultat !== FALSE)
                {
                     echo 'S-a inserat cu succes in baza de date';
                }
                else
                {
                     echo 'Inserare esuata!Te rog incearca din nou cu mai multa atentie!';
                } 
            }
            
             if (isset($_POST['adauga_nr']))
            {
               $rezultat= model_DateImobil :: adauganumar(array('numar'=>$_POST['txtnr']));
                if ($rezultat !== FALSE)
                {
                     echo 'S-a inserat cu succes in baza de date';
                }
                else
                {
                     echo 'Inserare esuata!Te rog incearca din nou cu mai multa atentie!';
                } 
            }
            
            if (isset($_POST['adauga_user']))
            {
               $rezultat= model_user :: add(array('nume_user'=>$_POST['txtnume'],'parola'=>$_POST['txtparola'],'mentiuni'=>$_POST['txtmentiuni'],'telefon'=>$_POST['txttelefon'],'email'=>$_POST['txtemail'],'tip'=>$_POST['txttip']));
                if ($rezultat !== FALSE)
                {
                     echo 'S-a inserat cu succes in baza de date';
                }
                else
                {
                     echo 'Inserare esuata!Te rog incearca din nou cu mai multa atentie!';
                } 
            }
            
             if (isset($_POST['adauga_markers']))
            {
               $rezultat= model_DateImobil :: adaugamarkers(array('name'=>$_POST['txtname'],'adress'=>$_POST['txtadress'],'lat'=>$_POST['txtlat'],'lng'=>$_POST['txtlng'],'type'=>$_POST['txttype']));
                if ($rezultat !== FALSE)
                {
                     echo 'S-a inserat cu succes in baza de date';
                }
                else
                {
                     echo 'Inserare esuata!Te rog incearca din nou cu mai multa atentie!';
                } 
            }
            
            if (isset($_POST['adauga_strada']))
            {
               $tip_strada = model_DateImobil::tsGetByName($_POST['txtts']);
               if ($tip_strada != NULL){
                   
                $rezultat= model_DateImobil :: adaugastrada(array('nume'=>$_POST['txtnume'],'idts'=>$_POST['tip_strada']));
                if ($rezultat !== FALSE)
                {
                     echo 'S-a inserat cu succes in baza de date';
                }
                else
                {
                     echo 'Inserare esuata!Te rog incearca din nou cu mai multa atentie!';
                } 
            }
            }
            
           @include_once APP_PATH . 'view/AdminDateImobil_adaugare.tpl.php';
        }
        
    function action_lista($params){
        switch ($params[0]){
            case "finisaj":
                $date=  model_DateImobil::FinisajListName("%");
                foreach ($date as $data){
                    $data->view_name=$data->finisaj;
                }
                break;
        }
        
        @include_once APP_PATH . 'view/AdminDateImobil_lista.tpl.php';
        
    }
}

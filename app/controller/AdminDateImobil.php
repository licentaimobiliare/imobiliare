<?php

class controller_AdminDateImobil {

    function action_adaugare($params) {
        if (empty($params[1])) {
            if (isset($_POST['adauga_finisaj'])) {
                $rezultat = model_DateImobil :: adaugafinisaj(array('finisaj' => $_POST['txtfinisaj']));

                if ($rezultat !== FALSE) {
                    echo 'S-a inserat cu succes in baza de date';
                } else {
                    echo 'Inserare esuata!Te rog incearca din nou cu mai multa atentie!';
                }
            }

            if (isset($_POST['adauga_tc'])) {
                $rezultat = model_DateImobil :: adaugatc(array('tip_constructie' => $_POST['txttc']));
                if ($rezultat !== FALSE) {
                    echo 'S-a inserat cu succes in baza de date';
                } else {
                    echo 'Inserare esuata!Te rog incearca din nou cu mai multa atentie!';
                }
            }

            if (isset($_POST['adauga_tl'])) {
                $rezultat = model_DateImobil :: adaugatl(array('tip_locuinta' => $_POST['txttl']));
                if ($rezultat !== FALSE) {
                    echo 'S-a inserat cu succes in baza de date';
                } else {
                    echo 'Inserare esuata!Te rog incearca din nou cu mai multa atentie!';
                }
            }

            if (isset($_POST['adauga_ti'])) {
                $rezultat = model_DateImobil :: adaugati(array('tip_imobil' => $_POST['txtti']));
                if ($rezultat !== FALSE) {
                    echo 'S-a inserat cu succes in baza de date';
                } else {
                    echo 'Inserare esuata!Te rog incearca din nou cu mai multa atentie!';
                }
            }

            if (isset($_POST['adauga_ts'])) {
                $rezultat = model_DateImobil :: adaugats(array('tip_strada' => $_POST['txtts']));
                if ($rezultat !== FALSE) {
                    echo 'S-a inserat cu succes in baza de date';
                } else {
                    echo 'Inserare esuata!Te rog incearca din nou cu mai multa atentie!';
                }
            }

            if (isset($_POST['adauga_serviciu'])) {
                $rezultat = model_DateImobil :: adaugaserviciu(array('tip_locuinta' => $_POST['txttl']));
                if ($rezultat !== FALSE) {
                    echo 'S-a inserat cu succes in baza de date';
                } else {
                    echo 'Inserare esuata!Te rog incearca din nou cu mai multa atentie!';
                }
            }

            if (isset($_POST['adauga_client'])) {
                $rezultat = model_DateImobil :: adaugaclient(array('CNP' => $_POST['txtcnp'], 'nume' => $_POST['txtnume'], 'prenume' => $_POST['txtprenume'], 'telefon' => $_POST['txttelefon']));
                if ($rezultat !== FALSE) {
                    echo 'S-a inserat cu succes in baza de date';
                } else {
                    echo 'Inserare esuata!Te rog incearca din nou cu mai multa atentie!';
                }
            }

            if (isset($_POST['adauga_proprietar'])) {
                $rezultat = model_imobil :: addProprietar(array('cnp' => $_POST['txtcnp'], 'nume' => $_POST['txtnume'], 'strada' => $_POST['txtstrada'], 'nr' => $_POST['txtnr'], 'bl' => $_POST['txtbl'], 'ap' => $_POST['txtap'], 'sc' => $_POST['txtsc'], 'et' => $_POST['txtet'], 'oras' => $_POST['txtoras'], 'judet' => $_POST['txtjudet']));
                if ($rezultat !== FALSE) {
                    echo 'S-a inserat cu succes in baza de date';
                } else {
                    echo 'Inserare esuata!Te rog incearca din nou cu mai multa atentie!';
                }
            }


            if (isset($_POST['adauga_cd'])) {
                $rezultat = model_DateImobil :: adaugacp(array('cod_postal' => $_POST['txtcd']));
                if ($rezultat !== FALSE) {
                    echo 'S-a inserat cu succes in baza de date';
                } else {
                    echo 'Inserare esuata!Te rog incearca din nou cu mai multa atentie!';
                }
            }

            if (isset($_POST['adauga_nr'])) {
                $rezultat = model_DateImobil :: adauganumar(array('numar' => $_POST['txtnr']));
                if ($rezultat !== FALSE) {
                    echo 'S-a inserat cu succes in baza de date';
                } else {
                    echo 'Inserare esuata!Te rog incearca din nou cu mai multa atentie!';
                }
            }

            if (isset($_POST['adauga_user'])) {
                $rezultat = model_user :: add(array('nume_user' => $_POST['txtnume'], 'parola' => $_POST['txtparola'], 'mentiuni' => $_POST['txtmentiuni'], 'telefon' => $_POST['txttelefon'], 'email' => $_POST['txtemail'], 'tip' => $_POST['txttip']));
                if ($rezultat !== FALSE) {
                    echo 'S-a inserat cu succes in baza de date';
                } else {
                    echo 'Inserare esuata!Te rog incearca din nou cu mai multa atentie!';
                }
            }

            if (isset($_POST['adauga_markers'])) {
                $rezultat = model_DateImobil :: adaugamarkers(array('name' => $_POST['txtname'], 'adress' => $_POST['txtadress'], 'lat' => $_POST['txtlat'], 'lng' => $_POST['txtlng'], 'type' => $_POST['txttype']));
                if ($rezultat !== FALSE) {
                    echo 'S-a inserat cu succes in baza de date';
                } else {
                    echo 'Inserare esuata!Te rog incearca din nou cu mai multa atentie!';
                }
            }

            if (isset($_POST['adauga_strada'])) {
                $tip_strada = model_DateImobil::tsGetByName($_POST['txtts']);
                if ($tip_strada != NULL) {

                    $rezultat = model_DateImobil :: adaugastrada(array('nume' => $_POST['txtnume'], 'idts' => $tip_strada->idts));
                    if ($rezultat !== FALSE) {
                        echo 'S-a inserat cu succes in baza de date';
                    } else {
                        echo 'Inserare esuata!Te rog incearca din nou cu mai multa atentie!';
                    }
                }
            }
        }
        else{
            if($_POST){
                switch($params[0]){
                    case "finisaj":
                        $rezultat = model_DateImobil :: updatefinisaj(array('finisaj'=>$_POST['txtfinisaj'], 'idf'=>$params[1]));
                        if ($rezultat !== FALSE) {
                                 echo 'S-a inserat cu succes in baza de date';
                         } else {
                                  echo 'Inserare esuata!Te rog incearca din nou cu mai multa atentie!';
                         }
                        break;
                        
                    case "TipConstructie":
                        $rezultat = model_DateImobil :: updatetc(array('tip_constructie'=>$_POST['txttc'], 'idtc'=>$params[1]));
                        if ($rezultat !== FALSE) {
                                 echo 'S-a inserat cu succes in baza de date';
                         } else {
                                  echo 'Inserare esuata!Te rog incearca din nou cu mai multa atentie!';
                         }
                        break;
                        
                    case "TipLocuinta":
                        $rezultat = model_DateImobil :: updatetl(array('tip_locuinta'=>$_POST['txttl'], 'idtl'=>$params[1]));
                        if ($rezultat !== FALSE) {
                                 echo 'S-a inserat cu succes in baza de date';
                         } else {
                                  echo 'Inserare esuata!Te rog incearca din nou cu mai multa atentie!';
                         }
                        break;
                        
                    case "TipImobil":
                        $rezultat = model_DateImobil :: updateti(array('tip_imobil'=>$_POST['txtti'], 'idti'=>$params[1]));
                        if ($rezultat !== FALSE) {
                                 echo 'S-a inserat cu succes in baza de date';
                         } else {
                                  echo 'Inserare esuata!Te rog incearca din nou cu mai multa atentie!';
                         }
                        break;
                        
                    case "TipStrada":
                        $rezultat = model_DateImobil :: updatets(array('tip_strada'=>$_POST['txtts'], 'idts'=>$params[1]));
                        if ($rezultat !== FALSE) {
                                 echo 'S-a inserat cu succes in baza de date';
                         } else {
                                  echo 'Inserare esuata!Te rog incearca din nou cu mai multa atentie!';
                         }
                        break;
                        
                    case "TipServiciu":
                        $rezultat = model_DateImobil :: updateservicii(array('serviciu'=>$_POST['txtserviciu'], 'ids'=>$params[1]));
                        if ($rezultat !== FALSE) {
                                 echo 'S-a inserat cu succes in baza de date';
                         } else {
                                  echo 'Inserare esuata!Te rog incearca din nou cu mai multa atentie!';
                         }
                        break;
                  
                    case "Client":
                        $rezultat = model_DateImobil :: updateclienti(array('nume'=>$_POST['txtnume'], 'prenume'=>$_POST['txtprenume'], 'telefon'=>$_POST['txttelefon'], 'cnp'=>$params[1]));
                        if ($rezultat !== FALSE) {
                                 echo 'S-a inserat cu succes in baza de date';
                         } else {
                                  echo 'Inserare esuata!Te rog incearca din nou cu mai multa atentie!';
                         }
                        break;
                        
                    case "Proprietar":
                        $rezultat = model_DateImobil :: updateproprietar(array('nume'=>$_POST['txtnume'], 'strada'=>$_POST['txtstrada'], 'nr'=>$_POST['txtnr'], 'bl'=>$_POST['txtbl'], 'ap'=>$_POST['txtap'], 'txtsc'=>$_POST['txtsc'], 'et'=>$_POST['txtet'], 'oras'=>$_POST['txtoras'], 'judet'=>$_POST['txtjudet'],'cnp'=>$params[1]));
                        if ($rezultat !== FALSE) {
                                 echo 'S-a inserat cu succes in baza de date';
                         } else {
                                  echo 'Inserare esuata!Te rog incearca din nou cu mai multa atentie!';
                         }
                        break;
                        
                    case "CodPostal":
                        $rezultat = model_DateImobil :: updatecp(array('cod_postal'=>$_POST['txtcd'], 'idcp'=>$params[1]));
                        if ($rezultat !== FALSE) {
                                 echo 'S-a inserat cu succes in baza de date';
                         } else {
                                  echo 'Inserare esuata!Te rog incearca din nou cu mai multa atentie!';
                         }
                        break;
                        
                    case "Numar":
                        $rezultat = model_DateImobil :: updatenumar(array('numar'=>$_POST['txtnr'], 'idn'=>$params[1]));
                        if ($rezultat !== FALSE) {
                                 echo 'S-a inserat cu succes in baza de date';
                         } else {
                                  echo 'Inserare esuata!Te rog incearca din nou cu mai multa atentie!';
                         }
                        break;
                        
                    case "Markers":
                        $rezultat = model_DateImobil :: updatemarkers(array('name'=>$_POST['txtname'], 'address'=>$_POST['txtadress'], 'lat'=>$_POST['txtlat'], 'lng'=>$_POST['txtlng'], 'type'=>$_POST['txttype'], 'id'=>$params[1]));
                        if ($rezultat !== FALSE) {
                                 echo 'S-a inserat cu succes in baza de date';
                         } else {
                                  echo 'Inserare esuata!Te rog incearca din nou cu mai multa atentie!';
                         }
                        break;
                        
                    case "Strazi":
                        $rezultat = model_DateImobil :: updatestrazi(array('nume'=>$_POST['txtnume'], 'idts'=>$_POST['txtts'], 'ids'=>$params[1]));
                        if ($rezultat !== FALSE) {
                                 echo 'S-a inserat cu succes in baza de date';
                         } else {
                                  echo 'Inserare esuata!Te rog incearca din nou cu mai multa atentie!';
                         }
                        break;
                     
                }
            }
            else{
                switch($params[0]){
                    case "finisaj":
                        $finisaj=  model_DateImobil::FinisajGetById($params[1]);
                        break;
                    
                    case "TipConstructie":
                        $tc=  model_DateImobil::tcGetById($params[1]);
                        break;
                    
                    case "TipLocuinta":
                        $TipLocuinta=  model_DateImobil::tlGetById($params[1]);
                        break;
                    
                    case "TipImobil":
                        $TipImobil=  model_DateImobil::tiGetById($params[1]);
                        break;
                    
                   case "TipStrada":
                        $TipStrada=  model_DateImobil::tsGetById($params[1]);
                        break;
                    
                   case "TipServiciu":
                        $TipServiciu=  model_DateImobil::serviciiGetById($params[1]);
                        break; 
                    
                  case "Client":
                        $Client=  model_DateImobil::clientiGetById($params[1]);
                        break;
                    
                  case "Proprietar":
                        $Proprietar=  model_DateImobil::proprietariGetById($params[1]);
                        break;
                    
                  case "CodPostal":
                        $CodPostal=  model_DateImobil::cpGetById($params[1]);
                        break;
                    
                  case "Numar":
                        $Numar=  model_DateImobil::numarGetById($params[1]);
                        break;
                    
                 case "Markers":
                        $Markers=  model_DateImobil::markersGetById($params[1]);
                        break;
                    
                 case "Strazi":
                        $Strazi=  model_DateImobil::StraziGetById($params[1]);
                        break;
                }
            }
        }
        @include_once APP_PATH . 'view/AdminDateImobil_adaugare.tpl.php';
    }

    function action_lista($params) {
        switch ($params[0]) {
            case "finisaj":
                if(!empty($params[1]))
                    model_DateImobil::deletefinisaj($params[1]);
                
                $date = model_DateImobil::FinisajListName("%");
                foreach ($date as $data) {
                    $data->view_name = $data->finisaj;
                    $data->view_id = $data->idf;
                }
                break;
            
            case "TipConstructie":
                if(!empty($params[1]))
                    model_DateImobil::deletetc($params[1]);
                
               $date = model_DateImobil::tcListName("%");
                foreach ($date as $data) {
                    $data->view_name = $data->tip_constructie;
                    $data->view_id = $data->idtc;
                }
                break; 
            
            case "TipLocuinta":
                if(!empty($params[1]))
                    model_DateImobil::deletetl($params[1]);
                
               $date = model_DateImobil::tlListName("%");
                foreach ($date as $data) {
                    $data->view_name = $data->tip_locuinta;
                    $data->view_id = $data->idtl;
                }
                break; 
                
            case "TipImobil":
                if(!empty($params[1]))
                    model_DateImobil::deleteti($params[1]);
                
               $date = model_DateImobil::tiListName("%");
                foreach ($date as $data) {
                    $data->view_name = $data->tip_imobil;
                    $data->view_id = $data->idti;
                }
                break; 
                
           case "TipStrada":
               if(!empty($params[1]))
                    model_DateImobil::deletets($params[1]);
               
               $date = model_DateImobil::tsListName("%");
                foreach ($date as $data) {
                    $data->view_name = $data->tip_strada;
                    $data->view_id = $data->idts;
                }
                break; 
                
           case "TipServiciu":
               if(!empty($params[1]))
                    model_DateImobil::deleteservicii($params[1]);
               
               $date = model_DateImobil::serviciiListName("%");
                foreach ($date as $data) {
                    $data->view_name = $data->serviciu;
                    $data->view_id = $data->ids;
                }
                break; 
                
          case "Client":
              if(!empty($params[1]))
                    model_DateImobil::deleteclienti($params[1]);
              
               $date = model_DateImobil::clientiListName("%");
                foreach ($date as $data) {
                    $data->view_name =$data->cnp.$data->nume;
                    $data->view_id = $data->cnp;
                }
                break; 
                
          case "Proprietar":
              if(!empty($params[1]))
                    model_DateImobil::deleteproprietari($params[1]);
              
               $date = model_DateImobil::proprietariListName("%");
                foreach ($date as $data) {
                    $data->view_name =$data->cnp.$data->nume;
                    $data->view_id = $data->cnp;
                }
                break;
                
         case "CodPostal":
             if(!empty($params[1]))
                    model_DateImobil::deletecp($params[1]);
             
               $date = model_DateImobil::cpListName("%");
                foreach ($date as $data) {
                    $data->view_name = $data->cod_postal;
                    $data->view_id = $data->idcp;
                }
                break; 
                
         case "Numar":
             if(!empty($params[1]))
                    model_DateImobil::deletenumar($params[1]);
             
               $date = model_DateImobil::numarListName("%");
                foreach ($date as $data) {
                    $data->view_name = $data->numar;
                    $data->view_id = $data->idn;
                }
                break; 
                
         case "Markers":
             if(!empty($params[1]))
                    model_DateImobil::deletemarkers($params[1]);
             
               $date = model_DateImobil::markersListName("%");
                foreach ($date as $data) {
                    $data->view_name = $data->name;
                    $data->view_id = $data->id;
                }
                break;
         
        }

        @include_once APP_PATH . 'view/AdminDateImobil_lista.tpl.php';
    }

}

<?php

class controller_imobil {


    public function action_adaugare($params) {

        if (!empty($_POST['imobil'])) {
            //========================= validarea adresei ========================================
            $cod_postal = model_DateImobil::cpGetByName($_POST['imobil']['adresa']['cod_postal']);
            $tip_strada = model_DateImobil::tsGetByName($_POST['imobil']['adresa']['tip_strada']);
            $nume_strada = model_DateImobil::StraziGetByName($_POST['imobil']['adresa']['nume_strada']);
            $numar = model_DateImobil::numarGetByName($_POST['imobil']['adresa']['numar']);
            //========================= validarea datelor despre imobil ==========================
            $finisaj =  model_DateImobil::FinisajGetByName($_POST['imobil']['date']['finisaj']);
            $tip_constructie = model_DateImobil::tcGetByName($_POST['imobil']['date']['tip_constructie']);
            $tip_locuinta = model_DateImobil::tlGetByName($_POST['imobil']['date']['tip_locuinta']);
            $tip_imobil = model_DateImobil::tiGetByName($_POST['imobil']['date']['tip_imobil']);

            if ($this->valideazaFildurile($_POST['imobil']) && 
                $cod_postal !== false && $tip_strada !==FALSE &&
                $nume_strada !== false && $numar !== FALSE && 
                $finisaj !== FALSE && $tip_constructie !== FALSE &&
                $tip_locuinta !== FALSE && $tip_imobil !== FALSE) {

                $camere = array();
                for($i=0;$i<count($_POST['imobil']['date']['nr_camere']);$i++){
                    if($_POST['imobil']['date']['nr_camere'][$i] != '')
                        $camere[] = array('nr_camere' => $_POST['imobil']['date']['nr_camere'][$i],
                                        'tip_camera' => $_POST['imobil']['date']['tip_camera'][$i]);
                }
                
                if($_FILES['imobil']['tmp_name'] != ''){
                    $avatar='avatar_'.date().'_'.uniqid().'.jpg';
                    $file=$_FILES['imobil']['tmp_name']['date']['avatar'];
                }
                else {
                    $avatar='imobil_default.jpg';
                    $file=dirname(APP_PATH).'/media/images/'.$avatar;
                }
                
                $imobil= array(
                    'idf' => $finisaj -> idf,
                    'idt_constructie' =>$tip_constructie -> idtc,
                    'idtl' => $tip_locuinta -> idtl,
                    'idti' => $tip_imobil -> idti,
                    'pret' => $_POST['imobil']['date']['pret'],
                    'cartier' => $_POST['imobil']['date']['cartier'],
                    'mp' => $_POST['imobil']['date']['mp'],
                    'descriere' => $_POST['imobil']['date']['descriere'],
                    'data_constructie' => $_POST['imobil']['date']['data_constructie'],
                    'avatar' => $avatar,
                    'adresa' => array(
                        'idcp' => $cod_postal->idcp,
                        'ids' => $nume_strada->ids,
                        'idn' => $numar->idn,
                    ),
                    'camere' => $camere,
                );
                
                $proprietar= model_DateImobil::proprietariGetById($_POST['imobil']['proprietar']['cnp']);
                if(!$proprietar){
                    $proprietar= new stdClass();
                    $proprietar->cnp=model_imobil::addProprietar($_POST['imobil']['proprietar']);
                }
                $imobil['idp']=$proprietar->cnp;
                
                $idi = model_imobil::addImobil($imobil);
                
                if(!file_exists(dirname(APP_PATH).'/media/images/imobil_pictures/'.$idi.'/avatar'))
                    mkdir(dirname(APP_PATH).'/media/images/imobil_pictures/'.$idi.'/avatar',0777,true);
                move_uploaded_file($file, dirname(APP_PATH).'/media/images/imobil_pictures/'.$idi.'/avatar/'.$avatar);
                    
//                $imobil = model_imobil::getById($idi);
                header('Location: '.$config['domain'].'/imobil/view/'.$idi);
            }
            else $message = "Validati toate campurile!";
        }
            
        @include APP_PATH.'view/imobil_adaugare.tpl.php';
    }

    public function action_view($params){
        $imobil = model_imobil::getById($params[0]);
        if (count($_FILES['filesToUpload'])) {
            $pictures=array();
            foreach ($_FILES['filesToUpload']['tmp_name'] as $file) {

                if(!file_exists(dirname(APP_PATH).'/media/images/imobil_pictures/'.$params[0]))
                    mkdir(dirname(APP_PATH).'/media/images/imobil_pictures/'.$params[0],0777,true);
                $image='picture_'.uniqid().'.png';
                if(move_uploaded_file($file, dirname(APP_PATH).'/media/images/imobil_pictures/'.$params[0].'/'.$image)){
                    $pictures[]=array('idi' => $params[0],'image' => $image);
                }
            }
            model_imobil::addPicutres($pictures);
        }
        
        $items=  model_imobil::getPicutre($params[0]);
        $change = (count($items) ? true : false);
        $change_items=array();
        foreach($items as $item){
            $change_items[]=$params[0].'/'.$item->image;
        }

        if (!empty($_GET['message']) && $_GET['message'] == 1 )
        {
            $message_tranzactie =array("message"=>"Tranzactie reusita!",
                                       "succes"=>1,
                                       );
        }
        else if ($_GET['message'] === '0')
        {
            $message_tranzactie = array("message"=>"Tranzactie esuata!",
                                        "succes"=>0,
                                        );
        }
        
        global $user;
        
        if(!empty($_POST['track']))
            controller_helper::track_user ($user, $params[0], TEREN_TRACK);
        
        //track this imobil
        $user_ip=  controller_helper::getClientIP();
        $track_ip = model_imobil::getIpTracked($user_ip,$params[0]);
        if (empty($track_ip)) {
            
            controller_helper::track_user($user, $params[0],SITE_TRACK);
            model_imobil::ip_track($user_ip,$params[0]);
        }
        else{
            $format = "Y-m-d h:m:s";
            $date1  = new DateTime($track_ip->expiration);
            $date2  = new DateTime();
            if($date2>=$date1){
                model_imobil::ip_remove_track($user_ip,$params[0]);
                controller_helper::track_user($user, $params[0], SITE_TRACK);
                model_imobil::ip_track($user_ip,$params[0]);
            }
        }
        

        @include APP_PATH.'view/imobil_view.tpl.php';
    }
    
    public function action_tranzactie($params){
        
        global $user;
        if(!in_array($user->tip, array('administrator','angajat'))){
            echo 'Nu ai permisiuni pentru aceasta pagina!';
            return FALSE;
        }

        if($_POST['Submit'] == 'submit'){
            echo '<pre>';//print_r($_POST);die;
            if(($client=model_DateImobil::clientiGetById($_POST['tranzactie']['client']['cnp']))){
                $cnp=$client->cnp;
            }
            else{
                model_DateImobil::adaugaclient($_POST['tranzactie']['client']);
                $cnp=$_POST['tranzactie']['client']['cnp'];
            }
            $tranzactie=array(
                'idi' => $_POST['idi'],
                'cnp' => $cnp,
                'ids' => $_POST['tranzactie']['servici']['ids'],
            );
            if(!empty($_POST['tranzactie']['data_final_tranzactie']))
                $tranzactie['data_final_vanzare']=$_POST['tranzactie']['data_final_tranzactie'];
            
            $rezultat = model_DateImobil::adaugatranzactii($tranzactie);
            header('Location: '.$config['domain'].'/imobil/view/'.$params[0].'?message='.$rezultat);
            
        }
        
        $servicii = model_DateImobil::serviciiListName("%");
        
        
        @include APP_PATH.'view/imobil_tranzactie.tpl.php';
    }

    private function valideazaFildurile($fields){
        if(!empty($fields['proprietar'])){
            foreach ($fields['prorietar'] as $field)
                if($field == '') return false;
        }
        
        if(!empty($fields['adresa'])){
            foreach ($fields['adresa'] as $field)
                if($field == '') return false;
        }
        
        if(!empty($fields['date'])){
            foreach ($fields['date'] as $field)
                if($field == '') return false;
        }

        return true;
    }
    
    private function getTrackImobile($filter){
        
        $idi = model_imobil::getImobilTracks($filter);
        $idis=array();
        foreach($idi as $id){
            $idis[] = $id -> idi;
        }
        $imobile = model_imobil::getById($idis);
        
        return $imobile;
    }
    
    public function action_comerciale($params){
        
        $filter = array(
            'idtt' => SITE_TRACK,
            'date' => date('Y-m-d h:i:s',strtotime(' -1 day')),
            'limit' => array(
                'start' => 0,
                'stop' =>5,
            ),
        ); 
        $top_imobile_site_lastday = $this->getTrackImobile($filter);
        
        $filter['date'] = date('Y-m-d h:i:s',strtotime(' -1 month'));
        $top_imobile_site_lastmonth = $this->getTrackImobile($filter);
        
        $filter['idtt'] = TEREN_TRACK;
        $top_imobile_teren_lastmonth = $this->getTrackImobile($filter);
        
        $filter['date'] = date('Y-m-d h:i:s',strtotime(' -1 day'));
        $top_imobile_teren_lastday = $this->getTrackImobile($filter);
        
        @include APP_PATH.'view/imobil_comerciale.tpl.php';
    }

}

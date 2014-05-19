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
                
                $imobil = model_imobil::getById($idi);
                echo '<pre>';
                                print_r($imobil);
                die;
            }
            else $message = "Validati toate campurile!";
        }
            
        @include APP_PATH.'view/imobil_adaugare.tpl.php';
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

}

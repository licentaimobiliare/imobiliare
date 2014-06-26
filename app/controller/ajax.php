<?php
class controller_ajax{
    
    public static function rafineazaFiltrarea($filter){
        if(!empty($filter['ids']))$filter['ids']=  model_DateImobil::StraziGetByName ($filter['ids'])->ids;
        if(!empty($filter['idts']))$filter['idts']= model_DateImobil::tsGetByName ($filter['idts'])->idts;
        if(!empty($filter['idf']))$filter['idf']=  model_DateImobil::FinisajGetByName ($filter['idf'])->idf;
        if(!empty($filter['idt_constructie']))$filter['idt_constructie']= model_DateImobil::tcGetByName ($filter['idt_constructie'])->idtc;
        if(!empty($filter['idtl']))$filter['idtl']=  model_DateImobil::tlGetByName ($filter['idtl'])->idtl;
        if(!empty($filter['idti']))$filter['idti']= model_DateImobil::tiGetByName ($filter['idti'])->idti;
        
        return $filter;
    }
    
    public function action_imobile($params){
        $filter=$_POST;
        $filter=  controller_ajax::rafineazaFiltrarea($filter);

        $connection = model_database::get_instance();
        
        $query = 'select i.idi from imobil as i inner join'
            . ' rel_cod_strada_numar_imobil as r on '
            . 'i.idi = r.idi '
            . (isset($filter['ids']) && is_numeric($filter['ids']) ? 
            'and r.ids='.$filter['ids'] : '')
            . (isset($filter['idts']) && is_numeric($filter['idts']) ? 
            ' inner join strazi as s on r.ids=s.ids and idts='.$filter['idts'] : '')
            .' left join tranzactii as tr on i.idi = tr.idi
            where (tr.cnp is null or 
            (tr.cnp is not null and  DATE_FORMAT(tr.data_final_vanzare,\'%Y%m%d\')<DATE_FORMAT(now(),\'%Y%m%d\'))) and ';
        
        if(isset($filter['idf']) && is_numeric($filter['idf']))
            $query .='idf='.$filter['idf'].' and ';
        if(isset($filter['idt_constructie']) && is_numeric($filter['idt_constructie']))
            $query .= 'idt_constructie='.$filter['idt_constructie'].' and ';
        if(isset($filter['idtl']) && is_numeric($filter['idtl']))
            $query .= 'idtl='.$filter['idtl'].' and ';
        if(isset($filter['idti']) && is_numeric($filter['idti']))
            $query .= 'idti='.$filter['idti'].' and ';
        if(isset($filter['idp']) && strlen($filter['idp']) < 14)
            $query .= "idp like '".$filter['idp']."%' and ";
        if(isset($filter['cartier']))
            $query .= "cartier like '".$filter['cartier']."%' and ";
            
        $query.='i.idi is not null group by i.idi order by ';
        
        $query.='data_constructie '.(isset($filter['data_constructie']) && $filter['data_constructie']== 'crescator' ? 'asc,' : 'desc,');
        
        if($filter['data_inregistrare'] == 'crescator')
            $query .= 'data_inregistrare asc';
        else $query.='data_inregistrare desc';
        
        $query.=' limit '.($params[0]-1)*DEFAULT_PAGER.','.$params[0]*DEFAULT_PAGER;

        $stmt = $connection ->prepare($query);
        $stmt->execute();
        $results= $stmt->fetchAll(PDO::FETCH_OBJ);

        $idis=array();
        foreach ($results as $result){
            $idis[]= $result->idi;
        }
        $imobile = model_imobil::getById($idis);
        echo json_encode($imobile);
    }
    
    public function action_autocomplete($params){

        switch ($params[0]){
            case "tipstrada":
                echo json_encode(model_DateImobil::tsListName($_POST['name']));break;
            case "strada":
                echo json_encode(model_DateImobil::StraziListName($_POST['name']));break;
            case "finisaj":
                echo json_encode(model_DateImobil::FinisajListName($_POST['name']));break;
            case "tipconstructie":
                echo json_encode(model_DateImobil::tcListName($_POST['name']));break;
            case "tiplocuinta":
                echo json_encode(model_DateImobil::tlListName($_POST['name']));break;
            case "tipimobil":
                echo json_encode(model_DateImobil::tiListName($_POST['name']));break;
            case 'proprietar':
                echo json_encode(model_DateImobil::proprietariListName($_POST['name']));break;
            case 'numarstrada':
                echo json_encode(model_DateImobil::numarListName($_POST['name']));break;
            case 'codpostal':
                echo json_encode(model_DateImobil::cpListName($_POST['name']));break;
            case 'client':
                echo json_encode(model_DateImobil::clientiListName($_POST['name']));break;
            default:
                echo json_encode("Nu exista autocomplet pentru parametru respectiv");break;
        }
        
        die;
    }
    
    public function action_imobilpictures($params){
        $result = model_imobil::getPicutre($params[0]);
        echo json_encode($result);
    }
    
    public function action_addmark($params){
        $marker=array(
          'idi'=> $params[0],
          'name' => $_POST['nume'],
          'address' => $_POST['adresa'],
          'lat' =>$_POST['lat'],
          'lng' => $_POST['lng'],
          'type' => $_POST['tip']
        );
        $exist_marker=model_DateImobil::markersGetByIdImobil($params[0]);
        if(empty($exist_marker))
            echo json_encode(model_DateImobil::adaugamarkers($marker));
        else {
            $marker['id'] = $_POST['id'];
            json_encode (model_DateImobil::updatemarkers ($marker));
        }
    }
}

<?php
class controller_ajax{
    
    public function action_imobile($params){
        $filter=$_POST;
        
        $connection = model_database::get_instance();
        
        $query = 'select i.idi from imobil as i inner join'
            . ' rel_cod_strada_numar_imobil as r on '
            . 'i.idi = r.idi '
            . (isset($filter['ids']) && is_numeric($filter['ids']) ? 
            'and r.ids='.$filter['ids'] : '')
            . (isset($filter['idts']) && is_numeric($filter['idts']) ? 
            'inner join strazi as s on r.ids=s.ids and idts='.$filter['idts'] : '')
            . ' where ';
        
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
        
        $query.='i.idi is not null order by ';
        
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
}

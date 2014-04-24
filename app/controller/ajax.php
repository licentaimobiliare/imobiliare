<?php
class controller_ajax{
    
    public function action_imobile($params){
        $filter;
        
        $connection = model_database::get_instance();
        
        $query = 'select * from imobil where ';
        
        if(isset($filter['idf']) && is_numeric($filter['idf']))
            $query +='idf='.$filter['idf'].' and ';
        if(isset($filter['idt_constructie']) && is_numeric($filter['idt_constructie']))
            $query += 'idt_constructie='.$filter['idt_constructie'].' and ';
        if(isset($filter['idtl']) && is_numeric($filter['idtl']))
            $query += 'idtl='.$filter['idtl'].' and ';
        if(isset($filter['idti']) && is_numeric($filter['idti']))
            $query += 'idti='.$filter['idti'].' and ';
        if(isset($filter['idp']) && strlen($filter['idp']) < 14)
            $query += "idp like '".$filter['idp']."%' and ";
        
        $query+='idi not null order by ';
        
        if(isset($filter['data_constructie']) && 
            ($filter['data_constructie']== 'crescator' || $filter['data_constructie']== 'descrescator'))
            $query+='data_constructie '.($filter['data_constructie']== 'crescator' ? 'asc' : 'desc');
        
        if($filter['data_inregistrare'] == 'crescator')
            $query += 'data_inregistrare asc';
        else $query+='data_inregistrare desc';
    }
}

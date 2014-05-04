<?php

class model_imobil{
	
	/*
	 * daca este array returneaza o lista de imobile
	 */
	public static function getById($id){
        $connection = model_database::get_instance();
        if(is_array($id)){
            $stmt = $connection->prepare('select i.*,finisaj,tip_constructie,tip_locuinta,tip_imobil from imobil as i 
                                        inner join finisaje as f on i.idf=f.idf
                                        inner join tip_locuinte as tl on i.idtl=tl.idtl
                                        inner join tip_constructii as tc on i.idt_constructie=tc.idtc
                                        inner join tip_imobil as ti on i.idti = ti.idti
                                        where i.idi in (' . str_pad('', count($id) * 2 - 1, '?,') . ')'
                . 'order by FIELD(idi ,'.str_pad('', count($id) * 2 - 1, '?,').')');
            
            $orderid= array_merge_recursive($id,$id);
            $stmt ->execute($orderid);
            $results = $stmt -> fetchAll(PDO::FETCH_OBJ);

            $stmt = $connection ->prepare('select di.*,tip_strada,nume,cod_postal,numar
                from rel_cod_strada_numar_imobil as r left join
                strazi as s on r.ids=s.ids left join tip_strazi as ts on ts.idts=s.idts left join 
                coduri_postale as cp on r.idcp=cp.idcp left join 
                numar as n on r.idn=n.idn left join date_imobile as di on di.idi=r.idi
                where r.idi in (' . str_pad('', count($id) * 2 - 1, '?,') . ')');
            
            $stmt->execute($id);
            $adresa=$stmt->fetchAll(PDO::FETCH_ASSOC);
            
            $stmt = $connection -> prepare ('select * from camere where idi in (' . str_pad('', count($id) * 2 - 1, '?,') . ')');
            $stmt->execute($id);
            $camere= $stmt ->fetchAll(PDO::FETCH_ASSOC);
            
            foreach ($results as $r){
                $stmt = $connection->prepare('select * from proprietari where cnp = ?');
                $stmt->execute(array($r->idp));
                $result = $stmt->fetch();
                //mapez proprietaru
                $r->proprietar = array(
                    'nume' => $result['nume'],
                    'strada' => $result['strada'],
                    'nr' => $result['nr'],
                    'bl' => $result['bl'],
                    'ap' => $result['ap'],
                    'sc' => $result['sc'],
                    'et' => $result['et'],
                    'oras' => $result['oras'],
                    'judet' => $result['judet']
                );
                //mapez camerele
                $r->camere = array();
                foreach ($camere as $c)
                    if($c['idi'] == $r->idi){
                        unset($c['idi']);
                        $r->camere[]=$c;
                        unset($c);//pentru optimizare scoatem din lista ce deja am bagat
                    }
                //mapez adressa
                for($i=0;$i<count($adresa);$i++)
                    if($adresa[$i]['idi']==$r->idi){
                        $pozitie=$i;
                        $id=  count($result);//fortez iesirea pentru a nu mai pierde timp
                    }
                $r->adresa = array(
                    'tip_strada' => $adresa[$pozitie]['tip_strada'],
                    'nume_strada' => $adresa[$pozitie]['nume'],
                    'cod_postal' => $adresa[$pozitie]['cod_postal'],
                    'numar' => $adresa[$pozitie]['numar'],
                    'numar_imobil' => $adresa[$pozitie]['nr'],
                    'apartament' => $adresa[$pozitie]['apartament'],
                    'scara' => $adresa[$pozitie]['scara'],
                    'etaj' => $adresa[$pozitie]['etaj']
                );
            }
        }
		else {
            $stmt = $connection -> prepare('Select * from imobil where idi = ?');
            $stmt-> execute(array($id));
            $results = $stmt ->fetchObject();
            
            //select detalis
            $stmt = $connection -> prepare ('select finisaj,tip_constructie,'
                . 'tip_locuinta,tip_imobil from finisaje,tip_constructii,'
                . 'tip_locuinte,tip_imobil where idf = ? or tip_constructii.idtc = ? or '
                . 'idtl = ? or idti = ?');
            $stmt->execute(array($results -> idf , $results -> idt_constructie,
                $results -> idtl , $results -> idti));
            $detalii = $stmt -> fetch();
            
            $stmt = $connection -> prepare ('select nr_camere,tip_camera from camere where idi=?');
            $stmt->execute(array($id));
            $camere= $stmt ->fetchAll(PDO::FETCH_ASSOC);
            
            //mapez detaliile in obiectu imobil
            $results -> finisaj = $detalii['finisaj'];
            $results -> tip_constructie = $detalii['tip_constructie'];
            $results -> tip_locuinta = $detalii['tip_locuinta'];
            $results -> tip_imobil = $detalii['tip_imobil'];
            $results -> camere = $camere;
            
            
            //select adress
            $stmt = $connection ->prepare('select di.*,tip_strada,nume,cod_postal,numar
                from rel_cod_strada_numar_imobil as r left join
                strazi as s on r.ids=s.ids left join tip_strazi as ts on ts.idts=s.idts left join 
                coduri_postale as cp on r.idcp=cp.idcp left join 
                numar as n on r.idn=n.idn left join date_imobile as di on di.idi=r.idi
                where r.idi=?');
            
            $stmt->execute(array($results->idi));
            $result=$stmt->fetch();
            //mapez adressa
            $results -> adresa = array(
                'tip_strada' => $result['tip_strada'],
                'nume_strada' => $result['nume'],
                'cod_postal' => $result['cod_postal'],
                'numar' => $result['numar'],
                'numar_imobil' => $result['nr'],
                'apartament' => $result['apartament'],
                'scara' => $result['scara'],
                'etaj' => $result['etaj']
            );
            
            //selectez proprietaru
            $stmt = $connection ->prepare('select * from proprietari where cnp = ?');
            $stmt ->execute(array($results->idp));
            $result=$stmt->fetch();
            //mapez proprietaru
            $results -> proprietar = array(
                'nume' => $result['nume'],
                'strada' => $result['strada'],
                'nr' => $result['nr'],
                'bl' => $result['bl'],
                'ap' => $result['ap'],
                'sc' => $result['sc'],
                'et' => $result['et'],
                'oras' => $result['oras'],
                'judet' => $result['judet']
            );
            
		}
        return $results;
	}
    
    public static function getAll(){
        $connection= model_database::get_instance();
        $stmt = $connection->prepare('select i.*,finisaj,tip_constructie,tip_locuinta,tip_imobil from imobil as i 
                                        inner join finisaje as f on i.idf=f.idf
                                        inner join tip_locuinte as tl on i.idtl=tl.idtl
                                        inner join tip_constructii as tc on i.idt_constructie=tc.idtc
                                        inner join tip_imobil as ti on i.idti = ti.idti limit '.
                //daca avem pagina luam de la pagna respeciva
                (isset($_GET['page']) ? $_GET['page']*DEFAULT_PAGER : 0) . ',' . (isset($_GET['page']) ? $_GET['page']*DEFAULT_PAGER + DEFAULT_PAGER : DEFAULT_PAGER));

            $stmt ->execute();
            $results = $stmt -> fetchAll(PDO::FETCH_OBJ);
            
            $id = array();
            foreach ($results as $r){
                $id[]=$r->idi;
            }
            
            $stmt = $connection ->prepare('select di.*,tip_strada,nume,cod_postal,numar
                from rel_cod_strada_numar_imobil as r left join
                strazi as s on r.ids=s.ids left join tip_strazi as ts on ts.idts=s.idts left join 
                coduri_postale as cp on r.idcp=cp.idcp left join 
                numar as n on r.idn=n.idn left join date_imobile as di on di.idi=r.idi
                where r.idi in (' . str_pad('', count($id) * 2 - 1, '?,') . ')');
            
            $stmt->execute($id);
            $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
            
            $stmt = $connection -> prepare ('select * from camere where idi in (' . str_pad('', count($id) * 2 - 1, '?,') . ')');
            $stmt->execute($id);
            $camere= $stmt ->fetchAll(PDO::FETCH_ASSOC);
            
            foreach ($results as $r) {
                $stmt = $connection->prepare('select * from proprietari where cnp = ?');
                $stmt->execute(array($r->idi));
                $result = $stmt->fetch();
                //mapez proprietaru
                $results->proprietar = array(
                    'nume' => $result['nume'],
                    'strada' => $result['strada'],
                    'nr' => $result['nr'],
                    'bl' => $result['bl'],
                    'ap' => $result['ap'],
                    'sc' => $result['sc'],
                    'et' => $result['et'],
                    'oras' => $result['oras'],
                    'judet' => $result['judet']
                );
                //mapez camerele
                $r->camere = array();
                foreach ($camere as $c)
                    if($c['idi'] == $r->idi){
                        unset($c['idi']);
                        $r->camere[]=$c;
                        unset($c);//pentru optimizare scoatem din lista ce deja am bagat
                    }
                //mapez adressa
                for($i=0;$i<count($result);$i++)
                    if($result[$i]['idi']==$r->idi){
                        $pozitie=$i;
                        $id=  count($result);//fortez iesirea pentru a nu mai pierde timp
                    }
                $r->adresa = array(
                    'tip_strada' => $result[$pozitie]['tip_strada'],
                    'nume_strada' => $result[$pozitie]['nume'],
                    'cod_postal' => $result[$pozitie]['cod_postal'],
                    'numar' => $result[$pozitie]['numar'],
                    'numar_imobil' => $result[$pozitie]['nr'],
                    'apartament' => $result[$pozitie]['apartament'],
                    'scara' => $result[$pozitie]['scara'],
                    'etaj' => $result[$pozitie]['etaj']
                );
            }
            
            return $results;
    }
    
    public static function addImobil($imobil){
        
        $keys=array();$values=array();
        foreach($imobil as $key => $value){
            if($key != 'adresa' && $key != 'camere')
            {
                $keys[]=$key;
                $values[]=$value;
            }
        }
        
        $connection= model_database::get_instance();
        
        $stmt =$connection->prepare('insert into imobil('.implode(',', $keys).') values ('. str_pad('', count($values) * 2 - 1, '?,') . ')');
        $stmt->execute($values);
        
        $id = $connection->lastInsertId();
        
        $stmt = $connection->prepare('insert into rel_cod_strada_numar_imobil values(?,?,?,?)');
        $stmt->execute(array($imobil['adresa']['idcp'],$imobil['adresa']['ids'],$imobil['adresa']['idn'],$id));
        
        foreach ($imobil['camere'] as $camera) {
            $stmt = $connection->prepare('insert into camere values(?,?,?)');
            $stmt->execute(array($id, $camera['nr_camere'],$camera['tip_camera']));
        }
        
        return $id;
    }
    
    public static function addProprietar($proprietar){
        $keys=array();$values=array();
        foreach($proprietar as $key => $value){
                $keys[]=$key;
                $values[]=$value;
        }
        
        $connection= model_database::get_instance();
        
        $stmt =$connection->prepare('insert into proprietari('.implode(',', $keys).') values ('. str_pad('', count($values) * 2 - 1, '?,') . ')');
        try{
            $stmt->execute($values);
            return $connection->lastInsertId();
        }
        catch(Exception $e){
            return false;
        }
        
    }
}


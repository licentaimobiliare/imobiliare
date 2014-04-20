<?php

class model_imobil{
	
	/*
	 * daca este array returneaza o lista de imobile
	 */
	public static function getById($id){
        $connection = model_database::get_instance();
        if(is_array($id)){
            $stmt = $connection->prepare('select i.*,finisaj,tip_apartament,tip_constructie,tip_locuinta,tip_comercial from imobil as i 
                                        inner join finisaje as f on i.idf=f.idf
                                        inner join tip_apartamente as ta on i.idta=ta.idta
                                        inner join tip_locuinte as tl on i.idtl=tl.idtl
                                        inner join tip_constructii as tc on i.idt_constructie=tc.idtc
                                        inner join tip_comerciale as ttc on i.idt_comercial = ttc.idtc
                                        where i.idi in (' . str_pad('', count($id) * 2 - 1, '?,') . ') limit '.
                //daca avem pagina luam de la pagna respeciva
                (isset($_GET['page']) ? $_GET['page']*DEFAULT_PAGER : 0) . ',' . (isset($_GET['page']) ? $_GET['page']*DEFAULT_PAGER + DEFAULT_PAGER : DEFAULT_PAGER));

            $stmt ->execute($id);
            $results = $stmt -> fetchAll(PDO::FETCH_OBJ);print_r($results);die;
        }
		else {
            $stmt = $connection -> prepare('Select * from imobil where idi = ?');
            $stmt-> execute(array($id));
            $results = $stmt ->fetchObject();
            
            //select detalis
            $stmt = $connection -> prepare ('select finisaj,tip_apartament,tip_constructie,'
                . 'tip_locuinta,tip_comercial from finisaje,tip_apartamente,tip_constructii,'
                . 'tip_locuinte,tip_comerciale where idf = ? or idta = ? or tip_constructii.idtc = ? or '
                . 'idtl = ? or tip_comerciale.idtc = ?');
            $stmt->execute(array($results -> idf , $results -> idta , $results -> idt_constructie,
                $results -> idtl , $results -> idt_comercial));
            $detalii = $stmt -> fetch();
            
            //mapez detaliile in obiectu imobil
            $results -> finisaj = $detalii['finisaj'];
            $results -> tip_apartament = $detalii['tip_apartament'];
            $results -> tip_constructie = $detalii['tip_constructie'];
            $results -> tip_locuinta = $detalii['tip_locuinta'];
            $results -> tip_comercial = $detalii['tip_comercial'];
		}
        echo json_encode($results);
	}
}


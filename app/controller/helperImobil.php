<?php

class controller_helperImobil {

    public static function tranzactieImobil($idImobil, $idProprietar, $idSerciviu, $data_final_trazactie = null) {
        $connection = model_database::get_instance();

        $stmt = $connection->prepare('insert into tranzactii (idi,cnp,ids'
            . ($data_final_trazactie != null ? ',data_final_vanzare' : '') . ') values (?,?,?,?)');

        $values = array($idImobil, $idProprietar, $idSerciviu);
        if ($data_final_trazactie != null)
            $values[$data_final_trazactie];

        try {
            $stmt->execute($values);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public static function adaugaclient($client) {
        $keys = array();
        $values = array();
        foreach ($client as $key => $value) {
            $keys[] = $key;
            $values[] = $value;
        }

        $connection = model_database::get_instance();

        $stmt = $connection->prepare('insert into clienti(' . implode(',', $keys) . ') values (' . str_pad('', count($values) * 2 - 1, '?,') . ')');
        try {
            $stmt->execute($values);
            return $connection->lastInsertId();
        } catch (Exception $e) {
            return false;
        }
    }

    public static function getClient($client) {
        $connection = model_database::get_instance();

        $stmt = $connection->prepare('select * from clienti where cnp=?');
        $stmt->execute(array($client['cnp']));

        $result = $stmt->fetch();

        if (!isset($result))
            $result = $this->adaugaclient($client);

        $result;
    }

    public static function getCartiere(){
        $connection = model_database::get_instance();
        
        $stmt = $connection->prepare("select distinct(cartier) from imobil");
        $stmt->execute();
        
        return $stmt->fetchAll();
    }
}

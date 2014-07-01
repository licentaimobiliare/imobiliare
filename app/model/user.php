<?php

class model_user {

    public static function getUsers() {
        $connection = model_database::get_instance();

        $stmt = $connection->prepare("select * from users");

        try {
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $ex) {
            return false;
        }
    }

}

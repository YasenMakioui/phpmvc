<?php


class Database {
    public static function connect(){
        $db = new mysqli('localhost', 'admin', 'M@n@cor123', 'tienda_master');
        $db->query("SET NAMES 'utf8'");
        return $db;
    }
}


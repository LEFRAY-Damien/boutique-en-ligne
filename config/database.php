<?php

class Database
{

    private static $instance = null;

    public static function connect() :PDO
    {

        if (!self::$instance) {
            self::$instance = new PDO('mysql:host=localhost;dbname=boutique_db;charset=utf8', 'root', '');
        }
        return self::$instance;
    }
}

?>

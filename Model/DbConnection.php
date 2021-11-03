<?php

class DbConnection
{

    private static $connection;


    public static function connect(): PDO
    {

        $host = "localhost";
        $username = "root";
        $password = "";
        $database = "registration";


        try {
            self::$connection = new PDO("mysql:host = $host;dbname = $database", $username, $password);
            self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection error" . $e->getMessage());
        }

        return self::$connection;
    }
}

<?php

class DbConnection
{

    public static function connect(): PDO
    {

        $host = "localhost";
        $username = "root";
        $password = "";
        $database = "registration";

        try {
            $connection = new PDO("mysql:host=$host;dbname=$database", $username, $password);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection error" . $e->getMessage());

        }

        return $connection;
    }
}

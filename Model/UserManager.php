<?php

require_once("DbConnection.php");

class UserManager
{
    public function insertDetails($firstname, $lastname, $image, $email, $password): bool
    {
        $connection = DbConnection::connect();
        $hash = password_hash($password, PASSWORD_DEFAULT);

        $query = $connection->prepare("INSERT INTO users (firstname, lastname, image, email, password)
     VALUES (:firstname, :lastname, :image, :email, :password)");
        $query->bindParam(':firstname', $firstname);
        $query->bindParam(':lastname', $lastname);
        $query->bindParam(':image', $image);
        $query->bindParam(':email', $email);
        $query->bindParam(':password', $hash);
//        var_dump($query);exit;
        return $query->execute();

    }

    public function checkEmail($email): bool
    {
        $connection = DbConnection::connect();
        $query = $connection->prepare("SELECT * from users WHERE email = :email");
        $query->bindParam(':email', $email);
        $query->execute();
//        var_dump($query->rowCount() > 0);exit;
        return $query->rowCount() > 0;
    }
}
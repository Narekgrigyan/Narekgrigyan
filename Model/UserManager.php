<?php

class UserManager
{
    public function insertUserData($firstname, $lastname, $imageName, $email, $password): bool
    {
        $connection = DbConnection::connect();
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $query = $connection->prepare("INSERT INTO users (firstname, lastname, image, email, password)
     VALUES (:firstname, :lastname, :image, :email, :password)");
        $query->bindParam(':firstname', $firstname);
        $query->bindParam(':lastname', $lastname);
        $query->bindParam(':image', $imageName);
        $query->bindParam(':email', $email);
        $query->bindParam(':password', $hash);
        return $query->execute();

    }

    public function checkEmail($email): bool
    {
        $connection = DbConnection::connect();
        $query = $connection->prepare("SELECT * from users WHERE email = :email");
        $query->bindParam(':email', $email);
        $query->execute();
        if (isset($query)) {
            return $query->rowCount() > 0;
        }
    }

    public function checkingForLogin($email, $password): bool
    {

        $connection = DbConnection::connect();
        $query = $connection->prepare("SELECT `password` from users WHERE email = :email");
        $query->bindParam(':email', $email);
        $query->execute();
        $getPasswordHashes = $query->fetchColumn();
        if (password_verify($password, $getPasswordHashes)) {

            return true;
        }

        return false;
    }

    public function validateEmail($email): bool
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }

    public function getUserData($email)
    {
        $connection = DbConnection::connect();
        $query = $connection->prepare("SELECT * from users WHERE email = :email");
        $query->bindParam(':email', $email);
        $query->execute();
        $data = $query->fetch();
        if ($data) {
            return $data;
        }

    }

}
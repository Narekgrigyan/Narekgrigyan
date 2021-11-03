<?php
require_once("DbConnection.php");

class UserManager
{
    public function insertDetails($firstname, $lastname, $image, $email, $password): bool
    {
        $connection = DbConnection::connect();
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $query = $connection->prepare("INSERT INTO `user` (`firstname`, `lastname`, `image`, `email`, `password`)
     VALUES (`:firstname`, `:lastname`, `:image`, `:email`, `:password`)");
        $query->bindParam(':firstname', $firstname);
        $query->bindParam(':lastname', $lastname);
        $query->bindParam(':image', $image);
        $query->bindParam(':email', $email);
        $query->bindParam(':password', $hash);
        return $query->execute();
    }
}
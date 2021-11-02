<?php


class Register {
    public function registerAction()
    {
        $firstname = $_POST['FirstName'] ?? '';
        $lastname = $_POST['LastName'] ?? '';
        $email = $_POST['Email'] ?? '';
        $password = $_POST['password'] ?? '';

        $error = [];


    }
}
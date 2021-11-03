<?php
include_once ("../Model/DbConnection.php");

class Login
{
    public function loginAction()
    {
        $email = $_POST['Email'] ?? '';
        $password = $_POST['password'] ?? '';

    }
}
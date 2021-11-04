<?php

//require_once("../Model/DbConnection.php");
//require_once("Controller/Register.php");

class Profile
{
    public function profileAction(): void
    {
        echo "Welcome" . $_SESSION['email'];
        var_dump($_SESSION['email']);exit;
    }
}

<?php
session_start();
class Logout
{
    public function logoutAction(): void
    {
        session_destroy();
        header('location: Login.php');
    }
}
$logout = new Logout();
$logout->logoutAction();
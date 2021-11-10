<?php
require_once("Register.php");


class Profile
{
    public function profileAction(): void
    {

        echo "Welcome " . $_SESSION['email'];
        echo "<a href='Logout'>Logout</a> ";
    }
}

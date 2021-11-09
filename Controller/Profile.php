<?php
//require_once("Register.php");
//require_once("Login.php");

class Profile
{
    public function profileAction(): void
    {
        echo "Welcome " . $_SESSION['email'];
        echo "<a href='Logout.php'>Logout</a> ";
    }
}
//$profile = new Profile();
//$profile->profileAction();
//echo "Welcome " . $_SESSION['email'];
//echo "<a href='Logout.php'>Logout</a> ";

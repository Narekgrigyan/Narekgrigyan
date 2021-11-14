<?php

class Profile
{
    public function profileAction(): void
    {


        if (!isset($_SESSION['email'])) {
            header('location: login');
            return;
        }


        $userManager = new UserManager();
        $email = $_SESSION['email'];
        $userData = $userManager->getUserData($email);
        if (!$userData) {
            header('location: login');
            return;
        }
        echo "Welcome " . $userData['firstname'] . ' ' . $userData['lastname'] . ' ' . "<a href='logout'>Logout</a> ";

    }
}

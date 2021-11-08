<?php
include_once __DIR__ . "/../Model/DbConnection.php";
require_once __DIR__ . "/../Model/UserManager.php";

class Login
{
    public function loginAction(): void
    {
        if (isset($_POST['log_user'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $errors = [];

            if (empty($email)) {
                $errors['email'] = "your field empty, please fill in";
            }
            if (empty($password)) {
                $errors['password'] = "your field empty, please fill in";
            }
            if (!$errors) {
                $userManager = new UserManager();

                if ($userManager->insertDetails($email, $password)) {
                    $_SESSION['email'] = $email;
                    header('location: Profile.php');
                } else {
                    $errors['email'] = "don`t working";
                }
            }
        }
        require_once __DIR__ . "/../View/loginPage.php";
    }
}

$login = new Login();
$login->loginAction();
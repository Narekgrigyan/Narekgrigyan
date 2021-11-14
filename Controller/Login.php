<?php

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

                if ($userManager->validateEmail($email)) {

                    if ($userManager->checkingForLogin($email, $password)) {

                        $_SESSION['email'] = $email;
                        header('location: profile');
                    } else {
                        $errors['email'] = "your email or password incorrect";
                    }
                } else {
                    $errors['email'] = "invalid email";
                }
            }
        }
        require_once __DIR__ . "/../View/loginPage.php";
    }
}
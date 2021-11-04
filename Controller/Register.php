<?php
//session_start();
//include_once "../Model/DbConnection.php";
//require_once "../Model/UserManager.php";

class Register
{
    public function registerAction(): void
    {

        $firstname = $_POST['firstname'] ?? '';
        $lastname = $_POST['lastname'] ?? '';
        $image = $_POST['image'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $verPassword = $_POST['passwordConfirm'] ?? '';


        if (isset($_POST['reg_user'])) {
            $errors = [];

            if (empty($firstname)) {
                $errors['firstname'] = "your field empty, please fill in";
            }
            if (empty($lastname)) {
                $errors['lastname'] = "your field empty, please fill in";
            }
            if (empty($image)) {
                $errors['image'] = "your image field empty, please download in";
            }
            if (empty($email)) {
                $errors['email'] = "your field empty, please fill in";
            }
            if (empty($password)) {
                $errors['password'] = "your field empty, please fill in";
            }
            if (empty($verPassword)) {
                $errors['passwordConfirm'] = "your field empty, please fill in";
            }
            if ($password !== $verPassword) {
                echo "please fill correct password";
            }

        }

        if (!isset($errors)) {

            $userManager = new UserManager();
            if ($userManager->insertDetails($firstname, $lastname, $image, $email, $password)) {

                $_SESSION[$email] = 'email';
                header('location: Profile.php');
            } else {
                $errors["email"] = "don`t working";
            }
        }
        require('../View/registerPage.php');
    }
}
//$obj = new Register();
//$obj->registerAction();
//var_dump($_POST['reg_user']);
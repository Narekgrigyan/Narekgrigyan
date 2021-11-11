<?php

class Register
{
    public function registerAction(): void
    {
        if (isset($_POST['reg_user'])) {
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $image = $_POST['image'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $verPassword = $_POST['passwordConfirm'];


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

            if (!$errors) {
                $userManager = new UserManager();
                if ($userManager->validateEmail($email)) {
                    if (!$userManager->checkEmail($email)) {
                        if ($userManager->getParams($firstname, $lastname, $image, $email, $password)) {
                            $_SESSION['email'] = $email;
                            header('location: Profile');
                        } else {
                            $errors['email'] = "don`t working";
                        }
                    } else {
                        $errors['email'] = "email already existing, Please fill again this field!";
                    }
                }else{
                    $errors['email'] = "your email are invalid";
                }
            }
        }
        require __DIR__ . "/../View/registerPage.php";
    }
}

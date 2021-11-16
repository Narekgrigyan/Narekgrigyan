<?php

class Register
{
    public function registerAction(): void
    {
        if (isset($_POST['reg_user'])) {
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $verPassword = $_POST['passwordConfirm'];

//            $name = test_input($_POST["name"]);

            $image = $_FILES['image'];
            $fileName = $image['name'];
            $fileTmpName = $image['tmp_name'];

            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));
            $allowed = ['jpg', 'jpeg', 'png', 'pdf'];

            if (in_array($fileActualExt, $allowed)) {

                    $imageName = uniqid('', true) . "." . $fileActualExt;

                    $fileDestination = 'myImages/' . $imageName;
                    move_uploaded_file($fileTmpName, $fileDestination);
            }


            $errors = [];

            if (empty($firstname)) {
                $errors['firstname'] = "your field empty, please fill Firstname";
            }
            if (empty($lastname)) {
                $errors['lastname'] = "your field empty, please fill Lastname";
            }
            if (empty($imageName)) {
                $errors['image'] = "your image field empty, please download in";
            }
            if (empty($email)) {
                $errors['email'] = "your field empty, please fill in";
            }
            if (empty($password)) {
                $errors['password'] = "your field empty, please fill password";
            }
            if (empty($verPassword)) {
                $errors['passwordConfirm'] = "your field empty, please confirm password";
            }
            if ($verPassword !== $password) {
                $errors['passwordConfirm'] = "please fill correct password";
            }
            if (isset($firstname)) {
                if (preg_match("/^[a-zA-Z-' ]*$/",
                    $firstname)) {
                    $errors['firstname'] = "Only letters and white space allowed";
                }
            }
            if (!preg_match($lastname, "/^[a-zA-Z-' ]*$/")) {
                $errors['lastname'] = "Only letters and white space allowed";
            }

            if (!$errors) {
                $userManager = new UserManager();
                if ($userManager->validateEmail($email)) {
                    if (!$userManager->checkEmail($email)) {
                        if ($userManager->insertUserData($firstname, $lastname, $imageName, $email, $password)) {
                            header('location: login');
                        } else {
                            $errors['email'] = "don`t working";
                        }
                    } else {
                        $errors['email'] = "email already existing, Please fill again this field!";
                    }
                } else {
                    $errors['email'] = "your email are invalid";
                }
            }
        }
        require __DIR__ . "/../View/registerPage.php";
    }
}

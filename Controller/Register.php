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

            $image = $_FILES['image'];
            $fileName = $image['name'];
            $fileTmpName = $image['tmp_name'];
            $fileSize = $image['size'];

            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));
            $allowed = ['jpg', 'jpeg', 'png', 'pdf'];

            if (in_array($fileActualExt, $allowed)) {
                    if ($fileSize < 1000000) {

                        $imageName = uniqid('', true) . "." . $fileActualExt;

                        $fileDestination = 'myImages/' . $imageName;
                        if (move_uploaded_file($fileTmpName, $fileDestination)) {
                            header('location: profile');
                        } else {
                            echo 'do not found image';
                        }
                    } else {
                        echo "your file is too big!";
                    }
            } else {
                echo "you can`t upload files of this type!";
            }


            $errors = [];

            if (empty($firstname)) {
                $errors['firstname'] = "your field empty, please fill in";
            }
            if (empty($lastname)) {
                $errors['lastname'] = "your field empty, please fill in";
            }
            if (empty($imageName)) {
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

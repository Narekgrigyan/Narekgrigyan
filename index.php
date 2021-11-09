<?php

require_once "Model/DbConnection.php";
require_once "Model/UserManager.php";
require_once "Controller/Register.php";
require_once "Controller/Login.php";
//require_once "Controller/Logout.php";
require_once "Controller/Profile.php";

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$pathArray = explode('/', $path);
$pathName = $pathArray[2] ?? '';
var_dump($path);
exit;
session_start();
//$errors = true;
if ($pathName === 'Register') {
//    $errors = false;
    $controller = new Register();
    $controller->registerAction();
}
//if ($pathName === 'Login') {
//    $errors = false;
//    $controller = new Login();
//    $controller->loginAction();
//}
//if ($pathName === 'Profile') {
//    $errors = false;
//    $controller = new Profile();
//    $controller->profileAction();
//}
//if ($pathName === 'Logout') {
//    $errors = false;
//    $controller = new Logout();
//    $controller->logoutAction();
//}



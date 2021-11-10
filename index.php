<?php

session_start();
require_once "Model/DbConnection.php";
require_once "Model/UserManager.php";
require_once "Controller/Register.php";
require_once "Controller/Login.php";
require_once "Controller/Logout.php";
require_once "Controller/Profile.php";
//require_once "Controller/Error404.php";

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$pathArray = explode('/', $path);
$pathName = $pathArray[2] ?? '';
//var_dump($pathName,$pathArray);exit;
$json = file_get_contents('routes.json');
$jsonRoute = json_decode($json, true);


if ($pathName === 'Register') {
//    var_dump($pathName === 'Register');exit;
    $controller = new Register();
    $controller->registerAction();
}
//else
//{
//    $controller = new Error404();
//    $controller->show_404();
//}
if ($pathName === 'Login') {
    $controller = new Login();
    $controller->loginAction();
}
if ($pathName === 'Profile') {
//    var_dump($pathName === 'Profile');exit;
    $controller = new Profile();
    $controller->profileAction();
}
if ($pathName === 'Logout') {
    $controller = new Logout();
    $controller->logoutAction();
}
if ($pathName === 'Logout') {
    $controller = new Logout();
    $controller->logoutAction();
}
//if (!$pathName) {
//    $controller = new Error404();
//    $controller->show_404();
//}


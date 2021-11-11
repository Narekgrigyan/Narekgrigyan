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
$pathArray = explode('/', trim($path, '/'));
$accountName = $pathArray[1] ?? '';
$actionName = $pathArray[2] ?? '';
$margeNames = $accountName . '/' . $actionName;
$json = file_get_contents('routes.json');
$jsonRoute = json_decode($json, true);

var_dump($jsonRoute[$margeNames]);

if (isset($jsonRoute[$margeNames])) {
    $controller = new Register();

    $controller->registerAction();
}

if (isset($jsonRoute[$margeNames])) {
    $controller = new Profile();
    $controller->profileAction();
}

if (isset($jsonRoute[$margeNames])) {
    $controller = new Login();
    $controller->loginAction();
}

if (isset($jsonRoute[$margeNames])) {
    $controller = new Logout();
    $controller->logoutAction();
}


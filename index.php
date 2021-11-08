<?php
session_start();
require_once "Model/DbConnection.php";
require_once "Model/UserManager.php";
require_once "Controller/Register.php";
//require_once "Controller/Login.php";
//require_once "Controller/Logout.php";
require_once "Controller/Profile.php";

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
//var_dump($path);exit;
$pathArray = explode('/', trim($path));
//$controllerName = $pathArray(2) ?? '';
//var_dump($pathArray);exit;
$json = file_get_contents('routes.json', true);
var_dump($json);exit;
//var_dump($pathArray(2));exit;
if ($json[$path]['action'] === 'register' . "php") {
    $controller = new Register();
    $controller->registerAction();
}
//
//if ($json['controller']['action'] === 'profile' . "php") {
//
//    $controller = new Profile();
//    $controller->profileAction();
//}
if (!isset($_SESSION)) {
    session_start();
}


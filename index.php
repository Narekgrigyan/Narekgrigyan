<?php

session_start();
//require_once "Model/DbConnection.php";
//require_once "Model/UserManager.php";
//require_once "Controller/Register.php";
//require_once "Controller/Login.php";
//require_once "Controller/Logout.php";
//require_once "Controller/Profile.php";
//require_once "Controller/Error404.php";
require_once "Autoload.php";

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$pathArray = explode('/', trim($path, '/'));
$accountName = $pathArray[1] ?? '';
$actionName = $pathArray[2] ?? '';
$margeNames = $accountName . '/' . $actionName;
$json = file_get_contents('routes.json');
$jsonRoute = json_decode($json, true);

if (isset($jsonRoute[$margeNames])) {

    $className = $jsonRoute[$margeNames]['controller'];
    $functionName = $jsonRoute[$margeNames]['action'];
//var_dump($className);exit;
    $controller = new $className;
    $controller->$functionName();
} else {
    $controller = new Error404();
    $controller->show_404();
}


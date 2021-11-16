<?php

//session_start();

require_once "Autoload.php";

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$pathArray = explode('/', trim($path, '/'));
$accountName = $pathArray[1] ?? '';
$actionName = $pathArray[2] ?? '';
$margeNames = $accountName . '/' . $actionName;
$json = file_get_contents('routes.json');
$jsonRoute = json_decode($json, true);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($jsonRoute[$margeNames])) {

//    var_dump($_SESSION, $_COOKIE);die;
    $className = $jsonRoute[$margeNames]['controller'];
    $functionName = $jsonRoute[$margeNames]['action'];
    $controller = new $className;
    $controller->$functionName();
} else {
    $controller = new Error404();
    $controller->show_404();
}


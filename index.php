<?php

require_once "Model/DbConnection.php";
require_once "Model/UserManager.php";
require_once "Controller/Register.php";

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$pathArray = explode('/', $path);
$controllerName = $pathArray(1) ?? '';
$json = file_get_contents('routes.json');


if ($controllerName === "/Register"){
    $controller = new Register();
    $controller->registerAction();
}
if ($controllerName === "/Profile"){

    $controller = new Profile();
    $controller->profileAction();
}
if (!isset($_SESSION)){
    session_start();
}


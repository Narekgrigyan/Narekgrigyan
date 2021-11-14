<?php
spl_autoload_register("Autoload::controllerClasses");

spl_autoload_register("Autoload::modelClasses");


class Autoload
{
    public static function controllerClasses($className): void
    {
        $className = str_replace("\\", DIRECTORY_SEPARATOR, $className) . '.php';
        $path = __DIR__ . DIRECTORY_SEPARATOR . "Controller" . DIRECTORY_SEPARATOR . $className;
        if (is_readable($path)) {
            require $path;
        }
    }

    public static function modelClasses($className): void
    {
        $className = str_replace("\\", DIRECTORY_SEPARATOR, $className) . '.php';
        $path = __DIR__ . DIRECTORY_SEPARATOR . "Model" . DIRECTORY_SEPARATOR . $className;
        if (is_readable($path)) {
            require $path;
        }
    }
}
<?php
use  \App\models\User;
use  \App\services\BD;

include $_SERVER['DOCUMENT_ROOT'] .
    '/services/Autoload.php';

spl_autoload_register(
    [new Autoload(),
        'loadClass']
);

$controllerName = $_GET['c'] ?: 'user';
$actionName = $_GET['a'];

$controllerClass = 'App\\controllers\\' .
    ucfirst($controllerName) . 'Controller';
if (class_exists($controllerClass)) {
    $controller = new $controllerClass();
    $controller->run($actionName);
}

$controllerName = $_GET['c'] ?: 'good';
$actionName = $_GET['a'];

$controllerClass = 'App\\controllers\\' .
    ucfirst($controllerName) . 'Controller';
if (class_exists($controllerClass)) {
    $controller = new $controllerClass();
    $controller->run($actionName);
}

//$users = new User();
//$users->pass=6789;
//$users->login='User';
//$users->fio='Pavel';
//
//$users->insert();



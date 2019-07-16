<?php
use  \App\models\User;
use  \App\services\BD;

include $_SERVER['DOCUMENT_ROOT'] .
    '/../services/Autoload.php';

spl_autoload_register(
    [new Autoload(),
        'loadClass']
);

$user = new User();
//var_dump($user->getOne(1));
//var_dump($user->getAll());
//$user->insertOne(1, "ALEX", "ADMIN", "1234");
//$user->save(1, "ALEX", "ADMIN", "1234");
$user->id = '1';
$user->name = 'Alex';
$user->login = 'Admin';
$user->password = '1234';




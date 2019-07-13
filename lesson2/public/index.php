<?php

//Работаю не в public, а на уровень выше, поэтому путь такой.
//(при запуске поменяйте на свой)

include $_SERVER['DOCUMENT_ROOT'] .
    '/services/Autoload.php';


spl_autoload_register([new App\Autoload(), 'loadClass']);



$user = new App\User(new App\BD());
$priceTag = new App\PriceTag(); // Создаем ценник
$discountPriceTag = new App\DiscountPriceTag(); // Создаем ценник со скидкой

$priceTag->viewPriceTag(); // Выводим ценнник
$discountPriceTag->viewDiscountPriceTag(); // Выводим ценник со скидкой

$user->getOne(12);
$good = (new App\Good(new App\BD()))->getAll();

print_r($good);
var_dump($user->calc([1,15,456,456]));


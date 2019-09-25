<?

use app\models\{Basket, Product, User};
use app\engine\Db;

include $_SERVER['DOCUMENT_ROOT'] . "/../config/config.php";
include $_SERVER['DOCUMENT_ROOT'] . "/../engine/Autoload.php";

spl_autoload_register([new Autoload(), 'loadClass']);



$product = new Product();


// Массив параметров в зависимости от класса
//$product->insert([
//    "name"=>"Кофе",
//    "description"=> "Молотый",
//    "price"=>10,
//]);


// Только первый параметр в зависимости от класса (name, login и т.д.)
//$product->delete([
//    "name"=>"Кофе"
//    ]);

// Только первый параметр в первой строке в зависимости от класса (name, login и т.д.)
//$product->update([
//    "name"=>"Кофе",
//]);
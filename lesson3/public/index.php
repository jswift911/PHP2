<?

use app\models\{Basket, Product, User};
use app\engine\Db;

include $_SERVER['DOCUMENT_ROOT'] . "/../config/config.php";
include $_SERVER['DOCUMENT_ROOT'] . "/../engine/Autoload.php";

spl_autoload_register([new Autoload(), 'loadClass']);



$product = new Product();
$product->insert([
    $name => 'Кофе',
    $description => 'Молотый',
    $price => 10,
]);
//var_dump($product->getOne(1));
//
//
//
//
//
//var_dump($product);


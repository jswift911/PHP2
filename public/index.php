<?

use app\engine\Render;
use app\models\{Basket, Product, User};
use app\engine\Db;

include $_SERVER['DOCUMENT_ROOT'] . "/../config/config.php";
include $_SERVER['DOCUMENT_ROOT'] . "/../engine/Autoload.php";

spl_autoload_register([new Autoload(), 'loadClass']);

require_once '../vendor/autoload.php';



$controllerName = $_GET['c'] ?: 'product';
$actionName = $_GET['a'];

$controllerClass = CONTROLLER_NAMESPACE . ucfirst($controllerName)  . "Controller";

if (class_exists($controllerClass)) {
    $controller = new $controllerClass(new Render());
    $controller->runAction($actionName);
} else {
    echo "Не правильный контроллер";
}




/**
 * @var Product $product
 */


// Добавление/изменение
//$product = new Product("Сникерс", "Вкусный", 30);
//$product = Product::getOne(4);
//$product->update();
//$product->save();


//Удаление

//$product = Product::getOne(1);
//$product->delete();




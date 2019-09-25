<?

use app\models\Product;
use app\models\User;
use app\models\Order;
use app\models\Good;
use app\engine\Autoload;
use app\engine\Db;
use app\interfaces\IModel;

include "../engine/Autoload.php";

spl_autoload_register([new Autoload(), 'loadClass']);

$product = new Product(new Db());
echo $product->getOne(3);

$user = new User(new Db());
echo $user->getAll();

$order = new Order(new Db());
echo $order->getOne(1);

$cart = new Good(new Db());
echo $cart->getAll();


var_dump($product);

function foo(IModel $model) {

}
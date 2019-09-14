<?

use app\models\Product;
use app\models\User;
use app\models\Order;
use app\models\Cart;
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
echo $order->getAll();


var_dump($product);

function foo(IModel $model) {

}
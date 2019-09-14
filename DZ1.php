<?php

class PriceTag // Ценник
{
    public $orderNumber; // номер заказа
    public $goodName; // наименование товара
    public $price; // цена
    public $quantity; // количество товара
    public $totalPrice; // итого

    public function __construct($orderNumber = 1, $goodName = 'Ноутбук', $price = 987, $quantity = 4) // по умолчанию
    {
        $this->orderNumber = $orderNumber;
        $this->goodName = $goodName;
        $this->price = $price;
        $this->quantity = $quantity;
    }

    // Метод подсчета итоговой суммы
    function totalPrice()
    {
        return $this->totalPrice = $this->price * $this->quantity;
    }

    // Метод для вывода ценника
    function viewPriceTag()
    {
        echo "<h1>$this->goodName</h1><p>Номер заказа № $this->orderNumber</p><p>Цена за единицу: $$this->price</p>
<p>Количество: $this->quantity</p><h4>Итого: $ {$this->totalPrice()}</h4>";
    }
}

$order = new PriceTag(); // Создаем ценник
$order->viewPriceTag(); // Показываем ценник

class discountPriceTag extends priceTag // Ценник со скидкой
{
    public $discount; // Скидка в %
    public $priceWithDiscount; // Цена с учетом скидки

    public function __construct($discount)
    {
        parent::__construct(2);
        $this->discount = $discount;
    }

    // Метод подсчитывает цену с учетом скидки
    function discountPrice()
    {
        return $this->priceWithDiscount = parent::totalPrice() - ((parent::totalPrice() * $this->discount) / 100);
    }

    // Метод выводит ценник с учетом скидки
    function viewDiscountPriceTag()
    {
        // Методы родителя
        echo "<h1>$this->goodName</h1><p>Номер заказа № $this->orderNumber</p><p>Цена за единицу: $$this->price</p>
<p>Количество: $this->quantity</p><h4>Итого: $ {$this->totalPrice()}</h4>";
        // Методы ребенка
        echo "<p>Скидка: $this->discount %</p><h3>Цена с учетом скидки: $ {$this->discountPrice()}</h3>";
    }
}

$order2 = new discountPriceTag(10); // Создаем ценник со скидкой
$order2->viewDiscountPriceTag(); // Выводим ценник со скидкой


// В данном примере при создании объекта а2 мы делаем ссылку на объект а1,
// поэтому счетчик срабатывает как для одного объекта.

//class A {
//    public function foo() {
//        static $x = 0;
//        echo ++$x;
//    }
//}
//$a1 = new A();
//$a2 = new A();
//$a1->foo();
//$a2->foo();
//$a1->foo();
//$a2->foo();


// В данном примере мы создаем два объекта,
// поэтому счетчик отрабатывает для каждого объекта по 2 раза.

//class A {
//    public function foo() {
//        static $x = 0;
//        echo ++$x;
//    }
//}
//class B extends A {
//}
//$a1 = new A();
//$b1 = new B();
//$a1->foo();
//$b1->foo();
//$a1->foo();
//$b1->foo();


// В данном примере мы создаем два объекта, но опускаем скобки конструктора.
// Так как мы не передаем никаких параметров на вход, скобки можно опустить и пример будет работать
// аналогично предыдущему примеру.

//class A {
//    public function foo() {
//        static $x = 0;
//        echo ++$x;
//    }
//}
//class B extends A {
//}
//$a1 = new A;
//$b1 = new B;
//$a1->foo();
//$b1->foo();
//$a1->foo();
//$b1->foo();
?>



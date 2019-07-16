<?php
namespace App;
class discountPriceTag extends priceTag // Ценник со скидкой
{
    public $discount = 10; // Скидка в %
    public $priceWithDiscount; // Цена с учетом скидки

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
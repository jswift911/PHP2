<?php
namespace App;
class PriceTag // Ценник
{
    public $orderNumber = 1; // номер заказа
    public $goodName = 'Ноутбук'; // наименование товара
    public $price = 987; // цена
    public $quantity = 4; // количество товара
    public $totalPrice; // итого

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
<?php


namespace app\models;


class Order extends Model
{
    public $id;

    public function getTableName() {
        return 'orders';
    }
}
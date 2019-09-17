<?php


namespace app\models;


class Good extends Model
{
    public $quantity;

    public function getTableName() {
        return 'goods';
    }
}
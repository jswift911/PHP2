<?php
namespace App;
class Good extends Model
{
    public $id;
    public $price;
    public $name;
    public $info;

    protected function getTableName()
    {
        return 'goods';
    }
}
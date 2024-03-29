<?php
namespace app\models;

use app\engine\Db;

/**
 * Class Model
 * @package app\models
 */

abstract class DbModel extends Models
{
    public function getLimit($from, $to) {

    }

    public function getWere($name, $value) {

    }

    public function insert() {
        $params = [];
        $columns = [];
        $tableName = static::getTableName();
        //TODO переделать цикл по state чтобы избавиться от условия
        foreach ($this as $key => $value) {
            if ($key === "id") continue;
            $params[":{$key}"] = $value;
            $columns[] = "`$key`";
        }
        $columns = implode(", ", $columns);
        $values = implode(", ", array_keys($params));

//INSERT INTO `products`(`id`, `name`, `description`, `price`) VALUES (:name, ,[value-4])

        $sql = "INSERT INTO {$tableName} ({$columns}) VALUES ($values);";
        Db::getInstance()->execute($sql, $params);
        $this->id = Db::getInstance()->lastInsertId();
    }

    public function delete()
    {
        $tableName = static::getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
        var_dump($sql);
        return Db::getInstance()->execute($sql, ['id' => $this->id]);
    }

    public function update()
    {
        $string = '';
        $params = [];

        foreach ($this as $key=>$value) {
            if (in_array($key, $this->changedProperties)) {
                $string .= "`{$key}` = :{$key}, ";
                $params[$key] = $value;
            }
        }
        $string = substr($string, 0, -2); // убираем в конце пробел и запятую
        $tableName = static::getTableName();
        $sql = "UPDATE {$tableName} SET {$string} WHERE (`id` = :id);";
        $params['id'] = $this->id;
        $this->changedProperties = [];
        var_dump($sql,$params);
        return Db::getInstance()->execute($sql, $params);
    }

    public function save() {
        if (is_null($this->id)) {
            $this->insert();
        } else {
            $this->update();
        }

    }

    public static function getOne($id) {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return Db::getInstance()->queryObject($sql, ['id' => $id], static::class);
    }
    public static function getAll() {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return Db::getInstance()->queryAll($sql);
    }

    public static function showLimit($col){
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE 1 LIMIT ?";
        return Db::getInstance()->executeLimit($sql, $col);
    }

}
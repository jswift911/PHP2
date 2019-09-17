<?php

namespace app\models;

use app\interfaces\IModel;
use app\engine\Db;

abstract class Model implements IModel
{
    protected $db;


    public function __construct()
    {
        $this->db = Db::getInstance();
    }

    public function insert($params)
    {
        $tableName = $this->getTableName();
        $column = '';
        $value = '';
        foreach ($this as $thisKey => $thisValue) {
            foreach ($params as $ParamsKey => $ParamsValue) {
                if ($thisKey === $ParamsKey) {
                    $this->$thisKey = $ParamsValue;
                }
            }
            if (!is_null($this->$thisKey) && !is_object($this->$thisKey)) {
                $column .= "$thisKey, ";
                $value  .= ":$thisKey, ";
            }
        }
        $column = substr($column, 0, -2);
        $value = substr($value, 0, -2);
        $sql = "INSERT INTO $tableName ($column) VALUES ($value)";
        var_dump($sql);
        // die();
        // $sql = "INSERT INTO products (name, description, price) VALUES (:name, :description, :price)";
        $response = $this->db->execute($sql, $params);
        if ($response) {
            $this->id = $response;
        } else {
            echo "Ошибка";
        };
        var_dump($this);
    }

    public function delete()
    { }
    public function update()
    { }

    public function getOne($id)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return $this->db->queryOne($sql, ['id' => $id]);
    }
    public function getAll()
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return $this->db->queryAll($sql);
    }
}

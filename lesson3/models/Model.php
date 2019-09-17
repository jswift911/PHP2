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

    public function insert($params) {
        foreach ($this as $key => $value) {
            if ($key == "id" || $key == "db") {
                continue;
            }
            $params[] = $key;
            $stringParams = implode(",", $params);
        }
        $sql = "INSERT INTO products (name,description,price) VALUES (:name,:description,:price)";
//          var_dump($sql);
        $this->db->execute($sql, $params);
        $this->id = lastinsertId;
        print_r($params);

        die();
//        $sql = "INSERT INTO ($key) VALUES ";
//        var_dump($sql);
//        $this->db->execute($sql);
       // $this->id = lastinsertId;

    }

    public function delete() {

    }
    public function update() {

    }

    public function getOne($id) {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return $this->db->queryOne($sql, ['id' => $id]);
    }
    public function getAll() {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return $this->db->queryAll($sql);
    }

}
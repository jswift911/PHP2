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
        foreach ($this as $key => $value) {
            if ($key == "id" || $key == "db") {
                continue;
            }
            $tableRow[] = $key;
            $stringTableRow = implode(",", $tableRow);
        }
        $stringParams = "'" . implode("','", $params) . "'";

        $sql = "INSERT INTO $tableName ($stringTableRow) VALUES ($stringParams)";
        var_dump($sql);
        $response = $this->db->execute($sql, $params);
        if ($response) {
            $this->id = $response;
        } else {
            echo "Ошибка";
        };
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

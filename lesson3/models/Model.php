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


    /**
     * @param $params - массив параметров в зависимости от класса
     */
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
        $this->db->execute($sql, $params);

    }

    /**
     * @param $params - 1 параметр (name,login и т.д.)
     */
    public function delete($params)
    {
        $tableName = $this->getTableName();
        foreach ($this as $key => $value) {
            if ($key == "id" || $key == "db") {
                continue;
            }
            $tableRow[] = $key;
        }
        $stringParams = "'" . implode("','", $params) . "'";
        $sql = "DELETE FROM $tableName WHERE `{$tableRow[0]}` = $stringParams LIMIT 1";
        var_dump($sql);
        $this->db->execute($sql, $params);

    }

    public function update($params)
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
        $sql = "UPDATE $tableName SET `$tableRow[0]` = $stringParams LIMIT 1";
        var_dump($sql);
        $this->db->execute($sql, $params);

    }

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

<?php

namespace App\models;

use App\services\BD;
use App\services\IBD;

abstract class Model
{
    /**
     * @var BD Класс для работы с базой данных
     */
    protected $bd;

    /**
     * Model constructor.
     */
    public function __construct()
    {
        $this->bd = BD::getInstance();
    }

    /**
     * Данный метод должен вернуть название таблицы
     * @return string
     */
    abstract protected function getTableName();

    /**
     * Возращает запись с указанным id
     *
     * @param int $id ID Записи таблицы
     * @return array
     */
    public function getOne($id)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return $this->bd->find($sql, [':id' => $id]);
    }

    /**
     * Получение всех записей таблицы
     * @return mixed
     */
    public function getAll()
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return $this->bd->findAll($sql);
    }

    /**
     * Удаляет пользователя по id из БД
     * @return array
     */
    public function deleteOne($id)
    {
        $tableName = $this->getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
        return $this->bd->find($sql, [':id' => $id]);
    }

    /**
     * Удаляет всех пользователей из БД
     * @return mixed
     */
    public function deleteAll()
    {
        $tableName = $this->getTableName();
        $sql = "DELETE * FROM {$tableName}";
        return $this->bd->find($sql);
    }

    /**
     * Изменяет данные пользователя по id из БД
     * @return array
     */
    public function updateOne($id, $name, $login, $password)
    {
        $tableName = $this->getTableName();
        $sql = "UPDATE {$tableName} SET name = :name, login = :login, password = :password WHERE $id";
        return $this->bd->find($sql, [':name' => $name, ':login' => $login, ':password' => $password]);
    }

    /**
     * Добавляет пользователя в БД
     * @return array
     */
    public function insertOne($id, $name, $login, $password)
    {
        $tableName = $this->getTableName();
        $sql = "INSERT INTO {$tableName} ($id, $name, $login, $password) VALUES (id = :id, name = :name, login = :login, password = :password";
        return $this->bd->find($sql, [':name' => $name, ':login' => $login, ':password' => $password]);
    }
    /**
     * Если строка есть в БД, тогда UPDATE, если нету - INSERT
     * @return array
     */
    public function save($id, $name, $login, $password)
    {
        $tableName = $this->getTableName();
        if ($sql = "SELECT EXISTS(SELECT * FROM {$tableName} WHERE ':id' = $id)") {
            $tableName = $this->getTableName();
            $sql = "UPDATE {$tableName} SET name = :name, login = :login, password = :password WHERE $id";
            return $this->bd->find($sql, [':name' => $name, ':login' => $login, ':password' => $password]);
        }
        else
        {
            $tableName = $this->getTableName();
            $sql = "INSERT INTO {$tableName} ($id, $name, $login, $password) VALUES (id = :id, name = :name, login = :login, password = :password";
            return $this->bd->find($sql, [':name' => $name, ':login' => $login, ':password' => $password]);
        }
    }
}

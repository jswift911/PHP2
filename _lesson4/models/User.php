<?php
namespace App\models;
/**
 * Class User
 * @package App\models
 * @method static getOne($id)
 */
class User extends Model
{
    public $id;
    public $fio;
    public $login;
    public $pass;

    protected static function getTableName()
    {
        return 'users';
    }

    public function getFullName()
    {
        return $this->login . '| ' . $this->fio;
    }
}

<?php
namespace App;
class BD implements IBD, IBD2
{
    use CalcRows;

    public function find(string $sql)
    {
        echo $sql;
    }

    public function findAll(string $sql)
    {
        return $sql;
    }
}
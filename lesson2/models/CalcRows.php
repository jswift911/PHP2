<?php
namespace App;
trait CalcRows
{
    public $rt = 10;

    public function calc(array $rows): int
    {
        return count($rows) + $this->rt;
    }
}

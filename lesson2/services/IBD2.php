<?php
namespace App;
interface IBD2
{
    public function calc(array $rows): int;
}
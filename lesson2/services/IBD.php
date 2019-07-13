<?php
namespace App;
interface IBD
{
    public function find(string $sql);
    public function findAll(string $sql);
}
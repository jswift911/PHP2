<?php
namespace app\engine;

class Autoload
{
    private $path = [
        'models',
        'engine',
        'interfaces'
    ];

    public function loadClass($className)
    {
        foreach ($this->path as $path) {
            $fileName = "../{$path}/{$className}.php";

            // удаляем app и папку с классом из пути
            $withoutApp = preg_replace("/app\\\(\w+)/", '', $fileName);

            if (file_exists($withoutApp)) {
                include $withoutApp;
                break;
            }
        }
    }
}
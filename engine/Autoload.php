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


            $withoutApp = str_replace(["app\models\\",'app\engine\\','app\interfaces\\'], '', $fileName);
//            var_dump($withoutApp);


            if (file_exists($withoutApp)) {
                include $withoutApp;
                break;
            }
        }
    }
}
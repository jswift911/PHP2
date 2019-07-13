<?php
namespace App;
class Autoload
{
    private $dir = [
       'models', 'services' // Название папок, в которых происходит поиск классов
    ];


    public function loadClass($className)
    {
        foreach ($this->dir as $dir) {
            /**
             * $file - поиск с учетом App
             */
            $file = $_SERVER['DOCUMENT_ROOT'] .
                "/{$dir}/{$className}.php";
            /**
             * $withoutApp - Поиск, вырезает из пути 'App\'.
             * '\\\/' - экранирование обратного слэша
             */
            $withoutApp = preg_replace('/App\\\/', '', $file);

            if (file_exists($withoutApp)) {
                include $withoutApp;
                break;
            }
        }
    }
}


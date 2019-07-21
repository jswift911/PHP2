<?php
namespace App\controllers;

use App\models\Good;

class GoodController
{
    protected $defaultAction = 'goods';
    protected $action;

    public function run($action)
    {
        $this->action = $action ?: $this->defaultAction;
        $method = $this->action . 'Action';
        if (method_exists($this, $method)) {
            $this->$method();
        } else {
            echo '404';
        }
    }

    public function goodAction()
    {
        $params = [
            'good' =>  Good::getOneGood(1)
        ];

        echo $this->render('good', $params);
    }

    public function goodsAction()
    {
        $params = [
          'goods' =>  Good::getAllGoods()
        ];

        echo $this->render('goods', $params);
    }

    public function render($template, $params = [])
    {
        $content = $this->renderTmpl($template, $params);
        return $this->renderTmpl('layouts/mainGoods', [
            'content' => $content
        ]);
    }

    public function renderTmpl($template, $params = [])
    {
        ob_start();
        extract($params);
        include $_SERVER['DOCUMENT_ROOT'] . '/views/' . $template . '.php';
        return ob_get_clean();
    }
}
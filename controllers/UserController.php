<?php

namespace app\controllers;

use app\models\User;

class UserController extends Controller
{

    public function actionIndex() {
        echo $this->render('index');
    }

    public function actionUser() {
        // $catalog = Product::getAll();
        $page = (int)$_GET['page'];
        $user = User::showLimit($page);
        echo $this->render('user', ['user' => $user, 'page' => ++$page]);
    }

    public function actionProfile() {
        $id = $_GET['id'];
        $profile = User::getOne($id);
        echo $this->render('profile', ['profile' => $profile]);
    }



}
<?php

namespace backend\controllers;

use yii\base\Controller;

class HelloController extends Controller //id hello, HelloWorldController -> hello-world
{
    public function actionIndex() //index, actionHelloWorld -> hello-world
    {
        return $this->render('index');
    }
}


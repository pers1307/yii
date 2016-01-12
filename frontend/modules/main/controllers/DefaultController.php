<?php

namespace app\modules\main\controllers;

use yii\web\Controller;

class DefaultController extends Controller
{
    public function actionIndex()
    {
        $this->layout = "bootstrap";

        return $this->render('index');
    }

    public function actionPath()
    {
        // Псевдонимы
        // @yii - путь до папки с фреймфорком
        // @app - путь до текущей активной папки
        // @runtime - по аналогии с @app
        // @webroot - указывает на директорию frontend/web
        // @web - url до текущей корневой папки
        // @vendor - указывает путь до папки vendor'а
        // @bower - до bower'а из папки vendor
        // @npm - лежит в папке vendor
        //
    }
}

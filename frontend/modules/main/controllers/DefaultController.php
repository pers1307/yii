<?php

namespace app\modules\main\controllers;

use frontend\component\Common;
use yii\web\Controller;

class DefaultController extends Controller
{
    /**
     * @return string
     */
    public function actionIndex()
    {
        //$this->layout = "bootstrap";

        $this->layout = "inner";

        /*
        $locator = \Yii::$app->locator;
        $cache = $locator->cache;

        $cache->set('test', 1);

        print $cache->get('test');
        */

        return $this->render('index');
    }

    public function actionService()
    {
        $locator = \Yii::$app->locator;
        $cache = $locator->cache;

        $cache->set('test', 1);

        print $cache->get('test');
    }

    public function actionEvent()
    {
        $component = \Yii::$app->common; //new Common();
        $component->on(Common::EVENT_NOTIFY, [$component, 'notifyAdmin']);
        $component->sendMail('test@domain.com', 'Test', 'Test text');

        // Отвязка объекта
        //$component->off(Common::EVENT_NOTIFY, [$component, 'notifyAdmin']);
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
        // @frontend - указывает непосредственно на frondend папку
        // @backend - указывает на соответствующую папку
        // print \Yii::getAlias('@webroot');
        
}

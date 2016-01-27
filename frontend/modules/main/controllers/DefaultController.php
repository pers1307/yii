<?php

namespace app\modules\main\controllers;

use frontend\component\Common;
use yii\web\Controller;
use yii\db\Query;

class DefaultController extends Controller
{
    /**
     * @return string
     */
    public function actionIndex()
    {
        $this->layout = "bootstrap";

        $query = new Query();
        $query_advert = $query->from('advert')->orderBy('id desc');
        $command = $query_advert->limit(5);
        $result_general = $command->all();
        $count_general = $command->count();

        $featured = $query_advert->limit(15)->all();
        $recommend_query = $query_advert->where('recommend = 1')->limit(5);
        $recommend = $recommend_query->all();
        $recommend_count = $recommend_query->count();

        return $this->render('index', [
            'result_general' => $result_general,
            'count_general' => $count_general,
            'featured' => $featured,
            'recommend' => $recommend,
            'recommend_count' => $recommend_count
        ]);




        /*
        $command = $query->from('advert')->orderBy('id desc')->limit(5);
        $result_general = $command->all();
        $count_general = $command->count();

        return $this->render('index', ['result_general' => $result_general, 'count_general' => $count_general]);
        */

        //$this->layout = "inner";

        /*
        $locator = \Yii::$app->locator;
        $cache = $locator->cache;

        $cache->set('test', 1);

        print $cache->get('test');
        */

        //return $this->render('index');
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

    public function actionLoginData()
    {
        print \Yii::$app->user->id;
        print \Yii::$app->user->identity->getId();
        print \Yii::$app->user->identity->email;
        print \Yii::$app->user->identity->username;
    }

    public function actionCacheTest()
    {
        //$locator = \Yii::$app->locator;
        //$locator->cache->set('test', 1);

        //print $locator->cache->get('test');
    }
}

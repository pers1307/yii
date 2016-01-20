<?php

namespace app\modules\main\controllers;

use frontend\models\Image;
use frontend\models\SignupForm;
use yii\widgets\ActiveForm;

class MainController extends \yii\web\Controller
{
    //public $layout = "bootstrap";
    public $layout = "inner";

    public function actionIndex()
    {
        //$urlImage = Image::getImageUrl();

        //$this->layout = "bootstrap";

        //return $this->render('index', ['urlImage' => $urlImage]);
        //print \Yii::getAlias('@webroot');

        //return $this->render('index');

        echo '3 vidio 58:10';

        return $this->render('inner');
    }

    // http://yii.loc/frontend/web/main/main/register
    public function actionRegister()
    {
        $model = new SignupForm;

        if (\Yii::$app->request->isAjax && \Yii::$app->request->isPost) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {

            print_r($model->getAttributes());
            die;

        }
        return $this->render('register', ['model' => $model]);
    }

    public function actionContact()
    {

    }

    /**
     * http://yii.loc/index.php?r=main%2Ftest
     */
    public function actionTest()
    {
        echo '!!!';
    }

}

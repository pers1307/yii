<?php

namespace app\modules\main\controllers;

use frontend\models\ContactForm;
use frontend\models\Image;
use frontend\models\SignupForm;
use yii\web\Response;
use yii\widgets\ActiveForm;

class MainController extends \yii\web\Controller
{
    //public $layout = "bootstrap";
    public $layout = "inner";

    public function actions()
    {
        return [
            // Р�РјСЏ СЌРєС€РµРЅР° РїРѕ РєРѕС‚РѕСЂРѕРјСѓ Р±СѓРґРµРј РѕР±СЂР°С‰Р°С‚СЊСЃСЏ
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],

            /*
             * // РїРѕРґРєР»СЋС‡РµРЅРёРµ СЃС‚РѕСЂРѕРЅРЅРµРіРѕ Action'Р° РІ РЅР°С€
            'test' => [
                'class' => 'frontend\actions\TestAction',
                'viewName' => 'test1'
            ]
            */
        ];
    }

    // http://yii.loc/frontend/web/main/main
    public function actionIndex()
    {
        //$urlImage = Image::getImageUrl();

        //$this->layout = "bootstrap";

        //return $this->render('index', ['urlImage' => $urlImage]);
        //print \Yii::getAlias('@webroot');

        //return $this->render('index');

        echo '4 vidio 1:05:00';

        return $this->render('inner');
    }

    // http://yii.loc/frontend/web/main/main/register
    public function actionRegister()
    {
        $model = new SignupForm;
        $model->scenario = 'short_register';

        if (\Yii::$app->request->isAjax && \Yii::$app->request->isPost) {
            if ($model->load(\Yii::$app->request->post())) {
                //\Yii::$app->response->format = Response::FORMAT_JSON;
                \Yii::$app->response->format = Response::FORMAT_JSON;
                return ActiveForm::validate($model);
            }
        }

        if ($model->load(\Yii::$app->request->post()) && $model->signup()) {

            \Yii::$app->session->setFlash('success', 'Register Success');
            //print_r($model->getAttributes());
            //die;

        }
        return $this->render('register', ['model' => $model]);
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {

            $body = '<div>Body: <b>' . $model->body . ' </b></div>';
            $body .= '<div>Email: <b>' . $model->email . ' </b></div>';

            \Yii::$app->common->sendMail($model->subject, $body);

            print 'Send success';
        }



        return $this->render('contact', ['model']);
        //return $this->render('inner');
    }

    /**
     * http://yii.loc/index.php?r=main%2Ftest
     */
    public function actionTest()
    {
        echo '!!!';
    }

    public function actionLogin()
    {
        //$model =

        return $this->render('login');
    }
}

<?php

namespace app\modules\main\controllers;

use frontend\models\Image;

class MainController extends \yii\web\Controller
{
    //public $layout = "bootstrap";

    public function actionIndex()
    {
        //$urlImage = Image::getImageUrl();

        //$this->layout = "bootstrap";

        //return $this->render('index', ['urlImage' => $urlImage]);
        return $this->render('index');
    }

    /**
     * http://yii.loc/index.php?r=main%2Ftest
     */
    public function actionTest()
    {
        echo '!!!';
    }

}

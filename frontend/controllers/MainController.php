<?php

namespace frontend\controllers;

use frontend\models\Image;

class MainController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $urlImage = Image::getImageUrl();

        return $this->render('index', ['urlImage' => $urlImage]);
    }

    /**
     * http://yii.loc/index.php?r=main%2Ftest
     */
    public function actionTest()
    {
        echo '!!!';
    }

}

<?php

namespace common\controllers;

use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class AuthController extends \yii\rest\Controller
{
    public function behaviors()
    {
        $behaviors = [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@']
                    ]
                ]
            ],

            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ]
            ]
        ];
    }
}
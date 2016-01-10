<?php

namespace app\modules\main;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'app\modules\main\controllers';

    // Этот модуль используется для вывода html на страницу
    public function init()
    {
        parent::init();

        $this->setLayoutPath('@frontend/views/layouts');

        // custom initialization code goes here
    }
}

<?php

namespace frontend\actions;

use yii\rest\Action;

class TestActions extends Action
{
    public  $viewName = 'index';

    public function run()
    {
        return $this->render($this->viewName);
    }
}
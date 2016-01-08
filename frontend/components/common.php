<?php
/**
 * Created by PhpStorm.
 * User: Saber
 * Date: 08.01.16
 * Time: 20:08
 */

namespace frontend\component;

use yii\base\Component;

class Common extends Component
{

    public static function sendMail($email, $subject, $body, $name = '')
    {
        \Yii::$app->mail->compose()
            ->setFrom([\Yii::$app->params['supportEmail'] => \Yii::$app->name])
            ->setTo([$email => $name])
            ->setSubject($subject)
            ->setTextBody($body)
            ->send();
    }



}
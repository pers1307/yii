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

    const EVENT_NOTIFY = 'notify_admin';

    //public static function sendMail($email, $subject, $body, $name = '')
    public function sendMail($email, $subject, $body, $name = '')
    {
        // Активизация события
        $this->trigger(self::EVENT_NOTIFY);

        /*
        \Yii::$app->mail->compose()
            ->setFrom([\Yii::$app->params['supportEmail'] => \Yii::$app->name])
            ->setTo([$email => $name])
            ->setSubject($subject)
            ->setTextBody($body)
            ->send();
        */
    }

    public function notifyAdmin($event)
    {
        print 'Notify Admin';
    }



}
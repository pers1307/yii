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
    //public function sendMail($email, $subject, $body, $name = '')
    public function sendMail($subject, $text, $emailFrom = 'optimus58@mail.ru', $nameFrom = 'Advert')
    {
        \Yii::$app->mail->compose()
            ->setFrom(['yii2.school@yandex.ru' => 'Advert'])
            ->setTo([$emailFrom => $nameFrom])
            ->setSubject($subject)
            ->setTextBody($text)
            ->send();

        // Активизация события
        $this->trigger(self::EVENT_NOTIFY);
    }

    public function notifyAdmin($event)
    {
        print 'Notify Admin';
    }



}
<?php
/**
 * Created by PhpStorm.
 * User: Saber
 * Date: 08.01.16
 * Time: 20:26
 */

namespace frontend\assets;

use yii\base\View;
use yii\web\AssetBundle;

class MainAsset extends AssetBundle
{
    // Это алиасы
    public $basePath = '@webroot'; // ведет в папку frontend/web
    public $baseUrl = '@web'; // по сути смотрит туда же

    public $css = [
        'source/style.css' // и прописываем прочие нужные пути к стилям
    ];

    public $js = [
        'source/script.js' //
    ];

    // дополнительные зависимости для подгрузки
    public $depends = [
        'yii\web\YiiAsset', // yii.js, jquery это тянется через зависимости
        'yii\bootstrap\BootstrapAsset', // bootstrap.css
        'yii\bootstrap\BootstrapPluginAsset' // bootstrap.js
    ];

    // настройки в какую часть страницы подключать js скрипты
    public $jsOptions = [
        //'position' => View::POS_HEAD // непонятно что это
    ];
}
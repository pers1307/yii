<?
use \yii\bootstrap\Html;

    \frontend\assets\MainAsset::register($this);
?>

<meta charset="<?= Yii::$app->charset ?>">
<?= Html::csrfMetaTags() // Отправка какого то кода при приеме формы ?>
<? $this->head() // здесь будут подключаться все js и css файлы ?>


<? $this->beginPage() ?>
<? $this->beginBody() ?>
<h1>Это главная страница!</h1>
<p>А если более точно, то лэйаут!</p>
<? $this->endBody() ?>
<? $this->endPage() ?>
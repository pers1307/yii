<?
use \yii\bootstrap\Html;

\frontend\assets\MainAsset::register($this);
?>

<meta charset="<?= Yii::$app->charset ?>">
<?= Html::csrfMetaTags() // Отправка какого то кода при приеме формы ?>
<? $this->head() // здесь будут подключаться все js и css файлы ?>

    <title><?= $this->title ?></title>

<?= $this->render("//common/head") ?>

<? $this->beginPage() ?>
<? $this->beginBody() ?>
    <h1>А тут внезапно появляется контент</h1>
    <?= $content ?>
<?php
print \Yii::getAlias('@test');
?>


<? $this->endBody() ?>
<? $this->endPage() ?>
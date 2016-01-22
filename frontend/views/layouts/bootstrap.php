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

<? if (Yii::$app->session->hasFlash('success')): ?>

    <? $success = Yii::$app->session->getFlash('success'); ?>
    <?= \yii\bootstrap\Alert::widget([
        'options' => [
            'class' => 'alert-info'
        ],
        'body' => $success
    ]) ?>

<? else: ?>

<? endif; ?>

<h1>Это главная страница!</h1>
<p>А если более точно, то лэйаут!</p>

<?php
    print \Yii::getAlias('@test');
?>


<? $this->endBody() ?>
<? $this->endPage() ?>
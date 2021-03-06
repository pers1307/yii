<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Search\AdvertSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="advert-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'price') ?>

    <?= $form->field($model, 'address') ?>

    <?= $form->field($model, 'fk_agent_detail') ?>

    <?= $form->field($model, 'bedroom') ?>

    <?php // echo $form->field($model, 'livingroom') ?>

    <?php // echo $form->field($model, 'parking') ?>

    <?php // echo $form->field($model, 'kitchen') ?>

    <?php // echo $form->field($model, 'general_image') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'location') ?>

    <?php // echo $form->field($model, 'hot') ?>

    <?php // echo $form->field($model, 'sold') ?>

    <?php // echo $form->field($model, 'type') ?>

    <?php // echo $form->field($model, 'recommend') ?>

    <?php // echo $form->field($model, 'createAt') ?>

    <?php // echo $form->field($model, 'ipdatedAt') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

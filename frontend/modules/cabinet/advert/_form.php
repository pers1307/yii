<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Advert */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="advert-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fk_agent_detail')->textInput() ?>

    <?= $form->field($model, 'bedroom')->textInput() ?>

    <?= $form->field($model, 'livingroom')->textInput() ?>

    <?= $form->field($model, 'parking')->textInput() ?>

    <?= $form->field($model, 'kitchen')->textInput() ?>

    <?= $form->field($model, 'general_image')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'location')->textInput(['maxlength' => true]) ?>

<!--    --><?//= $form->field($model, 'hot')->textInput() ?>
    <?= $form->field($model, 'hot')->radioList(['No', 'Yes']) ?>

<!--    --><?//= $form->field($model, 'sold')->textInput() ?>
    <?= $form->field($model, 'sold')->radioList(['No', 'Yes']) ?>

    <?= $form->field($model, 'type')->dropDownList(['Apartment', 'Building', 'Office Space']) ?>

    <?= $form->field($model, 'recommend')->radioList(['No', 'Yes']) ?>

    <?= $form->field($model, 'createAt')->textInput() ?>

    <?= $form->field($model, 'ipdatedAt')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?
    $form = \yii\bootstrap\ActiveForm::begin();
?>

<?= $form->field($model, 'username') ?>
<?= $form->field($model, 'password')->passwordInput() ?>
<?= $form->field($model, 'rememberMe')->checkbox() ?>

<?= \yii\helpers\Html::submitButton('Login', ['class' => 'btn btn-success']) ?>

<?
    \yii\bootstrap\ActiveForm::end();
?>
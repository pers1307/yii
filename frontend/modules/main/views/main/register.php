

<?
    $form = \yii\bootstrap\ActiveForm::begin();

?>
<form>
    <input name="1" placeholder="Логин">
    <?
        echo $form->field($model, 'username');
        echo $form->field($model, 'email');
        echo $form->field($model, 'password')->passwordInput();
        echo $form->field($model, 'repassword')->passwordInput();
        echo \yii\bootstrap\Html::submitButton('Register', ['class' => 'btn btn-success']);
    ?>
</form>

<?
    \yii\bootstrap\ActiveForm::end();
?>
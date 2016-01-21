<p>Привет! Я контент!</p>
<? echo \yii\helpers\Html::beginForm(); ?>
<? echo \yii\helpers\Html::textInput('search', '', ['class' => 'form-control', 'placeholder' => '!!!']); ?>

<? echo \yii\helpers\Html::dropDownList('buy', '', [
    'Buy' => 'Buy',
    'Rent' => 'Rent',
    'Sale' => 'Sale',
], [
        'class' => 'form-control'
    ]
); ?>

<? echo \yii\helpers\Html::submitButton('Find Now', ['class' => 'btn']) ?>

<? echo \yii\helpers\Html::endForm(); ?>
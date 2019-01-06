<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Predmet */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="predmet-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'obavezni')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'izborni')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

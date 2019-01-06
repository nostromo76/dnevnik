<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Ucenik */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ucenik-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ime')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'prezime')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_odeljenje')->textInput() ?>

    <?= $form->field($model, 'id_roditelj')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

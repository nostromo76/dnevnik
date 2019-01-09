<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Odeljenje */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="odeljenje-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'naziv')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_ucitelj')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

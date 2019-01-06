<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Direktor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="direktor-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'prosek_odeljenje')->textInput() ?>

    <?= $form->field($model, 'prosek_skola')->textInput() ?>

    <?= $form->field($model, 'id_user')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\UcenikSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ucenik-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_ucenik') ?>

    <?= $form->field($model, 'ime') ?>

    <?= $form->field($model, 'prezime') ?>

    <?= $form->field($model, 'username') ?>

    <?= $form->field($model, 'id_odeljenje') ?>

    <?php // echo $form->field($model, 'id_roditelj') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

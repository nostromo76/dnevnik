<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ObavestenjaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="obavestenja-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_obavestenja') ?>

    <?= $form->field($model, 'naziv') ?>

    <?= $form->field($model, 'opis') ?>

    <?= $form->field($model, 'id_odeljenje') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

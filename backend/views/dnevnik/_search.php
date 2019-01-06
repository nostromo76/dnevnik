<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\DnevnikSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dnevnik-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_dnevnik') ?>

    <?= $form->field($model, 'id_ucenik') ?>

    <?= $form->field($model, 'id_ucitelj') ?>

    <?= $form->field($model, 'id_roditelj') ?>

    <?= $form->field($model, 'id_odeljenje') ?>

    <?php // echo $form->field($model, 'id_ocena') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

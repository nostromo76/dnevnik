<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\OcenaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ocena-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_ocena') ?>

    <?= $form->field($model, 'vrednost_ocena') ?>

    <?= $form->field($model, 'zakljucena_ocena') ?>

    <?= $form->field($model, 'id_ucenik') ?>

    <?= $form->field($model, 'id_predmet') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

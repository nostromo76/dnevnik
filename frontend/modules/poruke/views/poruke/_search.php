<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\poruke\models\PorukeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="poruke-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_poruke') ?>

    <?= $form->field($model, 'poruka') ?>

    <?= $form->field($model, 'vreme') ?>

    <?= $form->field($model, 'id_roditelj') ?>

    <?= $form->field($model, 'id_ucitelj') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

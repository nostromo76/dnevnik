<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\roditelj\models\OtvorenaVrataSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="otvorena-vrata-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_otvorena_vrata') ?>

    <?= $form->field($model, 'naslov') ?>

    <?= $form->field($model, 'otvorena_vrata') ?>

    <?= $form->field($model, 'vreme') ?>

    <?= $form->field($model, 'id_ucitelj') ?>

    <?php // echo $form->field($model, 'id_roditelj') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

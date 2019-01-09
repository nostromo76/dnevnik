<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Raspored */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="raspored-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'dan')->dropDownList([ 'Ponedeljak' => 'Ponedeljak', 'Utorak' => 'Utorak', 'Sreda' => 'Sreda', 'Cetvrtak' => 'Cetvrtak', 'Petak' => 'Petak', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'br_casa')->dropDownList([ 1 => '1', 2 => '2', 3 => '3', 4 => '4', 5 => '5', 6 => '6', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'id_predmet')->textInput() ?>

    <?= $form->field($model, 'id_odeljenje')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

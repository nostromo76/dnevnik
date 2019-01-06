<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Ocena */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ocena-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'vrednost_ocena')->textInput() ?>

    <?= $form->field($model, 'zakljucena_ocena')->textInput() ?>

    <?= $form->field($model, 'id_ucenik')->textInput() ?>

    <?= $form->field($model, 'id_predmet')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

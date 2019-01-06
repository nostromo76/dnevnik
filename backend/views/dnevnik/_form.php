<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Dnevnik */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dnevnik-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_ucenik')->textInput() ?>

    <?= $form->field($model, 'id_ucitelj')->textInput() ?>

    <?= $form->field($model, 'id_roditelj')->textInput() ?>

    <?= $form->field($model, 'id_odeljenje')->textInput() ?>

    <?= $form->field($model, 'id_ocena')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

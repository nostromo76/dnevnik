<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\roditelj\models\Obavestenja */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="obavestenja-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'naziv')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'opis')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'vreme')->textInput() ?>

    <?= $form->field($model, 'id_odeljenje')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

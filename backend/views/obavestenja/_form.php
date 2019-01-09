<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Odeljenje;

/* @var $this yii\web\View */
/* @var $model backend\models\Obavestenja */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="obavestenja-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'naziv')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'opis')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'id_odeljenje')->dropDownList(
            ArrayHelper::map(Odeljenje::find()->all(), 'id_odeljenje','naziv'),
            ['prompt' => 'Select odeljenje']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

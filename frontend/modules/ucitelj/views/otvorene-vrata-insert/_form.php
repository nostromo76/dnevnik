<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\ucitelj\models\OtvoreneVrataInsert */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="otvorene-vrata-insert-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_roditelj')->textInput() ?>

    <?= $form->field($model, 'akcija')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vreme')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

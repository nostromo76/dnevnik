<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Poruke */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="poruke-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'poruka')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'vreme')->textInput() ?>

    <?= $form->field($model, 'id_roditelj')->textInput() ?>

    <?= $form->field($model, 'id_ucitelj')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

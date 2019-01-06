<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Roditelj */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="roditelj-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_ucenik')->textInput() ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Ucitelj;
/* @var $this yii\web\View */
/* @var $model backend\models\Odeljenje */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="odeljenje-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'naziv')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ucitelj_id')->dropDownList(ArrayHelper::map(Ucitelj::find()->all(),'id_ucitelj','user.fullname')) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

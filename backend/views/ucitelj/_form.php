<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\User;
use backend\models\Odeljenje;

/* @var $this yii\web\View */
/* @var $model backend\models\Ucitelj */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ucitelj-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->dropDownList(
        ArrayHelper::map(user::find()->all(), 'id', 'fullname'),
        ['prompt'=> 'Select User']
    ) ?>
    <!-- user_id textInput -->

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

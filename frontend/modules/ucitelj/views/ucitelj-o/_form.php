<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\ucitelj\models\UciteljO */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ucitelj-o-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'da')->checkbox([true]) ?>

    <?= $form->field($model, 'ne')->checkbox([true]) ?>

    <?= $form->field($model, 'id_roditelj')->dropDownList(
        ArrayHelper::map(roditelj::find()->all(), 'id_roditelj', 'user.username'),
        ['prompt'=> 'Select Roditelj']
    ) ?>
    <!-- id_roditelj textInput -->

    <?= $form->field($model, 'id_ucitelj')->dropDownList(
        ArrayHelper::map(ucitelj::find()->all(), 'id_ucitelj', 'user.username'),
        ['prompt'=> 'Select Ucitelj']
    ) ?>
    <!-- id_ucitelj textInput -->

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
